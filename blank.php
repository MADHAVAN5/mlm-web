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

    <title>Dashboard - NiceAdmin Bootstrap Template</title>
    
    <?php require_once("resources/header_links.php"); ?>
</head>

<body>

    <?php require_once("resources/header.php"); ?>
    <!-- ======= Sidebar ======= -->
    <?php require_once("resources/sidebar.php");?>
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">

            </div>
        </section>

    </main><!-- End #main -->

   <?php require_once("resources/footer_links.php")?>

</body>

</html>