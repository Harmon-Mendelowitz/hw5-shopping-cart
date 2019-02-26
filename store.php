
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

$u = $_SESSION["username"];
$p = $_SESSION["password"];

$servername = "localhost";
$username = "mendelowitz";
$password = "HmanHman8$";
$dbname = "mendelowitz";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if(!$conn){
        die("Connection failed: " . mysqli_connect_error());
}

if($u !=null)
{
	echo "Your Cart <br/>";
	$query = "select name,price,quantity from cart,products where cart.username='$u' and products.pid=cart.itemid";
	
	$result = mysqli_query($conn,$query);

	if(mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_assoc($result)){
                echo $row["name"].", price: $". $row["price"].", quantity: ". $row["quantity"]."<br>";
        }
	}
	else{
        	echo "there are no items in your cart <br/><br/>";
	}

}

?>
<br/>
<br/>
<form action="addtocart.php" name="adding" method="post">
    <label for="addp">Add to the cart (item name, quantity): </label>
    <input type="text" name="pan" />
    <input type="text" name="paq" />
    <input type="submit" value="Add" /><br/>
</form>

<form action="remfromcart.php" name="removing" method="post">
    <label for="remp">Remove an item from the cart (item name): </label>
    <input type="text" name="prn" />
    <input type="submit" value="Remove"/><br/>
</form>

<form action="delcart.php" name="deleting" method="post">
    <label for="delc">Delete the cart: </label>
    <input type="submit" value="Delete"/><br/>
</form>

<form action="checkout.php" name="checking" method="post">
    <label for="complete">Checkout: </label>
    <input type="submit" value="Checkout"/><br/>
</form>

<br/>
<?php
$categories = $_SESSION["c"];
$pname = $_SESSION["pn"];

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
        echo "no items match that description";
}

?>
</body>
</html>
