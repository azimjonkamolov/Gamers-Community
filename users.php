<?php

    include "header.php";

    include "config.php";

    if(!empty($_SESSION['user_id']))
    {
        $id = $_SESSION['user_id'];
    }

    // echo "user id: ";
    // echo $_SESSION['user_id'];


    $query = "SELECT * FROM users";

    $result = mysqli_query($conn, $query) or die(mysqli_query($conn));

    if(isset($_POST['submit']))
    {
        $_SESSION['search'] = $_POST['search'];

        header("Location: search.php");
        exit();
    }


?>


    

    <!-- works -->
    <div class="works" id="work">
        <div class="container">
            <!-- default heading -->
            <div class="default-heading">
                <!-- heading -->
                <h2>Community</h2>

                <form action="" method="post">
                    <input type="text" class="form-control" name="search" placeholder="Search user by name">
                    <br>
                    <input type="submit" class="btn btn-primary" name="submit" value="Search">
                </form>

            </div>
            <div class="row">
            <?php
            while($row = mysqli_fetch_array($result))
            {
            $id = $row['user_id'];
            ?>

                <div class="col-md-3">
                    <!-- work item -->
                    <div class="work-item">
                        <!-- work details image -->
                        <img class="img-responsive" style="border-radius: 15px;" src="img/work/1.jpg" alt="" />
                        <!-- heading -->
                        <?php    echo "<h3> <a href='info.php?id=$id '>" .  $row['user_name'] . "</a></h3>"; ?>
                        <!-- brand org -->
                        <!-- <span class="org">Commercial</span> -->
                    </div>
                </div>
                
            <?php
            }
            ?>
            </div>

            <div class="default-heading">
                <!-- heading -->
                <button class="btn btn-success"><a href='signup.php' style="color: white; font-size: 24px;">Join Us</a></button>
            </div>

        </div>
    </div>

<?php
    include "footer.php";

?>