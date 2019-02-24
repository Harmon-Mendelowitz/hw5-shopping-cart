<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php

session_start();

?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<body>

<?php

$luname = $_POST['lusername'];
$lpword = $_POST['lpassword'];

$servername = "localhost";
$username = "mendelowitz";
$password = "HmanHman8$";
$dbname = "mendelowitz";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if(!$conn){
        die("Connection failed: " . mysqli_connect_error());
}

$query = "select username,password from users where username='$luname' and password='$lpword'";

$result = mysqli_query($conn,$query);
if(mysqli_num_rows($result)>0){
	echo "Logged in <br/>";
	$_SESSION["username"] = $luname;
	$_SESSION["password"] = $lpword;
	print_r($_SESSION);
}
else{
	echo "Error: " . $query . "<br/>" . mysqli_error($conn);
	$_SESSION["username"] = "";
	$_SESSION["password"] = "";
}
header("Location: http://gwupyterhub.seas.gwu.edu/~mendelowitz/hw5-HarmonMendelowitz/store.html");

?>

</body>
</html>

