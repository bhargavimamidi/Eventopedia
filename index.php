<?php

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <style>
      * {
        margin: 0;
        padding: 0;
      }

      html,
      body {
        box-sizing: border-box;
      }

      .header {
        width: 100%;
        height: 3rem;
      }

      .imageholder img {
        width: 70%;
        height: 100%;
      }

      h2 {
        font-family: "Poppins", sans-serif;
        position: absolute;
        top: 35%;
        right: 2.5rem;
        font-size: 3rem;
        font-weight: 500;
      }

      h3 {
        color: grey;
        position: absolute;
        top: 45%;
        right: 6.5rem;
        font-size: 2rem;
        font-weight: 400;
      }

      .second {
        color: grey;
        position: absolute;
        top: 51%;
        right: 7.9rem;
        font-size: 2rem;
        font-weight: 400;
      }

      .btn {
        position: absolute;
        top: 60%;
        right: 20.2rem;
        
      }

      .btn a {
        text-decoration: none;
        border-radius: 1rem;
        font-size: 1.25rem;
        font-weight: bold;
        border: 2px solid transparent;
        padding: 8px 20px;
        background: #317df5;
        color: white;
        opacity: 0.8;
      }

      .btn a:hover {
        opacity: 1;
      }

    </style>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap"
      rel="stylesheet"
    />

    <title>EVENTOPEDIA</title>
  </head>
  <body>
    <div class="imageholder">
      <img src="images/homepic.jpg" />
    </div>

    <h2>At your fingertips.</h2>
    <h3>Partake in the endless list of</h3>
    <h3 class="second">events , curated with love.</h3>

    <div class="btn">
      <a href="new.php">Get started</a>
    </div>
  </body>
</html>
