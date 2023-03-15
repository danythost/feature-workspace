<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Accounting Consultation</title>
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-grid.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-grid.min.css">
	<link rel="stylesheet" href="layout/styles/fontawesome-free/css/fontawesome-all.min.css">

<!--js script here-->
<script>
    function servDoc() {
  var serv = new XMLHttpRequest();
  serv.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     document.getElementById('meg').innerHTML = this.responseText;
    }
  };
  serv.open("GET", "services.html", true);
  serv.send();
}
</script>
<!--js_ends here-->

</head>
<body>
<!--Header/Navigation menu-->

<?php include 'nav.html'; ?>

<!--css will come here which will add more functionality to the nav bar	we will use organie css ...
-->

<!###################################################################################################>
<!###################################################################################################>
<!--Main Contetnt1-->
<div class="container-fluid" style="background-image: url(img/albari.jpg); background-size: cover; background-repeat: no-repeat;">
	<div class="row" id="meg" style="color: whitesmoke;">
		<div class="col-md-6" style="">

			<!--media_Query styling here-->
			<style>
				@media screen and (max-width: 680px)
				{
					.desci {
						width: 20.3em;
					}
					h4 {
						margin-left: -9.5em;
					}
					p {
						margin-left: -18.4em;
					}
				}
			</style>
			<!--Media_Query styling ends here-->
			<div class="desci" style="color: whitesmoke; margin: auto;">
				<div class="merg" id="desc" style="margin-left: 20em; ">
					<h4 style="margin-top: 3em; margin-bottom: 0.9em;">
						<strong>
							Your Online Accounting<br /> <span>Department</span>
						</strong>
					</h4>
					<p>
						We provide online Bookkeeping, Accounting Services, and expert financial advice for small businesses - giving you more time to grow !
					</p>
				</div>
			</div>
		</div>

		<div class="col-md-6" style="">
			<!--form_here-->
			<div class="gt_intouch" style="margin-top: 2em; margin-left: ; font-weight: bold; opacity: 0.9; margin-bottom: 2em; width: 20em; background-color: #000000; color: whitesmoke;" align="center">
				<h6 style="margin-top: 2em; margin-bottom: 2em;">
					<strong>Get In touch and one of <br /> our team of experts will contact you for your free<br /> consultation</strong>
				</h6>

<!--form logic here-->
<?php 
include 'inc/dbconnect.php';

	#using phpmailer componenets Here


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // removes backslashes
   $fname = $_POST['fname']; 
   $lname = $_POST['lname'];
   $email = $_POST['email'];
   $phone = $_POST['phone'];

	if (empty($fname && $lname && $email && $phone)) {
		# code... js redirection here 
		?>
			<div class>
				<h6 style="color: yellow;">Please Fill in these fields</h6>
			</div>
		<?php
	} else {
			$fname = stripslashes($_POST['fname']);
			$fname = mysqli_real_escape_string($dbconn, $fname);

			$lname = stripslashes($_POST['lname']);
			$lname = mysqli_real_escape_string($dbconn, $lname);

			$email = stripslashes($_POST['email']);
			$email = mysqli_real_escape_string($dbconn, $email);
			$email = filter_var($email, FILTER_VALIDATE_EMAIL);

			$phone = stripslashes($_POST['phone']);
			$phone = mysqli_real_escape_string($dbconn, $phone);

    $query = " INSERT into customertb (fname, lname, email, phone) 
                VALUES ('$fname', '$lname', '$email', '$phone') ";
    $result = @mysqli_query($dbconn, $query);
    if ($result) {
       ?>
		<script>
			window.location = "services.html";
		</script>
	   <?php
    	}
	}

}
?>

<!--form logic ends --Header-->
				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" onsubmit="val()"><!---don't forget to use js onsubmit val function already here !!!--->
					<div class="row">
						<div class="col-md-6">
							<div class="form-group" style="margin-bottom:0.3em; margin-left: 1em;" align="left">
								<label class="label" for="first_name" style="margin-right: 2em;">First Name <span style="color: red;">*</span></label>
								<input type="text" class="form-group" name="fname" id="firstname" style="width: 8em; margin-right: 2px;">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group" style="margin-bottom:0.3em; margin-right: 1em;">
								<label class="label" for="last_name" style="margin-right: 2.4em;">Last Name <span style="color: red;">*</span></label>
								<input type="last_name" class="form-group" name="lname" id="lastname" style="width: 8em; margin-left: 2px;"><br />
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group" style="margin-bottom:0.3em; margin-left: 1em;">
								<label class="label" for="Email" style="margin-right: 4.7em;">Email <span style="color: red;">*</span></label>
								<input type="text" class="form-group" name="email" id="email" style="width: 17em; margin-left: 2px;">
							</div>
						</div><br />
						<div class="col-md-6">
							<div class="form-group" style="margin-bottom:0.3em; margin-left: 1em;">
								<label class="label" for="Phone" style="margin-right: 0.3em;">Phone Number <span style="color: red;">*</span></label>
								<input type="tel" class="form-group" name="phone" id="phone" minlength="9" maxlength="15" style="width: 17em; margin-left: 2px;">
							</div>
						</div>
						<div class="free_con" style="margin-bottom: 2em; margin-top: 1em; margin-left: 1em;">
							<input type='submit' class="btn btn-light" 
										style="background: skyblue; cursor: pointer; border: none;
										font-weight: bold; padding: 6px 28px; m argin: 4px 2px; color: white; float: left;"
										value="Free Conslutation"></button>
						</div>
					</div>					
				</form>
			</div>
		</div>
	</div>
