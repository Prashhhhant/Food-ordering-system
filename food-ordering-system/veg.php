<?php
  session_start();

  if (!isset($_SESSION['loggedin'])) {
    echo '<script>location.replace("login.php")</script>';
  }

  if (isset($_POST['submit'])) {
    include 'config/dbconnect.php';
    $email = $_SESSION['email'];
    $name = $_POST['name'];
    $img_src = $_POST['src'];
    $cat = 'veg';
    $price = $_POST['price'];
    $date = date("Y-m-d");

    print_r($_POST);

    $sql = "INSERT INTO orders VALUES ('$email', '$name', '$img_src', '$cat', '$price' , '$date')";
    if (mysqli_query($conn, $sql)) {
      echo '
        <script>
          alert("Order placed successfully.");
        </script>
      ';	
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
  }
?>


<!DOCTYPE html>
<head>
  <title> WATERFRONT CAFE</title>
  <link rel="stylesheet" type="text/css" href="flex.css" >
 <script src="https://kit.fontawesome.com/3aec8ad210.js" crossorigin="anonymous"></script>
</head>
<body style="background-color:powderblue;">
<div class="slider">
  <div class="progress-container">
  <div class="progress-bar" id="myBar"></div>
  </div>
  </div>
<h1 style="color: blue; font-family: cursive;text-align: center;"> Waterfront Cafe </h1>
<center>
  <h2>VEG MENU</h2> 
</center>

<div class="back">
  <a href="home.php"><input type="button" value="<Back"></a>
</div>
<div class="back" style="position: absolute; top: 10px; left: calc(100% / 1.09);">
  <a href="cart.php"><input type="button" value="Show Cart"></a>
</div>


<section class="items">
<div class="item">
  <form action="" method="post">
    <img src="Gobi.jpg">
    <input type="hidden" name="name" value="Gobi Manchurian" />
    <input type="hidden" name="src" value="Gobi.jpg" />
    <input type="hidden" name="price" value="50" />
    <h4>Gobi Manchurian</h4>
    <h3>Price Rs 50.00</h3>
    <br>
    <button id="btn1" name="submit" type="submit" class="button">Order</button>
  </form>
</div>

<div class="item">
  <form action="" method="post">
    <input type="hidden" name="name" value="Veg Manchow Soup" />
    <input type="hidden" name="src" value="Manchow.jpeg" />
    <input type="hidden" name="price" value="80" />
    <img src="Manchow.jpeg">
    <h4>Veg Manchow Soup </h4>
    <h3>Price Rs 80.00</h3>
    <br>
    <button id="btn2" name="submit" type="submit" class="button">Order </button>
  </form>
</div>
<div class="item">
  <form action="" method="post">
    <input type="hidden" name="name" value="Veg Fried Rice" />
    <input type="hidden" name="src" value="Fried rice.jpg" />
    <input type="hidden" name="price" value="150" />
    <img src="Fried rice.jpg">
    <h4>Veg Fried rice </h4>
    <h3>Price Rs 150.00</h3>
    <br>
    <button id="btn3" name="submit" type="submit" class="button">Order </button>
  </form>
</div>
<div class="item">
  <form action="" method="post">
    <input type="hidden" name="name" value="Mushroom Masala" />
    <input type="hidden" name="src"  value="Mushroom.jpg" />
    <input type="hidden" name="price" value="140" />
    <img src="Mushroom.jpg">
    <h4>Mushroom Masala </h4>
    <h3>Price Rs 140.00</h3>
    <br>
    <button id="btn4" name="submit" type="submit" class="button">Order </button>
  </form>
</div>
<div class="item">
  <form action="" method="post">
    <input type="hidden" name="name" value="Paneer Tikka" />
    <input type="hidden" name="src" value="Paneer.jpg" />
    <input type="hidden" name="price" value="100" />
    <img src="Paneer.jpg">
    <h4>Paneer Tikka </h4>
    <h3>Price Rs 100.00</h3>
    <br>
    <button id="btn5" name="submit" type="submit" class="button">Order </button>
  </form>
</div>
<div class="item">
  <form action="" method="post">
    <input type="hidden" name="name" value="Veg Hakka noodles" />
    <input type="hidden" name="src" value="Noodles.jpg" />
    <input type="hidden" name="price" value="120" />
    <img src="Noodles.jpg">
    <h4>Veg Hakka noodles </h4>
    <h3>Price Rs 120.00</h3>
    <br>
    <button id="btn6" name="submit" type="submit" class="button">Order </button>
  </form>
</div>
</section>
<button class="go-top-btn">
  <img src="arrow.jpg.jpg" alt="arrow up">
</button>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="main.js"></script>
<script>
  $(document).ready(() => {
    // $('#btn1').click(() => {
    //   $('#btn1')[0].style.backgroundColor = 'yellow';
    //   alert('Added to Cart');
    // });
    // $('#btn2').click(() => {
    //   $('#btn2')[0].style.backgroundColor = 'yellow';
    //   alert('Added to Cart');
    // });
    // $('#btn3').click(() => {
    //   $('#btn3')[0].style.backgroundColor = 'yellow';
    //   alert('Added to Cart');
    // });
    // $('#btn4').click(() => {
    //   $('#btn4')[0].style.backgroundColor = 'yellow';
    //   alert('Added to Cart');
    // });
    // $('#btn5').click(() => {
    //   $('#btn5')[0].style.backgroundColor = 'yellow';
    //   alert('Added to Cart');
    // });
    // $('#btn6').click(() => {
    //   $('#btn6')[0].style.backgroundColor = 'yellow';
    //   alert('Added to Cart');
    // });
  });
</script>
</body>
</html>