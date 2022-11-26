<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function sendMail($agent_id,$password,$email, $v_code)
{
    require("PHPMailer/PHPMailer.php");
    require("PHPMailer/SMTP.php");
    require("PHPMailer/Exception.php");

    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'asmoneyworldttt@gmail.com';                     //SMTP username
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('asmoneyworldttt@gmail.com', 'AS Money World');
        $mail->addAddress($email);     //Add a recipient

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Email Verification from AS Money World';
        $mail->Body    = "Welcome to AS Money World! <br>
        Agent ID = AS$agent_id <br> Password = $password <br> <a href='https://akakum8.dreamhosters.com/resources/verify.php?email=$email&v_code=$v_code'>Verify</a>";

        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }
}

function check_sponsor_id($sps_id)
{
    global $conn;
    $data = mysqli_query($conn, "SELECT * FROM `agent` WHERE `agent_id` = '$sps_id'");
    // $data = mysqli_num_rows($data);
    if (mysqli_num_rows($data) == 1) {
        return true;
    }
    return false;
}

function check_payment($agent_id)
{
    global $conn;
    $b = mysqli_query($conn, "SELECT * FROM `payment_proof` WHERE `agent_id`='$agent_id'");
    if (mysqli_num_rows($b) == 1) {
        return true;
    }
    return false;
}

function check_mobile($mobile)
{
    global $conn;
    $data = mysqli_query($conn, "SELECT * FROM `agent` WHERE `agent_mobile` = '$mobile'");
    // $data = mysqli_num_rows($data);
    if (mysqli_num_rows($data) == 1) {
        return false;
    }
    return true;
}

function check_email($email)
{
    global $conn;
    $data = mysqli_query($conn,"SELECT * FROM `email_verify` WHERE `email` = '$email'");
    if (mysqli_num_rows($data) == 1) {
        return false;
    }
    return true;
}

function check_valid_user_id($agent_id)
{
    global $conn;
    $data = mysqli_query($conn, "SELECT * FROM `agent` WHERE `agent_id` = '$agent_id'");
    // $data = mysqli_num_rows($data);
    if (mysqli_num_rows($data) == 1) {
        return true;
    }
    return false;
}

function check_user_active_or_not($agent_id)
{
    global $conn;
    $data = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM `agent` WHERE `agent_id` = '$agent_id'"));
    if ($data['status']) {
        return false;
    }
    return true;
}

function check_pin_valid_or_not($pin)
{
    global $conn;
    $data = mysqli_query($conn, "SELECT * FROM `pins` WHERE `pin_value` = '$pin'");
    if (mysqli_num_rows($data) == 1) {
        $data = mysqli_fetch_array($data);
        if (!$data['pin_status']) {
            return true;
        }
    }
    return false;
}

