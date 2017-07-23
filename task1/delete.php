
<?php
include('api/database.php');
$conn = new mysqli($servername, $username, $password, $dbname);
		if ($conn->connect_error){
			die("Connection failed: " . $conn->connect_error);
		}
$id = $_POST['del_id'];

$sql = "DELETE FROM users WHERE id ='$id' and isAdmin='0'";
$result = $conn->query($sql);
if(isset($result)) {
   echo "YES";
} else {
   echo "NO";
}
?>
