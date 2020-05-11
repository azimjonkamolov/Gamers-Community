<?php

    include "config.php";
    include "header.php";

    if(isset($_POST['submit']))
    {

        $username = $_POST['username'];
        $password = $_POST['userpassword'];

        // echo $username;
        // echo "<br>";
        // echo $password;

        $username = stripcslashes($username);
        $password = stripcslashes($password);

        // echo $username;
        // echo "<br>";
        // echo $password;


        $username = mysqli_real_escape_string($conn, $username);
        $password = mysqli_real_escape_string($conn, $password);

        // echo $username;
        // echo "<br>";
        // echo $password;

        $password = md5($password);

        $query = "SELECT * FROM users WHERE user_name = '$username' and user_password = '$password' ";

        $results = mysqli_query($conn, $query) or die(mysqli_error($conn));

        $row=mysqli_fetch_array($results);

        print_r($row);

        if ($username == $row['user_name'])
        {
            

            $_SESSION['user_name'] = $username;
            $_SESSION['user_id'] = $row['user_id'];

            header("Location: show.php");
            exit();

            
        }
        else
        {
            echo "Passwords did not match!";
        }

    }

?>


<div class="container">

    <h1 align="center" style="margin-bottom: 20px;">Sign In Page</h1>
    <form action="" method="post">

        <div class="form-group">
            <input type="text" class="form-control" id="username" name="username" placeholder="Enter Your Username">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" id="password" name="userpassword" placeholder="Enter Your Password">
        </div>

        <input type="submit" class="btn btn-primary" name="submit" value="Submit">

    </form>

</div>

<?php include "footer.php"; ?>