<?php

// connection string variabelen.
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "cvcpoc";

// connection string (! geeft aan NIET, dus kijkt of dat de gegevens over een komen en anders geeft het een fout melding.)
if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{
	// Echo terug als de connectie niet kan worden gemaakt.
	die("failed to connect!");
}
?>