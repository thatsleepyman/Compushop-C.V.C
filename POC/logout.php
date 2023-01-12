<?php

// controleert of dat je al ingelogt bent of niet
session_start();

if (isset($_SESSION['user_id'])) {
	unset($_SESSION['user_id']);
}

header("Location: login.php");
die;
?>