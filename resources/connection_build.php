<?php
    session_start();
    $db_host = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "as_mlm";

    $conn = mysqli_connect($db_host,$db_user,$db_pass,$db_name);
    if(mysqli_connect_error())
    {
        header('location:404.html');
    }

    date_default_timezone_set('Asia/Calcutta');
    function siteURL() 
    {
        $protocol =((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
        $domainName = $_SERVER['HTTP_HOST'];
        return $protocol.$domainName."/adminLTE/";
        
    }
    define("SITE_URL", siteURL());
?>