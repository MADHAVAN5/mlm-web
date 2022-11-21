<?php
require_once("resources/connection_build.php");
require_once("resources/check_login.php");
require_once("resources/function.php")
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Package</title>


    <?php require_once("resources/header_links.php"); ?>
    <link rel="stylesheet" href="assets/css/package_style.css">
</head>

<body>

    <?php
    require_once("resources/header.php");
    // ======= Sidebar =======
    require_once("resources/sidebar.php");
    ?>
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Package</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">Package</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">
                <div class="container">
                    <?php
                    $a = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM `agent` WHERE `agent_id`='$my_id'"));
                    ?>
                    <h1 class="d-flex justify-content-center">BASIC PLANS</h1>
                    <div class="row m-t-30">
                        <div class="pricing-table col">
                            <div class="pricing-card">
                                <h3 class="pricing-card-header">Silver</h3>
                                <div class="price"><sup>₹</sup>500<span>.00</span></div>
                                <ul>
                                    <li><strong>100</strong>/refer</li>
                                    <li><strong>20</strong>/level</li>
                                    <li><strong>100</strong>/Auto fill</li>
                                    <li><strong>12</strong>totel levels</li>
                                    <li><strong>...</strong></li>
                                </ul>
                                <button name="silver-pkg-btn" type="button" data-toggle="modal" data-target="#b_silver" class="order-btn">
                                    <?php
                                    if ($a['package'] == "b-silver") {
                                        echo "Active";
                                    } elseif (check_payment($my_id)) {
                                        $b = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM `payment_proof` WHERE `agent_id`='$my_id'"));
                                        if ($b['package'] == "b-silver") {
                                            echo "Request Send";
                                        } else {
                                            echo "Order Now";
                                        }
                                    } else {
                                        echo "Order Now";
                                    }
                                    ?>
                                </button>
                            </div>

                            <div class="pricing-card">
                                <h3 class="pricing-card-header">Gold</h3>
                                <div class="price"><sup>₹</sup>1000<span>.00</span></div>
                                <ul>
                                    <li><strong>200</strong>/refer</li>
                                    <li><strong>40</strong>for 10 level</li>
                                    <li><strong>80</strong>for 2 level</li>
                                    <li><strong>100</strong>/Auto fill</li>
                                    <li><strong>12</strong>totel levels</li>
                                </ul>
                                <button name="gold-pkg-btn" type="button" data-toggle="modal" data-target="#b_gold" class="order-btn">
                                    <?php
                                    if ($a['package'] == "b-gold") {
                                        echo "Active";
                                    } elseif (check_payment($my_id)) {
                                        $b = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM `payment_proof` WHERE `agent_id`='$my_id'"));
                                        if ($b['package'] == "b-gold") {
                                            echo "Request Send";
                                        } else {
                                            echo "Order Now";
                                        }
                                    } else {
                                        echo "Order Now";
                                    }
                                    ?>
                                </button>
                            </div>

                            <div class="pricing-card">
                                <h3 class="pricing-card-header">Diamond</h3>
                                <div class="price"><sup>₹</sup>2500<span>.00</span></div>
                                <ul>
                                    <li><strong>500</strong>/refer</li>
                                    <li><strong>125</strong>for 2 level</li>
                                    <li><strong>150</strong>for 2 level</li>
                                    <li><strong>100</strong>/Auto fill</li>
                                    <li><strong>12</strong>totel levels</li>
                                </ul>
                                <button name="diamond-pkg-btn" type="button" data-toggle="modal" data-target="#b_diamond" class="order-btn">
                                    <?php
                                    if ($a['package'] == "b-diamond") {
                                        echo "Active";
                                    } elseif (check_payment($my_id)) {
                                        $b = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM `payment_proof` WHERE `agent_id`='$my_id'"));
                                        if ($b['package'] == "b-diamond") {
                                            echo "Request Send";
                                        } else {
                                            echo "Order Now";
                                        }
                                    } else {
                                        echo "Order Now";
                                    }
                                    ?>
                                </button>
                            </div>

                            <div class="pricing-card">
                                <h3 class="pricing-card-header">Platinum</h3>
                                <div class="price"><sup>₹</sup>6500<span>.00</span></div>
                                <ul>
                                    <li><strong>2500</strong>/refer</li>
                                    <li><strong>170</strong>for 10 level</li>
                                    <li><strong>200</strong>for 2 level</li>
                                    <li><strong>100</strong>/Auto fill</li>
                                    <li><strong>12</strong>totel levels</li>
                                </ul>
                                <button name="untimate-pkg-btn" type="button" data-toggle="modal" data-target="#b_platinum" class="order-btn">
                                    <?php
                                    if ($a['package'] == "b-platinum") {
                                        echo "Active";
                                    } elseif (check_payment($my_id)) {
                                        $b = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM `payment_proof` WHERE `agent_id`='$my_id'"));
                                        if ($b['package'] == "b-platinum") {
                                            echo "Request Send";
                                        } else {
                                            echo "Order Now";
                                        }
                                    } else {
                                        echo "Order Now";
                                    }
                                    ?>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-center">
                        <h1>PRIMIUM PLAN</h1>
                    </div>
                    <div class="row m-t-30">
                        <div class="pricing-table col">
                            <div class="pricing-card">
                                <h3 class="pricing-card-header">Silver</h3>
                                <div class="price"><sup>₹</sup>12500<span>.00</span></div>
                                <ul>
                                    <li><strong></strong></li>
                                    <li><strong>1500</strong>/refer</li>
                                    <li><strong>5500</strong>/Auto fill</li>
                                    <li><strong></strong></li>
                                </ul>
                                <button type="button" data-toggle="modal" data-target="#p_silver" class="order-btn">
                                    <?php
                                    if ($a['package'] == "p-silver") {
                                        echo "Active";
                                    } elseif (check_payment($my_id)) {
                                        $b = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM `payment_proof` WHERE `agent_id`='$my_id'"));
                                        if ($b['package'] == "p-silver") {
                                            echo "Request Send";
                                        } else {
                                            echo "Order Now";
                                        }
                                    } else {
                                        echo "Order Now";
                                    }
                                    ?>
                                </button>
                            </div>

                            <div class="pricing-card">
                                <h3 class="pricing-card-header">Gold</h3>
                                <div class="price"><sup>₹</sup>55000<span>.00</span></div>
                                <ul>
                                    <li><strong></strong></li>
                                    <li><strong>5000</strong>/refer</li>
                                    <li><strong>25000</strong>/Auto fill</li>
                                    <li><strong></strong></li>
                                </ul>
                                <button type="button" data-toggle="modal" data-target="#p_gold" class="order-btn">
                                    <?php
                                    if ($a['package'] == "p-gold") {
                                        echo "Active";
                                    } elseif (check_payment($my_id)) {
                                        $b = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM `payment_proof` WHERE `agent_id`='$my_id'"));
                                        if ($b['package'] == "p-gold") {
                                            echo "Request Send";
                                        } else {
                                            echo "Order Now";
                                        }
                                    } else {
                                        echo "Order Now";
                                    }
                                    ?>
                                </button>
                            </div>

                            <div class="pricing-card">
                                <h3 class="pricing-card-header">Diamond</h3>
                                <div class="price"><sup>₹</sup>80000<span>.00</span></div>
                                <ul>
                                    <li><strong></strong></li>
                                    <li><strong>10000</strong>/refer</li>
                                    <li><strong>33300</strong>/Auto fill</li>
                                    <li><strong></strong></li>
                                </ul>
                                <button type="button" data-toggle="modal" data-target="#p_diamond" class="order-btn">
                                    <?php
                                    if ($a['package'] == "p-diamond") {
                                        echo "Active";
                                    } elseif (check_payment($my_id)) {
                                        $b = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM `payment_proof` WHERE `agent_id`='$my_id'"));
                                        if ($b['package'] == "p-diamond") {
                                            echo "Request Send";
                                        } else {
                                            echo "Order Now";
                                        }
                                    } else {
                                        echo "Order Now";
                                    }
                                    ?>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main><!-- End #main -->

    <?php
    require_once("resources/footer.php");
    require_once("resources/footer_links.php");
    ?>

</body>

</html>