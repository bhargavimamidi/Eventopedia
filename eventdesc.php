<?php

require_once "config.php";

session_start();

$event = $_GET['title'];

$sql = "select * from addevent where title='$event'";

if ($result = mysqli_query($conn, $sql)) {
    $row = mysqli_fetch_array($result);
    $date = $row['date'];
    $brief = $row['brief'];
    $fee = $row['fee'];
    $category = $row['category'];
    $image = $row['image'];
}

?>



<!DOCTYPE html>
<html>

<head>
    <title>EVENTOPEDIA</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="styles.css">
    <script src="https://kit.fontawesome.com/0c252fb621.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"> </script>
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"> </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <meta name="viewport" content="width=devide-width , initial-scale=1" />

</head>

<body>
    <main>
        <a class="backbut" href="mainpage.php"><i class="fas fa-house-user"></i></i></a>

        <section class="eventglass">

            <div class="eventContainer">
                <div class="upperContainer">
                    <div class="event-info">
                        <h1><?php echo $event; ?></h1>
                        <h2><?php echo $category; ?></h2>
                    </div>

                    <button type="submit"><a href="https://www.arrahman.com/" target="_blank">Register</a></button>
                </div>
                <hr>
                <div class="lowerContainer">
                    <p><?php echo $date; ?> | </p>
                    <img>
                    <p>Hyderabad | </p>
                    <p><?php echo $fee; ?></p>

                </div>

                <h2>About</h2>
                <p><?php echo $brief; ?></p>


            </div>



            <div class="recomContainer">
                <h2>You may also like :</h2>
                <div class="wrapper">
                    <div class="carousel owl-carousel">

                        <?php
                        require_once "config.php";

                        $sql = "SELECT * FROM addevent where category ='$category' and title <> '$event' ";
                        if ($result = mysqli_query($conn, $sql)) {
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_array($result)) {
                                    $title = $row['title'];
                                    $image = $row['image'];

                                    echo "<a class='card' href='eventdesc.php?title=$title'><img src='images/$image'></a>";
                                }

                                mysqli_free_result($result);
                            }
                        }

                        mysqli_close($conn);
                        ?>

                        <!-- <div class="card"><img src="images/WhatsApp Image 2021-05-18 at 02.17.45.jpeg"></div>
                        <div class="card"><img src="images/WhatsApp Image 2020-11-14 at 20.34.51.jpeg"></div>
                        <div class="card"><img src="images/event.jpg"></div>
                        <div class="card"><img src="images/dp.jpeg"></div>
                        <div class="card"><img src="images/unnamed.png"></div> -->
                    </div>
                </div>
            </div>

        </section>
    </main>

    <script>
        $(".carousel").owlCarousel({
            margin: 10,
            loop: true,
            autoplay: true,
            autoplayTimeout: 2000,
            autoplayHoverPause: true,
            responsive: {
                0: {
                    items: 1,
                    nav: false
                },
                600: {
                    items: 2,
                    nav: false
                },
                1000: {
                    items: 4,
                    nav: false
                },
            }

        });
    </script>

</body>

</html>