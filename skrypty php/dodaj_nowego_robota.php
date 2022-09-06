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

<!DOCTYPE HTML>
<html>

<head>

<title> Dodawanie nowego robota </title>

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

<body style = "background-color: #f0f0f0";>
<?php

require_once "connect2.php";
$nr_s=$_POST['nr_s'];
$kto_uzywa=$_POST['kto_uzywa'];
$typ=$_POST['typ'];
$seria=$_POST['seria'];
$moc=$_POST['moc'];
$masa=$_POST['masa'];
$obciazenie=$_POST['obciazenie'];
$rok=$_POST['rok'];
$conn = new mysqli($host, $db_user, $db_password, $db_name);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$wynik = $conn->query("SELECT * FROM roboty WHERE numer_seryjny ='$nr_s'");
$a = $wynik->num_rows;
if($a>0)
{
	header('Location: nowyrobot2.php');
	exit();
}

$sql = "INSERT INTO roboty (numer_seryjny,kto_uzywa,typ,seria,moc_nominalna,calkowita_masa_robota,maksymalne_obciazenie,rok_produkcji)
VALUES ('$nr_s','$kto_uzywa','$typ','$seria','$moc','$masa','$obciazenie','$rok')";

$conn->query($sql) ;
	//$conn->query();
	
	$rezultat2 = $conn->query("SELECT id FROM roboty WHERE numer_seryjny ='$nr_s'");
				$wiersz2 = $rezultat2->fetch_assoc();
				$x = $wiersz2['id'];
				//$rezultat = $conn->query("SELECT * FROM roboty_elektronika WHERE id ='$x'");
				//$wiersz = $rezultat->fetch_assoc();
	
	$conn->query("INSERT INTO roboty_mechanika (id, model_przekladnia, nr_seryjny_przekladnia, uwagi_przekladnia, model_trzpienie, nr_seryjny_trzpienie, uwagi_trzpienie, model_ladowarka_stykowa, nr_seryjny_ladowarka_stykowa, uwagi_ladowarka_stykowa) VALUES ('$x','-', '-', '-', '-', '-', '-', '-', '-', '-')");
	
	$conn->query("INSERT INTO roboty_elektronika (id, model_naped, nr_seryjny_naped, uwagi_naped, model_sterownik_silnika, nr_seryjny_sterownik_silnika, uwagi_sterownik_silnika, model_sterownik_agv, nr_seryjny_sterownik_agv, uwagi_sterownik_agv, model_plyta_mocy, nr_seryjny_plyta_mocy, uwagi_plyta_mocy, model_sterownik_bezpieczenstwa, nr_seryjny_sterownik_bezpieczenstwa, uwagi_sterownik_bezpieczenstwa, model_skanery_bezpieczenstwa, nr_seryjny_skanery_bezpieczenstwa, uwagi_skanery_bezpieczenstwa, model_panel_przod, nr_seryjny_panel_przod, uwagi_panel_przod, model_panel_tyl, nr_seryjny_panel_tyl, uwagi_panel_tyl, model_router_wifi, nr_seryjny_router_wifi, uwagi_router_wifi, model_switch_ethernet, nr_seryjny_switch_ethernet, uwagi_switch_ethernet, model_czujnik_linii, nr_seryjny_czujnik_linii, uwagi_czujnik_linii, model_czytnik_rfid, nr_seryjny_czytnik_rfid, uwagi_czytnik_rfid, model_modul_komunikacji_radiowej, nr_seryjny_modul_komunikacji_radiowej, uwagi_modul_komunikacji_radiowej, model_nawigacja_lms, nr_seryjny_nawigacja_lms, uwagi_nawigacja_lms, model_glosniki, nr_seryjny_glosniki, uwagi_glosniki, model_kierunkowskazy, nr_seryjny_kierunkowskazy, uwagi_kierunkowskazy, model_zamontowane_bezpieczniki, nr_seryjny_zamontowane_bezpieczniki, uwagi_zamontowane_bezpieczniki, model_akumulatory, nr_seryjny_akumulatory, uwagi_akumulatory, model_stycznik_zlacza_io, nr_seryjny_stycznik_zlacza_io, uwagi_stycznik_zlacza_io, model_stycznik_napedu, nr_seryjny_stycznik_napedu, uwagi_stycznik_napedu, model_styk_pomocniczy, nr_seryjny_styk_pomocniczy, uwagi_styk_pomocniczy, model_wylacznik_nadpradowy, nr_seryjny_wylacznik_nadpradowy, uwagi_wylacznik_nadpradowy, model_rezystor, nr_seryjny_rezystor, uwagi_rezystor, model_przetwornica_stabilizujaca, nr_seryjny_przetwornica_stabilizujaca, uwagi_przetwornica_stabilizujaca, model_zabezpieczenie_akumulatorow, nr_seryjny_zabezpieczenie_akumulatorow, uwagi_zabezpieczenie_akumulatorow) VALUES ('$x', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-')");
	
	$conn->query("INSERT INTO roboty_oprogramowanie (id, typ_naped, wersja_programu_naped, data_programu_naped, typ_sterownik_silnika, wersja_programu_sterownik_silnika, data_programu_sterownik_silnika, typ_sterownik_agv, wersja_programu_sterownik_agv, data_programu_sterownik_agv, typ_plyta_mocy, wersja_programu_plyta_mocy, data_programu_plyta_mocy, typ_sterownik_bezpieczenstwa, wersja_programu_sterownik_bezpieczenstwa, data_programu_sterownik_bezpieczenstwa, typ_skanery_bezpieczenstwa, wersja_programu_skanery_bezpieczenstwa, data_programu_skanery_bezpieczenstwa, typ_panel_przod, wersja_programu_panel_przod, data_programu_panel_przod, typ_panel_tyl, wersja_programu_panel_tyl, data_programu_panel_tyl, typ_router_wifi, wersja_programu_router_wifi, data_programu_router_wifi, typ_switch_ethernet, wersja_programu_switch_ethernet, data_programu_switch_ethernet, typ_czujnik_linii, wersja_programu_czujnik_linii, data_programu_czujnik_linii, typ_czytnik_rfid, wersja_programu_czytnik_rfid, data_programu_czytnik_rfid, typ_modul_komunikacji_radiowej, wersja_programu_modul_komunikacji_radiowej, data_programu_modul_komunikacji_radiowej, typ_nawigacja_lms, wersja_programu_nawigacja_lms, data_programu_nawigacja_lms, typ_glosniki, wersja_programu_glosniki, data_programu_glosniki, typ_kierunkowskazy, wersja_programu_kierunkowskazy, data_programu_kierunkowskazy, typ_zamontowane_bezpieczniki, wersja_programu_zamontowane_bezpieczniki, data_programu_zamontowane_bezpieczniki, typ_akumulatory, wersja_programu_akumulatory, data_programu_akumulatory, typ_stycznik_zlacza_io, wersja_programu_stycznik_zlacza_io, data_programu_stycznik_zlacza_io, typ_stycznik_napedu, wersja_programu_stycznik_napedu, data_programu_stycznik_napedu, typ_styk_pomocniczy, wersja_programu_styk_pomocniczy, data_programu_styk_pomocniczy, typ_wylacznik_nadpradowy, wersja_programu_wylacznik_nadpradowy, data_programu_wylacznik_nadpradowy, typ_rezystor, wersja_programu_rezystor, data_programu_rezystor, typ_przetwornica_stabilizujaca, wersja_programu_przetwornica_stabilizujaca, data_programu_przetwornica_stabilizujaca, typ_zabezpieczenie_akumulatorow, wersja_programu_zabezpieczenie_akumulatorow, data_programu_zabezpieczenie_akumulatorow) VALUES ('$x', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-')");
	
 
  echo "Dodano nowego robota do bazy danych<br/>";
  echo "<br/><a href = nrseryjny.php Powrót </a>";
		

$conn->close();
?>
<br/><a href = "nrseryjny.php"> Powrót </a>
</body>

</html>