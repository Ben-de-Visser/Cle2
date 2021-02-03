<?php

    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $db = "database1";

    $db = mysqli_connect($dbhost, $dbuser, $dbpass, $db)
    or die("Error: " . mysqli_connect_error());
?>
