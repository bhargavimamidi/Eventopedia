<?php
require_once "config.php";

session_start();
include "logoutbutton.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $interest = $_POST['radio'];
    $username = $_SESSION['username'];

    $sql = "SELECT username from userinterests where username='$username'";
    if ($result = mysqli_query($conn, $sql)) {

        if (mysqli_num_rows($result) == 1) {
            $sql1 = "UPDATE userinterests set interests = '$interest' where username='$username'";

            if (mysqli_query($conn, $sql1)) {
                echo "Successful";
                header("location: mainpage.php");
            } else {
                echo "error in updation";
            }
        } else {
            $sql2 = "INSERT INTO userinterests VALUES ('$username' , '$interest')";


            if (mysqli_query($conn, $sql2)) {
                echo "Successful";
                header("location: mainpage.php");
            } else {
                echo "error in insertion";
            }
        }
        mysqli_free_result($result);
    } else {
        echo "Something went wrong";
    }

    mysqli_close($conn);
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
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;500;600&display=swap" rel="stylesheet">

    <meta name="viewport" content="width=devide-width , initial-scale=1" />
    <!-- <script src="jscode.js" async></script> -->
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
                    <a class="link" id="home" href="Mainpage.php">
                        <div class="link-info">
                            <img src="images/home.png">
                            <h2>Events</h2>
                        </div>
                    </a>

                    <a class="link link-clicked" id="interestsID">
                        <div class="link-info">
                            <img src="images/interests.png">
                            <h2 class="clicked-h2">Interests</h2>
                        </div>
                    </a>

                    <a class="link" id="settingsID" href="sendrequest.php">
                        <div class="link-info">
                            <img src="images/request.png">
                            <h2>Request</h2>
                        </div>
                    </a>

                    <a class="link" id="settingsID" href="usersettings.php">
                        <div class="link-info">
                            <img src="images/settings.png">
                            <h2>Settings</h2>
                        </div>
                    </a>



                </div>

            </div>



            <div class="settings">
                <div class="status">
                    <h1> Interests </h1>
                </div>
                <form action="" method="post">
                    <div class="interests-container">
                        <h2>Select your interests</h2>
                        <div class="radio-buttons">

                            <label class="custom-radio">
                                <input type="radio" name="radio" value="Cultural">
                                <span class="radio-btn">
                                    <i class="las la-check"></i>
                                    <div class="interests-icon">
                                        <i class="las la-people-carry"></i>
                                        <h3>Cultural</h3>
                                    </div>
                                </span>
                            </label>


                            <label class="custom-radio">
                                <input type="radio" name="radio" value="Technical">
                                <span class="radio-btn">
                                    <i class="las la-microchip"></i>
                                    <div class="interests-icon">
                                        <i class="las la-microchip"></i>
                                        <h3>Technical</h3>
                                    </div>
                                </span>
                            </label>

                            <label class="custom-radio">
                                <input type="radio" name="radio" value="Music">
                                <span class="radio-btn">
                                    <i class="las la-music"></i>
                                    <div class="interests-icon">
                                        <i class="las la-music"></i>
                                        <h3>Music</h3>
                                    </div>
                                </span>
                            </label>

                        </div>
                    </div>
                    <button type="submit" id="Save">Save Changes</button>
                </form>

            </div>



        </section>
    </main>
</body>

</html>