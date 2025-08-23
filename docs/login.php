<?php
session_start();
if(isset($_SESSION['loggedin'])) header("Location: submit.php");
/* process login data */
if(!isset($_POST['username']) || !isset($_POST['password'])) {
header("Location: session.php");
}


if (isset($_POST['username']) && isset($_POST['password'])) {
//validation	
	function validate($data){
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;	
	}

//username and password = validated inputs entered	
	$username = validate($_POST['username']);
	$password = validate($_POST['password']);

//if inputs are empty display error
	if (empty($username)) {
		header("Location: session.php?error=Username is required");
		exit();
	}else if(empty($password)){
		header("Location: session.php?error=Password is required");
		exit();
	}else{
		echo "valid input";
	}
}else{
	header("Location: session.php?");
	exit();
}



//

/* Run through the CSV and pull in the data: */
if (($handle = fopen("users.csv", "r")) !== FALSE) {
while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
 $users[$data[0]] = array("password"=>$data[1], "admin"=>$data[2]);
}
fclose($handle);
}
/* Get the data entered on the form: */
$u = $_POST['username']; $p = $_POST['password'];
/* Check it against our 'database': */
if(isset($users[$u]) and $users[$u]['password'] == $p ) {
 $_SESSION['loggedin']=TRUE;
 $_SESSION['username']=$u;
 header("Location: submit.php");
}
else{
 header("Location: session.php");
}




?>