<?php

	session_start();
	
	if (!isset($_SESSION['zalogowany']))
	{
		header('Location: index.php');
		exit();
	}
	
?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Zmień hasło</title>
	<style>
	   a:link 
		{
		color: black;
		}
		a:visited {
		color: black;
		}
		a:hover {
		color:white;
		}
		a:active {
		color: white;
		}
		a {
    text-decoration: none;
}
	</style>
</head>

<body style = "background-color:#f0f0f0";>
	<h2>Zmień hasło: </h2>
	
	<form action="zmienhaslo2.php" method="post">
	
		Podaj nowe hasło: <br /> <input type="password" name="haslo1" /> <br />
		Powtórz nowe hasło: <br /> <input type="password" name="haslo2" /> <br /><br />
		<input type="submit" value="Zmień hasło" />
	
	</form>
	
</body>
</html>