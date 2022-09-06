<?php

	session_start();
	
	if (!isset($_SESSION['zalogowany']))
	{
		header('Location: index.php');
		exit();
	}
	
?>

<!DOCTYPE html>
<html lang="pl">

<head>
<meta charset = "utf-8">
<title> Opcje konta </title>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome">
</head>

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
	
	#panel{
		text-aligne:center;
		font-size:30px;
	}
}
</style>

<body style = "background-color: #f0f0f0";>
<div id = "panel">
<?php
echo "<h2>Jesteś zalogowany jako: ".$_SESSION['user']."</h2>";
?>
<br/>
<h3>Opcje konta:</h3>
<a href = "zmienhaslo.php"><h4>Zmień hasło</h4></a>

<a href = "usunkonto.php"><h4>Usuń konto</h4></a>
<br /><br />
<a href = "index.php"><h4>Wróć do strony głównej</h4></a>
</div>
</body>

</html>
