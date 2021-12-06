<?php

$username1 = $_SESSION['username'];
$sql = "SELECT * from admins where username = '$username1'";

if($result = mysqli_query($conn , $sql))
{
    $row = mysqli_fetch_array($result);
    $dp = $row['image'];
    echo"
    <a class='button' href='logout.php'>
    <div class='img'><img src='images/$dp'></div>
    <span>Logout</span>
    </a>
    " ;
}

?>