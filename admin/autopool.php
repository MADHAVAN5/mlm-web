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

    <title>Agent</title>

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
            <h1>Other Income</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Autopool List</li>
                </ol>
            </nav>
        </div>

        <section class="section dashboard">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card recent-sales overflow-auto">
                        <div class="card-body">
                            <h5 class="card-title">Autopool Agent</h5>

                            <!-- Table with hoverable rows -->
                            <table class="table table-borderless datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Agent ID</th>
                                        <th scope="col">Placement ID</th>
                                        <th scope="col">Left</th>
                                        <th scope="col">Middle</th>
                                        <th scope="col">Right</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $autopool = mysqli_query($conn, "SELECT * FROM `matrix_autopool`");
                                    $a = 0;
                                    while ($data = mysqli_fetch_array($autopool)) {
                                    ?>
                                        <tr>
                                            <th scope="row"><?php echo ++$a; ?></th>
                                            <td><?php echo $data['agent_id']?></td>
                                            <td><?php echo $data['placement_id']; ?></td>
                                            <td><?php echo $data['left_pos']; ?></td>
                                            <td><?php echo $data['mid_pos']; ?></td>
                                            <td><?php echo $data['right_pos']; ?></td>
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