<?php session_start();
if(isset($_SESSION['loggedin'])) header("Location: submit.php");
?>

<!DOCTYPE html>
<html>
<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title> Login </title>
		<link rel="stylesheet" type="text/css" href="sessionstyle.css">
</head>
		
<body>
		<form method="POST" action="login.php" >
		<?php if (isset($_GET['error'])) { ?>
			<p class="error"><?php echo $_GET['error']; ?></p>
		<?php } ?>
			<div>
			<label for="username">Username</label>
			<input type="text" name="username" value""
			autofocus placeholder="Enter Username"/>
			</div>
			
			<div>
			<label for="password">Password</label>
			<input type="text" name="password" value""
			autofocus placeholder="Enter Password"/>
			</div>
			
			<input type="submit" name="submit" value="Submit" />
			<input type="reset" name="reset" value="Reset" />
			<button onclick="location.href='list.php'" type="button" class="button1">
			Back</button>
		</form>
			
		
</body>
</html>