function level_income_distribute($agent_id)
{
    global $conn;
    $sponsor_id = get_spons_id($agent_id);
    $time = date("Y-m-d h:i:sa");
    $qurry = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM `agent` WHERE `agent_id`='$sponsor_id'"));
    $package = $qurry['package'];
    if ($package == 'b-silver') {
        $amt = 100;
    } elseif ($package == 'b-gold') {
        $amt = 200;
    } elseif ($package == 'b-diamond') {
        $amt = 500;
    } elseif ($package == 'b-platinum') {
        $amt = 2500;
    } elseif ($package == 'p-silver') {
        $amt = 1500;
    } elseif ($package == 'p-gold') {
        $amt = 5000;
    } elseif ($package == 'p-diamond') {
        $amt = 10000;
    } else {
        $amt = 0;
    }
    mysqli_query($conn, "UPDATE `agent_income` SET `wallet`=`wallet`+$amt WHERE `agent_id`='$sponsor_id'");
    mysqli_query($conn, "INSERT INTO `wallet_history`(`agent_id`, `amt`, `desp`, `date_time`, `status`) VALUES ('$sponsor_id','$amt','Referral Income','$time','0')");
    $a = 1;
    while ($a <= 5 && $sponsor_id != 0) {
        $qurry = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM `agent` WHERE `agent_id`='$sponsor_id'"));
        $package = $qurry['package'];
        if ($package == 'b-silver') {
            $amt = 20;
            mysqli_query($conn, "UPDATE `agent_income` SET `wallet`=`wallet`+$amt WHERE `agent_id`='$sponsor_id'");
            mysqli_query($conn, "INSERT INTO `wallet_history`(`agent_id`, `amt`, `desp`, `date_time`, `status`) VALUES ('$sponsor_id','$amt','Level Income','$time','0')");
        } elseif ($package == 'b-gold') {
            $level = [40, 40, 40, 40, 40, 40, 40, 40, 40, 40, 80, 80];
            $amt = $level[$a - 1];
            mysqli_query($conn, "UPDATE `agent_income` SET `wallet`=`wallet`+$amt WHERE `agent_id`='$sponsor_id'");
            mysqli_query($conn, "INSERT INTO `wallet_history`(`agent_id`, `amt`, `desp`, `date_time`, `status`) VALUES ('$sponsor_id','$amt','Level Income','$time','0')");
        } elseif ($package == 'b-diamond') {
            $level = [125, 125, 125, 125, 125, 125, 125, 125, 125, 125, 150, 150];
            $amt = $level[$a - 1];
            mysqli_query($conn, "UPDATE `agent_income` SET `wallet`=`wallet`+$amt WHERE `agent_id`='$sponsor_id'");
            mysqli_query($conn, "INSERT INTO `wallet_history`(`agent_id`, `amt`, `desp`, `date_time`, `status`) VALUES ('$sponsor_id','$amt','Level Income','$time','0')");
        } elseif ($package == 'b-platinum') {
            $level = [170, 170, 170, 170, 170, 170, 170, 170, 170, 170, 200, 200];
            $amt = $level[$a - 1];
            mysqli_query($conn, "UPDATE `agent_income` SET `wallet`=`wallet`+$amt WHERE `agent_id`='$sponsor_id'");
            mysqli_query($conn, "INSERT INTO `wallet_history`(`agent_id`, `amt`, `desp`, `date_time`, `status`) VALUES ('$sponsor_id','$amt','Level Income','$time','0')");
        } else {
            $amt = 0;
        }
        $sponsor_id = get_spons_id($sponsor_id);
        ++$a;
    }
}

function insert_in_matrix_autopool($agent_id)
{
    global $conn;
    $query = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM `matrix_autopool` WHERE `left_pos`='' OR `mid_pos`='' OR `right_pos`=''"));
    $placement_id = $query['agent_id'];
    $position = ($query['left_pos'] == '') ? 'left_pos' : (($query['mid_pos'] == '') ? 'mid_pos' : 'right_pos');
    mysqli_query($conn, "INSERT INTO `matrix_autopool`(`agent_id`, `placement_id`) VALUES ('$agent_id','$placement_id')");
    mysqli_query($conn, "UPDATE `matrix_autopool` SET `$position`='$agent_id' WHERE `agent_id` = '$placement_id'");
    distribute_level_for_autopool($agent_id);
}

function distribute_level_for_autopool($agent_id)
{
    global $conn;
    $data = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM `matrix_autopool` WHERE `agent_id`='$agent_id'"));
    $parent_id = $data['placement_id'];

    $a = 0;
    while ($parent_id != '0') {
        $qurry = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM `agent` WHERE `agent_id`='$parent_id'"));
        $package = $qurry['package'];
        if ($package == '') {
        } else {
            $time = date("Y-m-d h:i:sa");
            if ($package == 'b-silver') {
                $amt = 100;
            } elseif ($package == 'b-gold') {
                $amt = 200;
            } elseif ($package == 'b-diamond') {
                $amt = 500;
            } elseif ($package == 'b-platinum') {
                $amt = 1000;
            } elseif ($package == 'p-silver') {
                $amt = 5500;
            } elseif ($package == 'p-gold') {
                $amt = 25000;
            } elseif ($package == 'p-diamond') {
                $amt = 33300;
            }
            mysqli_query($conn, "UPDATE `agent_income` SET `wallet`=`wallet`+$amt WHERE `agent_id`='$parent_id'");
            mysqli_query($conn, "INSERT INTO `wallet_history`(`agent_id`, `amt`, `desp`, `date_time`, `status`) VALUES ('$parent_id','$amt','Matrix autopool Level Income','$time','0')");
        }
        $data = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM `matrix_autopool` WHERE `agent_id`='$parent_id'"));
        $parent_id = $data['placement_id'];
    }
}

function get_spons_id($agent_id)
{
    global $conn;
    $data = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM `agent` WHERE `agent_id`='$agent_id'"));
    return $data['sponsor_id'];
}
