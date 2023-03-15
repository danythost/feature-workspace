<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php 
include 'dbconnect.php';
session_start();

?>

<form action="login.php" method="POST">
	Email :<input type="email" name="email"><br />
	<input type="submit" name="login">
</form>

</body>
</html>