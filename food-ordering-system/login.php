<?php
  session_start();

  if (isset( $_POST['submit']) ) {
    include 'config/dbconnect.php';
		$email = $_POST["email"];
		// $password = $_POST["password"];
		$password = md5($_POST["password"]);

		$sql = "SELECT * FROM `userInfo` WHERE email='$email'";
		$result = mysqli_query($conn, $sql);
		$num = mysqli_num_rows($result);
		$row = mysqli_fetch_assoc($result);

		if($num == 1 && ($password == $row['password'])) {
      $_SESSION['loggedin'] = 1;
      $_SESSION['email'] = $email;
      echo "<script>alert('Login successful.')</script>";
      echo "<script>window.location.replace('home.php')</script>";
		} else {
		  echo "<script>alert('Wrong email or password! Please try again!')</script>";
		}
    
    mysqli_close($conn);
  }

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page: Waterfront Cafe</title>
  <link rel="stylesheet" href="login-stylesheet.css">
</head>

<body>
  <div class="container">
    <div class="box">
      <h2>Login</h2>
      <form method="post" action="">
        <input type="text" name="email" placeholder="Email" required="required">
        <input type="password" name="password" placeholder="Password" required="required">
        <input type="submit" name="submit" value="Login">
        <h5>Don't have an Account? <a href="signup-2.php">Sign Up</a></h5>
      </form>
    </div>
  </div>
</body>

</html>