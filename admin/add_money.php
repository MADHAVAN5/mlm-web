<?php
require_once("../resources/connection_build.php");
require_once("../resources/check_login.php");
require_once("../resources/function.php")
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Dashboard</title>

    <?php require_once("../resources/header_links.php"); ?>
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
                <div class="col-lg-8">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Add Money Form</h5>
                            <?php
                            if (isset($_SESSION['status'])) {
                                if ($_SESSION['status'] == 4) {
                            ?>
                                    <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                                        <span class="badge badge-pill badge-success">Success</span>
                                        MONEY ADDED SUCCESSFULLY
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                <?php
                                } else {
                                ?>
                                    <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                                        <span class="badge badge-pill badge-danger">Alert</span>
                                        Try Again
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                            <?php
                                }

                                unset($_SESSION['status']);
                            }
                            ?>
                            <!-- Withdrawal Form -->
                            <form action="request_handler.php" method="POST">
                                <div class="row mb-3">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Agent ID</label>
                                    <div class="input-group col-sm-10">
                                        <span class="input-group-text" id="inputGroupPrepend">AS</span>
                                        <input type="text" id="yourUsername" class="form-control" name="agent_id" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputPassword3" class="col-sm-5 col-form-label">Withdrawal Amount</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="inputPassword" name="amount" min="100" step="100" max="10000" class="form-control" required>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary" name="agent_add_money_btn">Submit</button>
                                    <button type="reset" class="btn btn-secondary">Reset</button>
                                </div>
                            </form><!-- End Horizontal Form -->

                        </div>
                    </div>
                </div>

            </div>
        </section>



    </main><!-- End #main -->

    <?php
    require_once("../resources/footer.php");
    require_once("../resources/footer_links.php");
    ?>


</body>

</html>