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

<?php 
            require_once "connect2.php";
			$nr_robota = $_SESSION['Numer_seryjny'];
			
			$data=$_POST['data'];
			$miejsce=$_POST['miejsce'];
			$uczestnicy=$_POST['uczestnicy'];
			$numer_1=$_POST['numer_1'];
			$numer_2=$_POST['numer_2'];
			$skaner_1=$_POST['skaner_1'];
			$skaner_1_nr_ser=$_POST['skaner_1_nr_ser'];
			$skaner_2=$_POST['skaner_2'];
			$skaner_2_nr_ser=$_POST['skaner_2_nr_ser'];
			$nr_rys=$_POST['nr_rys'];
			$nr_schematu_elektrycznego=$_POST['nr_schematu_elektrycznego'];
			$rok_produkcji=$_POST['rok_produkcji'];
			$max_predkosc=$_POST['max_predkosc'];
			$maksymalne_obciazenie=$_POST['maksymalne_obciazenie'];
			$maksymalne_dopuszczalne_obciazenie=$_POST['maksymalne_dopuszczalne_obciazenie'];
			$podloze=$_POST['podloze'];
			$pola_detekcji=$_POST['pola_detekcji'];
			$inne=$_POST['inne'];
			$probka_testowa=$_POST['probka_testowa'];
			$wymiary_probki=$_POST['wymiary_probki'];
			$umiejscowienie=$_POST['umiejscowienie'];
			$sila_uruchamiajaca=$_POST['sila_uruchamiajaca'];
			$uzyte_przyrzady=$_POST['uzyte_przyrzady'];
			$sposob_wykonania_testu=$_POST['sposob_wykonania_testu'];
			$uwagi_probka_testowa=$_POST['uwagi_probka_testowa'];
			$skaner_1_skaner_2_lewa=$_POST['skaner_1_skaner_2_lewa'];
			$predkosc_wozka_lewa=$_POST['predkosc_wozka_lewa'];
			$obciazenie_wozka_lewa=$_POST['obciazenie_wozka_lewa'];
			$nachylenie_powierzchni_lewa=$_POST['nachylenie_powierzchni_lewa'];
			$wykryta_przez_skaner_lewa_pomiar_1=$_POST['wykryta_przez_skaner_lewa_pomiar_1'];
			$wykryta_przez_skaner_lewa_pomiar_2=$_POST['wykryta_przez_skaner_lewa_pomiar_2'];
			$wykryta_przez_skaner_lewa_pomiar_3=$_POST['wykryta_przez_skaner_lewa_pomiar_3'];
			$zatrzymanie_wozka_lewa_pomiar_1=$_POST['zatrzymanie_wozka_lewa_pomiar_1'];
			$zatrzymanie_wozka_lewa_pomiar_2=$_POST['zatrzymanie_wozka_lewa_pomiar_2'];
			$zatrzymanie_wozka_lewa_pomiar_3=$_POST['zatrzymanie_wozka_lewa_pomiar_3'];
			$droga_hamowania_lewa_pomiar_1=$_POST['droga_hamowania_lewa_pomiar_1'];
			$droga_hamowania_lewa_pomiar_2=$_POST['droga_hamowania_lewa_pomiar_2'];
			$droga_hamowania_lewa_pomiar_3=$_POST['droga_hamowania_lewa_pomiar_3'];
			$skaner_1_skaner_2_srodek=$_POST['skaner_1_skaner_2_srodek'];
			$predkosc_wozka_srodek=$_POST['predkosc_wozka_srodek'];
			$obciazenie_wozka_srodek=$_POST['obciazenie_wozka_srodek'];
			$nachylenie_powierzchni_srodek=$_POST['nachylenie_powierzchni_srodek'];
			$wykryta_przez_skaner_srodek_pomiar_1=$_POST['wykryta_przez_skaner_srodek_pomiar_1'];
			$wykryta_przez_skaner_srodek_pomiar_2=$_POST['wykryta_przez_skaner_srodek_pomiar_2'];
			$wykryta_przez_skaner_srodek_pomiar_3=$_POST['wykryta_przez_skaner_srodek_pomiar_3'];
			$zatrzymanie_wozka_srodek_pomiar_1=$_POST['zatrzymanie_wozka_srodek_pomiar_1'];
			$zatrzymanie_wozka_srodek_pomiar_2=$_POST['zatrzymanie_wozka_srodek_pomiar_2'];
			$zatrzymanie_wozka_srodek_pomiar_3=$_POST['zatrzymanie_wozka_srodek_pomiar_3'];
			$droga_hamowania_srodek_pomiar_1=$_POST['droga_hamowania_srodek_pomiar_1'];
			$droga_hamowania_srodek_pomiar_2=$_POST['droga_hamowania_srodek_pomiar_2'];
			$droga_hamowania_srodek_pomiar_3=$_POST['droga_hamowania_srodek_pomiar_3'];
			$skaner_1_skaner_2_prawa=$_POST['skaner_1_skaner_2_prawa'];
			$predkosc_wozka_prawa=$_POST['predkosc_wozka_prawa'];
			$obciazenie_wozka_prawa=$_POST['obciazenie_wozka_prawa'];
			$nachylenie_powierzchni_prawa=$_POST['nachylenie_powierzchni_prawa'];
			$wykryta_przez_skaner_prawa_pomiar_1=$_POST['wykryta_przez_skaner_prawa_pomiar_1'];
			$wykryta_przez_skaner_prawa_pomiar_2=$_POST['wykryta_przez_skaner_prawa_pomiar_2'];
			$wykryta_przez_skaner_prawa_pomiar_3=$_POST['wykryta_przez_skaner_prawa_pomiar_3'];
			$zatrzymanie_wozka_prawa_pomiar_1=$_POST['zatrzymanie_wozka_prawa_pomiar_1'];
			$zatrzymanie_wozka_prawa_pomiar_2=$_POST['zatrzymanie_wozka_prawa_pomiar_2'];
			$zatrzymanie_wozka_prawa_pomiar_3=$_POST['zatrzymanie_wozka_prawa_pomiar_3'];
			$droga_hamowania_prawa_pomiar_1=$_POST['droga_hamowania_prawa_pomiar_1'];
			$droga_hamowania_prawa_pomiar_2=$_POST['droga_hamowania_prawa_pomiar_2'];
			$droga_hamowania_prawa_pomiar_3=$_POST['droga_hamowania_prawa_pomiar_3'];

			$polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
				$rezultat = $polaczenie->query("SELECT id FROM roboty WHERE numer_seryjny ='$nr_robota'");
				$wiersz = $rezultat->fetch_assoc();
				$x = $wiersz['id'];
				
				
				//if (!$rezultat) throw new Exception($polaczenie->error);
				if($polaczenie->query("INSERT INTO roboty_test_a (id,data, miejsce_badania,	uczestnicy_badania, numer_vin_1, numer_vin_2, skaner_1, skaner_1_nr_seryjny, skaner_2, skaner_2_nr_seryjny,	numer_rysunku,	numer_schematu_elektrycznego,	rok_produkcji,	maksymalna_predkosc,	maksymalne_obciazenie,	maksymalne_dopuszczalne_obciazenie,	podloze, pola_detekcji,	inne, probka_testowa,	wymiary_probki,	umiejscowienie_probki,	sila_uruchamiajaca,	uzyte_przyrzady,	sposob_wykonania_testu,	uwagi_1,skaner_1_2_lewa,	predkosc_wozka_lewa,	obciazenie_wozka_lewa,	nachylenie_powierzchni_lewa,	wykryta_przez_skaner_lewa_pomiar_1,	wykryta_przez_skaner_lewa_pomiar_2,	wykryta_przez_skaner_lewa_pomiar_3,	zatrzymanie_wozka_lewa_pomiar_1,	zatrzymanie_wozka_lewa_pomiar_2	,zatrzymanie_wozka_lewa_pomiar_3,	droga_hamowania_lewa_pomiar_1,	droga_hamowania_lewa_pomiar_2,	droga_hamowania_lewa_pomiar_3,	skaner_1_skaner_2_srodek,	predkosc_wozka_srodek,	obciazenie_wozka_srodek,	nachylenie_powierzchni_srodek,	wykryta_przez_skaner_srodek_pomiar_1,	wykryta_przez_skaner_srodek_pomiar_2,	wykryta_przez_skaner_srodek_pomiar_3,	zatrzymanie_wozka_srodek_pomiar_1,	zatrzymanie_wozka_srodek_pomiar_2,	zatrzymanie_wozka_srodek_pomiar_3,	droga_hamowania_srodek_pomiar_1	,droga_hamowania_srodek_pomiar_2,	droga_hamowania_srodek_pomiar_3	,skaner_1_skaner_2_prawa,	predkosc_wozka_prawa,	obciazenie_wozka_prawa,	nachylenie_powierzchni_prawa,	wykryta_przez_skaner_prawa_pomiar_1,	wykryta_przez_skaner_prawa_pomiar_2,	wykryta_przez_skaner_prawa_pomiar_3,	zatrzymanie_wozka_prawa_pomiar_1,	zatrzymanie_wozka_prawa_pomiar_2,	zatrzymanie_wozka_prawa_pomiar_3,	droga_hamowania_prawa_pomiar_1	,droga_hamowania_prawa_pomiar_2,	droga_hamowania_prawa_pomiar_3) VALUES ('$x','$data', '$miejsce','$uczestnicy','$numer_1','$numer_2','$skaner_1','$skaner_1_nr_ser','$skaner_2','$skaner_2_nr_ser','$nr_rys','$nr_schematu_elektrycznego','$rok_produkcji','$max_predkosc','$maksymalne_obciazenie','$maksymalne_dopuszczalne_obciazenie','$podloze','$pola_detekcji','$inne','$probka_testowa','$wymiary_probki','$umiejscowienie','$sila_uruchamiajaca','$uzyte_przyrzady','$sposob_wykonania_testu','$uwagi_probka_testowa','$skaner_1_skaner_2_lewa','$predkosc_wozka_lewa','$obciazenie_wozka_lewa','$nachylenie_powierzchni_lewa','$wykryta_przez_skaner_lewa_pomiar_1','$wykryta_przez_skaner_lewa_pomiar_2','$wykryta_przez_skaner_lewa_pomiar_3','$zatrzymanie_wozka_lewa_pomiar_1','$zatrzymanie_wozka_lewa_pomiar_2','$zatrzymanie_wozka_lewa_pomiar_3','$droga_hamowania_lewa_pomiar_1','$droga_hamowania_lewa_pomiar_2','$droga_hamowania_lewa_pomiar_3','$skaner_1_skaner_2_srodek','$predkosc_wozka_srodek','$obciazenie_wozka_srodek','$nachylenie_powierzchni_srodek','$wykryta_przez_skaner_srodek_pomiar_1','$wykryta_przez_skaner_srodek_pomiar_2','$wykryta_przez_skaner_srodek_pomiar_3','$zatrzymanie_wozka_srodek_pomiar_1','$zatrzymanie_wozka_srodek_pomiar_2','$zatrzymanie_wozka_srodek_pomiar_3','$droga_hamowania_srodek_pomiar_1','$droga_hamowania_srodek_pomiar_2','$droga_hamowania_srodek_pomiar_3','$skaner_1_skaner_2_prawa','$predkosc_wozka_prawa','$obciazenie_wozka_prawa','$nachylenie_powierzchni_prawa','$wykryta_przez_skaner_prawa_pomiar_1','$wykryta_przez_skaner_prawa_pomiar_2','$wykryta_przez_skaner_prawa_pomiar_3','$zatrzymanie_wozka_prawa_pomiar_1','$zatrzymanie_wozka_prawa_pomiar_2','$zatrzymanie_wozka_prawa_pomiar_3','$droga_hamowania_prawa_pomiar_1','$droga_hamowania_prawa_pomiar_2','$droga_hamowania_prawa_pomiar_3')")===TRUE)
				{
					header('Location: test_a.php');
				} 
				
				if($data!=null)
				{
				$polaczenie->query("UPDATE roboty_test_a SET data='$data' WHERE id='$x'");
				}
				if($miejsce!=null)
				{
                $polaczenie->query("UPDATE roboty_test_a SET miejsce_badania='$miejsce' WHERE id='$x'");
				}
				if($uczestnicy!=null)
				{
                $polaczenie->query("UPDATE roboty_test_a SET uczestnicy_badania='$uczestnicy' WHERE id='$x'");
				}
				if($numer_1!=null)
				{
                $polaczenie->query("UPDATE roboty_test_a SET numer_vin_1='$numer_1' WHERE id='$x'");
				}
				if($numer_2!=null)
				{
                $polaczenie->query("UPDATE roboty_test_a SET numer_vin_2='$numer_2' WHERE id='$x'");
				}
				
				if($skaner_1!=null)
				{
                $polaczenie->query("UPDATE roboty_test_a SET skaner_1='$skaner_1' WHERE id='$x'");
				}
				if($skaner_1_nr_ser!=null)
				{
                $polaczenie->query("UPDATE roboty_test_a SET skaner_1_nr_seryjny='$skaner_1_nr_ser' WHERE id='$x'");
				}
				if($skaner_2!=null)
				{
                $polaczenie->query("UPDATE roboty_test_a SET skaner_2='$skaner_2' WHERE id='$x'");
				}
				if($skaner_2_nr_ser!=null)
				{
                $polaczenie->query("UPDATE roboty_test_a SET skaner_2_nr_seryjny='$skaner_2_nr_ser' WHERE id='$x'");
				}
				if($nr_rys!=null)
				{
                $polaczenie->query("UPDATE roboty_test_a SET numer_rysunku='$nr_rys' WHERE id='$x'");
				}
				
				if($nr_schematu_elektrycznego!=null)
				{
                $polaczenie->query("UPDATE roboty_test_a SET numer_schematu_elektrycznego='$nr_schematu_elektrycznego' WHERE id='$x'");
				}
				
				if($rok_produkcji!=null)
				{
                $polaczenie->query("UPDATE roboty_test_a SET rok_produkcji='$rok_produkcji' WHERE id='$x'");
				}
				
				if($max_predkosc!=null)
				{
                $polaczenie->query("UPDATE roboty_test_a SET maksymalna_predkosc='$max_predkosc' WHERE id='$x'");
				}
				
				if($maksymalne_obciazenie!=null)
				{
                $polaczenie->query("UPDATE roboty_test_a SET maksymalne_obciazenie='$maksymalne_obciazenie' WHERE id='$x'");
				}
				///////
				if($maksymalne_dopuszczalne_obciazenie!=null)
				{
				$polaczenie->query("UPDATE roboty_test_a SET maksymalne_dopuszczalne_obciazenie='$maksymalne_dopuszczalne_obciazenie' WHERE id='$x'");
				}
				
				if($podloze!=null)
				{
                $polaczenie->query("UPDATE roboty_test_a SET podloze='$podloze' WHERE id='$x'");
				}
				
				if($pola_detekcji!=null)
				{
                $polaczenie->query("UPDATE roboty_test_a SET pola_detekcji='$pola_detekcji' WHERE id='$x'");
				}
				
				if($inne!=null)
				{
				$polaczenie->query("UPDATE roboty_test_a SET inne='$inne' WHERE id='$x'");
				}
                
				if($probka_testowa!=null)
				{
                $polaczenie->query("UPDATE roboty_test_a SET probka_testowa='$probka_testowa' WHERE id='$x'");
				}
				
				if($wymiary_probki!=null)
				{
                $polaczenie->query("UPDATE roboty_test_a SET wymiary_probki='$wymiary_probki' WHERE id='$x'");
				}
				
				if($umiejscowienie!=null)
				{
                $polaczenie->query("UPDATE roboty_test_a SET umiejscowienie_probki='$umiejscowienie' WHERE id='$x'");
				}
				
				if($sila_uruchamiajaca!=null)
				{
				$polaczenie->query("UPDATE roboty_test_a SET sila_uruchamiajaca='$sila_uruchamiajaca' WHERE id='$x'");
				}
				
				if($uzyte_przyrzady!=null)
				{
                $polaczenie->query("UPDATE roboty_test_a SET uzyte_przyrzady='$uzyte_przyrzady' WHERE id='$x'");
				}
				
				if($sposob_wykonania_testu!=null)
				{
                $polaczenie->query("UPDATE roboty_test_a SET sposob_wykonania_testu='$sposob_wykonania_testu' WHERE id='$x'");
				}
				
				if($uwagi_probka_testowa!=null)
				{
                $polaczenie->query("UPDATE roboty_test_a SET uwagi_1='$uwagi_probka_testowa' WHERE id='$x'");
				}
				
				if($skaner_1_skaner_2_lewa!=null)
				{
                $polaczenie->query("UPDATE roboty_test_a SET skaner_1_2_lewa='$skaner_1_skaner_2_lewa' WHERE id='$x'");
				}
				
				if($predkosc_wozka_lewa!=null)
				{
                $polaczenie->query("UPDATE roboty_test_a SET predkosc_wozka_lewa='$predkosc_wozka_lewa' WHERE id='$x'");
				}
				
				if($obciazenie_wozka_lewa!=null)
				{
                $polaczenie->query("UPDATE roboty_test_a SET obciazenie_wozka_lewa='$obciazenie_wozka_lewa' WHERE id='$x'");
				}
				
				if($nachylenie_powierzchni_lewa!=null)
				{
				$polaczenie->query("UPDATE roboty_test_a SET nachylenie_powierzchni_lewa='$nachylenie_powierzchni_lewa' WHERE id='$x'");
				}
				
				if($wykryta_przez_skaner_lewa_pomiar_1!=null)
				{
                $polaczenie->query("UPDATE roboty_test_a SET wykryta_przez_skaner_lewa_pomiar_1='$wykryta_przez_skaner_lewa_pomiar_1' WHERE id='$x'");
				}
				
				if($wykryta_przez_skaner_lewa_pomiar_2!=null)
				{
                $polaczenie->query("UPDATE roboty_test_a SET wykryta_przez_skaner_lewa_pomiar_2='$wykryta_przez_skaner_lewa_pomiar_2' WHERE id='$x'");
				}
				
				if($wykryta_przez_skaner_lewa_pomiar_3!=null)
				{
                $polaczenie->query("UPDATE roboty_test_a SET wykryta_przez_skaner_lewa_pomiar_3='$wykryta_przez_skaner_lewa_pomiar_3' WHERE id='$x'");
				}
				
				if($zatrzymanie_wozka_lewa_pomiar_1!=null)
				{
                $polaczenie->query("UPDATE roboty_test_a SET zatrzymanie_wozka_lewa_pomiar_1='$zatrzymanie_wozka_lewa_pomiar_1' WHERE id='$x'");
				}
				
				if($zatrzymanie_wozka_lewa_pomiar_2!=null)
				{
                $polaczenie->query("UPDATE roboty_test_a SET zatrzymanie_wozka_lewa_pomiar_2='$zatrzymanie_wozka_lewa_pomiar_2' WHERE id='$x'");
				}
				
				if($zatrzymanie_wozka_lewa_pomiar_3!=null)
				{
                $polaczenie->query("UPDATE roboty_test_a SET zatrzymanie_wozka_lewa_pomiar_3='$zatrzymanie_wozka_lewa_pomiar_3' WHERE id='$x'");
				}
				
				if($droga_hamowania_lewa_pomiar_1!=null)
				{
				$polaczenie->query("UPDATE roboty_test_a SET droga_hamowania_lewa_pomiar_1='$droga_hamowania_lewa_pomiar_1' WHERE id='$x'");
				}
				
				if($droga_hamowania_lewa_pomiar_2!=null)
				{
                $polaczenie->query("UPDATE roboty_test_a SET droga_hamowania_lewa_pomiar_2='$droga_hamowania_lewa_pomiar_2' WHERE id='$x'");
				}
				
				if($droga_hamowania_lewa_pomiar_3!=null)
				{
                $polaczenie->query("UPDATE roboty_test_a SET droga_hamowania_lewa_pomiar_3='$droga_hamowania_lewa_pomiar_3' WHERE id='$x'");
				}
				
				if($skaner_1_skaner_2_srodek!=null)
				{
                $polaczenie->query("UPDATE roboty_test_a SET skaner_1_skaner_2_srodek='$skaner_1_skaner_2_srodek' WHERE id='$x'");
				}
				
				if($predkosc_wozka_srodek!=null)
				{
                $polaczenie->query("UPDATE roboty_test_a SET predkosc_wozka_srodek='$predkosc_wozka_srodek' WHERE id='$x'");
				}
				
				if($obciazenie_wozka_srodek!=null)
				{
                $polaczenie->query("UPDATE roboty_test_a SET obciazenie_wozka_srodek='$obciazenie_wozka_srodek' WHERE id='$x'");
				}
				
				if($nachylenie_powierzchni_srodek!=null)
				{
                $polaczenie->query("UPDATE roboty_test_a SET nachylenie_powierzchni_srodek	='$nachylenie_powierzchni_srodek' WHERE id='$x'");
				}
				
				if($wykryta_przez_skaner_srodek_pomiar_1!=null)
				{
				$polaczenie->query("UPDATE roboty_test_a SET wykryta_przez_skaner_srodek_pomiar_1='$wykryta_przez_skaner_srodek_pomiar_1' WHERE id='$x'");
				}
				
				if($wykryta_przez_skaner_srodek_pomiar_2!=null)
				{
				$polaczenie->query("UPDATE roboty_test_a SET wykryta_przez_skaner_srodek_pomiar_2='$wykryta_przez_skaner_srodek_pomiar_2' WHERE id='$x'");
				}
				
				if($wykryta_przez_skaner_srodek_pomiar_3!=null)
				{
                $polaczenie->query("UPDATE roboty_test_a SET wykryta_przez_skaner_srodek_pomiar_3='$wykryta_przez_skaner_srodek_pomiar_3' WHERE id='$x'");
				}
				
				if($zatrzymanie_wozka_srodek_pomiar_1!=null)
				{
                $polaczenie->query("UPDATE roboty_test_a SET zatrzymanie_wozka_srodek_pomiar_1='$zatrzymanie_wozka_srodek_pomiar_1' WHERE id='$x'");
				}
				
				if($zatrzymanie_wozka_srodek_pomiar_2!=null)
				{
                $polaczenie->query("UPDATE roboty_test_a SET zatrzymanie_wozka_srodek_pomiar_2='$zatrzymanie_wozka_srodek_pomiar_2' WHERE id='$x'");
				}
				
				if($zatrzymanie_wozka_srodek_pomiar_3!=null)
				{
                $polaczenie->query("UPDATE roboty_test_a SET zatrzymanie_wozka_srodek_pomiar_3='$zatrzymanie_wozka_srodek_pomiar_3' WHERE id='$x'");
				}
				
				if($droga_hamowania_srodek_pomiar_1!=null)
				{
                $polaczenie->query("UPDATE roboty_test_a SET droga_hamowania_srodek_pomiar_1='$droga_hamowania_srodek_pomiar_1' WHERE id='$x'");
				}
				
				if($droga_hamowania_srodek_pomiar_2!=null)
				{
                $polaczenie->query("UPDATE roboty_test_a SET droga_hamowania_srodek_pomiar_2='$droga_hamowania_srodek_pomiar_2' WHERE id='$x'");
				}
				if($droga_hamowania_srodek_pomiar_3!=null)
				{
				 $polaczenie->query("UPDATE roboty_test_a SET droga_hamowania_srodek_pomiar_3='$droga_hamowania_srodek_pomiar_3' WHERE id='$x'");
				}
				
                /*$polaczenie->query("UPDATE roboty_test_a SET zatrzymanie_wozka_srodek_pomiar_1='$materialy' WHERE id='$x'"); */
				
				if($skaner_1_skaner_2_prawa!=null)
				{
                $polaczenie->query("UPDATE roboty_test_a SET skaner_1_skaner_2_prawa='$skaner_1_skaner_2_prawa' WHERE id='$x'");
				}
				
				if($predkosc_wozka_prawa!=null)
				{
                $polaczenie->query("UPDATE roboty_test_a SET predkosc_wozka_prawa='$predkosc_wozka_prawa' WHERE id='$x'");
				}
				
				if($obciazenie_wozka_prawa!=null)
				{
                $polaczenie->query("UPDATE roboty_test_a SET obciazenie_wozka_prawa='$obciazenie_wozka_prawa' WHERE id='$x'");
				}
				
				if($nachylenie_powierzchni_prawa!=null)
				{
                $polaczenie->query("UPDATE roboty_test_a SET nachylenie_powierzchni_prawa='$nachylenie_powierzchni_prawa' WHERE id='$x'");
				}
				
				if($wykryta_przez_skaner_prawa_pomiar_1!=null)
				{
				$polaczenie->query("UPDATE roboty_test_a SET wykryta_przez_skaner_prawa_pomiar_1='$wykryta_przez_skaner_prawa_pomiar_1' WHERE id='$x'");
				}
				
				
				if($wykryta_przez_skaner_prawa_pomiar_2!=null)
				{
				 $polaczenie->query("UPDATE roboty_test_a SET wykryta_przez_skaner_prawa_pomiar_2='$wykryta_przez_skaner_prawa_pomiar_2' WHERE id='$x'");
				}
				
				if($wykryta_przez_skaner_prawa_pomiar_3!=null)
				{
                $polaczenie->query("UPDATE roboty_test_a SET wykryta_przez_skaner_prawa_pomiar_3='$wykryta_przez_skaner_prawa_pomiar_3' WHERE id='$x'");
				}
				
				if($zatrzymanie_wozka_prawa_pomiar_1!=null)
				{
                $polaczenie->query("UPDATE roboty_test_a SET zatrzymanie_wozka_prawa_pomiar_1='$zatrzymanie_wozka_prawa_pomiar_1' WHERE id='$x'");
				}
				
				if($zatrzymanie_wozka_prawa_pomiar_2!=null)
				{
                $polaczenie->query("UPDATE roboty_test_a SET zatrzymanie_wozka_prawa_pomiar_2='$zatrzymanie_wozka_prawa_pomiar_2' WHERE id='$x'");
				}
				
				if($zatrzymanie_wozka_prawa_pomiar_3!=null)
				{
                $polaczenie->query("UPDATE roboty_test_a SET zatrzymanie_wozka_prawa_pomiar_3='$zatrzymanie_wozka_prawa_pomiar_3' WHERE id='$x'");
				}
				
				if($droga_hamowania_prawa_pomiar_1!=null)
				{
                $polaczenie->query("UPDATE roboty_test_a SET droga_hamowania_prawa_pomiar_1='$droga_hamowania_prawa_pomiar_1' WHERE id='$x'");
				}
				
				//
				if($droga_hamowania_prawa_pomiar_2!=null)
				{
				$polaczenie->query("UPDATE roboty_test_a SET droga_hamowania_prawa_pomiar_2='$droga_hamowania_prawa_pomiar_2' WHERE id='$x'");
				}
				
				if($droga_hamowania_prawa_pomiar_3!=null)
				{
				$polaczenie->query("UPDATE roboty_test_a SET droga_hamowania_prawa_pomiar_3='$droga_hamowania_prawa_pomiar_3' WHERE id='$x'");
				}
				
				
                $polaczenie->close();
               	header('Location: test_a.php');	
				
				
?> 