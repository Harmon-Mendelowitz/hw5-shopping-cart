<?php
session_start();
?>

<html>
  <head>
    <title>Store</title>
  <link rel="stylesheet" type="text/css" href="style.css" />
<style>
.error {color: #FF0000;}
</style>
  </head>
  <body>
<?php

$subject = "Products";
$headers = "MIME-version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

echo '<span class="error">' . $_SESSION["loginerror"] . '</span><br>';
echo '<span class="error">' . $_SESSION["newaccount"] . '</span><br>';
?>


<h2>Products</h2>

  <p>What would you like to view?</p>
    <form method="post" action="store.php">
    <label for="category">Category:</label>
	    <select name="categories">
		    <option value="none">---</option>
		    <option value="food">Food</option>
		    <option value="electronics">Electronics</option>
                    <option value="art">Art</option>
	    </select>
	    <br/>
    <label for="productname">Name of Product: </label>
    <input type="text" name="productname" /><br />
    <input type="submit" value="View" name="submit"/><br/><br/>

    <label for="firstname">Username:</label>
    <input type="text" name="lusername" /><br/>
    <label for="firstname">Password:</label>
    <input type="text" name="lpassword" /><br/>

    <input type="submit" value="Log in" formaction="login.php"/><br/>
    <br/>

    <p>Fill this out and click 'create account' to make an account:</p>

    <label for="firstname">First Name: </label>
    <input type="text" name="fname" /><br />
    <label for="lastname">Last Name: </label>
    <input type="text" name="lname" /><br />
    <label for="username">Username: </label>
    <input type="text" name="uname" /><br />
    <label for="password">Password: </label>
    <input type="text" name="password" /><br />

    <input type="submit" value="Create Account" formaction="newacc.php"/>

  </form>
 </body>
</html>
