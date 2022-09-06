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
				$rezultat = $polaczenie->query("SELECT Odczyt FROM uzytkownicy WHERE user='$login'");
				$wiersz = $rezultat->fetch_assoc();
				if (!$rezultat) throw new Exception($polaczenie->error);
				
				//$wiersz = $rezultat->fetch_assoc();
			    if ($wiersz['Odczyt']=="NIE")
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




#Zakladki
{
font-size: 24px;
text-align:center;
background-color: #E0E0E0;
}

#lewy_panel
{
margin-top:10px;
float:left;
background-color: #E0E0E0;
width: 120px;
min-height: 620px;
padding: 10px;
}

td { border: 1px solid black;
min-width: 200px;
min-height: 100 px;
 }
 

table
{
	min-height: 300px;
	min-width:1000px;
}

#pole_tekstowe{
	min-height:200px;
}


</style>
<body style = "background-color:#f0f0f0";>



<div id = "Zakladki">

<a href="Mechanika.php" > <b>|&nbsp;&nbsp;Mechanika</b>&nbsp;&nbsp;|&nbsp;&nbsp; </a>
<a href="Elektronika.php" > <b>Elektronika</b>&nbsp;&nbsp;|&nbsp;&nbsp; </a>
<a href="Oprogramowanie.php" > <b>Oprogramowanie</b>&nbsp;&nbsp;|&nbsp;&nbsp; </a>
<a href="Formularz serwisowy.php" > <b>Formularz serwisowy</b>&nbsp;&nbsp;|&nbsp;&nbsp; </a>
<a href="Testy ab.php" > <b>Testy AB</b>&nbsp;&nbsp;|&nbsp;&nbsp; </a>
<a href="Lista kontrolna.php" > <b>Lista kontrolna</b>&nbsp;&nbsp;|&nbsp;&nbsp; </a>
<a href="Uwagi.php" > <b>Uwagi<b>&nbsp;&nbsp;|&nbsp;&nbsp; </a>

</div>

<div id = "lewy_panel">
<?php
echo "<p>Jesteś zalogowany jako: ".$_SESSION['user'];
echo '<br/><br/> <a href="opcjekonta.php">Opcje konta</a></p>';
echo '<br/><br/> <a href="paneladministratora.php">Panel administratora</a></p>';
?>
<br/>
<p> Numer seryjny robota: </p>
<?php     
echo $_SESSION['Numer_seryjny'];
?>
<br/>
<a href = "aktualizacjarobota.php"><p>Zaktualizuj dane</p></a>
<br/>
<a href = "nrseryjny.php"><p>Nowy numer<p></a>
<br />
<a href = "nowyrobot.php"><p>Dodaj nowego robota do bazy<p></a>
<br/>
<a href = "usunrobota.php"><p>Usuń robota z bazy danych<p></a>
<br/>
<?php
echo '<br/> <a href="logout.php">Wyloguj się</a></p>';
?>

</div>


<h1>Formularz serwisowy: </h1>
<?php
   require_once "connect2.php";
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
		        $nr_seryjny=$_SESSION['Numer_seryjny'];
				$rezultat = $polaczenie->query("SELECT * FROM roboty WHERE numer_seryjny='$nr_seryjny'");
				$wiersz = $rezultat->fetch_assoc();
				$x=$wiersz['id'];
				$rezultat2 = $polaczenie->query("SELECT * FROM roboty_formularz WHERE id='$x'");
				$wiersz2 = $rezultat2->fetch_assoc();
				if (!$rezultat) throw new Exception($polaczenie->error);


echo "<table>
<tr><td style = 'text-align:center' colspan='4' ><b>Zgłoszenie i protokół serwisowy</b></td></tr>
<tr><td>Zgłaszający serwis (nazwa firmy):</td><td>".@$wiersz2['zglaszajacy_serwis']."</td><td>Adres firmy:</td><td>".@$wiersz2['adres_firmy']."</td></tr>
<tr><td>Osoba zgłaszająca potrzebę serwisu:</td><td>".@$wiersz2['osoba_zglaszajaca']."</td><td>Tel:</td><td>".@$wiersz2['tel']."</td></tr>
<tr><td>Przyjęcie zgłoszenia:</td><td>".@$wiersz2['przyjecie_zgloszenia']."</td><td>Serwisował:</td><td>".@$wiersz2['serwisowal']."</td></tr>
<tr><td>Rozpoczęcie serwisu:</td><td colspan = '3'>".@$wiersz2['rozpoczecie_serwisu']."</td></tr>
<tr><td>Nazwa produktu, nr seryjny:</td><td colspan='3'>".@$wiersz['typ']." ".@$wiersz['seria']." ".@$wiersz['numer_seryjny']."</td></tr>
<tr><td>Przyczyna serwisu podana przez zgłaszającego:</td><td colspan='3'>".@$wiersz2['przyczyna']."</td></tr>
<tr><td style = 'text-align:center' colspan='4' ><b>Opis usługi serwisowej</b></td></tr>
<tr><td colspan='4' ><b>Sposób załatwienia sprawy</b></td></tr>
<tr><td colspan='4'><div id = 'pole_tekstowe'>".@$wiersz2['sposob_zalatwienia_sprawy']."</div></td></tr>
<tr><td colspan='4' ><b>Zużyte materiały i części</b></td></tr>
<tr><td colspan='4'><div id = 'pole_tekstowe'>".@$wiersz2['zuzyte_materialy']."</div></td></tr>
<tr><td>Ilość roboczogodzin:</td><td colspan='3'>".@$wiersz2['ilosc_roboczogodzin']."</td></tr>
<tr><td>Łączna liczba kilometrów: (dojazd i powrót)</td><td>".@$wiersz2['liczba_km']."</td><td>Łączny czas podróży: (dojazd i powrót):</td><td>".@$wiersz2['czas']."</td></tr>
<tr><td colspan='4' ><b>Uwagi serwisanta/dalsze zalecenia:</b></td></tr>
<tr><td colspan='4'><div id = 'pole_tekstowe'>".@$wiersz2['uwagi']."</div></td></tr>
</table>";
$polaczenie->close();
}
		}
catch(Exception $e)
		{
			echo '<span style="color:red;">Błąd serwera!</span>';
			echo '<br />Informacja developerska: '.$e;
		}
?>
<br/>
<form action = "utworzformularz.php" method="post">
<input type="submit" value="Uzupełnij formularz"/>
</form>

</body>


</html>