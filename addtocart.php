<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
session_start();
?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<body>

<?php

$u = $_SESSION['username'];
$pname = $_POST['pan'];
$pquantity = $_POST['paq'];

$servername = "localhost";
$username = "mendelowitz";
$password = "HmanHman8$";
$dbname = "mendelowitz";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if(!$conn){
        die("Connection failed: " . mysqli_connect_error());
}

$pnameid = "select pid from products where name='$pname'";
$r = mysqli_query($conn,$pnameid);

$query = "INSERT INTO cart (username, itemid, quantity) VALUES ('$u',$rrr,(int)$pquantity)";

$result = mysqli_query($conn,$query);

if($result){
	echo "New account created successfully";
}
else{
	echo "There was an error creating this account";
}

header("Location: http://gwupyterhub.seas.gwu.edu/~mendelowitz/hw5-HarmonMendelowitz/store.php");
?>

</body>
</html>

