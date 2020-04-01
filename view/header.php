<?php
session_start();
if(isset($_SESSION['firstname'])){
	$_SESSION['firstname'];
	echo "<p align='right' >Welcome, " . $_SESSION['firstname'] . "! (<a href='logout.php'>Sign Out)</a></p>";
} else {
	echo "<p align='right' ><a href='register.php'>Register</a></p>";
}
?>

<!DOCTYPE html>
<html>

<!-- the head section -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zippy Used Autos</title>
    <link rel="stylesheet" type="text/css" href="view/css/main.css" />
</head>

<!-- the body section -->
<body>
    <header>
        <h1>Zippy Used Autos</h1>
    </header>