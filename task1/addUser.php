<?php
	include "checksession.php";
	include 'api/database.php';
	$error_msg = "";
	$error = false;
	if (isset($_POST['user'])){
		$conn = new mysqli($servername, $username, $password, $dbname);
		if ($conn->connect_error){
			die("Connection failed: " . $conn->connect_error);
		}
		$user = $_POST['user'];
		$f_name = $user['f_name'];
		$l_name = $user['l_name'];
		$email = $user['email'];
		$password = md5($user['password']);
		$city = $user['city'];
		
		
		$sql = "SELECT * from users where email='$email' ";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			$error_msg = "email already exists!!";
			$error = true;
		}
		
		
		
		if (!$error) {
			$sql = "INSERT INTO users (f_name, l_name, email, password,  city)
			VALUES ('$f_name', '$l_name' ,'$email', '$password',  '$city')";
			
			$conn->query($sql);
			header("Location: ./adminProfile.php");
		}
		
	}
?>
<!DOCTYPE Html>
<html> 
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="css/w3(4).css" >
	</head>
<body> 
<header class="w3-container w3-padding-16 w3-dark-grey">
			<div class="w3-row-padding w3-center w3-xxxlarge">
			Teraception
			</div>
	</header>
	<div class="w3-container">

			<div class="w3-bar w3-border w3-light-grey">
				  <a href="./logout.php" class="w3-bar-item w3-button w3-green w3-right">Logout</a>
				  <a href="./adminProfile.php" class="w3-bar-item w3-button w3-green w3-right"><?php echo $_SESSION['email']; ?></a>
				  <img src="image/me.jpg" class="w3-circle w3-bar-item w3-right" style="width:60px;" />
			 
			</div>

	</div>
	<div class="w3-row w3-padding-64 ">
		<div class="w3-col m4">
		<p></p>
		</div>
		<div class="w3-col m4 ">
		
			<div class="w3-container w3-center w3-blue">
				<h2>New User Add </h2>
			</div>
			
	
			<form class="w3-container" method="post" action="./addUser.php">

				  <p>
					<label>First Name</label>
					<input class="w3-input" name="user[f_name]"type="text" required="required"></p>
				  <p>
					<label>Last Name</label>
					<input class="w3-input" name="user[l_name]" type="text" required="required"></p>
				  <p>
					<label>Email</label>
					<input class="w3-input" name="user[email]" type="email" required="required"></p>
					<p>
					<label>Password</label>
					<input class="w3-input" name="user[password]" type="password" required="required"></p>
					<p>
					<label>City</label>
					<input class="w3-input" name="user[city]" type="text" required="required"></p>
					<p>
					
					
					<input type="submit" value="Add User" class="w3-button w3-border w3-green w3-hover-yellow "/>
			</form>
		</div>
		<div class="w3-col m4">
		</div>
	</div>
	<footer class="w3-container w3-padding-16 w3-dark-grey">
		<div class="w3-row-padding w3-center">
			<h3>FOOTER</h3>
			<p>Created by <a href="https://www.linkedin.com/in/mirza-bilal-baig-7b3a4211b/" >M.Bilal Baig</a></p>
		</div>
	</footer>	