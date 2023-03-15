<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<div class="container">
	<div class="row">
		<div class="col-md-12" align="center">
			<?php 
				include 'dbconnect.php';
				session_start();
			?>
			<form action="login2.php" method="POST">
				<div class="form-group">
					Email :<input type="email" name="email">
				</div><br />
				<div class="form-group">
					Password : <input type="password" name="password">
				</div><br />
				<div class="form-group">
					<input type="submit" name="login">
				</div>
			</form>
		</div>
	</div>
</div>
</body>
</html>