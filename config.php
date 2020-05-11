<?php

    $conn = mysqli_connect("localhost", "root", "");

    // $create = "CREATE DATABASE IF NOT EXISTS movie";

    // $result = mysqli_query($conn, $create) or die(mysqli_error());

    mysqli_select_db($conn, "movie");

?>