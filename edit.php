<?php

    include "header.php";
    include "config.php";

    


    $id = $_SESSION['user_id'];

    $query = "SELECT * FROM users WHERE user_id = '$id' ";

    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

    $row = mysqli_fetch_array($result);

    if(isset($_POST['submit']))
    {

        $name = $_POST['username'];
        $email = $_POST['useremail'];
        $phone = $_POST['userphone'];
        $address = $_POST['useraddress'];
    
        $query = "UPDATE users SET user_name = '$name', user_email = '$email',  " . 
        "user_phone = '$phone', user_address = '$address' WHERE user_id = '$id' ";

        $result = mysqli_query($conn, $query) or die($mysqli_error($conn));

        header("Location: show.php");
        exit();

    }



?>




<div class="container">

  <h1 align="center" style="margin-bottom: 20px;">Edit Information About Yourself</h1>
  <form action="" method="post">

      <div class="form-group">
          <input type="text" class="form-control" id="username" value='<?php echo $row['user_name']; ?>' name="username">
      </div>
      <div class="form-group">
          <input type="email" class="form-control" id="useremail" name="useremail" value='<?php echo $row['user_email']; ?>'>
      </div>
      <div class="form-group">
          <input type="text" class="form-control" name="userphone" value='<?php echo $row['user_phone']; ?>'>
      </div>
      <div class="form-group">
          <input type="text" class="form-control" name="useraddress" value='<?php echo $row['user_address']; ?>'>
      </div>

      <input type="submit" class="btn btn-primary" name="submit" value="Submit">

  </form>

</div>

    <?php include "footer.php"; ?>

<?php



?>

