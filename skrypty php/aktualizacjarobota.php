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
			    if ($wiersz['Modyfikacja']=="NIE")
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
<title> Aktualizacja robota </title>
<style>
#pole
{
text-align: center;	
}
</style>
</head>
<div id = "pole">
<h2>Aktualizujesz dane robota o numerze:</h2>
<body style = "background-color:#f0f0f0">
<?php 
echo "<b>".$_SESSION['Numer_seryjny']."</b>";
?>

<h3>Mechanika:</h3>

<form action="aktualizacjarobota2.php" method="post">
    <p><b>Przekładnia</b></p>
    <p>Model:</p>
	<input type="text" name="model_przekladnia">
	<p>Numer seryjny:</p>
	<input type="text" name="nr_seryjny_przekladnia">
	<p>Uwagi:</p>
	<input type="text" name="uwagi_przekladnia">
	<p><b>Trzpienie</b></p>
    <p>Model:</p>
	<input type="text" name="model_trzpienie">
	<p>Numer seryjny:</p>
	<input type="text" name="nr_seryjny_trzpienie">
	<p>Uwagi:</p>
	<input type="text" name="uwagi_trzpienie">
	<p><b>Ładowarka stykowa</b></p>
    <p>Model:</p>
	<input type="text" name="model_ladowarka_stykowa">
	<p>Numer seryjny:</p>
	<input type="text" name="nr_seryjny_ladowarka_stykowa">
	<p>Uwagi:</p>
	<input type="text" name="uwagi_ladowarka_stykowa">


