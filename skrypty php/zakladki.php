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

<?php  
require_once "connect2.php";
		mysqli_report(MYSQLI_REPORT_STRICT);
		
		try 
		{
			$numer_seryjny=$_POST['nr_s'];
			$polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
			if ($polaczenie->connect_errno!=0)
			{
				throw new Exception(mysqli_connect_errno());
			}
			else
			{	
				$rezultat = $polaczenie->query("SELECT numer_seryjny FROM roboty WHERE numer_seryjny ='$numer_seryjny'");
				$wiersz = $rezultat->fetch_assoc();
				if (!$rezultat) throw new Exception($polaczenie->error);
                $ile_robotow = $rezultat->num_rows;				
				
				if($ile_robotow==0)
				{
					header ('Location: nrseryjny3.php'); 
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
<title> Zakladki </title>
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
td { border: 1px solid black; }

table {min-width: 1000px;}

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
$numer_seryjny=$_POST['nr_s'];
if(strlen($numer_seryjny)==6)
{
	unset($_SESSION['blad']);
	$_SESSION['Numer_seryjny'] = $numer_seryjny;
	echo $_SESSION['Numer_seryjny'];
}	
else
{
		header('Location: nrseryjny2.php');
		exit();
}
	
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
<br/><br/><br/>
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
				if (!$rezultat) throw new Exception($polaczenie->error);
				
				//$wiersz = $rezultat->fetch_assoc();
			    
			
echo "<table><tr><td><h4>Kto używa robota:</h4><br/>".@$wiersz['kto_uzywa']."</td><td><h4>Moc nominalna:</h4><br/>".@$wiersz['moc_nominalna']."</td></tr><tr><td><h4>Typ:</h4><br/>".@$wiersz['typ']."</td><td><h4>Całkowita masa robota:</h4><br/>".@$wiersz['calkowita_masa_robota']."</td></tr><tr><td><h4>Seria:</h4><br/>".@$wiersz['seria']."</td><td><h4>Maksymalne obciążenie:</h4><br/>".@$wiersz['maksymalne_obciazenie']."</td></tr><tr><td><h4>Rok produkcji:</h4><br/>".@$wiersz['rok_produkcji']."</td><td></td></tr></table>";
$polaczenie->close();
}
		}
catch(Exception $e)
		{
			echo '<span style="color:red;">Błąd serwera!</span>';
			echo '<br />Informacja developerska: '.$e;
		}
?>
</body>
</html>