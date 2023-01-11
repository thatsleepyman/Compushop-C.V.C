<?php

// controleert of dat je al ingelogt bent of niet
session_start();

// laad connection en functions om inloggen en registreren mogelijk te maken.
include("connection.php");
include("functions.php");

$user_data = check_login($con);
?>

<!-- HTML voor de index pagina -->
<!DOCTYPE html>
<html>

<head>
	<title>Compushop C.V.C | Home</title>
</head>

<body>
	<!-- Loguit knop -->
	<a href="logout.php">Log uit</a>

	<h1>Welkom, </h1><?php echo $user_data['user_name']; ?>
</body>

</html>