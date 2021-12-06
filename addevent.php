<?php

require_once "config.php";

session_start();
include "logoutbuttonadm.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $title = $_POST['title'];
    $date = $_POST['date'];
    $brief = $_POST['brief'];
    $fee = $_POST['fee'];
    $category = $_POST['category'];
    $image = $_POST['image'];


    $sql = "INSERT INTO addevent VALUES ('$title' , '$date' , '$brief' , '$fee' , '$category' , '$image')";

    if (mysqli_query($conn, $sql)) {
        echo "Successful";
        header("location: acceptrequest.php");
    } else {
        echo "error";
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
                    <img src="images/<?php echo $_SESSION['image']; ?>" />
                    <h3><?php echo $_SESSION['name']; ?></h3>
                    <p> ADMIN</p>
                </div>
                <div class="links">
                    <a class="link link-clicked" id="home">
                        <div class="link-info">
                            <img src="images/home.png">
                            <h2 class="clicked-h2">Home</h2>
                        </div>
                    </a>

                    <a class="link" id="interestsID" href="acceptrequest.php">
                        <div class="link-info">
                            <img src="images/request.png">
                            <h2>Requests</h2>
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


            <div class="settings">
                <div class="status">
                    <h1> Add an event</h1>
                </div>
                <form action="" method="POST">
                    <div class="changes">
                        <div class="edit-form">
                            <div class="row">
                                <h3>Event Title</h3>
                                <input type="text" name="title" id="title" required>
                            </div>
                        </div>

                        <div class="edit-form">
                            <div class="row">
                                <h3>Event Date</h3>
                                <input type="date" name="date" id="date" required>
                            </div>
                        </div>

                        <div class="edit-form">
                            <div class="row">
                                <h3>Event Description</h3>
                                <input type="text" name="brief" id="brief" required>
                            </div>
                        </div>

                        <div class="edit-form">
                            <div class="row">
                                <h3>Registration Fee</h3>
                                <input type="text" name="fee" id="fee" required>
                            </div>
                        </div>

                        <div class="edit-form">
                            <div class="row">
                                <h3>Category</h3>
                                <select id="category" name="category" class="select">
                                    <option value="Music" >Music</option>
                                    <option value="Literature">Literature</option>
                                    <option value="Sports">Sports</option>
                                    <option value="Art">Art</option>
                                    <option value="Technical">Technical</option>
                                    <option value="Cinema">Cinema</option>
                                </select>
                            </div>
                        </div>

                        <div class="edit-form">
                            <div class="row">
                                <h3>Image</h3>
                                <input type="file" id="image" name="image">
                            </div>
                        </div>

                    </div>

                    <button type="submit" id="Save">Submit</button>

                </form>


            </div>


            </div>



        </section>
    </main>


</body>

</html>