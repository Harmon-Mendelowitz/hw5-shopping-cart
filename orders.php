<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php

session_start();

?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<body>

<?php

$servername = "localhost";
$username = "mendelowitz";
$password = "HmanHman8$";
$dbname = "mendelowitz";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if(!$conn){
        die("Connection failed: " . mysqli_connect_error());
}
$u = $_SESSION["username"];
$p = $_SESSION["password"];

$query = "select username,password from users where username='$u' and password='$p'";

$result = mysqli_query($conn,$query);
if(mysqli_num_rows($result)>0){
	echo "";
}
else{
	echo "Error: " . $query . "<br/>" . mysqli_error($conn);
	$_SESSION["loginerror"] = "You must first login";
	header("Location: http://gwupyterhub.seas.gwu.edu/~mendelowitz/hw5-HarmonMendelowitz/front.php");
}
$_SESSION["newaccount"] = null;
?>


<p>What would you like to view?</p>
    <form method="post" action="store.php">
    <label for="view">View By: </label>
	    <select name="viewby">
		    <option value="none">All purchases</option>
		    <option value="date">Date</option>
		    <option value="item">Item</option>
	    </select>
    <br/>

    <label for="selectview">Leave blank for all purchases, enter a date as YYYY-MM-DD, or enter the name of a product</label> <br/>
    <input type="text" name="historysearch" /><br />
    <input type="submit" value="Search" name="search" formaction="history.php"/><br/><br/>

<?php
echo "Your Orders: <br/>";
$query = "select orderdate from orders where username='$u'";

$result = mysqli_query($conn,$query);

if(mysqli_num_rows($result)>0){
	while($row = mysqli_fetch_assoc($result)){
		echo $row["orderdate"]."<br>";
	}
}
else{
        echo "no items match that discription";
}
mysqli_close($conn);
?>
</body>
</html>
