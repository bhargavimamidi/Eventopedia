<?php
session_start();
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
                    <p> CBIT</p>
                </div>
                <div class="links">
                    <a class="link link-clicked" >
                        <div class="link-info">
                            <img src="images/home.png">
                            <h2 class="clicked-h2">Events</h2>
                        </div>
                    </a>

                    <a class="link" href="interests.php">
                        <div class="link-info">
                            <img src="images/interests.png">
                            <h2>Interests</h2>
                        </div>
                    </a>

                    <a class="link" href="sendrequest.php">
                        <div class="link-info">
                            <img src="images/request.png">
                            <h2>Request</h2>
                        </div>
                    </a>

                    <a class="link" href="usersettings.php">
                        <div class="link-info">
                            <img src="images/settings.png">
                            <h2>Settings</h2>
                        </div>
                    </a>



                </div>

            </div>

            <div class="events">
                <div class="status">
                    <h1> Active Events</h1>
                    <input type="text" value="Search" />
                </div>

                <div class="cards">

                    <?php
                    require_once "config.php";
                    include "logoutbutton.php" ;
                    $checkusername = $_SESSION['username'];

                    $sql = "SELECT * FROM addevent where category IN (select interests from userinterests where username='$checkusername') ";
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
                             <a class='card' href='eventdesc.php?title=$title'>
                                 <img src='images/$image' >
                                  
                                 <div class='card-info'>
                                     <h2>$title</h2>
                                     <p>Category : $category</p>
                                     <p>Registration fee : $fee</p>
                                     <p>Date of the event: $date</p>
                                 </div>
                             </a>";
                            }

                            mysqli_free_result($result);
                        }
                    }

                    mysqli_close($conn);
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