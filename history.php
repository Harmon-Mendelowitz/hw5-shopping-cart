
<?php
session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>History</title>
</head>
  <body>
    <h2>Order History</h2>


<form method="post" action="front.php">
<label for="return">Return to the store front: </label>
<input type="submit" value="Return" name="ret"/><br/><br/>


<?php

$servername = "localhost";
$username = "mendelowitz";
$password = "HmanHman8$";
$dbname = "mendelowitz";

$u = $_SESSION["username"];

$conn = mysqli_connect($servername, $username, $password, $dbname);
if(!$conn){
        die("Connection failed: " . mysqli_connect_error());
}

$viewby = $_POST['viewby'];
$hisearch = $_POST['historysearch'];

if($viewby == 'none')
{
	$query = "select orderdate,name,quantity from orders,history,products where username='$u' and orders.orderid=history.orderid and products.pid=history.itemid";
}
else if($viewby == 'date')
{
	$query = "select orderdate,name,quantity from orders,history,products where username='$u' and orders.orderid=history.orderid and products.pid=history.itemid and orderdate='$hisearch'";
}
else if($viewby == 'item')
{
	$query = "select orderdate,name,quantity from orders,history,products where username='$u' and orders.orderid=history.orderid and products.pid=history.itemid and name='$hisearch'";
}
$result = mysqli_query($conn,$query);


if(mysqli_num_rows($result)>0){
	while($row = mysqli_fetch_assoc($result)){
		echo $row["orderdate"].", Item name: ". $row["name"].", Quantity: ". $row["quantity"]."<br>";
	}
}
else{
        echo "no values match that discription";
}
?>
</body>
</html>

