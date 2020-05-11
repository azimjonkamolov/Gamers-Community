<?php

session_start();

unset($_SESSION['user_name']);

unset($_SESSION['user_id']);

session_destroy();

header("Location: index.php");
exit();



?>

<h1>Successfully logged out!</h1>