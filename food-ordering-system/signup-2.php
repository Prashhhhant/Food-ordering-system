<?php
  include 'config/dbconnect.php';

  if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $mobileNo = $_POST['mobileNo'];
    $password = md5($_POST['password']);
    $cpassword = md5($_POST['cpassword']);
  
    $check_query = mysqli_query($conn, "SELECT * FROM userInfo where email ='$email'");
    $rowCount = mysqli_num_rows($check_query);

    if ($rowCount > 0) {
      echo '
        <script>
          alert("User with email already exist! Please login to continue.");
          window.location.replace("login.php");
        </script>
      ';
    } else {
      $sql = "INSERT INTO userInfo VALUES ('$username', '$email', '$mobileNo', '$password')";
      if (mysqli_query($conn, $sql)) {
        echo '
          <script>
            alert("Registered successfully. Please login to continue.");
            window.location.replace("login.php");
          </script>
        ';	
      } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }
    }
  }

  mysqli_close($conn);
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sign Up Page: Waterfront Cafe</title>
    <link rel="stylesheet" href="signup-stylesheet.css" />
  </head>

  <body>
    <div class="container">
      <div class="box form-font">
        <h2>Sign Up</h2>
        <form id="signup" method="POST">
          <div>
          <label for="username">Username:</label>
          <input type="text" name="username" id="username" autocomplete="off">
          <small></small>
          </div>
          <div>
          <label for="email">Email:</label>
          <input type="text" name="email" id="email" autocomplete="off">
          <small></small>
          </div>
          <div>
            <label for="phone">Mobile No.:</label>
            <input type="text" name="mobileNo" id="phone" maxlength="10"  autocomplete="off">
            <small></small>
          </div>
          <div>
          <label for="password">Password:</label>
          <input type="password" name="password" id="password" autocomplete="off">
          <small></small>
          </div>
          <div>
          <label for="confirm-password">Confirm Password:</label>
          <input type="password" name="cpassword" id="confirm-password" autocomplete="off">
          <small></small>
          </div>
          <input type="submit" name="submit" value="Sign Up">
          <h5>Already Have an Account? <a href="login.php">Login</a></h5>
        </form>
      </div>
    </div>
    <script src="signup.js"></script>
  </body>
</html>
