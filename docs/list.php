<!DOCTYPE html>

<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Library System</title>
		<link rel = "stylesheet" type="text/css" href="list.css">
	</head>
	
<body>



<!-- Header -->
	<div class="Name">
		<h1>L I B R A R Y &nbsp&nbsp S Y S T E M</h1>
	</div>

<!-- Navigation bars -->
<div class="navigation" id="myTopnav">
    <a href="forecast.html" >W E A T H E R&nbsp&nbsp&nbspF O R E C A S T</a>
	<a href="CWcv.html" >C V</a>
	<a href="list.php" id="active">L I B R A R Y&nbsp&nbsp&nbspS Y S T E M</a>
</div>

<!-- When clicked go to log in form -->
<button onclick="location.href='session.php'" type="button" class="button1">
         Log In/Submit Entry</button>


<?php 
$row = 1;
$line = 0;
$display = "display.php";
//Open library.csv to get data
if (($handle = fopen("library.csv", "r")) !== FALSE) {
while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
$num = count($data);
//Display the data, classes are used for styling CSS
echo '<div class="container">';
echo "<span class='BookNum'>Entry No." . $line+1 . "</span><br>";
echo "<span class='BookTitle'>$data[0]</span><br>";
echo "<span class='BookISBN'>&nbsp&nbsp&nbsp ISBN - " . $data[2] . "</span><br>";
echo '<span class="BookViewmore"><a href="display.php?line=' . $line . '">View More</a></span>';
echo "</p>";
echo '</div>';
$line = $line+1;
}
//close file
fclose($handle);
}
?>



</body>
</html>



