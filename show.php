<?php
$servername = "localhost";
$username = "root";
$password = "password";
$dbname = "practice";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM `image`";
$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result);

mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Html</title>
	<link rel="stylesheet" href="">
</head>
<body>
<?php 

if (!empty($row)) {
	echo $row['content'];
}

?>
</body>
</html>