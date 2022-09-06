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
<title> Oprogramowanie </title>
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

table
{
	min-height: 300px;
	min-width:1000px;
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

<h1>Oprogramowanie: </h1>
<?php 
            require_once "connect2.php";
			$nr_robota = $_SESSION['Numer_seryjny'];
			$polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
				$rezultat2 = $polaczenie->query("SELECT id FROM roboty WHERE numer_seryjny ='$nr_robota'");
				$wiersz2 = $rezultat2->fetch_assoc();
				$x = $wiersz2['id'];
				$rezultat = $polaczenie->query("SELECT * FROM roboty_oprogramowanie WHERE id ='$x'");
				$wiersz = $rezultat->fetch_assoc();
				
				if (!$rezultat) throw new Exception($polaczenie->error);
				echo "<table><tr><td><b>Komponent</b></td><td><b>Typ</b></td><td><b>Wersja programu</b></td><td><b>Data programu</b></td><td>Załącznik</td></tr><tr><td> <b>Napęd</b> </td><td>".@$wiersz['typ_naped']."</td><td>".@$wiersz['wersja_programu_naped']."</td><td>".@$wiersz['data_programu_naped']."</td><td>".@$wiersz['zalacznik_naped']."</td></tr><tr><td> <b>Sterownik silnika</b> </td>"."<td>".@$wiersz['typ_sterownik_silnika']."</td><td>".@$wiersz['wersja_programu_sterownik_silnika']."</td><td>".@$wiersz['data_programu_sterownik_silnika']."</td><td>".@$wiersz['zalacznik_sterownik_silnika']."</td></tr><tr><td> <b>Sterownik AGV-MB</b> </td><td>".@$wiersz['typ_sterownik_agv']."</td><td>".@$wiersz['wersja_programu_sterownik_agv']."</td><td>".@$wiersz['data_programu_sterownik_agv']."</td><td>".@$wiersz['zalacznik_sterownik_agv']."</td></tr><tr><td> <b>Płyta mocy</b> </td><td>".@$wiersz['typ_plyta_mocy']."</td><td>".@$wiersz['wersja_programu_plyta_mocy']."</td><td>".@$wiersz['data_programu_plyta_mocy']."</td><td>".@$wiersz['zalacznik_plyta_mocy']."</td></tr><tr><td> <b>Sterownik bezpieczeństwa</b> </td><td>".@$wiersz['typ_sterownik_bezpieczenstwa']."</td><td>".@$wiersz['wersja_programu_sterownik_bezpieczenstwa']."</td><td>".@$wiersz['data_programu_sterownik_bezpieczenstwa']."</td><td>".@$wiersz['zalacznik_sterownik_bezpieczenstwa']."</td></tr><tr><td> <b>Skanery bezpieczeństwa</b> </td><td>".@$wiersz['typ_skanery_bezpieczenstwa']."</td><td>".@$wiersz['wersja_programu_skanery_bezpieczenstwa']."</td><td>".@$wiersz['data_programu_skanery_bezpieczenstwa']."</td><td>".@$wiersz['zalacznik_skanery_bezpieczenstwa']."</td></tr><tr><td> <b>Panel przód</b> </td><td>".@$wiersz['typ_panel_przod']."</td><td>".@$wiersz['wersja_programu_panel_przod']."</td><td>".@$wiersz['data_programu_panel_przod']."</td><td>".@$wiersz['zalacznik_panel_przod']."</td></tr><tr><td> <b>Panel tył</b> </td><td>".@$wiersz['typ_panel_tyl']."</td><td>".@$wiersz['wersja_programu_panel_tyl']."</td><td>".@$wiersz['data_programu_panel_tyl']."</td><td>".@$wiersz['zalacznik_panel_tyl']."</td></tr><tr><td> <b>Router WiFi</b> </td><td>".@$wiersz['typ_router_wifi']."</td><td>".@$wiersz['wersja_programu_router_wifi']."</td><td>".@$wiersz['data_programu_router_wifi']."</td><td>".@$wiersz['zalacznik_router_wifi']."</td></tr><tr><td> <b>Switch Ethernet</b> </td><td>".@$wiersz['typ_switch_ethernet']."</td><td>".@$wiersz['wersja_programu_switch_ethernet']."</td><td>".@$wiersz['data_programu_switch_ethernet']."</td><td>".@$wiersz['zalacznik_switch_ethernet']."</td></tr><tr><td> <b>Czujnik linii</b> </td><td>".@$wiersz['typ_czujnik_linii']."</td><td>".@$wiersz['wersja_programu_czujnik_linii']."</td><td>".@$wiersz['data_programu_czujnik_linii']."</td><td>".@$wiersz['zalacznik_czujnik_linii']."</td></tr><tr><td> <b>Czytnik RFID</b> </td><td>".@$wiersz['typ_czytnik_rfid']."</td><td>".@$wiersz['wersja_programu_czytnik_rfid']."</td><td>".@$wiersz['data_programu_czytnik_rfid']."</td><td>".@$wiersz['zalacznik_czytnik_rfid']."</td></tr><tr><td> <b>Moduł komunikacji radiowej</b> </td><td>".@$wiersz['typ_modul_komunikacji_radiowej']."</td><td>".@$wiersz['wersja_programu_modul_komunikacji_radiowej']."</td><td>".@$wiersz['data_programu_modul_komunikacji_radiowej']."</td><td>".@$wiersz['zalacznik_modul_komunikacji_radiowej']."</td></tr><tr><td> <b>Nawigacja LMS</b> </td><td>".@$wiersz['typ_nawigacja_lms']."</td><td>".@$wiersz['wersja_programu_nawigacja_lms']."</td><td>".@$wiersz['data_programu_nawigacja_lms']."</td><td>".@$wiersz['zalacznik_nawigacja_lms']."</td></tr><tr><td> <b>Głośniki</b> </td><td>".@$wiersz['typ_glosniki']."</td><td>".@$wiersz['wersja_programu_glosniki']."</td><td>".@$wiersz['data_programu_glosniki']."</td><td>".@$wiersz['zalacznik_glosniki']."</td></tr><tr><td> <b>Kierunkowskazy</b> </td><td>".@$wiersz['typ_kierunkowskazy']."</td><td>".@$wiersz['wersja_programu_kierunkowskazy']."</td><td>".@$wiersz['data_programu_kierunkowskazy']."</td><td>".@$wiersz['zalacznik_kierunkowskazy']."</td></tr><tr><td> <b>Zamontowane bezpieczniki</b> </td><td>".@$wiersz['typ_zamontowane_bezpieczniki']."</td><td>".@$wiersz['wersja_programu_zamontowane_bezpieczniki']."</td><td>".@$wiersz['data_programu_zamontowane_bezpieczniki']."</td><td>".@$wiersz['zalaczniki_zamontowane_bezpieczniki']."</td></tr><tr><td> <b>Akumulatory</b> </td><td>".@$wiersz['typ_akumulatory']."</td><td>".@$wiersz['wersja_programu_akumulatory']."</td><td>".@$wiersz['data_programu_akumulatory']."</td><td>".@$wiersz['zalacznik_akumulatory']."</td></tr><tr><td> <b>Stycznik złącza I/O</b> </td><td>".@$wiersz['typ_stycznik_zlacza_io']."</td><td>".@$wiersz['wersja_programu_stycznik_zlacza_io']."</td><td>".@$wiersz['data_programu_stycznik_zlacza_io']."</td><td>".@$wiersz['zalacznik_stycznik_zlacza_io']."</td></tr><tr><td> <b>Stycznik napędu</b> </td><td>".@$wiersz['typ_stycznik_napedu']."</td><td>".@$wiersz['wersja_programu_stycznik_napedu']."</td><td>".@$wiersz['data_programu_stycznik_napedu']."</td><td>".@$wiersz['zalacznik_stycznik_napedu']."</td></tr><tr><td> <b>Styk pomocniczy</b> </td><td>".@$wiersz['typ_styk_pomocniczy']."</td><td>".@$wiersz['wersja_programu_styk_pomocniczy']."</td><td>".@$wiersz['data_programu_styk_pomocniczy']."</td><td>".@$wiersz['zalacznik_styk_pomocniczy']."</td></tr><tr><td> <b> Wyłącznik nadprądowy</b> </td><td>".@$wiersz['typ_wylacznik_nadpradowy']."</td><td>".@$wiersz['wersja_programu_wylacznik_nadpradowy']."</td><td>".@$wiersz['data_programu_wylacznik_nadpradowy']."</td><td>".@$wiersz['zalacznik_wylacznik_nadpradowy']."</td></tr><tr><td> <b>Rezystor</b> </td><td>".@$wiersz['typ_rezystor']."</td><td>".@$wiersz['wersja_programu_rezystor']."</td><td>".@$wiersz['data_programu_rezystor']."</td><td>".@$wiersz['zalacznik_rezystor']."</td></tr><tr><td> <b>Przetwornica stabilizująca</b> </td><td>".@$wiersz['typ_przetwornica_stabilizujaca']."</td><td>".@$wiersz['wersja_programu_przetwornica_stabilizujaca']."</td><td>".@$wiersz['data_programu_przetwornica_stabilizujaca']."</td><td>".@$wiersz['zalacznik_przetwornica_stabilizujaca']."</td></tr><tr><td> <b>Zabezpieczenie akumulatorów</b> </td><td>".@$wiersz['typ_zabezpieczenie_akumulatorow']."</td><td>".@$wiersz['wersja_programu_zabezpieczenie_akumulatorow']."</td><td>".@$wiersz['data_programu_zabezpieczenie_akumulatorow']."</td><td>".@$wiersz['zalacznik_zabezpieczenie_akumulatorow']."</td></tr></table>";	
				
				$polaczenie->close();
?> 
</body>

</html>