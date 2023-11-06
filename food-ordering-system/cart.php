<?php
	session_start();

	if (!isset($_SESSION['loggedin'])) {
		echo '<script>location.replace("login.php")</script>';
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Cart</title>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,900" rel="stylesheet">
	<style>
		body{
	margin: 0;
	padding: 0;
	background: linear-gradient(to bottom right, #51955e, #FAFCFF);
	height: 100vh;
	display: flex;
	justify-content: center;
	align-items: center;
}

.CartContainer{
	margin-top: 20px;
	width: 70%;
	/* height: 90%; */
	background-color: #ffffff;
    border-radius: 20px;
    box-shadow: 0px 10px 20px #1687d933;
	padding: 20px;
}

.Header{
	margin: auto;
	width: 90%;
	height: 15%;
	display: flex;
	justify-content: space-between;
	align-items: center;
}

.Heading{
	font-size: 20px;
	font-family: 'Open Sans';
	font-weight: 700;
	color: #2F3841;
}

.Action{
	font-size: 14px;
	font-family: 'Open Sans';
	font-weight: 600;
	color: #E44C4C;
	cursor: pointer;
	border-bottom: 1px solid #E44C4C;
}

.Cart-Items{
	margin: auto;
	width: 90%;
	height: 30%;
	display: flex;
	justify-content: space-between;
	align-items: center;
}
.image-box{
	width: 15%;
	text-align: center;
}
.about{
	height: 100%;
	width: 24%;
}
.title{
	padding-top: 10px;
	line-height: 10px;
	font-size: 18px;
	font-family: 'Open Sans';
	font-weight: 800;
	color: #202020;
}
.subtitle{
	line-height: 10px;
	font-size: 18px;
	font-family: 'Open Sans';
	font-weight: 600;
	color: #909090;
}

.counter{
	width: 15%;
	display: flex;
	justify-content: space-between;
	align-items: center;
}
.btn{
	width: 40px;
	height: 40px;
	border-radius: 50%;
	background-color: #d9d9d9;
	display: flex;
	justify-content: center;
	align-items: center;
	font-size: 20px;
	font-family: 'Open Sans';
	font-weight: 900;
	color: #202020;
	cursor: pointer;
}
.count{
	font-size: 20px;
	font-family: 'Open Sans';
	font-weight: 600;
	color: #202020;
}

.prices{
	height: 100%;
	text-align: right;
}
.amount{
	padding-top: 20px;
	font-size: 26px;
	font-family: 'Open Sans';
	font-weight: 800;
	color: #202020;
}
.save{
	padding-top: 5px;
	font-size: 14px;
	font-family: 'Open Sans';
	font-weight: 600;
	color: #1687d9;
	cursor: pointer;
}
.remove{
	padding-top: 5px;
	font-size: 14px;
	font-family: 'Open Sans';
	font-weight: 600;
	color: #E44C4C;
	cursor: pointer;
}

.pad{
	margin-top: 5px;
}

hr{
	width: 66%;
	float: right;
	margin-right: 5%;
}
.checkout{
	float: right;
	margin-right: 5%;
	width: 28%;
}
.total{
	width: 100%;
	display: flex;
	justify-content: space-between;
}
.Subtotal{
	font-size: 22px;
	font-family: 'Open Sans';
	font-weight: 700;
	color: #202020;
}
.items{
	font-size: 16px;
	font-family: 'Open Sans';
	font-weight: 500;
	color: #909090;
	line-height: 10px;
}
.total-amount{
	font-size: 36px;
	font-family: 'Open Sans';
	font-weight: 900;
	color: #202020;
}
.button{
	margin-top: 10px;
	width: 100%;
	height: 40px;
	border: none;
	background: linear-gradient(to bottom right, #90529e, #8EB7EB);
	border-radius: 20px;
	cursor: pointer;
	font-size: 16px;
	font-family: 'Open Sans';
	font-weight: 600;
	color: #202020;
}
	</style>
</head>
<body>
   <div class="CartContainer">
		<div>
			<div class="Header">
				<h3 class="Heading">Food Cart</h3>
				<h5 class="Action">Remove all</h5>
			</div>
		</div>

		<?php
			include 'config/dbconnect.php';
			$email = $_SESSION['email'];
			// $email = 'soham@gmail.com';
			$sql = "SELECT * FROM orders WHERE email='$email'";
			$result = mysqli_query($conn, $sql);

			$total = 0;
			$count = 0;

			while($row = mysqli_fetch_assoc($result)){
				$food_name = $row['food_name'];
				$src = $row['food_src'];
				$price = $row['price'];
				$total += $price;
				$count += 1;

				echo '
					<div class="Cart-Items">
					<div class="image-box">
						<img style="width: 100px;
						height: 100px;
						background-position: center center;
						background-repeat: no-repeat;" src="' . $src . '" style="height: 120px;"/>
					</div>
					<div class="about">
						<h1 class="title">' . $food_name . '</h1>
					</div>
					<div class="counter">
						<div class="btn">-</div>
						<div class="count">1</div>
						<div class="btn">+</div>
					</div>
					<div class="prices">
						<div class="amount"> ₹' . $price . '</div>
						<div class="remove"><u>Remove</u></div>
					</div>
					</div>
				';
			}
				
			echo '
			<hr>
			<div>
				<div class="checkout">
				<div class="total">
					<div>
						<div class="Subtotal">Sub-Total</div>
						<div class="items">' . $count . 'items</div>
					</div>
					<div class="total-amount">₹' . $total . '</div>
				</div>
				<button id="order-now" class="button">Order</button></div>
			</div>
		 ';
		?>
   </div>
   <script>
		const btn = document.getElementById('order-now');
		btn.addEventListener('click', () => {
			alert('Order placed successfully!');
			location.replace('home.php');
		});
	</script>
</body>
</html>