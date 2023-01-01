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

    <title>message</title>

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
            <h1>Message</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Message</li>
                </ol>
            </nav>
        </div>

        <section class="section dashboard">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card recent-sales overflow-auto">
                        <div class="card-body">
                            <h5 class="card-title">Message</h5>

                            <!-- Table with hoverable rows -->
                            <table class="table table-borderless datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Message</th>
                                        <th scope="col">date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $message_query = mysqli_query($conn, "SELECT * FROM `message` ORDER BY `message`.`date` DESC");
                                    $a = 0;
                                    while ($data = mysqli_fetch_array($message_query)) {
                                    ?>
                                        <tr>
                                            <th scope="row"><?php echo ++$a; ?></th>
                                            <td><?php echo $data['name']; ?></td>
                                            <td><?php echo $data['phone']; ?></td>
                                            <td><?php echo $data['email']; ?></td>
                                            <td><?php echo $data['message']; ?></td>
                                            <td><?php echo $data['date']; ?></td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <!-- End Table with hoverable rows -->

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