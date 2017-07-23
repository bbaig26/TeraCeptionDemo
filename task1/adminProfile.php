<?php
	include "checksession.php";

?>
<!DOCTYPE Html>
<html> 
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="css/w3(4).css" >
		<script src="js/jquery.min.js"></script>
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
	
	<div class="w3-container">
	<div class=" w3-xxlarge w3-center"> <a href="./addUser.php" class="w3-button w3-lime">Add New User</a>
	</div>
	<div class="w3-container">
			<h2 class="w3-center">Registered Users List</h2>
			<table class="w3-table-all">
			<thead>
			  <tr class="w3-red">
				<th>First Name</th>
				<th>Email</th>
				<th>Remove User</th>
				
			<?php
			     
							include './api/database.php';
							$conn = new mysqli($servername, $username, $password, $dbname);
							if ($conn->connect_error){
								die("Connection failed: " . $conn->connect_error);
							}
							if($_SESSION['email'] == 'admin@gmail.com'){
									$email = $_SESSION['email'];
									$sql = "SELECT * from users where isAdmin='0'";
							
							$result = $conn->query($sql);
							if ($result->num_rows > 0) {
								while($row = $result->fetch_assoc()) {
									
									echo '<tr>
								<td nowrap="">'.$row['f_name'].'</td>
								<td nowrap="">'.$row['email'].'</td>
								<td nowrap="" ><div class="w3-button trash" id="'.$row['id'].'" >Remove</div> </td>
								
								
								</tr>';
								}
							}
							}
			?>
     
			</table>
	</div>
<script>
$(function(){
    $(document).on('click','.trash',function(){
        var del_id= $(this).attr('id');
        var $ele = $(this).parent().parent();
        $.ajax({
                type:'POST',
                url:'delete.php',
                data:'del_id='+del_id,
                success: function(data)
                {
                    
                $ele.fadeOut().remove();
                }
            });
        });
    });
</script>
	
	<footer class="w3-container w3-padding-16 w3-dark-grey">
		<div class="w3-row-padding w3-center">
			<h3>FOOTER</h3>
			<p>Created by <a href="https://www.linkedin.com/in/mirza-bilal-baig-7b3a4211b/" >M.Bilal Baig</a></p>
		</div>
	</footer>	