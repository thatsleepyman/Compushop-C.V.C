<?php

// controleert of dat je al ingelogt bent of niet
session_start();

// laad connection en functions om inloggen en registreren mogelijk te maken.
include("connection.php");
include("functions.php");


if ($_SERVER['REQUEST_METHOD'] == "POST") {
	// verstuur username en password ter controle
	$user_name = $_POST['user_name'];
	$password = $_POST['password'];

	if (!empty($user_name) && !empty($password) && !is_numeric($user_name)) {

		// Create account als de user nog niet bestaat in de database
		$user_id = random_num(20);
		$query = "INSERT INTO login (user_id,user_name,password) VALUES ('$user_id','$user_name','$password')";
		// connection string + query
		mysqli_query($con, $query);

		header("Location: login.php");
		die;

	}
	
	// Als je een usernaam gebruikt dat al bestaat in de database
	else {
		echo "Probeer het opnieuw!";
	}
}
?>

<!DOCTYPE html>
<html>

<head>
	<title>Registratie Formulier</title>
</head>

<body>
	<div id="box">

		<form method="post">
			<div>Registreer</div>

			<input id="text" type="text" name="user_name">
			<input id="text" type="password" name="password">

			<input id="button" type="submit" value="Signup">

			<a href="login.php">Klik hier om te inloggen</a>
		</form>
	</div>
</body>

</html>