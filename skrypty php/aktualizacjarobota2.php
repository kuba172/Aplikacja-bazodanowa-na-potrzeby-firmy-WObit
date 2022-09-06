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

<?php
$model_przekladnia=$_POST['model_przekladnia'];
$nr_seryjny_przekladnia=$_POST['nr_seryjny_przekladnia'];
$uwagi_przekladnia=$_POST['uwagi_przekladnia'];
$model_trzpienie=$_POST['model_trzpienie'];
$nr_seryjny_trzpienie=$_POST['nr_seryjny_trzpienie'];
$uwagi_trzpienie=$_POST['uwagi_trzpienie'];
$model_ladowarka_stykowa=$_POST['model_ladowarka_stykowa'];
$nr_seryjny_ladowarka_stykowa=$_POST['nr_seryjny_ladowarka_stykowa'];
$uwagi_ladowarka_stykowa=$_POST['uwagi_ladowarka_stykowa'];

$model_naped=$_POST['model_naped'];
$nr_seryjny_naped=$_POST['nr_seryjny_naped'];
$uwagi_naped=$_POST['uwagi_naped'];
$model_sterownik_silnika=$_POST['model_sterownik_silnika'];
$nr_seryjny_sterownik_silnika=$_POST['nr_seryjny_sterownik_silnika'];
$uwagi_sterownik_silnika=$_POST['uwagi_sterownik_silnika'];
$model_sterownik_agv=$_POST['model_sterownik_agv'];
$nr_seryjny_sterownik_agv=$_POST['nr_seryjny_sterownik_agv'];
$uwagi_sterownik_agv=$_POST['uwagi_sterownik_agv'];
$model_plyta_mocy=$_POST['model_plyta_mocy'];
$nr_seryjny_plyta_mocy=$_POST['nr_seryjny_plyta_mocy'];
$uwagi_plyta_mocy=$_POST['uwagi_plyta_mocy'];
$model_sterownik_bezpieczenstwa=$_POST['model_sterownik_bezpieczenstwa'];
$nr_seryjny_sterownik_bezpieczenstwa=$_POST['nr_seryjny_sterownik_bezpieczenstwa'];
$uwagi_sterownik_bezpieczenstwa=$_POST['uwagi_sterownik_bezpieczenstwa'];
$model_skanery_bezpieczenstwa=$_POST['model_skanery_bezpieczenstwa'];
$nr_seryjny_skanery_bezpieczenstwa=$_POST['nr_seryjny_skanery_bezpieczenstwa'];
$uwagi_skanery_bezpieczenstwa=$_POST['uwagi_skanery_bezpieczenstwa'];
$model_panel_przod=$_POST['model_panel_przod'];
$nr_seryjny_panel_przod=$_POST['nr_seryjny_panel_przod'];
$uwagi_panel_przod=$_POST['uwagi_panel_przod'];
$model_panel_tyl=$_POST['model_panel_tyl'];
$nr_seryjny_panel_tyl=$_POST['nr_seryjny_panel_tyl'];
$uwagi_panel_tyl=$_POST['uwagi_panel_tyl'];
$model_router_wifi=$_POST['model_router_wifi'];
$nr_seryjny_router_wifi=$_POST['nr_seryjny_router_wifi'];
$uwagi_router_wifi=$_POST['uwagi_router_wifi'];
$model_switch_ethernet=$_POST['model_switch_ethernet'];
$nr_seryjny_switch_ethernet=$_POST['nr_seryjny_switch_ethernet'];
$uwagi_switch_ethernet=$_POST['uwagi_switch_ethernet'];
$model_czujnik_linii=$_POST['model_czujnik_linii'];
$nr_seryjny_czujnik_linii=$_POST['nr_seryjny_czujnik_linii'];
$uwagi_czujnik_linii=$_POST['uwagi_czujnik_linii'];
$model_czytnik_rfid=$_POST['model_czytnik_rfid'];
$nr_seryjny_czytnik_rfid=$_POST['nr_seryjny_czytnik_rfid'];
$uwagi_czytnik_rfid=$_POST['uwagi_czytnik_rfid'];
$model_modul_komunikacji_radiowej=$_POST['model_modul_komunikacji_radiowej'];
$nr_seryjny_modul_komunikacji_radiowej=$_POST['nr_seryjny_modul_komunikacji_radiowej'];
$uwagi_modul_komunikacji_radiowej=$_POST['uwagi_modul_komunikacji_radiowej'];
$model_nawigacja_lms=$_POST['model_nawigacja_lms'];
$nr_seryjny_nawigacja_lms=$_POST['nr_seryjny_nawigacja_lms'];
$uwagi_nawigacja_lms=$_POST['uwagi_nawigacja_lms'];
$model_glosniki=$_POST['model_glosniki'];
$nr_seryjny_glosniki=$_POST['nr_seryjny_glosniki'];
$uwagi_glosniki=$_POST['uwagi_glosniki'];
$model_kierunkowskazy=$_POST['model_kierunkowskazy'];
$nr_seryjny_kierunkowskazy=$_POST['nr_seryjny_kierunkowskazy'];
$uwagi_kierunkowskazy=$_POST['uwagi_kierunkowskazy'];
$model_zamontowane_bezpieczniki=$_POST['model_zamontowane_bezpieczniki'];
$nr_seryjny_zamontowane_bezpieczniki=$_POST['nr_seryjny_zamontowane_bezpieczniki'];
$uwagi_zamontowane_bezpieczniki=$_POST['uwagi_zamontowane_bezpieczniki'];
$model_akumulatory=$_POST['model_akumulatory'];
$nr_seryjny_akumulatory=$_POST['nr_seryjny_akumulatory'];
$uwagi_akumulatory=$_POST['uwagi_akumulatory'];
$model_stycznik_zlacza_io=$_POST['model_stycznik_zlacza_io'];
$nr_seryjny_stycznik_zlacza_io=$_POST['nr_seryjny_stycznik_zlacza_io'];
$uwagi_stycznik_zlacza_io=$_POST['uwagi_stycznik_zlacza_io'];
$model_stycznik_napedu=$_POST['model_stycznik_napedu'];
$nr_seryjny_stycznik_napedu=$_POST['nr_seryjny_stycznik_napedu'];
$uwagi_stycznik_napedu=$_POST['uwagi_stycznik_napedu'];
$model_styk_pomocniczy=$_POST['model_styk_pomocniczy'];
$nr_seryjny_styk_pomocniczy=$_POST['nr_seryjny_styk_pomocniczy'];
$uwagi_styk_pomocniczy=$_POST['uwagi_styk_pomocniczy'];
$model_wylacznik_nadpradowy=$_POST['model_wylacznik_nadpradowy'];
$nr_seryjny_wylacznik_nadpradowy=$_POST['nr_seryjny_wylacznik_nadpradowy'];
$uwagi_wylacznik_nadpradowy=$_POST['uwagi_wylacznik_nadpradowy'];
$model_rezystor=$_POST['model_rezystor'];
$nr_seryjny_rezystor=$_POST['nr_seryjny_rezystor'];
$uwagi_rezystor=$_POST['uwagi_rezystor'];
$model_przetwornica_stabilizujaca=$_POST['model_przetwornica_stabilizujaca'];
$nr_seryjny_przetwornica_stabilizujaca=$_POST['nr_seryjny_przetwornica_stabilizujaca'];
$uwagi_przetwornica_stabilizujaca=$_POST['uwagi_przetwornica_stabilizujaca'];
$model_zabezpieczenie_akumulatorow=$_POST['model_zabezpieczenie_akumulatorow'];
$nr_seryjny_zabezpieczenie_akumulatorow=$_POST['nr_seryjny_zabezpieczenie_akumulatorow'];
$uwagi_zabezpieczenie_akumulatorow=$_POST['uwagi_zabezpieczenie_akumulatorow'];


