<?php
	include "checksession.php";
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
			  <a href="./userProfile.php" class="w3-bar-item w3-button w3-green w3-right"><?php echo $_SESSION['email'];?></a>
			  <img src="image/me.jpg" class="w3-circle w3-bar-item w3-right" style="width:60px;" />
			 
			</div>

	</div>
	<div class="w3-display-container-fluid">
			<img src="image/show.jpg" alt="bg" style="width:100%">
				<div class="w3-display-middle w3-xlarge">
			Successfully LogIn 
				  
				
				
				</div>
		</div>
	
	<footer class="w3-container w3-padding-16 w3-dark-grey">
		<div class="w3-row-padding w3-center">
			<h3>FOOTER</h3>
			<p>Created by <a href="https://www.linkedin.com/in/mirza-bilal-baig-7b3a4211b/" >M.Bilal Baig</a></p>
		</div>
	</footer>	