<h3>Elektronika:</h3>
<p><b>Napęd</b></p>
    <p>Model:</p>
	<input type="text" name="model_naped">
	<p>Numer seryjny:</p>
	<input type="text" name="nr_seryjny_naped">
	<p>Uwagi:</p>
	<input type="text" name="uwagi_naped">
	<p><b>Sterownik silnika</b></p>
    <p>Model:</p>
	<input type="text" name="model_sterownik_silnika">
	<p>Numer seryjny:</p>
	<input type="text" name="nr_seryjny_sterownik_silnika">
	<p>Uwagi:</p>
	<input type="text" name="uwagi_sterownik_silnika">
	<p><b>Sterownik AGV-MB</b></p>
    <p>Model:</p>
	<input type="text" name="model_sterownik_agv">
	<p>Numer seryjny:</p>
	<input type="text" name="nr_seryjny_sterownik_agv">
	<p>Uwagi:</p>
	<input type="text" name="uwagi_sterownik_agv">
	<p><b>Płyta mocy</b></p>
    <p>Model:</p>
	<input type="text" name="model_plyta_mocy">
	<p>Numer seryjny:</p>
	<input type="text" name="nr_seryjny_plyta_mocy">
	<p>Uwagi:</p>
	<input type="text" name="uwagi_plyta_mocy">
	<p><b>Sterownik bezpieczeństwa</b></p>
    <p>Model:</p>
	<input type="text" name="model_sterownik_bezpieczenstwa">
	<p>Numer seryjny:</p>
	<input type="text" name="nr_seryjny_sterownik_bezpieczenstwa">
	<p>Uwagi:</p>
	<input type="text" name="uwagi_sterownik_bezpieczenstwa">
	<p><b>Skanery bezpieczeństwa</b></p>
    <p>Model:</p>
	<input type="text" name="model_skanery_bezpieczenstwa">
	<p>Numer seryjny:</p>
	<input type="text" name="nr_seryjny_skanery_bezpieczenstwa">
	<p>Uwagi:</p>
	<input type="text" name="uwagi_skanery_bezpieczenstwa">
	<p><b>Panel przód</b></p>
    <p>Model:</p>
	<input type="text" name="model_panel_przod">
	<p>Numer seryjny:</p>
	<input type="text" name="nr_seryjny_panel_przod">
	<p>Uwagi:</p>
	<input type="text" name="uwagi_panel_przod">
	<p><b>Panel tył</b></p>
    <p>Model:</p>
	<input type="text" name="model_panel_tyl">
	<p>Numer seryjny:</p>
	<input type="text" name="nr_seryjny_panel_tyl">
	<p>Uwagi:</p>
	<input type="text" name="uwagi_panel_tyl">
	<p><b>Router WiFi</b></p>
    <p>Model:</p>
	<input type="text" name="model_router_wifi">
	<p>Numer seryjny:</p>
	<input type="text" name="nr_seryjny_router_wifi">
	<p>Uwagi:</p>
	<input type="text" name="uwagi_router_wifi">
	<p><b>Switch Ethernet</b></p>
    <p>Model:</p>
	<input type="text" name="model_switch_ethernet">
	<p>Numer seryjny:</p>
	<input type="text" name="nr_seryjny_switch_ethernet">
	<p>Uwagi:</p>
	<input type="text" name="uwagi_switch_ethernet">
	<p><b>Czujnik linii</b></p>
    <p>Model:</p>
	<input type="text" name="model_czujnik_linii">
	<p>Numer seryjny:</p>
	<input type="text" name="nr_seryjny_czujnik_linii">
	<p>Uwagi:</p>
	<input type="text" name="uwagi_czujnik_linii">
	<p><b>Czytnik RFID</b></p>
    <p>Model:</p>
	<input type="text" name="model_czytnik_rfid">
	<p>Numer seryjny:</p>
	<input type="text" name="nr_seryjny_czytnik_rfid">
	<p>Uwagi:</p>
	<input type="text" name="uwagi_czytnik_rfid">
	<p><b>Moduł komunikacji radiowej</b></p>
    <p>Model:</p>
	<input type="text" name="model_modul_komunikacji_radiowej">
	<p>Numer seryjny:</p>
	<input type="text" name="nr_seryjny_modul_komunikacji_radiowej">
	<p>Uwagi:</p>
	<input type="text" name="uwagi_modul_komunikacji_radiowej">
	<p><b>Nawigacja LMS</b></p>
    <p>Model:</p>
	<input type="text" name="model_nawigacja_lms">
	<p>Numer seryjny:</p>
	<input type="text" name="nr_seryjny_nawigacja_lms">
	<p>Uwagi:</p>
	<input type="text" name="uwagi_nawigacja_lms">
	<p><b>Głośniki</b></p>
    <p>Model:</p>
	<input type="text" name="model_glosniki">
	<p>Numer seryjny:</p>
	<input type="text" name="nr_seryjny_glosniki">
	<p>Uwagi:</p>
	<input type="text" name="uwagi_glosniki">
	<p><b>Kierunkowskazy</b></p>
    <p>Model:</p>
	<input type="text" name="model_kierunkowskazy">
	<p>Numer seryjny:</p>
	<input type="text" name="nr_seryjny_kierunkowskazy">
	<p>Uwagi:</p>
	<input type="text" name="uwagi_kierunkowskazy">
	<p><b>Zamontowane bezpieczniki</b></p>
    <p>Model:</p>
	<input type="text" name="model_zamontowane_bezpieczniki">
	<p>Numer seryjny:</p>
	<input type="text" name="nr_seryjny_zamontowane_bezpieczniki">
	<p>Uwagi:</p>
	<input type="text" name="uwagi_zamontowane_bezpieczniki">
	<p><b>Akumulatory</b></p>
    <p>Model:</p>
	<input type="text" name="model_akumulatory">
	<p>Numer seryjny:</p>
	<input type="text" name="nr_seryjny_akumulatory">
	<p>Uwagi:</p>
	<input type="text" name="uwagi_akumulatory">
	<p><b>Stycznik złącza I/O</b></p>
    <p>Model:</p>
	<input type="text" name="model_stycznik_zlacza_io">
	<p>Numer seryjny:</p>
	<input type="text" name="nr_seryjny_stycznik_zlacza_io">
	<p>Uwagi:</p>
	<input type="text" name="uwagi_stycznik_zlacza_io">
	<p><b>Stycznik napędu</b></p>
    <p>Model:</p>
	<input type="text" name="model_stycznik_napedu">
	<p>Numer seryjny:</p>
	<input type="text" name="nr_seryjny_stycznik_napedu">
	<p>Uwagi:</p>
	<input type="text" name="uwagi_stycznik_napedu">
	<p><b>Styk pomocniczy</b></p>
    <p>Model:</p>
	<input type="text" name="model_styk_pomocniczy">
	<p>Numer seryjny:</p>
	<input type="text" name="nr_seryjny_styk_pomocniczy">
	<p>Uwagi:</p>
	<input type="text" name="uwagi_styk_pomocniczy">
	<p><b>Wyłącznik nadprądowy</b></p>
    <p>Model:</p>
	<input type="text" name="model_wylacznik_nadpradowy">
	<p>Numer seryjny:</p>
	<input type="text" name="nr_seryjny_wylacznik_nadpradowy">
	<p>Uwagi:</p>
	<input type="text" name="uwagi_wylacznik_nadpradowy">
	<p><b>Rezystor</b></p>
    <p>Model:</p>
	<input type="text" name="model_rezystor">
	<p>Numer seryjny:</p>
	<input type="text" name="nr_seryjny_rezystor">
	<p>Uwagi:</p>
	<input type="text" name="uwagi_rezystor">
	<p><b>Przetwornica stabilizująca</b></p>
    <p>Model:</p>
	<input type="text" name="model_przetwornica_stabilizujaca">
	<p>Numer seryjny:</p>
	<input type="text" name="nr_seryjny_przetwornica_stabilizujaca">
	<p>Uwagi:</p>
	<input type="text" name="uwagi_przetwornica_stabilizujaca">
	<p><b>Zabezpieczenie akumulatorów</b></p>
    <p>Model:</p>
	<input type="text" name="model_zabezpieczenie_akumulatorow">
	<p>Numer seryjny:</p>
	<input type="text" name="nr_seryjny_zabezpieczenie_akumulatorow">
	<p>Uwagi:</p>
	<input type="text" name="uwagi_zabezpieczenie_akumulatorow">
	<br/>
	
	
	
	
	<h3>Oprogramowanie:</h3>
