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
			<?php 
				if (isset($_POST['email'])) {
					$email= stripslashes($_POST['email']);
					$email = mysqli_real_escape_string($dbconn, $email);
					$email = filter_var(FILTER_VALIDATE_EMAIL);

					$LoQ = "SELECT * FROM  `customer_data` WHERE email='$email' ";
					$result = mysqli_query($dbconn, $LoQ);
					$rows = mysqli_num_rows($result);
					if ($rows > 1) {
			            $_SESSION['email'] = $email;
			            // Redirect to user dashboard page
			            header("location: Home.php");
			        } else {
			            echo "<div class='form'>
				                  <h3>Incorrect Email</h3>
				                  <h5>Login Again again.</h5>
			                  </div>";
			        }

				}
			?>
<form action="login.php" method="POST">
	<div class="form-group">
		Email :<input type="email" name="email">
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