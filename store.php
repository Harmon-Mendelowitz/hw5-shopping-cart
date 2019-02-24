
<?php
session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Items</title>
</head>
  <body>
    <h2>Products</h2>
<?php

print_r($_SESSION);

$servername = "localhost";
$username = "GWnetID";
$password = "password";
$dbname = "GWnetID";
$servername = "localhost";
$username = "mendelowitz";
$password = "HmanHman8$";
$dbname = "mendelowitz";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if(!$conn){
        die("Connection failed: " . mysqli_connect_error());
}

$categories = $_POST['categories'];
$pname = $_POST['productname'];

if($pname == '')
{
	if($categories == 'none')
		$query = "select name,price,stock from products";
	else
		$query = "select name,price,stock from products where category='$categories'";
}
else
{
	if($categories == 'none')
		$query = "select name,price,stock from products where name='$pname'";
	else
		$query = "select name,price,stock from products where category='$categories' and name='$pname'";
}

$result = mysqli_query($conn,$query);


if(mysqli_num_rows($result)>0){
	while($row = mysqli_fetch_assoc($result)){
		echo $row["name"].", price: $". $row["price"].", stock: ". $row["stock"]."<br>";
	}
}
else{
        echo "no items match that discription";
}
mysqli_close($conn);
?>
</body>
</html>
