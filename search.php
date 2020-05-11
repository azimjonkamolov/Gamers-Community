<?php

    include "header.php";

    include "config.php";

    if(!empty($_SESSION['user_id']))
    {
        $id = $_SESSION['user_id'];
    }

    $search = $_SESSION['search'];

    if(isset($_POST['submit']))
    {
        $_SESSION['search'] = $_POST['search'];

        header("Location: search.php");
        exit();
    }

    $query = "SELECT * FROM users WHERE user_name LIKE '%$search%' ";

    $result = mysqli_query($conn, $query) or die(mysqli_query($conn));


?>


    

    <!-- works -->
    <div class="works" id="work">
    <form action="" method="post">
        <input type="text" name="search" placeholder="Search user by name">
        <input type="submit" name="submit">
    </form>
        <div class="container">
            <!-- default heading -->
            <div class="default-heading">
                <!-- heading -->
                <h2>Community</h2>
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