<p><b>Napęd</b></p>
    <p>Typ:</p>
	<input type="text" name="typ_naped">
	<p>Wersja programu:</p>
	<input type="text" name="wersja_programu_naped">
	<p>Data programu:</p>
	<input type="text" name="data_programu_naped">
	<p><b>Sterownik silnika</b></p>
    <p>Typ:</p>
	<input type="text" name="typ_sterownik_silnika">
	<p>Wersja programu:</p>
	<input type="text" name="wersja_programu_sterownik_silnika">
	<p>Data programu:</p>
	<input type="text" name="data_programu_sterownik_silnika">
	<p><b>Sterownik AGV-MB</b></p>
    <p>Typ:</p>
	<input type="text" name="typ_sterownik_agv">
	<p>Wersja programu:</p>
	<input type="text" name="wersja_programu_sterownik_agv">
	<p>Data programu:</p>
	<input type="text" name="data_programu_sterownik_agv">
	<p><b>Płyta mocy</b></p>
    <p>Typ:</p>
	<input type="text" name="typ_plyta_mocy">
	<p>Wersja programu:</p>
	<input type="text" name="wersja_programu_plyta_mocy">
	<p>Data programu:</p>
	<input type="text" name="data_programu_plyta_mocy">
	<p><b>Sterownik bezpieczeństwa</b></p>
    <p>Typ:</p>
	<input type="text" name="typ_sterownik_bezpieczenstwa">
	<p>Wersja programu:</p>
	<input type="text" name="wersja_programu_sterownik_bezpieczenstwa">
	<p>Data programu:</p>
	<input type="text" name="data_programu_sterownik_bezpieczenstwa">
	<p><b>Skanery bezpieczeństwa</b></p>
    <p>Typ:</p>
	<input type="text" name="typ_skanery_bezpieczenstwa">
	<p>Wersja programu:</p>
	<input type="text" name="wersja_programu_skanery_bezpieczenstwa">
	<p>Data programu:</p>
	<input type="text" name="data_programu_skanery_bezpieczenstwa">
	<p><b>Panel przód</b></p>
    <p>Typ:</p>
	<input type="text" name="typ_panel_przod">
	<p>Wersja programu:</p>
	<input type="text" name="wersja_programu_panel_przod">
	<p>Data programu:</p>
	<input type="text" name="data_programu_panel_przod">
	<p><b>Panel tył</b></p>
    <p>Typ:</p>
	<input type="text" name="typ_panel_tyl">
	<p>Wersja programu:</p>
	<input type="text" name="wersja_programu_panel_tyl">
	<p>Data programu:</p>
	<input type="text" name="data_programu_panel_tyl">
	<p><b>Router WiFi</b></p>
    <p>Typ:</p>
	<input type="text" name="typ_router_wifi">
	<p>Wersja programu:</p>
	<input type="text" name="wersja_programu_router_wifi">
	<p>Data programu:</p>
	<input type="text" name="data_programu_router_wifi">
	<p><b>Switch Ethernet</b></p>
    <p>Typ:</p>
	<input type="text" name="typ_switch_ethernet">
	<p>Wersja programu:</p>
	<input type="text" name="wersja_programu_switch_ethernet">
	<p>Data programu:</p>
	<input type="text" name="data_programu_switch_ethernet">
	<p><b>Czujnik linii</b></p>
    <p>Typ:</p>
	<input type="text" name="typ_czujnik_linii">
	<p>Wersja programu:</p>
	<input type="text" name="wersja_programu_czujnik_linii">
	<p>Data programu:</p>
	<input type="text" name="data_programu_czujnik_linii">
	<p><b>Czytnik RFID</b></p>
    <p>Typ:</p>
	<input type="text" name="typ_czytnik_rfid">
	<p>Wersja programu:</p>
	<input type="text" name="wersja_programu_czytnik_rfid">
	<p>Data programu:</p>
	<input type="text" name="data_programu_czytnik_rfid">
	<p><b>Moduł komunikacji radiowej</b></p>
    <p>Typ:</p>
	<input type="text" name="typ_modul_komunikacji_radiowej">
	<p>Wersja programu:</p>
	<input type="text" name="wersja_programu_modul_komunikacji_radiowej">
	<p>Data programu:</p>
	<input type="text" name="data_programu_modul_komunikacji_radiowej">
	<p><b>Nawigacja LMS</b></p>
    <p>Typ:</p>
	<input type="text" name="typ_nawigacja_lms">
	<p>Wersja programu:</p>
	<input type="text" name="wersja_programu_nawigacja_lms">
	<p>Data programu:</p>
	<input type="text" name="data_programu_nawigacja_lms">
	<p><b>Głośniki</b></p>
    <p>Typ:</p>
	<input type="text" name="typ_glosniki">
	<p>Wersja programu:</p>
	<input type="text" name="wersja_programu_glosniki">
	<p>Data programu:</p>
	<input type="text" name="data_programu_glosniki">
	<p><b>Kierunkowskazy</b></p>
    <p>Typ:</p>
	<input type="text" name="typ_kierunkowskazy">
	<p>Wersja programu:</p>
	<input type="text" name="wersja_programu_kierunkowskazy">
	<p>Data programu:</p>
	<input type="text" name="data_programu_kierunkowskazy">
	<p><b>Zamontowane bezpieczniki</b></p>
    <p>Typ:</p>
	<input type="text" name="typ_zamontowane_bezpieczniki">
	<p>Wersja programu:</p>
	<input type="text" name="wersja_programu_zamontowane_bezpieczniki">
	<p>Data programu:</p>
	<input type="text" name="data_programu_zamontowane_bezpieczniki">
	<p><b>Akumulatory</b></p>
    <p>Typ:</p>
	<input type="text" name="typ_akumulatory">
	<p>Wersja programu:</p>
	<input type="text" name="wersja_programu_akumulatory">
	<p>Data programu:</p>
	<input type="text" name="data_programu_akumulatory">
	<p><b>Stycznik złącza I/O</b></p>
    <p>Typ:</p>
	<input type="text" name="typ_stycznik_zlacza_io">
	<p>Wersja programu:</p>
	<input type="text" name="wersja_programu_stycznik_zlacza_io">
	<p>Data programu:</p>
	<input type="text" name="data_programu_stycznik_zlacza_io">
	<p><b>Stycznik napędu</b></p>
    <p>Typ:</p>
	<input type="text" name="typ_stycznik_napedu">
	<p>Wersja programu:</p>
	<input type="text" name="wersja_programu_stycznik_napedu">
	<p>Data programu:</p>
	<input type="text" name="data_programu_stycznik_napedu">
	<p><b>Styk pomocniczy</b></p>
    <p>Typ:</p>
	<input type="text" name="typ_styk_pomocniczy">
	<p>Wersja programu:</p>
	<input type="text" name="wersja_programu_styk_pomocniczy">
	<p>Data programu:</p>
	<input type="text" name="data_programu_styk_pomocniczy">
	<p><b>Wyłącznik nadprądowy</b></p>
    <p>Typ:</p>
	<input type="text" name="typ_wylacznik_nadpradowy">
	<p>Wersja programu:</p>
	<input type="text" name="wersja_programu_wylacznik_nadpradowy">
	<p>Data programu:</p>
	<input type="text" name="data_programu_wylacznik_nadpradowy">
	<p><b>Rezystor</b></p>
    <p>Typ:</p>
	<input type="text" name="typ_rezystor">
	<p>Wersja programu:</p>
	<input type="text" name="wersja_programu_rezystor">
	<p>Data programu:</p>
	<input type="text" name="data_programu_rezystor">
	<p><b>Przetwornica stabilizująca</b></p>
    <p>Typ:</p>
	<input type="text" name="typ_przetwornica_stabilizujaca">
	<p>Wersja programu:</p>
	<input type="text" name="wersja_programu_przetwornica_stabilizujaca">
	<p>Data programu:</p>
	<input type="text" name="data_programu_przetwornica_stabilizujaca">
	<p><b>Zabezpieczenie akumulatorów</b></p>
    <p>Typ:</p>
	<input type="text" name="typ_zabezpieczenie_akumulatorow">
	<p>Wersja programu:</p>
	<input type="text" name="wersja_programu_zabezpieczenie_akumulatorow">
	<p>Data programu:</p>
	<input type="text" name="data_programu_zabezpieczenie_akumulatorow">
	<br/>
    <input type="submit" value="Zatwierdź" />
</form>
</div>
</body>
</html>