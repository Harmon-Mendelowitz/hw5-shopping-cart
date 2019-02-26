<?php
session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<body>

<?php

$_SESSION["c"] = $_POST['categories'];
$_SESSION["pn"] = $_POST['productname'];

include 'store.php';

?>

</body>
</html>
