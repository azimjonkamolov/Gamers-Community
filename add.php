<?php

    include "header.php";
    include "config.php";

    $id = $_SESSION['user_id'];

    $query = "SELECT * FROM users WHERE user_id = '$id' ";

    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

    $row = mysqli_fetch_array($result);

    // print_r($row);
?>

<div class="container">

    <h1 align="center" style="margin-bottom: 20px;">Add Information About Yourself Page</h1>

    <form action="" method="post">

<?php

    $flag = 0;
    
    if( empty($row['user_phone']))
    {
        echo "<div class='form-group'>";
        echo "<input type='text' class='form-control' name='phone' placeholder='Enter Your Phone Number'>";
        echo "</div>";
        
        if(isset($_POST['submit']))
        {
            $phone = $_POST['phone'];
            $query = "UPDATE users SET user_phone = '$phone' WHERE user_id = '$id' ";
            $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

            header("Location: show.php");
            exit();
        }
    }
    else
    {
        $flag = 1;
    }

    if( empty($row['user_address']))
    {
        echo "<div class='form-group'>";
        echo "<input type='text' class='form-control' name='address' placeholder='Enter Your Address'>";
        echo "</div>";

        if(isset($_POST['submit']))
        {
            $address = $_POST['address'];
            $query = "UPDATE users SET user_address = '$address' WHERE user_id = '$id' ";
            $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

            header("Location: show.php");
            exit();
        }
    }
    else
    {
        $flag = 1;
    }

    

    if($flag == 1)
    {
        echo "<h4>You added all information you can just update them if you want</h4>";
        echo "<h4><a href='edit.php'>Update information</a></h4>";
        echo "<h4><a href='show.php'>Back</a></h4>";
    }
    else
    {
        echo "<input type='submit' class='btn btn-primary' name='submit' value='Add'>";
    }
?>
    </form>
  </div>



    <?php include "footer.php"; ?>
<?php

?>
