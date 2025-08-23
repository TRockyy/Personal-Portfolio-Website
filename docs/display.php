<!DOCTYPE html>
<html><head>
<!-- Enable responsiveness based on screen size -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title> ENTRY </title>
		<!-- Link to CSS style sheet -->
		<link rel="stylesheet" type="text/css" href="displaystyle.css">
</head>
<body>

<!-- When clicked go back to page beforehand -->
<button onclick="location.href='list.php'" type="button" class="button1">
Back</button>
<div>
<h2> Book Information <h2>
</div>
<div class = "desc">
<p> Book Description </p>
<div>


<?php
//Get the line number which is sent through URL based on which book is clicked to view more
$line = $_GET['line'];


 $file = array();

//Open file library.csv
 if(($handle = fopen("library.csv", "r")) !== FALSE)
 {
    while(($data = fgetcsv($handle, 1000, ",")) !== FALSE)
    {
        $file[] = $data;
    }
 }

 fclose($handle);

 $column = 0;
 
//Display the title, desc and ISBN for the specific book
echo '<div class="Title">';
 echo $file[$line][$column];
echo '</div>';
echo '<div class="desc" id="description">';
 echo $file[$line][$column+1];
echo '</div>';
echo '<div class="ISBN">';
 echo $file[$line][$column+2];
 echo '</div>';

 
?>


</body>
</html>