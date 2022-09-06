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
?>

<!DOCTYPE html>
<html lang="pl">

<head>
<meta charset = "utf-8">
<title> Mechanika </title>
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

 }

table
{
	min-height: 300px;
	min-width:800px;
	max-width:1200px;
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

<h1>Mechanika: </h1>
            <?php 

			$nr_robota = $_SESSION['Numer_seryjny'];
			$polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
				$rezultat2 = $polaczenie->query("SELECT id FROM roboty WHERE numer_seryjny ='$nr_robota'");
				$wiersz2 = $rezultat2->fetch_assoc();
				$x = $wiersz2['id'];
				$rezultat = $polaczenie->query("SELECT * FROM roboty_mechanika WHERE id ='$x'");
				$wiersz = $rezultat->fetch_assoc();
				
				if (!$rezultat) throw new Exception($polaczenie->error);
				echo "<table><tr><td><b>Komponent</b></td><td><b>Model</b></td><td><b>Nr seryjny</b></td><td><b>Uwagi</b></td></tr><tr><td> <b>Przekładnia</b> </td><td>".@$wiersz['model_przekladnia']."</td><td>".@$wiersz['nr_seryjny_przekladnia']."</td><td>".@$wiersz['uwagi_przekladnia']."</td></tr><tr><td> <b>Trzpienie</b> </td>"."<td>".@$wiersz['model_trzpienie']."</td><td>".@$wiersz['nr_seryjny_trzpienie']."</td><td>".@$wiersz['uwagi_trzpienie']."</td></tr>
				<tr><td> <b>Ładowarka stykowa</b> </td><td>".@$wiersz['model_ladowarka_stykowa']."</td><td>".@$wiersz['nr_seryjny_ladowarka_stykowa']."</td><td>".@$wiersz['uwagi_ladowarka_stykowa']."</td></tr></table>";
			
?> 
</body>
<?php
$polaczenie->close();
?>
</html>
