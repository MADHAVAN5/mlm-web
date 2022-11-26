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

    <title>Dashboard</title>

    <?php require_once("resources/header_links.php"); ?>
</head>

<body>

    <?php
    require_once("resources/header.php");
    // ======= Sidebar =======
    require_once("resources/sidebar.php");
    ?>
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Add Money</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></liF>
                    <li class="breadcrumb-item active">Wallet</li>
                    <li class="breadcrumb-item">Add Money</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Account Details</h5>
                            <p class="card-text">
                                
                            </p>
                        </div>
                        <img style="padding: 0 20px;" src="assets/img/qr.jpeg" class="card-img-bottom" alt="...">
                    </div><!-- End Card with an image on bottom -->
                </div>
                <div class="col-lg-6">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Add Money form</h5>
                            <p>Send Money to given Account..</p>

                            <?php
                            if (isset($_SESSION['status'])) {
                                if ($_SESSION['status'] == 4) {
                            ?>
                                    <div class="alert alert-primary bg-primary text-light border-0 alert-dismissible fade show" role="alert">
                                        REQUEST SEND SUCCESSFULLY
                                        Amount add within 24 hours
                                        <a style="color: orange;" href="add_money_history.php">click hear</a> to track.
                                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                <?php
                                } else {
                                ?>
                                    <div class="alert alert-primary bg-danger text-light border-0 alert-dismissible fade show" role="alert">
                                        invalid
                                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                            <?php
                                }

                                unset($_SESSION['status']);
                            }
                            ?>

                            <!-- General Form Elements -->
                            <form action="request_handler.php" method="post" enctype="multipart/form-data">
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-3 col-form-label">Agent ID</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="text-input" name="agent_id" value="<?php echo $my_id; ?>" readonly>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputname" class="col-sm-3 col-form-label">Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="payer_name" placeholder="Payer Name" class="form-control" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputPassword" class="col-sm-3 col-form-label">Payment ID</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="payment_id" class="form-control" placeholder="payment id" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputNumber" class="col-sm-3 col-form-label">Amount</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" name="amt" placeholder="Amount" min="100" step="100" max="80000" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputNumber" class="col-sm-3 col-form-label">Payment Proof</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="file" name="img_input" id="formFile" required>
                                    </div>
                                </div>


                                <div class="row mb-3">
                                    <div class="col-sm-10">
                                        <button type="submit" name="add_money_btn" class="btn btn-primary">Add Money</button>
                                    </div>
                                </div>

                            </form><!-- End General Form Elements -->

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