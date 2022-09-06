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
	<title>Usuń konto</title>
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
	<h2>Konto zostało usunięte</h2>
	
	<form action="logout.php" method="post">
		<input type="submit" value="Ok" />
	
	</form>
	
	
</body>
</html>