<?php
require_once "config.php";
session_start();
include "logoutbuttonadm.php";

$username = $_SESSION['username'];

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    echo "entered";
    $password = $_POST['password'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];

    $sql = "UPDATE admins set password='$password' , mobile='$mobile' , email='$email' where username='$username' ";
    if (mysqli_query($conn, $sql)) {
        echo "Successful";
        header("location: addevent.php");
        $_SESSION['password'] = $password;
        $_SESSION['mobile'] = $mobile;
        $_SESSION['email'] = $email;
    } else {
        echo "error";
    }
}
mysqli_close($conn);

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
    <!-- <script src="jscode.js" async></script> -->
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

                    <a class="link" id="interestsID" href="acceptrequest.php">
                        <div class="link-info">
                            <img src="images/request.png">
                            <h2>Requests</h2>
                        </div>
                    </a>

                    <a class="link link-clicked" id="settingsID" href="adminsettings.php">
                        <div class="link-info">
                            <img src="images/settings.png">
                            <h2 class="clicked-h2">Settings</h2>
                        </div>
                    </a>

                </div>

            </div>

            <div class="settings">
                <div class="status">
                    <h1> Profile Settings</h1>
                </div>


                <form action="dpadmin.php" method='post' class="Dpform">
                    <input type="file" id="image" name="image" accept="image/*">
                    <button type="submit" id="changeDP">Change DP</button>
                </form>



                <form action="" method="POST">
                    <div class="changes">
                        <div class="edit-form">
                            <div class="row">
                                <h3>Enter New Password</h3>
                                <input type="password" name="password" value="<?php echo $_SESSION['password']; ?>">
                            </div>
                        </div>

                        <div class="edit-form">
                            <div class="row">
                                <h3>Confirm New Passowrd</h3>
                                <input type="password" name='confirm_password' value="<?php echo $_SESSION['password']; ?>">
                            </div>
                        </div>


                        <div class="edit-form">
                            <div class="row">
                                <h3>Change Mobile Number</h3>
                                <input type="tel" id="phone" name="mobile" value='<?php echo $_SESSION['mobile']; ?>'>

                            </div>
                        </div>

                        <div class="edit-form">
                            <div class="row">
                                <h3>Change Email ID </h3>
                                <input type="email" id="email" name="email" value="<?php echo $_SESSION['email']; ?>">

                            </div>
                        </div>

                    </div>

                    <button type="submit" id="Save">Save Changes</button>
                </form>

            </div>


        </section>
    </main>
</body>

</html>