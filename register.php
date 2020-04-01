<?php
	include 'view/header.php';
?>
<main>
    <form action="" method="get">
        <br><label for="firstname">Please enter your firstname:</label><br><br>
        <input type="text" name="firstname" maxlength="50" required><br><br>

        <label id="blankLabel">&nbsp;</label>
        <input type="submit" value="Register" class="button blue"><br><br>
    </form>
	<?php
		if(isset($_GET['firstname'])){
			$_SESSION['firstname'] = $_GET['firstname'];
			header('Location: register_message.php');
		}
	?>
</main>
