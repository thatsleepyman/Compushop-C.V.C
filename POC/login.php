<?php

// controleert of dat je al ingelogt bent of niet
session_start();

// laad connection en functions om inloggen en registreren mogelijk te maken.
include("connection.php");
include("functions.php");


if ($_SERVER['REQUEST_METHOD'] == "POST") { // POST = stuur data
	// verstuur username en password ter controle
	$user_name = $_POST['user_name'];
	$password = $_POST['password'];

	if (!empty($user_name) && !empty($password) && !is_numeric($user_name)) {

		// compare username en password uit de POST met de database gegevens
		$query = "SELECT * FROM login WHERE user_name = '$user_name' limit 1";
		$result = mysqli_query($con, $query);

		if ($result) {
			// Als de user al bestaat
			if ($result && mysqli_num_rows($result) > 0) {

				$user_data = mysqli_fetch_assoc($result);

				// Als het wachtwoord over een komt met de Database
				if ($user_data['password'] == $password) {

					// Log user in
					$_SESSION['user_id'] = $user_data['user_id'];
					header("Location: index.php");
					die;
				}
			}
		}

		// Als de user bestaat maar het wachtwoord niet overeen komt.
		echo "Verkeerde gebruikersnaam of wachtwoord!";
	}

	// Als de user niet bestaat en het wachtwoord niet overeen komt.
	else {
		echo "Dit account bestaat nog niet... claim het? :)";
	}
}
?>

<!DOCTYPE html>
<html>

<head>
	<title>Compushop C.V.C | Login Formulier</title>
</head>

<body>
	<div id="box">
		<form method="post">
			<div>Login</div>

			<input id="text" type="text" name="user_name">
			<input id="text" type="password" name="password">

			<input id="button" type="submit" value="Login">

			<a href="signup.php">Klik hier om te Registreren!</a>
		</form>
	</div>
</body>

</html>