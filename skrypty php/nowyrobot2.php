<?php

	session_start();
	
	if (!isset($_SESSION['zalogowany']))
	{
		header('Location: index.php');
		exit();
	}
	
?>

<?php

        require_once "connect.php";
		mysqli_report(MYSQLI_REPORT_STRICT);
		
		try 
		{
			$polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
			if ($polaczenie->connect_errno!=0)
			{
				throw new Exception(mysqli_connect_errno());
			}
			else
			{	
		        $login=$_SESSION['user'];
				$rezultat = $polaczenie->query("SELECT Dodawanie FROM uzytkownicy WHERE user='$login'");
				$wiersz = $rezultat->fetch_assoc();
				if (!$rezultat) throw new Exception($polaczenie->error);
				
				//$wiersz = $rezultat->fetch_assoc();
			    if ($wiersz['Dodawanie']=="NIE")
				{
					header ('Location: ostrzezenie2.php');
					exit();
				}
					
			}	
				$polaczenie->close();
		}
			
		catch(Exception $e)
		{
			echo '<span style="color:red;">Błąd serwera!</span>';
			echo '<br />Informacja developerska: '.$e;
		}
?>


<!DOCTYPE html>
<html lang="pl">

<head>
<meta charset = "utf-8">
<title> Nowy robot </title>
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
	text-align: top-left;
	font-size: 20px;
}

</style>
<body style = "background-color:#f0f0f0";>

<div id = "pole">
<h1>Wpisz numer seryjny nowego robota:</h1>
<form action="dodaj_nowego_robota.php" method="post">
      <input type="text" name="nr_s" /> 
      <br/>
	  <h3>Kto używa robota:</h3>
	  <input type="text" name="kto_uzywa" /> 
      <br/> 
	  <h3>Typ:</h3>
	  <input type="text" name="typ" /> 
      <br/> 
	  <h3>Seria:</h3>
	  <input type="text" name="seria" /> 
      <br/> 
	  <h3>Moc nominalna:</h3>
	  <input type="text" name="moc" /> 
      <br/> 
	  <h3>Całkowita masa robota:</h3>
	  <input type="text" name="masa" /> 
      <br/> 
	  <h3>Maksymalne obciążenie:</h3>
	  <input type="text" name="obciazenie" /> 
      <br/> 
	  <h3>Rok produkcji:</h3>
	  <input type="text" name="rok" /> 
      <br/> 
      <button type="submit">Zatwierdź</button>
 </form>
<p>Istnieje już robot o takim numerze seryjnym w bazie danych!</p>


<div id ="dolny_panel">
<?php
echo "<p>Jesteś zalogowany jako: ".$_SESSION['user'];
echo '<br/><br/> <a href="nrseryjny.php">Wróć do strony głównej</a></p>';
echo '<br/><br/> <a href="logout.php">Wyloguj się</a></p>';
?>
</div>

</div>
</body>

</html>
