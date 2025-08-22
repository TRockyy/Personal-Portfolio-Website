<?php session_start();
if(!isset($_SESSION['loggedin'])) header("Location: session.php");
if($_SESSION['loggedin']===FALSE) header("Location: session.php");
?>



<!DOCTYPE html>
<html><head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title> ENTRY </title>
		<link rel="stylesheet" type="text/css" href="submitstyle.css">
</head>
<body>




<form method="POST">
<?php if (isset($_GET['error'])) { ?>
<p class="error"><?php echo $_GET['error']; ?></p>
<?php } ?>
	</p>
<div>
<label for="Title">Title</label>
			<input type="text" name="Title" value""
			autofocus placeholder="Enter Book Title"/>
</div>
<div>
<label for="Description">Description</label>
			<input type="text" name="Description" value""
			autofocus placeholder="Enter Book Description"/>
</div>
<label for="ISBN">ISBN</label>
			<input type="text" name="ISBN" value""
			autofocus placeholder="Enter Book ISBN"/>
<div>
			<input type="submit" name="submit" value="Submit"/>
			<input type="reset" name="reset value="Reset"/>
			<button onclick="location.href='list.php'" type="button" class="button1">
			Back</button>
			<button onclick="location.href='logout.php'" type="button" class="button1">
			Log Out</button>
</div>
</form>






<?php





if (isset($_POST['Title']) && isset($_POST['Description']) && isset($_POST['ISBN'])) {
	
	function validate($data){
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;	
	}

	$Title = validate($_POST['Title']);
	$Description = validate($_POST['Description']);
	$ISBN = validate($_POST['ISBN']);


	if (empty($Title)) {
		header("Location: submit.php?error=Title is required");
		exit();
	}else if(empty($Description)){
		header("Location: submit.php?error=Description is required");
		exit();
	}else if(empty($ISBN)){
		header("Location: submit.php?error=ISBN is required");
		exit();
	}else{
		echo "";
	}
}

if (isset($_POST['Title']) && isset($_POST['Description']) && isset($_POST['ISBN'])) {
$content = array (
	'Title' => $Title,
	'Description' => $Description,
	'ISBN' => $ISBN
);

$path = 'library.csv';
$fp = fopen($path, 'a'); //write at end of file, not beginning

fputcsv($fp, $content);

fclose($fp);
echo "<span class='valid'>Valid Entry - Uploaded</span>";

}
?>




</body>
</html>