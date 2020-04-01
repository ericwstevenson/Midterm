<?php 
	session_start();
	if(isset($_SESSION['firstname'])){
		$_SESSION['firstname'];
	}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zippy Used Autos</title>
    <link rel="stylesheet" type="text/css" href="view/css/main.css" />
</head>

<body>
    <header>
        <h1>Zippy Used Autos</h1>
    </header>
<?php
	echo "<h2>Thank you for registering, " . $_SESSION['firstname'] . "!</h2>";
	echo "<p><a href='index.php'>Click here</a> to view our vehicle list.</p>";
?>
</body>