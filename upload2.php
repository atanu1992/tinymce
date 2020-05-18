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

$hcode = addslashes($_POST['textarea']);


$sql = "INSERT INTO image (`content`) VALUES ( '".$hcode."' )";

if (mysqli_query($conn, $sql)) {
  // echo "New record created successfully";
	header('location:show.php');
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);

?>