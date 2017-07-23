<?php
	include 'api/database.php';
	$error_msg = "";
	if (isset($_POST['user'])){
		$conn = new mysqli($servername, $username, $password, $dbname);
		if ($conn->connect_error){
			die("Connection failed: " . $conn->connect_error);
		}
		$user = $_POST['user'];
		$email = $user['email'];
		$password = md5($user['password']);
	
		
		$sql = "SELECT email,password from users where email='$email' and password='$password' and isAdmin='1'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			session_start();
			$_SESSION['login'] = true;
			$_SESSION['email'] = $email;
		    
			header("Location: ./adminProfile.php");

		}
		$error_msg = "Login failed wrong user credentials!!";
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
	<div class="w3-row w3-padding-64 ">
		<div class="w3-col m4">
		<p></p>
		</div>
		<div class="w3-col m4 ">
		
			<div class="w3-container w3-center w3-blue">
				<h2>Admin LogIn </h2>
			</div>
			
	
			<form class="w3-container" method="post" action="admin.php">

				  <?php
		echo "<label>$error_msg</label>";
	  ?>
					<label>Email</label>
					<input class="w3-input" name="user[email]" type="email" required="required"></p>
					<p>
					<label>Password</label>
					<input class="w3-input"  name="user[password]" type="password" required="required"></p>
					<input type="submit" value="LogIn!" class="w3-button w3-border w3-green w3-hover-yellow "/>
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

</body>
</html>