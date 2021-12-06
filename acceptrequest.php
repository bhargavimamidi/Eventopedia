<?php
require_once "config.php";
session_start();
include "logoutbuttonadm.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $btnvalue = $_POST['Add'];
    echo $btnvalue;

    $sql3 = "SELECT * FROM requests where title='$btnvalue'";
    if ($result = mysqli_query($conn, $sql3)) {

        $row = mysqli_fetch_array($result);

        $title1 = $row['title'];
        $date1 = $row['date'];
        $brief1 = $row['brief'];
        $fee1 = $row['fee'];
        $category1 = $row['category'];
        $image1 = $row['image'];
    }

    $sql1 = "INSERT INTO addevent VALUES ('$title1' , '$date1' , '$brief1' , '$fee1' , '$category1' , '$image1' )";
    $sql2 = "DELETE FROM requests where title='$title1'";

    if (mysqli_query($conn, $sql1)) {

        if (mysqli_query($conn, $sql2)) {
        } else    echo "Couldn't delete";
    } else {
        echo "Couldn't insert";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>EVENTOPEDIA</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="styles.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">

    <meta name="viewport" content="width=devide-width , initial-scale=1" />
    <script src="jscode.js" async></script>
</head>

<body>
    <main>
        <section class="glass">
            <div class="dashboard">
                <div class="user">
                    <img src="images/<?php echo $_SESSION['image']; ?>" />
                    <h3><?php echo $_SESSION['name']; ?></h3>
                    <p> ADMIN</p>
                </div>
                <div class="links">
                    <a class="link" id="home" href="addevent.php">
                        <div class="link-info">
                            <img src="images/home.png">
                            <h2>Home</h2>
                        </div>
                    </a>

                    <a class="link link-clicked" id="interestsID" href="acceptrequest.php">
                        <div class="link-info">
                            <img src="images/request.png">
                            <h2 class="clicked-h2">Requests</h2>
                        </div>
                    </a>

                    <a class="link" id="settingsID" href="adminsettings.php">
                        <div class="link-info">
                            <img src="images/settings.png">
                            <h2>Settings</h2>
                        </div>
                    </a>

                </div>

            </div>


            <div class="requests">
                <div class="status">
                    <h1> Requests</h1>
                    <input type="text" value="Search" />
                </div>

                <div class="cards">

                    <?php

                    $sql = "SELECT * FROM requests";
                    if ($result = mysqli_query($conn, $sql)) {
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_array($result)) {
                                $title = $row['title'];
                                $date = $row['date'];
                                $brief = $row['brief'];
                                $fee = $row['fee'];
                                $category = $row['category'];
                                $image = $row['image'];


                                echo "
                            <form action='' method='post'>
                             <div class='card'>
                                 <img src='images/$image' >
                                  
                                 <div class='card-info'>
                                     <h2>$title</h2>
                                     <p>Category : $category</p>
                                     <p>Registration fee : $fee</p>
                                     <p>Date of the event: $date</p>
                                     <p>Description: $brief</p>
                                     
                                     <button type='submit' name='Add' value='$title' class='cardadd'>Add</button>
                                 </div>
                             </div>
                             </form>
                             ";
                            }
                            mysqli_free_result($result);
                        } else {
                            echo "No records to display";
                        }
                        mysqli_close($conn);
                    }
                    ?>



                    <!-- <div class="card">
                        
                        <img src="images/event.jpg" >
                        
                        <div class="card-info">
                            <h2>Gorakhpur Literary Fest</h2>
                            <p>A shit event where 2 can people participate , who are bored of life and everything around them</p>
                        </div>
                    </div>

                    <div class="card">
                        
                        <img src="images/event.jpg" >
                        
                        <div class="card-info">
                            <h2>Gorakhpur Literary Fest</h2>
                            <p>A shit event where 2 can people participate , who are bored of life and everything around them</p>
                        </div>
                    </div>

                    <div class="card">
                        
                        <img src="images/event.jpg" >
                        
                        <div class="card-info">
                            <h2>Gorakhpur Literary Fest</h2>
                            <p>A shit event where 2 can people participate , who are bored of life and everything around them</p>
                        </div>
                    </div> -->

                </div>

            </div>


        </section>
    </main>
</body>

</html>