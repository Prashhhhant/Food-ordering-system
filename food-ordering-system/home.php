<?php
    session_start();

    if (!isset($_SESSION['loggedin'])) {
        echo '<script>location.replace("login.php")</script>';
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home page: Waterfront Cafe</title>
    <link rel="stylesheet" href="stylesheet.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body>
    <nav>
        <img src="logos.png" alt="logo" width="80px" height="50px">
        <label class="logo">Waterfront Cafe</label>
        <ul>
            <li><a href="home.html">Home</a></li>
            <li><a href="aboutUs.html">About Us</a></li>
            <li><a href="cart.php">Cart</a></li>
            <li><a href="logout.php">LOGOUT</a></li>
        </ul>
    </nav>
    <!-- <img src="home.webp" alt="background" class="bg"> -->
    <div class="container">
        <center>
            <h1>what are you craving &#128523 for????</h1>
            <input type="text" name="name" id="name" placeholder=" Search..">
        </center>
    </div>

    <div class="menu">
        <center>
           <a href="veg.html"><img src="veg.jpg" alt="image" id="zoomA" ></a>
           <a href="Nonveg.html"><img src="nv.webp" alt="image"id="zoomA" >  </a>    
            
        </center>
    </div>

    <script>
        fetch('home.webp')
        .then(response => response.blob())
        .then(blob => {
            const imgUrl = URL.createObjectURL(blob);
            document.body.background = imgUrl;
        });
    </script>
</body>
</html>