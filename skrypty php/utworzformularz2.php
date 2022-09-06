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
			
			$zglaszajacy_serwis = $_POST['zglaszajacy_serwis'];
			$adres_firmy = $_POST['adres_firmy'];
			$osoba_zglaszajaca = $_POST['osoba_zglaszajaca'];
			$tel = $_POST['tel'];
			$przyjecie_zgloszenia = $_POST['przyjecie_zgloszenia'];
			$serwisowal = $_POST['serwisowal'];
			$rozpoczecie_serwisu = $_POST['rozpoczecie_serwisu'];
			$przyczyna = $_POST['przyczyna'];
			$sposob = $_POST['sposob'];
			$materialy = $_POST['materialy'];
			$roboczogodziny = $_POST['roboczogodziny'];
			$km = $_POST['km'];
			$czas = $_POST['czas'];
			$uwagi = $_POST['uwagi'];
			

			$polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
				$rezultat = $polaczenie->query("SELECT id FROM roboty WHERE numer_seryjny ='$nr_robota'");
				$wiersz = $rezultat->fetch_assoc();
				$x = $wiersz['id'];
				
				
				//if (!$rezultat) throw new Exception($polaczenie->error);
				if($polaczenie->query("INSERT INTO roboty_formularz (id, zglaszajacy_serwis, adres_firmy, osoba_zglaszajaca, tel, przyjecie_zgloszenia, serwisowal, rozpoczecie_serwisu, przyczyna,sposob_zalatwienia_sprawy, zuzyte_materialy, ilosc_roboczogodzin, liczba_km, czas, uwagi) VALUES ('$x', '$zglaszajacy_serwis', '$adres_firmy','$osoba_zglaszajaca','$tel','$przyjecie_zgloszenia','$serwisowal','$rozpoczecie_serwisu','$przyczyna','$sposob','$materialy','$roboczogodziny','$km','$czas','$uwagi')")===TRUE)
				{
					header('Location: Formularz serwisowy.php');
				} 
				
                 
				$polaczenie->query("UPDATE roboty_formularz SET zglaszajacy_serwis='$zglaszajacy_serwis' WHERE id='$x'");
				 
                
				
                $polaczenie->query("UPDATE roboty_formularz SET adres_firmy='$adres_firmy' WHERE id='$x'");
				
                $polaczenie->query("UPDATE roboty_formularz SET osoba_zglaszajaca='$osoba_zglaszajaca' WHERE id='$x'");
				
                $polaczenie->query("UPDATE roboty_formularz SET tel='$tel' WHERE id='$x'");
				
                $polaczenie->query("UPDATE roboty_formularz SET przyjecie_zgloszenia='$przyjecie_zgloszenia' WHERE id='$x'");
				
                $polaczenie->query("UPDATE roboty_formularz SET serwisowal='$serwisowal' WHERE id='$x'");
				
                $polaczenie->query("UPDATE roboty_formularz SET rozpoczecie_serwisu='$rozpoczecie_serwisu' WHERE id='$x'");
				
                $polaczenie->query("UPDATE roboty_formularz SET przyczyna='$przyczyna' WHERE id='$x'");
				
                $polaczenie->query("UPDATE roboty_formularz SET sposob_zalatwienia_sprawy='$sposob' WHERE id='$x'");
				
                $polaczenie->query("UPDATE roboty_formularz SET zuzyte_materialy='$materialy' WHERE id='$x'");
				
                $polaczenie->query("UPDATE roboty_formularz SET ilosc_roboczogodzin='$roboczogodziny' WHERE id='$x'");
				
                $polaczenie->query("UPDATE roboty_formularz SET liczba_km='$km' WHERE id='$x'");
				
                $polaczenie->query("UPDATE roboty_formularz SET czas='$czas' WHERE id='$x'");
				
                $polaczenie->query("UPDATE roboty_formularz SET uwagi='$uwagi' WHERE id='$x'");
				
                $polaczenie->close();
               	header('Location: Formularz serwisowy.php');	
				
				
?> 