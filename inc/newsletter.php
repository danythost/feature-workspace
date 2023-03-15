<?php 

include 'dbconnect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	#error mssg variables
	$err1="Your Field is Empty Please fill Before submission";
	$err2="You Must Register First !!! Register Here ";
	$err1="You Will recieve a Notification shortly !!!";

	// initializing variables
	$email = $_POST['email'];

	if (empty($email)) {
		echo $err1;
	}else{
		trim($_POST['email']);
		filter_var($email, FILTER_VALIDATE_EMAIL);
	}
	//prepared statement here prevents sql_injection
$subQ = "SELECT * FROM `customer_data` WHERE email='$email'";
$result = mysqli_query($dbconn, $subQ);
	$rows = mysqli_num_rows($result);

	if ($rows == 1) {
		# code...
		$err3;
	} else {
		# code...
		echo $err2;
	}


}

?>