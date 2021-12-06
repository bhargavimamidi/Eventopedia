<?php
require_once "config.php";

$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    // Check if username is empty

    if (empty(trim($_POST['username']))) {
        $username_err = "Username cannot be blank";
    } else {
        $param_username = trim($_POST['username']);
        $sql = "SELECT username FROM users WHERE username = '$param_username'";


        if ($result = mysqli_query($conn, $sql)) {

            if (mysqli_num_rows($result) == 1) {
                $username_err = "This username is already taken";
            } else {
                $username = trim($_POST['username']);
            }
            mysqli_free_result($result);
        } else {
            echo "Something went wrong";
        }
    }

    //Check for password

    if (empty(trim($_POST['password']))) {
        $password_err = "Password cannot be blank";
    } elseif (strlen(trim($_POST['password'])) < 5) {
        $password_err = "Password cannot be less than 5 characters";
    } else {
        $password = trim($_POST['password']);
    }

    //Check for confirm password field
    if (trim($_POST['password']) != trim($_POST['confirm_password'])) {
        $confirm_password_err = "Passwords should match";
    }

    // If there are no errors , go ahead and insert into the database

    if (empty($username_err) && empty($password_err) && empty($confirm_password_err)) {
        $param_password = password_hash($password, PASSWORD_DEFAULT);
        echo $param_password;
        $name = $_POST['name'];
        $mobile = $_POST['mobile'];
        $email = $_POST['email'];
        $image = $_POST['image'];
        $sql = "INSERT INTO users VALUES ('$username' , '$name' , '$param_password' , '$mobile' , '$email' , '$image' ) ";

        if (mysqli_query($conn, $sql)) {

            echo "Added";
            header('location: new1.php');
        } else {
            echo "Something went wrong...cannot redirect!";
        }
    } else {
        echo $username_err . $password_err . $confirm_password_err;
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
                    <a class="link link-clicked" id="home">
                        <div class="link-info">
                            <img src="images/contract.png">
                            <h2 class="clicked-h2">SignUp</h2>
                        </div>
                    </a>

                    <a class="link" id="interestsID" href="new1.php">
                        <div class="link-info">
                            <img src="images/user.png">
                            <h2>User</h2>
                        </div>
                    </a>

                    <a class="link" id="settingsID" href="new2.php">
                        <div class="link-info">
                            <img src="images/business.png">
                            <h2>Admin</h2>
                        </div>
                    </a>

                </div>

            </div>


            <div class="settings">

                <div class="status">
                    <h1>EVENTOPEDIA</h1>
                </div>

                <form action="" method="POST">
                    <div class="changes">
                        <div class="edit-form">
                            <div class="row">
                                <h3>Enter username</h3>
                                <input type="text" name="username" required >
                            </div>
                        </div>

                        <div class="edit-form">
                            <div class="row">
                                <h3>Enter name </h3>
                                <input type="text" name="name" required>
                            </div>
                        </div>

                        <div class="edit-form">
                            <div class="row">
                                <h3>Enter password</h3>
                                <input type="password" name="password" required>
                            </div>
                        </div>


                        <div class="edit-form">
                            <div class="row">
                                <h3>Confirm Passowrd</h3>
                                <input type="password" name='confirm_password' required>
                            </div>
                        </div>

                        <div class="edit-form">
                            <div class="row">
                                <h3>Select DP</h3>
                                <input type="file" id="image" name="image" required>
                            </div>
                        </div>


                        <div class="edit-form">
                            <div class="row">
                                <h3>Enter Mobile</h3>
                                <input type="tel" id="phone" name="mobile" required>

                            </div>
                        </div>

                        <div class="edit-form">
                            <div class="row">
                                <h3>Enter Email ID </h3>
                                <input type="email" id="email" name="email" required>
                            </div>
                        </div>

                    </div>

                    <button type="submit" id="Save">Sign Up</button>
                </form>
            </div>



        </section>
    </main>


</body>

</html>