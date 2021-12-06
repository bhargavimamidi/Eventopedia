<?php
//This script will handle login
session_start();

//check if the user is already logged in
if (isset($_SESSION['username'])) {
    header("location: welcome.php");
    exit;
}

require_once "config.php";

$username = $password = "";
$err = "";

// if request method is post

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (empty(trim($_POST['username'])) || empty(trim($_POST['password']))) {
        $err = "Please enter username and password";
    } else {
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
    }


    if (empty($err)) {
        $sql = "SELECT username , password FROM admins where username = ?";
        $stmt = mysqli_prepare($conn, $sql);

        mysqli_stmt_bind_param($stmt, "s", $param_username);
        $param_username = $username;

        //Try to execute this statement
        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_store_result($stmt);
            if (mysqli_stmt_num_rows($stmt) == 1) {
                mysqli_stmt_bind_result($stmt, $username, $newpassword);
                if (mysqli_stmt_fetch($stmt)) {
                    if ($password == $newpassword) {
                        // This means the password is correct . Allow the user to login
                        session_start();
                        $_SESSION['username'] = $username;
                        $_SESSION["id"] = $id;
                        $_SESSION['loggedin'] = true;
                        $_SESSION['password'] = $password;

                        $sql = "select * from admins where username='$username'";
                        if ($result = mysqli_query($conn, $sql)) {
                            $row = mysqli_fetch_assoc($result);

                            $_SESSION['mobile'] = $row['mobile'];
                            $_SESSION['name'] = $row['name'];
                            $_SESSION['email'] = $row['email'];
                            $_SESSION['image'] = $row['image'];
                            
                        }

                        //Redirect user to welcome page
                        header("location: addevent.php");
                    } else {
                        echo "Incorrect Password";
                    }
                }
            }
        }
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
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">

    <meta name="viewport" content="width=devide-width , initial-scale=1" />

</head>

<body>
    <main>


        <section class="glass">
            <div class="dashboard">
                <div class="user">
                    <img src="images/logo-01.png" />
                    <h3>EVENTOPEDIA</h3>
                    <p> Home</p>
                </div>
                <div class="links">
                    <a class="link" id="home" href="new.php">
                        <div class="link-info">
                            <img src="images/contract.png">
                            <h2>SignUp</h2>
                        </div>
                    </a>

                    <a class="link" id="interestsID" href="new1.php">
                        <div class="link-info">
                            <img src="images/user.png">
                            <h2>User</h2>
                        </div>
                    </a>

                    <a class="link link-clicked" id="settingsID">
                        <div class="link-info">
                            <img src="images/business.png">
                            <h2 class="clicked-h2">Admin</h2>
                        </div>
                    </a>

                </div>

            </div>


            <div class="settings">

                <div class="status">
                    <h1>EVENTOPEDIA</h1>
                </div>

                <div class="login-form">

                    <div class="log-item">
                        <i class="las la-user-cog"></i>
                    </div>
    
                    <form action="" method="post">
    
                        <div class="log-item">
                            <h3>Username</h3>
                            <input type="text" name="username">
                        </div>
    
                        <div class="log-item">
                            <h3>Password</h3>
                            <input type="password" name="password">
                        </div>

                        <div class="log-item">
                            <a style="color:black; margin:auto">Forgot password?</a>
                        </div>

                        
                        <button type="submit">Log In</button>
    
                    </form>
    
                </div>

            </div>



        </section>
    </main>


</body>

</html>