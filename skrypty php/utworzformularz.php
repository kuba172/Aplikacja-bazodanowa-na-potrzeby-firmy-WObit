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
				$rezultat = $polaczenie->query("SELECT Modyfikacja FROM uzytkownicy WHERE user='$login'");
				$wiersz = $rezultat->fetch_assoc();
				if (!$rezultat) throw new Exception($polaczenie->error);
				
				//$wiersz = $rezultat->fetch_assoc();
			    if (@$wiersz['Modyfikacja']=="NIE")
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
<title> Formularz serwisowy </title>
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
<h1>Uzupełnij formularz:</h1>
<form action="utworzformularz2.php" method="post">
	  <h3>Zgłaszający serwis (nazwa firmy):</h3>
	  <input type="text" name="zglaszajacy_serwis" /> 
      <br/> 
	  <h3>Adres firmy:</h3>
	  <input type="text" name="adres_firmy" /> 
      <br/>
	  <h3>Osoba zgłaszająca potrzebę serwisu:</h3>
	  <input type="text" name="osoba_zglaszajaca" /> 
      <br/> 
	  <h3>Tel:</h3>
	  <input type="text" name="tel" /> 
      <br/> 
	  <h3>Przyjęcie zgłoszenia:</h3>
	  <input type="text" name="przyjecie_zgloszenia" /> 
      <br/> 
	  <h3>Serwisował:</h3>
	  <input type="text" name="serwisowal" /> 
      <br/> 
	  <h3>Rozpoczęcie serwisu:</h3>
	  <input type="text" name="rozpoczecie_serwisu" /> 
      <br/> 
	  <h3>Przyczyna serwisu podana przez zgłaszającego:</h3>
	  <input type="text" name="przyczyna" /> 
      <br/>
	  <h3>Sposób załatwienia sprawy:</h3>
	  <input type="text" name="sposob" /> 
      <br/> 
	  <h3>Zużyte materiały i części:</h3>
	  <input type="text" name="materialy" /> 
      <br/> 
	  <h3>Ilość roboczogodzin:</h3>
	  <input type="text" name="roboczogodziny" /> 
      <br/> 
	  <h3>Łączna liczba kilometrów: (dojazd i powrót)</h3>
	  <input type="text" name="km" /> 
      <br/> 
	  <h3>Łączny czas podróży:</h3>
	  <input type="text" name="czas" /> 
      <br/>
      <h3>Uwagi serwisanta/dalsze zalecenia:</h3>
	  <input type="text" name="uwagi" /> 
      <br/> 	  
	  
      <button type="submit">Zatwierdź</button>
 </form>



<div id ="dolny_panel">
<?php

echo '<br/><br/> <a href="Formularz serwisowy.php">Wróć do formularza</a></p>';

?>
</div>

</div>
</body>

</html>
