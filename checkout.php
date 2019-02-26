<?php
session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<body>

<?php

$u = $_SESSION['username'];

$servername = "localhost";
$username = "mendelowitz";
$password = "HmanHman8$";
$dbname = "mendelowitz";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if(!$conn){
        die("Connection failed: " . mysqli_connect_error());
}


/*$query = "update products set stock = 'stock - quantity' where cart.username='$u' and cart.itemid=pid";
mysqli_query($conn,$query);*/

$qwe = "select stock,quantity,pid from products,cart where pid=cart.itemid and cart.username='$u'";
$asd = mysqli_query($conn, $qwe);

if(mysqli_num_rows($asd)>0){
	while($rowww = mysqli_fetch_assoc($asd)){
		$sssss = (int)$rowww["stock"];
		$qqqqq = (int)$rowww["quantity"];
		$sqsq = (int)($sssss - $qqqqq);
		$pidp = (int)$rowww["pid"];

		$upd = "update products set stock = $sqsq where pid = $pidp";
		mysqli_query($conn, $upd);
	}
}
else{
        echo "no items match that discription";
}


$da = date("Y-m-d");

$q15 = "select max(orderid) as m from orders";
$r15 = mysqli_query($conn,$q15);
$e15 = mysqli_fetch_assoc($r15);
$maxid = ((int)$e15["m"])+1;

$q2 = "insert into orders (username, orderdate, orderid) values ('$u','$da',$maxid)";
$r2 = mysqli_query($conn,$q2);


$q3 = "select itemid,quantity from cart where username='$u'";
$r3 = mysqli_query($conn,$q3);

if(mysqli_num_rows($r3)>0){
	while($pls = mysqli_fetch_assoc($r3)){
		$iid = (int)$pls["itemid"];
		$qtt = (int)$pls["quantity"];
		$q4 = "insert into history (orderid, itemid, quantity) values ($maxid,$iid,$qtt)";
		$r4 = mysqli_query($conn,$q4);
        }
}

$queryyy = "delete from cart where cart.username='$u'";

$resulttt = mysqli_query($conn,$queryyy);
mysqli_close($conn);
header("Location: http://gwupyterhub.seas.gwu.edu/~mendelowitz/hw5-HarmonMendelowitz/front.php");
?>

</body>
</html>


