<?php

include "header.php";

    include "config.php";

        $id = $_REQUEST['id'];

        $query = "SELECT * FROM users WhERE user_id = '$id' ";
        
        $results = mysqli_query($conn, $query) or die(mysqli_query($conn));

        $row = mysqli_fetch_array($results);

    
?>


<h1><?php echo $row['user_name'] . " with an ID: " .$id; ?></h1>

<?php

    echo "<h4>User email: " . $row['user_email'] . " </h4>";
    echo "<h4>User phone: " . $row['user_phone'] . " </h4>";
    echo "<h4>User address: " . $row['user_address'] . " </h4>";
    
?>

<?php include "footer.php"; ?>

