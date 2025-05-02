<?php
session_start();



?>






<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">

    <title>Admin Page </title>
</head>

<body style="background: #fff;">

    <div class="box">
        <h1>Welcome , <span><?php $_SESSION['name'];?></span></h1>
        <p>This is an <span>Admin</span>Page</p>
        <button onclick="window.location.href='logout.php'">Logout</button>

    </div>


</body>

</html>