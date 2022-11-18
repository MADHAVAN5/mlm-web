<?php
require("./resources/connection_build.php");
require("./resources/function.php");


if (isset($_REQUEST['register_btn'])) {
    $sps_id = mysqli_real_escape_string($conn, $_REQUEST['sps_id']);
    $username = mysqli_real_escape_string($conn, $_REQUEST['username']);
    $email = mysqli_real_escape_string($conn, $_REQUEST['user_email']);
    $user_mob = mysqli_real_escape_string($conn, $_REQUEST['user_mob']);
    $user_password = mysqli_real_escape_string($conn, $_REQUEST['user_password']);
    if ($sps_id == '') {
        $sps_id = 214748;
    }
    $_SESSION['error'] = 'SPS';
    if (check_sponsor_id($sps_id)) {
        $_SESSION['error'] = 'Mobile';
        if (check_mobile($user_mob)) {
            $_SESSION['error'] = 'N';
            $password = password_hash($user_password, PASSWORD_BCRYPT);
            $agent_id = rand("100000", "999999");
            $reg_date = date("Y-m-d");
            $d = mysqli_query($conn, "INSERT INTO `agent`(`sponsor_id`, `agent_id`, `agent_name`, `password`, `agent_mobile`,`reg_date`) VALUES ('$sps_id','$agent_id','$username','$password','$user_mob','$reg_date')");
            $t = mysqli_query($conn, "INSERT INTO `agent_income`(`agent_id`) VALUES ('$agent_id')");
            if ($d) {
                $_SESSION['reg'] = true;
                $_SESSION['agent_id'] = $agent_id;
                $_SESSION['Name'] = $username;
            }
        }
    }
    header("Location:register.php");
}

if (isset($_REQUEST['login_btn'])) {
    $agent_id = mysqli_real_escape_string($conn, $_REQUEST['agent_id']);
    $agent_password = mysqli_real_escape_string($conn, $_REQUEST['agent_password']);
    $data = mysqli_query($conn, "SELECT * FROM `agent` WHERE `agent_id` = '$agent_id'");
    if (mysqli_num_rows($data) > 0) {
        $data = mysqli_fetch_array($data);
        $hash_pass = $data['password'];
        if ($agent_id == '214748') {
            if (password_verify($agent_password, $hash_pass)) {
                $_SESSION['sess_id'] = session_id();
                $_SESSION['my_id'] = $agent_id;
                header("Location:./admin/index.php");
            }
        } elseif (password_verify($agent_password, $hash_pass)) {
            $_SESSION['sess_id'] = session_id();
            $_SESSION['my_id'] = $agent_id;
            header("Location:index.php");
        } else {
            $_SESSION['error'] = "not_valid";
            header("Location:login.php");
        }
    } else {
        $_SESSION['error'] = "not_found";
        header("Location:login.php");
    }
    // header("Location:index.php");
}

if (isset($_REQUEST['activate_btn'])) {
    $user = mysqli_real_escape_string($conn, $_REQUEST['user_id']);
    $pin = mysqli_real_escape_string($conn, $_REQUEST['pin']);
    $package = mysqli_real_escape_string($conn, $_REQUEST['package']);
    if (check_valid_user_id($user)) {
        if (check_pin_valid_or_not($pin)) {
            if (check_user_active_or_not($user)) {
                mysqli_query($conn, "INSERT INTO `bank_account`(`agent_id`) VALUES('$user')");
            }
            $timestamp = date("Y-m-d h:i:sa");
            mysqli_query($conn, "UPDATE `agent` SET `status`='1',`activatation_date`='$timestamp',`package`='$package' WHERE `agent_id` = '$user'");
            mysqli_query($conn, "DELETE FROM `payment_proof` WHERE `agent_id`='$user'");
            level_income_distribute($user);
            // mysqli_query($conn,"UPDATE `pins` SET `pin_status`='1',`used_date`='$timestamp',`activate_user`='$user' WHERE `pin_value`='$pin'");
            insert_in_matrix_autopool($user);
            $_SESSION['status'] = 4;
        } else {
            $_SESSION['status'] = 3;
        }
    } else {
        $_SESSION['status'] = 1;
    }
    header("Location:./admin/activation.php");
}

if (isset($_REQUEST['profile_update_basic'])) {
    $agent_id = mysqli_real_escape_string($conn, $_REQUEST['agent_id']);
    $address = mysqli_real_escape_string($conn, $_REQUEST['address']);
    $data = mysqli_query($conn, "UPDATE `agent` SET `address`='$address' WHERE `agent_id`='$agent_id'");
    header("Location:profile.php");
}