//TODO

$typ_naped=$_POST['typ_naped'];
$wersja_programu_naped=$_POST['wersja_programu_naped'];
$data_programu_naped=$_POST['data_programu_naped'];
$typ_sterownik_silnika=$_POST['typ_sterownik_silnika'];
$wersja_programu_sterownik_silnika=$_POST['wersja_programu_sterownik_silnika'];
$data_programu_sterownik_silnika=$_POST['data_programu_sterownik_silnika'];
$typ_sterownik_agv=$_POST['typ_sterownik_agv'];
$wersja_programu_sterownik_agv=$_POST['wersja_programu_sterownik_agv'];
$data_programu_sterownik_agv=$_POST['data_programu_sterownik_agv'];
$typ_plyta_mocy=$_POST['typ_plyta_mocy'];
$wersja_programu_plyta_mocy=$_POST['wersja_programu_plyta_mocy'];
$data_programu_plyta_mocy=$_POST['data_programu_plyta_mocy'];
$typ_sterownik_bezpieczenstwa=$_POST['typ_sterownik_bezpieczenstwa'];
$wersja_programu_sterownik_bezpieczenstwa=$_POST['wersja_programu_sterownik_bezpieczenstwa'];
$data_programu_sterownik_bezpieczenstwa=$_POST['data_programu_sterownik_bezpieczenstwa'];
$typ_skanery_bezpieczenstwa=$_POST['typ_skanery_bezpieczenstwa'];
$wersja_programu_skanery_bezpieczenstwa=$_POST['wersja_programu_skanery_bezpieczenstwa'];
$data_programu_skanery_bezpieczenstwa=$_POST['data_programu_skanery_bezpieczenstwa'];
$typ_panel_przod=$_POST['typ_panel_przod'];
$wersja_programu_panel_przod=$_POST['wersja_programu_panel_przod'];
$data_programu_panel_przod=$_POST['data_programu_panel_przod'];
$typ_panel_tyl=$_POST['typ_panel_tyl'];
$wersja_programu_panel_tyl=$_POST['wersja_programu_panel_tyl'];
$data_programu_panel_tyl=$_POST['data_programu_panel_tyl'];
$typ_router_wifi=$_POST['typ_router_wifi'];
$wersja_programu_router_wifi=$_POST['wersja_programu_router_wifi'];
$data_programu_router_wifi=$_POST['data_programu_router_wifi'];
$typ_switch_ethernet=$_POST['typ_switch_ethernet'];
$wersja_programu_switch_ethernet=$_POST['wersja_programu_switch_ethernet'];
$data_programu_switch_ethernet=$_POST['data_programu_switch_ethernet'];
$typ_czujnik_linii=$_POST['typ_czujnik_linii'];
$wersja_programu_czujnik_linii=$_POST['wersja_programu_czujnik_linii'];
$data_programu_czujnik_linii=$_POST['data_programu_czujnik_linii'];
$typ_czytnik_rfid=$_POST['typ_czytnik_rfid'];
$wersja_programu_czytnik_rfid=$_POST['wersja_programu_czytnik_rfid'];
$data_programu_czytnik_rfid=$_POST['data_programu_czytnik_rfid'];
$typ_modul_komunikacji_radiowej=$_POST['typ_modul_komunikacji_radiowej'];
$wersja_programu_modul_komunikacji_radiowej=$_POST['wersja_programu_modul_komunikacji_radiowej'];
$data_programu_modul_komunikacji_radiowej=$_POST['data_programu_modul_komunikacji_radiowej'];
$typ_nawigacja_lms=$_POST['typ_nawigacja_lms'];
$wersja_programu_nawigacja_lms=$_POST['wersja_programu_nawigacja_lms'];
$data_programu_nawigacja_lms=$_POST['data_programu_nawigacja_lms'];
$typ_glosniki=$_POST['typ_glosniki']; //wklejac typy
$wersja_programu_glosniki=$_POST['wersja_programu_glosniki'];
$data_programu_glosniki=$_POST['data_programu_glosniki'];
$typ_kierunkowskazy=$_POST['typ_kierunkowskazy'];
$wersja_programu_kierunkowskazy=$_POST['wersja_programu_kierunkowskazy'];
$data_programu_kierunkowskazy=$_POST['data_programu_kierunkowskazy'];
$typ_zamontowane_bezpieczniki=$_POST['typ_zamontowane_bezpieczniki'];
$wersja_programu_zamontowane_bezpieczniki=$_POST['wersja_programu_zamontowane_bezpieczniki'];
$data_programu_zamontowane_bezpieczniki=$_POST['data_programu_zamontowane_bezpieczniki'];
$typ_akumulatory=$_POST['typ_akumulatory'];
$wersja_programu_akumulatory=$_POST['wersja_programu_akumulatory'];
$data_programu_akumulatory=$_POST['data_programu_akumulatory'];
$typ_stycznik_zlacza_io=$_POST['typ_stycznik_zlacza_io'];
$wersja_programu_stycznik_zlacza_io=$_POST['wersja_programu_stycznik_zlacza_io'];
$data_programu_stycznik_zlacza_io=$_POST['data_programu_stycznik_zlacza_io'];
$typ_stycznik_napedu=$_POST['typ_stycznik_napedu'];
$wersja_programu_stycznik_napedu=$_POST['wersja_programu_stycznik_napedu'];
$data_programu_stycznik_napedu=$_POST['data_programu_stycznik_napedu'];
$typ_styk_pomocniczy=$_POST['typ_styk_pomocniczy'];
$wersja_programu_styk_pomocniczy=$_POST['wersja_programu_styk_pomocniczy'];
$data_programu_styk_pomocniczy=$_POST['data_programu_styk_pomocniczy'];
$typ_wylacznik_nadpradowy=$_POST['typ_wylacznik_nadpradowy'];
$wersja_programu_wylacznik_nadpradowy=$_POST['wersja_programu_wylacznik_nadpradowy'];
$data_programu_wylacznik_nadpradowy=$_POST['data_programu_wylacznik_nadpradowy'];
$typ_rezystor=$_POST['typ_rezystor'];
$wersja_programu_rezystor=$_POST['wersja_programu_rezystor'];
$data_programu_rezystor=$_POST['data_programu_rezystor'];
$typ_przetwornica_stabilizujaca=$_POST['typ_przetwornica_stabilizujaca'];
$wersja_programu_przetwornica_stabilizujaca=$_POST['wersja_programu_przetwornica_stabilizujaca'];
$data_programu_przetwornica_stabilizujaca=$_POST['data_programu_przetwornica_stabilizujaca'];
$typ_zabezpieczenie_akumulatorow=$_POST['typ_zabezpieczenie_akumulatorow'];
$wersja_programu_zabezpieczenie_akumulatorow=$_POST['wersja_programu_zabezpieczenie_akumulatorow'];
$data_programu_zabezpieczenie_akumulatorow=$_POST['data_programu_zabezpieczenie_akumulatorow'];

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
		        $numer_robota = $_SESSION['Numer_seryjny'];
				
				$polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
				$rezultat2 = $polaczenie->query("SELECT id FROM roboty WHERE numer_seryjny ='$numer_robota'");
				$wiersz2 = $rezultat2->fetch_assoc();
				$x = $wiersz2['id'];
				$rezultat = $polaczenie->query("SELECT * FROM roboty_elektronika WHERE id ='$x'");
				$wiersz = $rezultat->fetch_assoc();
				
				if($model_naped!="-" && $model_naped!=null)
				{
					$polaczenie->query("UPDATE roboty_elektronika SET model_naped = '$model_naped' WHERE id = '$x'");
				}
				if($nr_seryjny_naped!="-" && $nr_seryjny_naped!=null)
				{
					$polaczenie->query("UPDATE roboty_elektronika SET nr_seryjny_naped = '$nr_seryjny_naped' WHERE id = '$x'");
				}
				
				if($uwagi_naped!="-" && $uwagi_naped!=null)
				{
					$polaczenie->query("UPDATE roboty_elektronika SET uwagi_naped = '$uwagi_naped' WHERE id = '$x'");
				}
				
				if($model_sterownik_silnika!="-" && $model_sterownik_silnika!=null)
				{
					$polaczenie->query("UPDATE roboty_elektronika SET model_sterownik_silnika = '$model_sterownik_silnika' WHERE id = '$x'");
				}
				if($nr_seryjny_sterownik_silnika!="-" && $nr_seryjny_sterownik_silnika!=null)
				{
					$polaczenie->query("UPDATE roboty_elektronika SET nr_seryjny_sterownik_silnika = '$nr_seryjny_sterownik_silnika' WHERE id = '$x'");
				}
				
				if($uwagi_sterownik_silnika!="-" && $uwagi_sterownik_silnika!=null)
				{
					$polaczenie->query("UPDATE roboty_elektronika SET uwagi_sterownik_silnika = '$uwagi_sterownik_silnika' WHERE id = '$x'");
				}
				
				if($model_sterownik_agv!="-" && $model_sterownik_agv!=null)
				{
					$polaczenie->query("UPDATE roboty_elektronika SET model_sterownik_agv = '$model_sterownik_agv' WHERE id = '$x'");
				}
				if($nr_seryjny_sterownik_agv!="-" && $nr_seryjny_sterownik_agv!=null)
				{
					$polaczenie->query("UPDATE roboty_elektronika SET nr_seryjny_sterownik_agv = '$nr_seryjny_sterownik_agv' WHERE id = '$x'");
				}
				
				if($uwagi_sterownik_agv!="-" && $uwagi_sterownik_agv!=null)
				{
					$polaczenie->query("UPDATE roboty_elektronika SET uwagi_sterownik_agv = '$uwagi_sterownik_agv' WHERE id = '$x'");
				}
				
				if($model_plyta_mocy!="-" && $model_plyta_mocy!=null)
				{
					$polaczenie->query("UPDATE roboty_elektronika SET model_plyta_mocy = '$model_plyta_mocy' WHERE id = '$x'");
				}
				if($nr_seryjny_plyta_mocy!="-" && $nr_seryjny_plyta_mocy!=null)
				{
					$polaczenie->query("UPDATE roboty_elektronika SET nr_seryjny_plyta_mocy = '$nr_seryjny_plyta_mocy' WHERE id = '$x'");
				}
				
				if($uwagi_plyta_mocy!="-" && $uwagi_plyta_mocy!=null)
				{
					$polaczenie->query("UPDATE roboty_elektronika SET uwagi_plyta_mocy = '$uwagi_plyta_mocy' WHERE id = '$x'");
				}
				
				if($model_sterownik_bezpieczenstwa!="-" && $model_sterownik_bezpieczenstwa!=null)
				{
					$polaczenie->query("UPDATE roboty_elektronika SET model_sterownik_bezpieczenstwa = '$model_sterownik_bezpieczenstwa' WHERE id = '$x'");
				}
				if($nr_seryjny_sterownik_bezpieczenstwa!="-" && $nr_seryjny_sterownik_bezpieczenstwa!=null)
				{
					$polaczenie->query("UPDATE roboty_elektronika SET nr_seryjny_sterownik_bezpieczenstwa = '$nr_seryjny_sterownik_bezpieczenstwa' WHERE id = '$x'");
				}
				
				if($uwagi_sterownik_bezpieczenstwa!="-" && $uwagi_sterownik_bezpieczenstwa!=null)
				{
					$polaczenie->query("UPDATE roboty_elektronika SET uwagi_sterownik_bezpieczenstwa = '$uwagi_sterownik_bezpieczenstwa' WHERE id = '$x'");
				}
				
				if($model_skanery_bezpieczenstwa!="-" && $model_skanery_bezpieczenstwa!=null)
				{
					$polaczenie->query("UPDATE roboty_elektronika SET model_skanery_bezpieczenstwa = '$model_skanery_bezpieczenstwa' WHERE id = '$x'");
				}
				if($nr_seryjny_skanery_bezpieczenstwa!="-" && $nr_seryjny_skanery_bezpieczenstwa!=null)
				{
					$polaczenie->query("UPDATE roboty_elektronika SET nr_seryjny_skanery_bezpieczenstwa = '$nr_seryjny_skanery_bezpieczenstwa' WHERE id = '$x'");
				}
				
				if($uwagi_skanery_bezpieczenstwa!="-" && $uwagi_skanery_bezpieczenstwa!=null)
				{
					$polaczenie->query("UPDATE roboty_elektronika SET uwagi_skanery_bezpieczenstwa = '$uwagi_skanery_bezpieczenstwa' WHERE id = '$x'");
				}
				
				if($model_panel_przod!="-" && $model_panel_przod!=null)
				{
					$polaczenie->query("UPDATE roboty_elektronika SET model_panel_przod = '$model_panel_przod' WHERE id = '$x'");
				}
				if($nr_seryjny_panel_przod!="-" && $nr_seryjny_panel_przod!=null)
				{
					$polaczenie->query("UPDATE roboty_elektronika SET nr_seryjny_panel_przod = '$nr_seryjny_panel_przod' WHERE id = '$x'");
				}
				
				if($uwagi_panel_przod!="-" && $uwagi_panel_przod!=null)
				{
					$polaczenie->query("UPDATE roboty_elektronika SET uwagi_panel_przod = '$uwagi_panel_przod' WHERE id = '$x'");
				}
				
				if($model_panel_tyl!="-" && $model_panel_tyl!=null)
				{
					$polaczenie->query("UPDATE roboty_elektronika SET model_panel_tyl = '$model_panel_tyl' WHERE id = '$x'");
				}
				if($nr_seryjny_panel_tyl!="-" && $nr_seryjny_panel_tyl!=null)
				{
					$polaczenie->query("UPDATE roboty_elektronika SET nr_seryjny_panel_tyl = '$nr_seryjny_panel_tyl' WHERE id = '$x'");
				}
				
				if($uwagi_panel_tyl!="-" && $uwagi_panel_tyl!=null)
				{
					$polaczenie->query("UPDATE roboty_elektronika SET uwagi_panel_tyl = '$uwagi_panel_tyl' WHERE id = '$x'");
				}
				
				if($model_router_wifi!="-" && $model_router_wifi!=null)
				{
					$polaczenie->query("UPDATE roboty_elektronika SET model_router_wifi = '$model_router_wifi' WHERE id = '$x'");
				}
				if($nr_seryjny_router_wifi!="-" && $nr_seryjny_router_wifi!=null)
				{
					$polaczenie->query("UPDATE roboty_elektronika SET nr_seryjny_router_wifi = '$nr_seryjny_router_wifi' WHERE id = '$x'");
				}
				
				if($uwagi_router_wifi!="-" && $uwagi_router_wifi!=null)
				{
					$polaczenie->query("UPDATE roboty_elektronika SET uwagi_router_wifi = '$uwagi_router_wifi' WHERE id = '$x'");
				}
				
				if($model_switch_ethernet!="-" && $model_switch_ethernet!=null)
				{
					$polaczenie->query("UPDATE roboty_elektronika SET model_switch_ethernet = '$model_switch_ethernet' WHERE id = '$x'");
				}
				if($nr_seryjny_switch_ethernet!="-" && $nr_seryjny_switch_ethernet!=null)
				{
					$polaczenie->query("UPDATE roboty_elektronika SET nr_seryjny_switch_ethernet = '$nr_seryjny_switch_ethernet' WHERE id = '$x'");
				}
				
				if($uwagi_switch_ethernet!="-" && $uwagi_switch_ethernet!=null)
				{
					$polaczenie->query("UPDATE roboty_elektronika SET uwagi_switch_ethernet = '$uwagi_switch_ethernet' WHERE id = '$x'");
				}
				
				if($model_czujnik_linii!="-" && $model_czujnik_linii!=null)
				{
					$polaczenie->query("UPDATE roboty_elektronika SET model_czujnik_linii = '$model_czujnik_linii' WHERE id = '$x'");
				}
				if($nr_seryjny_czujnik_linii!="-" && $nr_seryjny_czujnik_linii!=null)
				{
					$polaczenie->query("UPDATE roboty_elektronika SET nr_seryjny_czujnik_linii = '$nr_seryjny_czujnik_linii' WHERE id = '$x'");
				}
				
				if($uwagi_czujnik_linii!="-" && $uwagi_czujnik_linii!=null)
				{
					$polaczenie->query("UPDATE roboty_elektronika SET uwagi_czujnik_linii = '$uwagi_czujnik_linii' WHERE id = '$x'");
				}
				
				if($model_czytnik_rfid!="-" && $model_czytnik_rfid!=null)
				{
					$polaczenie->query("UPDATE roboty_elektronika SET model_czytnik_rfid = '$model_czytnik_rfid' WHERE id = '$x'");
				}
				if($nr_seryjny_czytnik_rfid!="-" && $nr_seryjny_czytnik_rfid!=null)
				{
					$polaczenie->query("UPDATE roboty_elektronika SET nr_seryjny_czytnik_rfid = '$nr_seryjny_czytnik_rfid' WHERE id = '$x'");
				}
				
				if($uwagi_czytnik_rfid!="-" && $uwagi_czytnik_rfid!=null)
				{
					$polaczenie->query("UPDATE roboty_elektronika SET uwagi_czytnik_rfid = '$uwagi_czytnik_rfid' WHERE id = '$x'");
				}
				
				if($model_modul_komunikacji_radiowej!="-" && $model_modul_komunikacji_radiowej!=null)
				{
					$polaczenie->query("UPDATE roboty_elektronika SET model_modul_komunikacji_radiowej = '$model_modul_komunikacji_radiowej' WHERE id = '$x'");
				}
				if($nr_seryjny_modul_komunikacji_radiowej!="-" && $nr_seryjny_modul_komunikacji_radiowej!=null)
				{
					$polaczenie->query("UPDATE roboty_elektronika SET nr_seryjny_modul_komunikacji_radiowej = '$nr_seryjny_modul_komunikacji_radiowej' WHERE id = '$x'");
				}
				
				if($uwagi_modul_komunikacji_radiowej!="-" && $uwagi_modul_komunikacji_radiowej!=null)
				{
					$polaczenie->query("UPDATE roboty_elektronika SET uwagi_modul_komunikacji_radiowej = '$uwagi_modul_komunikacji_radiowej' WHERE id = '$x'");
				}
				
				if($model_nawigacja_lms!="-" && $model_nawigacja_lms!=null)
				{
					$polaczenie->query("UPDATE roboty_elektronika SET model_nawigacja_lms = '$model_nawigacja_lms' WHERE id = '$x'");
				}
				if($nr_seryjny_nawigacja_lms!="-" && $nr_seryjny_nawigacja_lms!=null)
				{
					$polaczenie->query("UPDATE roboty_elektronika SET nr_seryjny_nawigacja_lms = '$nr_seryjny_nawigacja_lms' WHERE id = '$x'");
				}
				
				if($uwagi_nawigacja_lms!="-" && $uwagi_nawigacja_lms!=null)
				{
					$polaczenie->query("UPDATE roboty_elektronika SET uwagi_nawigacja_lms = '$uwagi_nawigacja_lms' WHERE id = '$x'");
				}
				
				if($model_glosniki!="-" && $model_glosniki!=null)
				{
					$polaczenie->query("UPDATE roboty_elektronika SET model_glosniki = '$model_glosniki' WHERE id = '$x'");
				}
				if($nr_seryjny_glosniki!="-" && $nr_seryjny_glosniki!=null)
				{
					$polaczenie->query("UPDATE roboty_elektronika SET nr_seryjny_glosniki = '$nr_seryjny_glosniki' WHERE id = '$x'");
				}
				
				if($uwagi_glosniki!="-" && $uwagi_glosniki!=null)
				{
					$polaczenie->query("UPDATE roboty_elektronika SET uwagi_glosniki = '$uwagi_glosniki' WHERE id = '$x'");
				}
				
				if($model_kierunkowskazy!="-" && $model_kierunkowskazy!=null)
				{
					$polaczenie->query("UPDATE roboty_elektronika SET model_kierunkowskazy = '$model_kierunkowskazy' WHERE id = '$x'");
				}
				if($nr_seryjny_kierunkowskazy!="-" && $nr_seryjny_kierunkowskazy!=null)
				{
					$polaczenie->query("UPDATE roboty_elektronika SET nr_seryjny_kierunkowskazy = '$nr_seryjny_kierunkowskazy' WHERE id = '$x'");
				}
				
				if($uwagi_kierunkowskazy!="-" && $uwagi_kierunkowskazy!=null)
				{
					$polaczenie->query("UPDATE roboty_elektronika SET uwagi_kierunkowskazy = '$uwagi_kierunkowskazy' WHERE id = '$x'");
				}
				
				if($model_zamontowane_bezpieczniki!="-" && $model_zamontowane_bezpieczniki!=null)
				{
					$polaczenie->query("UPDATE roboty_elektronika SET model_zamontowane_bezpieczniki = '$model_zamontowane_bezpieczniki' WHERE id = '$x'");
				}
				if($nr_seryjny_zamontowane_bezpieczniki!="-" && $nr_seryjny_zamontowane_bezpieczniki!=null)
				{
					$polaczenie->query("UPDATE roboty_elektronika SET nr_seryjny_zamontowane_bezpieczniki = '$nr_seryjny_zamontowane_bezpieczniki' WHERE id = '$x'");
				}
				
				if($uwagi_zamontowane_bezpieczniki!="-" && $uwagi_zamontowane_bezpieczniki!=null)
				{
					$polaczenie->query("UPDATE roboty_elektronika SET uwagi_zamontowane_bezpieczniki = '$uwagi_zamontowane_bezpieczniki' WHERE id = '$x'");
				}
				
				if($model_akumulatory!="-" && $model_akumulatory!=null)
				{
					$polaczenie->query("UPDATE roboty_elektronika SET model_akumulatory = '$model_akumulatory' WHERE id = '$x'");
				}
				if($nr_seryjny_akumulatory!="-" && $nr_seryjny_akumulatory!=null)
				{
					$polaczenie->query("UPDATE roboty_elektronika SET nr_seryjny_akumulatory = '$nr_seryjny_akumulatory' WHERE id = '$x'");
				}
				
				if($uwagi_akumulatory!="-" && $uwagi_akumulatory!=null)
				{
					$polaczenie->query("UPDATE roboty_elektronika SET uwagi_akumulatory = '$uwagi_akumulatory' WHERE id = '$x'");
				}
				
				if($model_stycznik_zlacza_io!="-" && $model_stycznik_zlacza_io!=null)
				{
					$polaczenie->query("UPDATE roboty_elektronika SET model_stycznik_zlacza_io = '$model_stycznik_zlacza_io' WHERE id = '$x'");
				}
				if($nr_seryjny_stycznik_zlacza_io!="-" && $nr_seryjny_stycznik_zlacza_io!=null)
				{
					$polaczenie->query("UPDATE roboty_elektronika SET nr_seryjny_stycznik_zlacza_io = '$nr_seryjny_stycznik_zlacza_io' WHERE id = '$x'");
				}
				
				if($uwagi_stycznik_zlacza_io!="-" && $uwagi_stycznik_zlacza_io!=null)
				{
					$polaczenie->query("UPDATE roboty_elektronika SET uwagi_stycznik_zlacza_io = '$uwagi_stycznik_zlacza_io' WHERE id = '$x'");
				}
				
				if($model_stycznik_napedu!="-" && $model_stycznik_napedu!=null)
				{
					$polaczenie->query("UPDATE roboty_elektronika SET model_stycznik_napedu = '$model_stycznik_napedu' WHERE id = '$x'");
				}
				if($nr_seryjny_stycznik_napedu!="-" && $nr_seryjny_stycznik_napedu!=null)
				{
					$polaczenie->query("UPDATE roboty_elektronika SET nr_seryjny_stycznik_napedu = '$nr_seryjny_stycznik_napedu' WHERE id = '$x'");
				}
				
				if($uwagi_stycznik_napedu!="-" && $uwagi_stycznik_napedu!=null)
				{
					$polaczenie->query("UPDATE roboty_elektronika SET uwagi_stycznik_napedu = '$uwagi_stycznik_napedu' WHERE id = '$x'");
				}
				
				if($model_styk_pomocniczy!="-" && $model_styk_pomocniczy!=null)
				{
					$polaczenie->query("UPDATE roboty_elektronika SET model_styk_pomocniczy = '$model_styk_pomocniczy' WHERE id = '$x'");
				}
				if($nr_seryjny_styk_pomocniczy!="-" && $nr_seryjny_styk_pomocniczy!=null)
				{
					$polaczenie->query("UPDATE roboty_elektronika SET nr_seryjny_styk_pomocniczy = '$nr_seryjny_styk_pomocniczy' WHERE id = '$x'");
				}
				
				if($uwagi_styk_pomocniczy!="-" && $uwagi_styk_pomocniczy!=null)
				{
					$polaczenie->query("UPDATE roboty_elektronika SET uwagi_styk_pomocniczy = '$uwagi_styk_pomocniczy' WHERE id = '$x'");
				}
				
				if($model_wylacznik_nadpradowy!="-" && $model_wylacznik_nadpradowy!=null)
				{
					$polaczenie->query("UPDATE roboty_elektronika SET model_wylacznik_nadpradowy = '$model_wylacznik_nadpradowy' WHERE id = '$x'");
				}
				if($nr_seryjny_wylacznik_nadpradowy!="-" && $nr_seryjny_wylacznik_nadpradowy!=null)
				{
					$polaczenie->query("UPDATE roboty_elektronika SET nr_seryjny_wylacznik_nadpradowy = '$nr_seryjny_wylacznik_nadpradowy' WHERE id = '$x'");
				}
				
				if($uwagi_wylacznik_nadpradowy!="-" && $uwagi_wylacznik_nadpradowy!=null)
				{
					$polaczenie->query("UPDATE roboty_elektronika SET uwagi_wylacznik_nadpradowy = '$uwagi_wylacznik_nadpradowy' WHERE id = '$x'");
				}
				
				if($model_rezystor!="-" && $model_rezystor!=null)
				{
					$polaczenie->query("UPDATE roboty_elektronika SET model_rezystor = '$model_rezystor' WHERE id = '$x'");
				}
				if($nr_seryjny_rezystor!="-" && $nr_seryjny_rezystor!=null)
				{
					$polaczenie->query("UPDATE roboty_elektronika SET nr_seryjny_rezystor = '$nr_seryjny_rezystor' WHERE id = '$x'");
				}
				
				if($uwagi_rezystor!="-" && $uwagi_rezystor!=null)
				{
					$polaczenie->query("UPDATE roboty_elektronika SET uwagi_rezystor = '$uwagi_rezystor' WHERE id = '$x'");
				}
				
				if($model_przetwornica_stabilizujaca!="-" && $model_przetwornica_stabilizujaca!=null)
				{
					$polaczenie->query("UPDATE roboty_elektronika SET model_przetwornica_stabilizujaca = '$model_przetwornica_stabilizujaca' WHERE id = '$x'");
				}
				if($nr_seryjny_przetwornica_stabilizujaca!="-" && $nr_seryjny_przetwornica_stabilizujaca!=null)
				{
					$polaczenie->query("UPDATE roboty_elektronika SET nr_seryjny_przetwornica_stabilizujaca = '$nr_seryjny_przetwornica_stabilizujaca' WHERE id = '$x'");
				}
				
				if($uwagi_przetwornica_stabilizujaca!="-" && $uwagi_przetwornica_stabilizujaca!=null)
				{
					$polaczenie->query("UPDATE roboty_elektronika SET uwagi_przetwornica_stabilizujaca = '$uwagi_przetwornica_stabilizujaca' WHERE id = '$x'");
				}
				
				if($model_zabezpieczenie_akumulatorow!="-" && $model_zabezpieczenie_akumulatorow!=null)
				{
					$polaczenie->query("UPDATE roboty_elektronika SET model_zabezpieczenie_akumulatorow = '$model_zabezpieczenie_akumulatorow' WHERE id = '$x'");
				}
				if($nr_seryjny_zabezpieczenie_akumulatorow!="-" && $nr_seryjny_zabezpieczenie_akumulatorow!=null)
				{
					$polaczenie->query("UPDATE roboty_elektronika SET nr_seryjny_zabezpieczenie_akumulatorow = '$nr_seryjny_zabezpieczenie_akumulatorow' WHERE id = '$x'");
				}
				
				if($uwagi_zabezpieczenie_akumulatorow!="-" && $uwagi_zabezpieczenie_akumulatorow!=null)
				{
					$polaczenie->query("UPDATE roboty_elektronika SET uwagi_zabezpieczenie_akumulatorow = '$uwagi_zabezpieczenie_akumulatorow' WHERE id = '$x'");
				}
				
				if($model_przekladnia!="-" && $model_przekladnia!=null)
				{
					$polaczenie->query("UPDATE roboty_mechanika SET model_przekladnia = '$model_przekladnia' WHERE id = '$x'");
				}
				if($nr_seryjny_przekladnia!="-" && $nr_seryjny_przekladnia!=null)
				{
					$polaczenie->query("UPDATE roboty_mechanika SET nr_seryjny_przekladnia = '$nr_seryjny_przekladnia' WHERE id = '$x'");
				}
				
				if($uwagi_przekladnia!="-" && $uwagi_przekladnia!=null)
				{
					$polaczenie->query("UPDATE roboty_mechanika SET uwagi_przekladnia = '$uwagi_przekladnia' WHERE id = '$x'");
				}
				
				if($model_trzpienie!="-" && $model_trzpienie!=null)
				{
					$polaczenie->query("UPDATE roboty_mechanika SET model_trzpienie = '$model_trzpienie' WHERE id = '$x'");
				}
				if($nr_seryjny_trzpienie!="-" && $nr_seryjny_trzpienie!=null)
				{
					$polaczenie->query("UPDATE roboty_mechanika SET nr_seryjny_trzpienie = '$nr_seryjny_trzpienie' WHERE id = '$x'");
				}
				
				if($uwagi_trzpienie!="-" && $uwagi_trzpienie!=null)
				{
					$polaczenie->query("UPDATE roboty_mechanika SET uwagi_trzpienie = '$uwagi_trzpienie' WHERE id = '$x'");
				}
				
				if($model_ladowarka_stykowa!="-" && $model_ladowarka_stykowa!=null)
				{
					$polaczenie->query("UPDATE roboty_mechanika SET model_ladowarka_stykowa = '$model_ladowarka_stykowa' WHERE id = '$x'");
				}
				if($nr_seryjny_ladowarka_stykowa!="-" && $nr_seryjny_ladowarka_stykowa!=null)
				{
					$polaczenie->query("UPDATE roboty_mechanika SET nr_seryjny_ladowarka_stykowa = '$nr_seryjny_ladowarka_stykowa' WHERE id = '$x'");
				}
				
				if($uwagi_ladowarka_stykowa!="-" && $uwagi_ladowarka_stykowa!=null)
				{
					$polaczenie->query("UPDATE roboty_mechanika SET uwagi_ladowarka_stykowa = '$uwagi_ladowarka_stykowa' WHERE id = '$x'");
				}
				
				////////////////////////////////////////OPROGRAMOWANIE
				if($typ_naped!="-" && $typ_naped!=null)
				{
					$polaczenie->query("UPDATE roboty_oprogramowanie SET typ_naped = '$typ_naped' WHERE id = '$x'");
				}
				if($wersja_programu_naped!="-" && $wersja_programu_naped!=null)
				{
					$polaczenie->query("UPDATE roboty_oprogramowanie SET wersja_programu_naped = '$wersja_programu_naped' WHERE id = '$x'");
				}
				
				if($data_programu_naped!="-" && $data_programu_naped!=null)
				{
					$polaczenie->query("UPDATE roboty_oprogramowanie SET data_programu_naped = '$data_programu_naped' WHERE id = '$x'");
				}
				
				if($typ_sterownik_silnika!="-" && $typ_sterownik_silnika!=null)
				{
					$polaczenie->query("UPDATE roboty_oprogramowanie SET typ_sterownik_silnika = '$typ_sterownik_silnika' WHERE id = '$x'");
				}
				if($wersja_programu_sterownik_silnika!="-" && $wersja_programu_sterownik_silnika!=null)
				{
					$polaczenie->query("UPDATE roboty_oprogramowanie SET wersja_programu_sterownik_silnika = '$wersja_programu_sterownik_silnika' WHERE id = '$x'");
				}
				
				if($data_programu_sterownik_silnika!="-" && $data_programu_sterownik_silnika!=null)
				{
					$polaczenie->query("UPDATE roboty_oprogramowanie SET data_programu_sterownik_silnika = '$data_programu_sterownik_silnika' WHERE id = '$x'");
				}
				
				if($typ_sterownik_agv!="-" && $typ_sterownik_agv!=null)
				{
					$polaczenie->query("UPDATE roboty_oprogramowanie SET typ_sterownik_agv = '$typ_sterownik_agv' WHERE id = '$x'");
				}
				if($wersja_programu_sterownik_agv!="-" && $wersja_programu_sterownik_agv!=null)
				{
					$polaczenie->query("UPDATE roboty_oprogramowanie SET wersja_programu_sterownik_agv = '$wersja_programu_sterownik_agv' WHERE id = '$x'");
				}
				
				if($data_programu_sterownik_agv!="-" && $data_programu_sterownik_agv!=null)
				{
					$polaczenie->query("UPDATE roboty_oprogramowanie SET data_programu_sterownik_agv = '$data_programu_sterownik_agv' WHERE id = '$x'");
				}
				
				if($typ_plyta_mocy!="-" && $typ_plyta_mocy!=null)
				{
					$polaczenie->query("UPDATE roboty_oprogramowanie SET typ_plyta_mocy = '$typ_plyta_mocy' WHERE id = '$x'");
				}
				if($wersja_programu_plyta_mocy!="-" && $wersja_programu_plyta_mocy!=null)
				{
					$polaczenie->query("UPDATE roboty_oprogramowanie SET wersja_programu_plyta_mocy = '$wersja_programu_plyta_mocy' WHERE id = '$x'");
				}
				
				if($data_programu_plyta_mocy!="-" && $data_programu_plyta_mocy!=null)
				{
					$polaczenie->query("UPDATE roboty_oprogramowanie SET data_programu_plyta_mocy = '$data_programu_plyta_mocy' WHERE id = '$x'");
				}
				
				if($typ_sterownik_bezpieczenstwa!="-" && $typ_sterownik_bezpieczenstwa!=null)
				{
					$polaczenie->query("UPDATE roboty_oprogramowanie SET typ_sterownik_bezpieczenstwa = '$typ_sterownik_bezpieczenstwa' WHERE id = '$x'");
				}
				if($wersja_programu_sterownik_bezpieczenstwa!="-" && $wersja_programu_sterownik_bezpieczenstwa!=null)
				{
					$polaczenie->query("UPDATE roboty_oprogramowanie SET wersja_programu_sterownik_bezpieczenstwa = '$wersja_programu_sterownik_bezpieczenstwa' WHERE id = '$x'");
				}
				
				if($data_programu_sterownik_bezpieczenstwa!="-" && $data_programu_sterownik_bezpieczenstwa!=null)
				{
					$polaczenie->query("UPDATE roboty_oprogramowanie SET data_programu_sterownik_bezpieczenstwa = '$data_programu_sterownik_bezpieczenstwa' WHERE id = '$x'");
				}
				
				if($typ_skanery_bezpieczenstwa!="-" && $typ_skanery_bezpieczenstwa!=null)
				{
					$polaczenie->query("UPDATE roboty_oprogramowanie SET typ_skanery_bezpieczenstwa = '$typ_skanery_bezpieczenstwa' WHERE id = '$x'");
				}
				if($wersja_programu_skanery_bezpieczenstwa!="-" && $wersja_programu_skanery_bezpieczenstwa!=null)
				{
					$polaczenie->query("UPDATE roboty_oprogramowanie SET wersja_programu_skanery_bezpieczenstwa = '$wersja_programu_skanery_bezpieczenstwa' WHERE id = '$x'");
				}
				
				if($data_programu_skanery_bezpieczenstwa!="-" && $data_programu_skanery_bezpieczenstwa!=null)
				{
					$polaczenie->query("UPDATE roboty_oprogramowanie SET data_programu_skanery_bezpieczenstwa = '$data_programu_skanery_bezpieczenstwa' WHERE id = '$x'");
				}
				
				if($typ_panel_przod!="-" && $typ_panel_przod!=null)
				{
					$polaczenie->query("UPDATE roboty_oprogramowanie SET typ_panel_przod = '$typ_panel_przod' WHERE id = '$x'");
				}
				/////////// tu skonczylem
				if($wersja_programu_panel_przod!="-" && $wersja_programu_panel_przod!=null)
				{
					$polaczenie->query("UPDATE roboty_oprogramowanie SET wersja_programu_panel_przod = '$wersja_programu_panel_przod' WHERE id = '$x'");
				}
				
				if($data_programu_panel_przod!="-" && $data_programu_panel_przod!=null)
				{
					$polaczenie->query("UPDATE roboty_oprogramowanie SET data_programu_panel_przod = '$data_programu_panel_przod' WHERE id = '$x'");
				}
				
				if($typ_panel_tyl!="-" && $typ_panel_tyl!=null)
				{
					$polaczenie->query("UPDATE roboty_oprogramowanie SET typ_panel_tyl = '$typ_panel_tyl' WHERE id = '$x'");
				}
				if($wersja_programu_panel_tyl!="-" && $wersja_programu_panel_tyl!=null)
				{
					$polaczenie->query("UPDATE roboty_oprogramowanie SET wersja_programu_panel_tyl = '$wersja_programu_panel_tyl' WHERE id = '$x'");
				}
				
				if($data_programu_panel_tyl!="-" && $data_programu_panel_tyl!=null)
				{
					$polaczenie->query("UPDATE roboty_oprogramowanie SET data_programu_panel_tyl = '$data_programu_panel_tyl' WHERE id = '$x'");
				}
				
				if($typ_router_wifi!="-" && $typ_router_wifi!=null)
				{
					$polaczenie->query("UPDATE roboty_oprogramowanie SET typ_router_wifi = '$typ_router_wifi' WHERE id = '$x'");
				}
				if($wersja_programu_router_wifi!="-" && $wersja_programu_router_wifi!=null)
				{
					$polaczenie->query("UPDATE roboty_oprogramowanie SET wersja_programu_router_wifi = '$wersja_programu_router_wifi' WHERE id = '$x'");
				}
				
				if($data_programu_router_wifi!="-" && $data_programu_router_wifi!=null)
				{
					$polaczenie->query("UPDATE roboty_oprogramowanie SET data_programu_router_wifi = '$data_programu_router_wifi' WHERE id = '$x'");
				}
				
				if($typ_switch_ethernet!="-" && $typ_switch_ethernet!=null)
				{
					$polaczenie->query("UPDATE roboty_oprogramowanie SET typ_switch_ethernet = '$typ_switch_ethernet' WHERE id = '$x'");
				}
				if($wersja_programu_switch_ethernet!="-" && $wersja_programu_switch_ethernet!=null)
				{
					$polaczenie->query("UPDATE roboty_oprogramowanie SET wersja_programu_switch_ethernet = '$wersja_programu_switch_ethernet' WHERE id = '$x'");
				}
				
				if($data_programu_switch_ethernet!="-" && $data_programu_switch_ethernet!=null)
				{
					$polaczenie->query("UPDATE roboty_oprogramowanie SET data_programu_switch_ethernet = '$data_programu_switch_ethernet' WHERE id = '$x'");
				}
				
				if($typ_czujnik_linii!="-" && $typ_czujnik_linii!=null)
				{
					$polaczenie->query("UPDATE roboty_oprogramowanie SET typ_czujnik_linii = '$typ_czujnik_linii' WHERE id = '$x'");
				}
				if($wersja_programu_czujnik_linii!="-" && $wersja_programu_czujnik_linii!=null)
				{
					$polaczenie->query("UPDATE roboty_oprogramowanie SET wersja_programu_czujnik_linii = '$wersja_programu_czujnik_linii' WHERE id = '$x'");
				}
				
				if($data_programu_czujnik_linii!="-" && $data_programu_czujnik_linii!=null)
				{
					$polaczenie->query("UPDATE roboty_oprogramowanie SET data_programu_czujnik_linii = '$data_programu_czujnik_linii' WHERE id = '$x'");
				}
				
				if($typ_czytnik_rfid!="-" && $typ_czytnik_rfid!=null)
				{
					$polaczenie->query("UPDATE roboty_oprogramowanie SET typ_czytnik_rfid = '$typ_czytnik_rfid' WHERE id = '$x'");
				}
				
				/////////////////////////////////
				if($wersja_programu_czytnik_rfid!="-" && $wersja_programu_czytnik_rfid!=null)
				{
					$polaczenie->query("UPDATE roboty_oprogramowanie SET wersja_programu_czytnik_rfid = '$wersja_programu_czytnik_rfid' WHERE id = '$x'");
				}
				
				if($data_programu_czytnik_rfid!="-" && $data_programu_czytnik_rfid!=null)
				{
					$polaczenie->query("UPDATE roboty_oprogramowanie SET data_programu_czytnik_rfid = '$data_programu_czytnik_rfid' WHERE id = '$x'");
				}
				
				if($typ_modul_komunikacji_radiowej!="-" && $typ_modul_komunikacji_radiowej!=null)
				{
					$polaczenie->query("UPDATE roboty_oprogramowanie SET typ_modul_komunikacji_radiowej = '$typ_modul_komunikacji_radiowej' WHERE id = '$x'");
				}
				if($wersja_programu_modul_komunikacji_radiowej!="-" && $wersja_programu_modul_komunikacji_radiowej!=null)
				{
					$polaczenie->query("UPDATE roboty_oprogramowanie SET wersja_programu_modul_komunikacji_radiowej = '$wersja_programu_modul_komunikacji_radiowej' WHERE id = '$x'");
				}
				
				if($data_programu_modul_komunikacji_radiowej!="-" && $data_programu_modul_komunikacji_radiowej!=null)
				{
					$polaczenie->query("UPDATE roboty_oprogramowanie SET data_programu_modul_komunikacji_radiowej = '$data_programu_modul_komunikacji_radiowej' WHERE id = '$x'");
				}
				
				if($typ_nawigacja_lms!="-" && $typ_nawigacja_lms!=null)
				{
					$polaczenie->query("UPDATE roboty_oprogramowanie SET typ_nawigacja_lms = '$typ_nawigacja_lms' WHERE id = '$x'");
				}
				if($wersja_programu_nawigacja_lms!="-" && $wersja_programu_nawigacja_lms!=null)
				{
					$polaczenie->query("UPDATE roboty_oprogramowanie SET wersja_programu_nawigacja_lms = '$wersja_programu_nawigacja_lms' WHERE id = '$x'");
				}
				
				if($data_programu_nawigacja_lms!="-" && $data_programu_nawigacja_lms!=null)
				{
					$polaczenie->query("UPDATE roboty_oprogramowanie SET data_programu_nawigacja_lms = '$data_programu_nawigacja_lms' WHERE id = '$x'");
				}
				
				if($typ_glosniki!="-" && $typ_glosniki!=null)
				{
					$polaczenie->query("UPDATE roboty_oprogramowanie SET typ_glosniki = '$typ_glosniki' WHERE id = '$x'");
				}
				if($wersja_programu_glosniki!="-" && $wersja_programu_glosniki!=null)
				{
					$polaczenie->query("UPDATE roboty_oprogramowanie SET wersja_programu_glosniki = '$wersja_programu_glosniki' WHERE id = '$x'");
				}
				
				if($data_programu_glosniki!="-" && $data_programu_glosniki!=null)
				{
					$polaczenie->query("UPDATE roboty_oprogramowanie SET data_programu_glosniki = '$data_programu_glosniki' WHERE id = '$x'");
				}
				
				if($typ_kierunkowskazy!="-" && $typ_kierunkowskazy!=null)
				{
					$polaczenie->query("UPDATE roboty_oprogramowanie SET typ_kierunkowskazy = '$typ_kierunkowskazy' WHERE id = '$x'");
				}
				if($wersja_programu_kierunkowskazy!="-" && $wersja_programu_kierunkowskazy!=null)
				{
					$polaczenie->query("UPDATE roboty_oprogramowanie SET wersja_programu_kierunkowskazy = '$wersja_programu_kierunkowskazy' WHERE id = '$x'");
				}
				
				if($data_programu_kierunkowskazy!="-" && $data_programu_kierunkowskazy!=null)
				{
					$polaczenie->query("UPDATE roboty_oprogramowanie SET data_programu_kierunkowskazy = '$data_programu_kierunkowskazy' WHERE id = '$x'");
				}
				
				if($typ_zamontowane_bezpieczniki!="-" && $typ_zamontowane_bezpieczniki!=null)
				{
					$polaczenie->query("UPDATE roboty_oprogramowanie SET typ_zamontowane_bezpieczniki = '$typ_zamontowane_bezpieczniki' WHERE id = '$x'");
				}
				if($wersja_programu_zamontowane_bezpieczniki!="-" && $wersja_programu_zamontowane_bezpieczniki!=null)
				{
					$polaczenie->query("UPDATE roboty_oprogramowanie SET wersja_programu_zamontowane_bezpieczniki = '$wersja_programu_zamontowane_bezpieczniki' WHERE id = '$x'");
				}
				
				if($data_programu_zamontowane_bezpieczniki!="-" && $data_programu_zamontowane_bezpieczniki!=null)
				{
					$polaczenie->query("UPDATE roboty_oprogramowanie SET data_programu_zamontowane_bezpieczniki = '$data_programu_zamontowane_bezpieczniki' WHERE id = '$x'");
				}
				
				if($typ_akumulatory!="-" && $typ_akumulatory!=null)
				{
					$polaczenie->query("UPDATE roboty_oprogramowanie SET typ_akumulatory = '$typ_akumulatory' WHERE id = '$x'");
				}
				if($wersja_programu_akumulatory!="-" && $wersja_programu_akumulatory!=null)
				{
					$polaczenie->query("UPDATE roboty_oprogramowanie SET wersja_programu_akumulatory = '$wersja_programu_akumulatory' WHERE id = '$x'");
				}
				
				if($data_programu_akumulatory!="-" && $data_programu_akumulatory!=null)
				{
					$polaczenie->query("UPDATE roboty_oprogramowanie SET data_programu_akumulatory = '$data_programu_akumulatory' WHERE id = '$x'");
				}
				
				if($typ_stycznik_zlacza_io!="-" && $typ_stycznik_zlacza_io!=null)
				{
					$polaczenie->query("UPDATE roboty_oprogramowanie SET typ_stycznik_zlacza_io = '$typ_stycznik_zlacza_io' WHERE id = '$x'");
				}
				if($wersja_programu_stycznik_zlacza_io!="-" && $wersja_programu_stycznik_zlacza_io!=null)
				{
					$polaczenie->query("UPDATE roboty_oprogramowanie SET wersja_programu_stycznik_zlacza_io = '$wersja_programu_stycznik_zlacza_io' WHERE id = '$x'");
				}
				
				if($data_programu_stycznik_zlacza_io!="-" && $data_programu_stycznik_zlacza_io!=null)
				{
					$polaczenie->query("UPDATE roboty_oprogramowanie SET data_programu_stycznik_zlacza_io = '$data_programu_stycznik_zlacza_io' WHERE id = '$x'");
				}
				
				if($typ_stycznik_napedu!="-" && $typ_stycznik_napedu!=null)
				{
					$polaczenie->query("UPDATE roboty_oprogramowanie SET typ_stycznik_napedu = '$typ_stycznik_napedu' WHERE id = '$x'");
				}
				if($wersja_programu_stycznik_napedu!="-" && $wersja_programu_stycznik_napedu!=null)
				{
					$polaczenie->query("UPDATE roboty_oprogramowanie SET wersja_programu_stycznik_napedu = '$wersja_programu_stycznik_napedu' WHERE id = '$x'");
				}
				
				if($data_programu_stycznik_napedu!="-" && $data_programu_stycznik_napedu!=null)
				{
					$polaczenie->query("UPDATE roboty_oprogramowanie SET data_programu_stycznik_napedu = '$data_programu_stycznik_napedu' WHERE id = '$x'");
				}
				
				if($typ_styk_pomocniczy!="-" && $typ_styk_pomocniczy!=null)
				{
					$polaczenie->query("UPDATE roboty_oprogramowanie SET typ_styk_pomocniczy = '$typ_styk_pomocniczy' WHERE id = '$x'");
				}
				if($wersja_programu_styk_pomocniczy!="-" && $wersja_programu_styk_pomocniczy!=null)
				{
					$polaczenie->query("UPDATE roboty_oprogramowanie SET wersja_programu_styk_pomocniczy = '$wersja_programu_styk_pomocniczy' WHERE id = '$x'");
				}
				
				if($data_programu_styk_pomocniczy!="-" && $data_programu_styk_pomocniczy!=null)
				{
					$polaczenie->query("UPDATE roboty_oprogramowanie SET data_programu_styk_pomocniczy = '$data_programu_styk_pomocniczy' WHERE id = '$x'");
				}
				
				if($typ_wylacznik_nadpradowy!="-" && $typ_wylacznik_nadpradowy!=null)
				{
					$polaczenie->query("UPDATE roboty_oprogramowanie SET typ_wylacznik_nadpradowy = '$typ_wylacznik_nadpradowy' WHERE id = '$x'");
				}
				if($wersja_programu_wylacznik_nadpradowy!="-" && $wersja_programu_wylacznik_nadpradowy!=null)
				{
					$polaczenie->query("UPDATE roboty_oprogramowanie SET wersja_programu_wylacznik_nadpradowy = '$wersja_programu_wylacznik_nadpradowy' WHERE id = '$x'");
				}
				
				if($data_programu_wylacznik_nadpradowy!="-" && $data_programu_wylacznik_nadpradowy!=null)
				{
					$polaczenie->query("UPDATE roboty_oprogramowanie SET data_programu_wylacznik_nadpradowy = '$data_programu_wylacznik_nadpradowy' WHERE id = '$x'");
				}
				
				if($typ_rezystor!="-" && $typ_rezystor!=null)
				{
					$polaczenie->query("UPDATE roboty_oprogramowanie SET typ_rezystor = '$typ_rezystor' WHERE id = '$x'");
				}
				if($wersja_programu_rezystor!="-" && $wersja_programu_rezystor!=null)
				{
					$polaczenie->query("UPDATE roboty_oprogramowanie SET wersja_programu_rezystor = '$wersja_programu_rezystor' WHERE id = '$x'");
				}
				
				if($data_programu_rezystor!="-" && $data_programu_rezystor!=null)
				{
					$polaczenie->query("UPDATE roboty_oprogramowanie SET data_programu_rezystor = '$data_programu_rezystor' WHERE id = '$x'");
				}
				
				if($typ_przetwornica_stabilizujaca!="-" && $typ_przetwornica_stabilizujaca!=null)
				{
					$polaczenie->query("UPDATE roboty_oprogramowanie SET typ_przetwornica_stabilizujaca = '$typ_przetwornica_stabilizujaca' WHERE id = '$x'");
				}
				if($wersja_programu_przetwornica_stabilizujaca!="-" && $wersja_programu_przetwornica_stabilizujaca!=null)
				{
					$polaczenie->query("UPDATE roboty_oprogramowanie SET wersja_programu_przetwornica_stabilizujaca = '$wersja_programu_przetwornica_stabilizujaca' WHERE id = '$x'");
				}
				
				if($data_programu_przetwornica_stabilizujaca!="-" && $data_programu_przetwornica_stabilizujaca!=null)
				{
					$polaczenie->query("UPDATE roboty_oprogramowanie SET data_programu_przetwornica_stabilizujaca = '$data_programu_przetwornica_stabilizujaca' WHERE id = '$x'");
				}
				
				if($typ_zabezpieczenie_akumulatorow!="-" && $typ_zabezpieczenie_akumulatorow!=null)
				{
					$polaczenie->query("UPDATE roboty_oprogramowanie SET typ_zabezpieczenie_akumulatorow = '$typ_zabezpieczenie_akumulatorow' WHERE id = '$x'");
				}
				if($wersja_programu_zabezpieczenie_akumulatorow!="-" && $wersja_programu_zabezpieczenie_akumulatorow!=null)
				{
					$polaczenie->query("UPDATE roboty_oprogramowanie SET wersja_programu_zabezpieczenie_akumulatorow = '$wersja_programu_zabezpieczenie_akumulatorow' WHERE id = '$x'");
				}
				
				if($data_programu_zabezpieczenie_akumulatorow!="-" && $data_programu_zabezpieczenie_akumulatorow!=null)
				{
					$polaczenie->query("UPDATE roboty_oprogramowanie SET data_programu_zabezpieczenie_akumulatorow = '$data_programu_zabezpieczenie_akumulatorow' WHERE id = '$x'");
				}
	
					
			}	
				$polaczenie->close();
		}
			
		catch(Exception $e)
		{
			echo '<span style="color:red;">Błąd serwera!</span>';
			echo '<br />Informacja developerska: '.$e;
		}
		
		header('Location: Mechanika.php');
?>

