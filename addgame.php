<?php

    include "config.php";
    include "header.php";

    $id = $_SESSION['user_id'];

    if(empty($_SESSION['user_id']))
    {
       header("Location: signin.php");
       exit();
    }

    
    // echo $_SESSION['user_id'];


    // if(isset($_SESSION['$user_id']))
    // {

    // }
    // else
    // {
    //     header("Location: signin.php");
    //     exit();
    // }

    if(isset($_POST['submit']))
    {

        echo "some";

        $gamename = mysqli_real_escape_string($conn, $_POST['gamename']);
        $gameyear = mysqli_real_escape_string($conn, $_POST['gameyear']);
        $gametype = mysqli_real_escape_string($conn, $_POST['gametype']);
        $gamecompany = mysqli_real_escape_string($conn, $_POST['gamecompany']);
        $gameinfo = mysqli_real_escape_string($conn, $_POST['gameinfo']);
        $gameaddedbyid = mysqli_real_escape_string($conn, $_POST['addedbyid']);

        if ($password == $pass)
        {
            $password = md5($password);
            $query = "INSERT INTO games (game_name, game_year, game_type, game_company, game_info, game_addedby) 
            VALUES('$gamename', '$gameyear', '$gametype', '$gamecompany', '$gameinfo', '$gameaddedbyid')";
            
            $results = mysqli_query($conn, $query);

            header("Location: games.php");
            exit();
        }
        else
        {
            echo "Passwords did not match!";
        }

    }

?>

<div class="container">

    <h1 align="center" style="margin-bottom: 20px;">Add New Games Please!</h1>
    <form action="" method="post">

        <div class="form-group">
            <input type="text" class="form-control" name="gamename" placeholder="Enter Game Name">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="gameyear" placeholder="Enter Game Year">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="gametype" placeholder="Enter Game Type">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="gamecompany" placeholder="Enter Game Company">
        </div>

        <textarea class="form-control" name="gameinfo" rows="3" placeholder="Enter the infromation about the game please" required></textarea>

        <!-- <textarea type="text" id="gameinfo" name="gameinfo" placeholder="Enter infromatin about the game" required></textarea><br> -->

        <input type="hidden" name="addedbyid" value="<?php echo $id; ?>">

        <br><br>

        <input type="submit" class="btn btn-primary" name="submit" value="Submit">

    </form>

</div>






<?php include "footer.php"; ?>