</div>


<!--js form validationstart-->
<script type="text/javascript">
function val(){
	//declaring variables
	var firstname = document.getElementById('firstname');
	var lastname = document.getElementById('lastname');
	var email = document.getElementById('email');
	var phone = document.getElementById('phone');

	//checking variables
if (notempty(firstname, "please fill in this field")){
	if (notempty(lastname, "Please fill in the field")){
		if (isAlphabet(firstname, "Please use only letters")) {
			if (isAlphabet(lastname, "please use only letters")) {
				if (emailVal(email, "please use a valid email")) {
					if (isNumeric(phone, "please use a valid phone number")) {
					}else{
						window.location = "index.php";
						return true;
					}
				}
			}
		}
	}
		return false;
}

function notempty(details, respMesg){
	if(details.value.length == 0){
		alert(respMesg);
		details.focus();
		return false;
	}
	return true;
}


function isAlphabet(details, respMesg){
	var alphaExp = /^[a-zA-Z]+$/;
	if (details.value.match(alphaExp)) {
			return true;
	}else{
			alert(respMesg);
			details.focus();
			return false;
	}
}


function emailVal(details, respMesg){
		var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
		if(details.value.match(emailExp)){
			return true;
		}else{
			alert(respMesg);
			details.focus();
			return false;

		}
}
function isNumeric(details, respMesg){
	var numericExpression = /^[0-9]+$/;
	if(details.value.match(numericExpression)){
		return true;
	}else{
		alert(respMesg);
		details.focus();
		return false;
	}
}

</script>
<!--js form validationstart-->

<!--Main Contetnt2-->
<div class="container-fluid">
	<div class="row" style="background-color: #99ccff;">
		<div class="col-md-12" align="center">
			<div class="ent_guide">
				<h6 style="margin-top: 3%; margin-bottom: 1.5%;">
				<span style="color: whitesmoke; font-weight: bold;">Entrepreneur's Guide -</span> <span style="color: whitesmoke;">six questions about your bsiness that your accountant should answer.</span>
				</h6>
<?php 

if (isset($REQUEST['subscribe'])) {
	// initializing variables
	$email = $_POST['email'];

	if (empty($email)) {
		?>
			<div class="em_error" align="center" style="color:red;">
				<h5>Please fill in this field</h5>
			</div>
		<?php
	}else{
		trim($_POST['email']);
		mysqli_real_escape_string($dbconn, $email);
		filter_var($email, FILTER_VALIDATE_EMAIL);
	}
	//prepared statement here prevents sql_injection
$subQ = "SELECT * FROM `customer_data` WHERE email='$email'";
$result = mysqli_query($dbconn, $subQ);
	$rows = mysqli_num_rows($result);

	if ($rows == 1) {
		?>
			<div class="succ_Msg" align="center" style="color: green;">
				<h5>You will recieve Notification shortly</h5>
			</div>
		<?php
	} else {
		?>
			<div class="not_email" align="center" style="color: Red;">
				<h5>Please Register first !!!</h5>
			</div>
		<?php
	}


}

?>
				<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" style="margin-bottom: 3%;">
					<input type="email" name="email" id="email" placeholder="email address" style="padding: 8px 32px; border: none;">
					<input type="submit" name="subscribe" style="background-color: #206040; font-weight: bold; padding: 8px 32px; color: whitesmoke; cursor: pointer; border: none; margin: 4px 2px;" value="GET ME FREE COURSES">
				</form>
			</div>
		</div>
	</div>
</div>

<!--Main Contetnt3-->
<div class="container-fluid">
	<div class="row">
		<div class="...">
			
		</div>
	</div>
</div>


<!###################################################################################################><!###################################################################################################>
<!--Footer-->
<?php include 'footer.html'; ?>


<script src="jQuery/jquery.min.js"></script>
<script src="jQuery/jquery-3.5.1.min.js"></script>
<script src="jQuery/jquery-3.0.0.min.js"></script>
<script src="jQuery/bootstrap.bundle.min.js"></script>
<script src="jQuery/popper.min.js"></script>
<script src="jQuery/bootstrap.js"></script>
<script src="jQuery/bootstrap.min.js"></script>
</body>
</html>