if (isset($_REQUEST['profile_update_password'])) {
    $agent_id = mysqli_real_escape_string($conn, $_REQUEST['agent_id']);
    $password = mysqli_real_escape_string($conn, $_REQUEST['password']);
    $hash_pass = password_hash($password, PASSWORD_BCRYPT);
    $data = mysqli_query($conn, "UPDATE `agent` SET `password`='$hash_pass' WHERE `agent_id`='$agent_id'");
    header("Location:profile.php");
}

if (isset($_REQUEST['withdrawal_btn'])) {
    $my_id = mysqli_real_escape_string($conn, $_REQUEST['user_id']);
    $amt = mysqli_real_escape_string($conn, $_REQUEST['amount']);
    $bank_detail = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM `bank_account` WHERE `agent_id`='$my_id'"));
    $amount = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM `agent_income` WHERE `agent_id`='$my_id'"));
    $_SESSION['status'] = 0;
    if ($bank_detail['bank_name'] == '') {
        $_SESSION['status'] = 5;
    } elseif ($amount['wallet'] >= $amt) {
        $deduction = $amt * .05;
        $payable_amt = $amt - $deduction;
        $time = date("Y-m-d h:i:sa");
        mysqli_query($conn, "UPDATE `agent_income` SET `wallet`=`wallet`-$amt WHERE `agent_id` = '$my_id'");
        mysqli_query($conn, "INSERT INTO `wallet_history`(`agent_id`, `amt`, `desp`, `date_time`, `status`) VALUES ('$my_id','$amt','withdrawal','$time','1')");
        mysqli_query($conn, "INSERT INTO `withdraw_history`(`agent_id`, `amount`, `payable_amt`, `req_time`) VALUES ('$my_id', '$amt', '$payable_amt', '$time')");
        $_SESSION['status'] = 4;
    }
    header("Location:withdrawal.php");
}

if (isset($_REQUEST['activation_req_btn'])) {
    $timestamp = date("Y-m-d h:i:sa");
    $agent_id = mysqli_real_escape_string($conn, $_REQUEST['agent_id']);
    $payer_name = mysqli_real_escape_string($conn, $_REQUEST['payer_name']);
    $payment_id = mysqli_real_escape_string($conn, $_REQUEST['payment_id']);
    $package = mysqli_real_escape_string($conn, $_REQUEST['package']);
    $amt = mysqli_real_escape_string($conn, $_REQUEST['amt']);
    $payment_proof = $_FILES['img_input']['name'];
    $payment_proof_temp = $_FILES['img_input']['tmp_name'];
    $payment_proof_dir = "./admin/images/payment_proof/" . $payment_proof;
    if (move_uploaded_file($payment_proof_temp, $payment_proof_dir)) {
        mysqli_query($conn, "INSERT INTO `payment_proof`(`agent_id`, `name`, `transaction_id`, `package`, `amount`, `img_name`, `date`) VALUES('$agent_id','$payer_name','$payment_id','$package','$amt','$payment_proof','$timestamp')");
        $_SESSION['status'] = 4;
    }
    header("Location:activation_req.php");
}

if (isset($_REQUEST['bank_detail_update'])) {
    $agent_id = mysqli_real_escape_string($conn, $_REQUEST['agent_id']);
    $acc_holder = mysqli_real_escape_string($conn, $_REQUEST['acc_holder']);
    $acc_num = mysqli_real_escape_string($conn, $_REQUEST['acc_num']);
    $ifsc_code = mysqli_real_escape_string($conn, $_REQUEST['ifsc_code']);
    $bank_name = mysqli_real_escape_string($conn, $_REQUEST['bank_name']);
    $data = mysqli_query($conn, "UPDATE `bank_account` SET `bank_name`='$bank_name',`account_number`='$acc_num',`IFSC_code`='$ifsc_code',`account_holder`='$acc_holder' WHERE `agent_id`='$agent_id'");
    $_SESSION['status'] = 4;
    header("Location:profile.php");
}

if (isset($_REQUEST['withdrawal__btn'])) {
    $timestamp = date("Y-m-d h:i:sa");
    $agent_id = mysqli_real_escape_string($conn, $_REQUEST['user_id']);
    mysqli_query($conn, "UPDATE `withdraw_history` SET `status`='1',`approve_time`='$timestamp' WHERE `agent_id`='$agent_id'");
    $_SESSION['status'] = 4;
    header("Location:./admin/withdrawal.php");
}

if (isset($_REQUEST['logout_btn'])) {
    unset($_SESSION['sess_id']);
    unset($_SESSION['my_id']);
    header("Location:login.php");
}