<?php

    include "config.php";
    include "header.php";

    if(isset($_POST['submit']))
    {

        echo "some";

        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $email = mysqli_real_escape_string($conn, $_POST['useremail']);
        $password = mysqli_real_escape_string($conn, $_POST['userpassword']);
        $pass = mysqli_real_escape_string($conn, $_POST['userpassword1']);

        if ($password == $pass)
        {
            $password = md5($password);
            $query = "INSERT INTO users (user_name, user_email, user_password) VALUES('$username', '$email', '$password' )";
            
            $results = mysqli_query($conn, $query);

            header("Location: signin.php");
            exit();
        }
        else
        {
            echo "Passwords did not match!";
        }

    }

?>


<div class="container">

    <h1 align="center" style="margin-bottom: 20px;">Sign Up Page</h1>
    <form action="" method="post">

        <div class="form-group">
            <input type="text" class="form-control" id="username" name="username" placeholder="Enter Your Username">
        </div>
        <div class="form-group">
            <input type="email" class="form-control" id="useremail" name="useremail" placeholder="Enter Your Email">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" id="password" name="userpassword" placeholder="Enter Your Password">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" id="useremail" name="userpassword1" placeholder="Confirm Your Password">
        </div>

        <input type="submit" class="btn btn-primary" name="submit" value="Submit">

    </form>

</div>

<?php include "footer.php"; ?>