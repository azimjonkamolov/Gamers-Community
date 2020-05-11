<?php

    include "header.php";
    include "config.php";

if(empty($_SESSION['user_name']))
{
    header('Location: index.php');
    exit();
}

    $id = $_SESSION['user_id'];

    $query = "SELECT user_email, user_phone, user_address, user_school, user_work, user_height, user_weight, user_bio FROM users WhERE user_id = '$id' ";
    
    $results = mysqli_query($conn, $query) or die(mysqli_query($conn));

    $row = mysqli_fetch_array($results);

?>



<h1><?php echo $_SESSION['user_name'] . " with an ID: " .$_SESSION['user_id']; ?></h1>

<?php

    echo "<h4>Your email: " . $row['user_email'] . " </h4>";
    echo "<h4>Your phone: " . $row['user_phone'] . " </h4>";
    echo "<h4>Your address: " . $row['user_address'] . " </h4>";
    
?>

<br>
<a href="add.php">Add Information about yourself</a>

<br>
<a href="edit.php">Edit Information about yourself</a>

<br>
<a href="signout.php">Sign out</a>

<?php include "footer.php"; ?>