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
<title> Wpisz numer seryjny </title>
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
}

#pole
{
text-align:center;
}

#dolny_panel
{
	text-align: left;
	font-size: 20px;
}

</style>
<body style = "background-color:#f0f0f0";>

<div id = "pole">
<h1>Wpisz numer seryjny robota:</h1>
<form action="zakladki.php" method="post">  
      <input type="text" name="nr_s" /> 
      <br/> 
      <button type="submit">Zatwierdź</button>
</form>
<h4>	
<div id ="dolny_panel">
<a href = "nowyrobot.php">Dodaj nowego robota</a>


<?php
echo "<p>Jesteś zalogowany jako: ".$_SESSION['user'];
echo '<br/><br/> <a href="opcjekonta.php">Opcje konta</a></p>';
echo '<br/><br/> <a href="paneladministratora.php">Panel administratora</a></p>';
echo '<br/><br/> <a href="logout.php">Wyloguj się</a></p>';
?>
</h4>
</div>

</div>
</body>

</html>

