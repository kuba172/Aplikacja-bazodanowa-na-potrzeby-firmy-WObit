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
<title> Test B </title>
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
<h1>Uzupełnij Test B:</h1>
<form action="uzupelnij_test_b_2.php" method="post">
      <h3>Data:</h3>
	  <input type="text" name="data" /> 
      <br/> 
      <h2>Miejsce i uczestnicy badania</h2>
	  <h3>Miejsce badania:</h3>
	  <input type="text" name="miejsce" /> 
      <br/> 
	  <h3>Uczestnicy badania:</h3>
	  <input type="text" name="uczestnicy" /> 
      <br/>
	  <h2>Zebranie danych wejściowych o badanym wózku wejściowym</h2>
	  <h3>Numer VIN 1 / nr identyfikacyjny 1 / nr seryjny:</h3>
	  <input type="text" name="numer_1" /> 
      <br/> 
	  <h3>Numer VIN 2:</h3>
	  <input type="text" name="numer_2" /> 
      <br/> 
	  <h3>Skaner 1 (nazwa, typ, producent):</h3>
	  <input type="text" name="skaner_1" /> 
      <br/> 
	  <h3>Skaner 1 (nr seryjny):</h3>
	  <input type="text" name="skaner_1_nr_ser" /> 
      <br/> 
	  <h3>Skaner 2 (nazwa, typ, producent):</h3>
	  <input type="text" name="skaner_2" /> 
      <br/> 
	  <h3>Skaner 2 (nr seryjny):</h3>
	  <input type="text" name="skaner_2_nr_ser" /> 
      <br/>
	  <h3>Numer rysunku:</h3>
	  <input type="text" name="nr_rys" /> 
      <br/> 
	  <h3>Numer schematu elektrycznego:</h3>
	  <input type="text" name="nr_schematu_elektrycznego" /> 
      <br/> 
	  <h3>Rok produkcji:</h3>
	  <input type="text" name="rok_produkcji" /> 
      <br/> 
	  <h3>Maksymalna prędkość:</h3>
	  <input type="text" name="max_predkosc" /> 
      <br/> 
	  <h3>Maksymalne obciążenie / maksymalny uciąg przy braku nachylenia powierzchni:</h3>
	  <input type="text" name="maksymalne_obciazenie" /> 
      <br/>
      <h3>Maksymalne dopuszczalne obciążenie / maksymalny uciąg dla maksymalnego nachylenia powierzchni:</h3>
	  <input type="text" name="maksymalne_dopuszczalne_obciazenie" /> 
      <br/>
		<h3>Podłoże po którym może poruszać się wózek:</h3>
	  <input type="text" name="podloze" /> 
      <br/> 	
		<h3>Pola detekcji i ich zakres:</h3>
	  <input type="text" name="pola_detekcji" /> 
      <br/> 	
	<h3>Inne:</h3>
	  <input type="text" name="inne" /> 
      <br/> 
<h2>Przygotowanie próbek testowych i miejsca badania do przeprowadzenia testu</h2>
<h2>Próbka testowa i miejsce badania (wymagania dotyczące drogi wózka)</h2>
	  <h3>Próbka testowa:</h3>
	  <input type="text" name="probka_testowa" />
      <br/> 
	  <h3>Wymiary próbki:</h3>
	  <input type="text" name="wymiary_probki" /> 
      <br/> 
	  <h3>Umiejscowanie próbki na drodze wózka:</h3>
	  <input type="text" name="umiejscowienie" /> 
      <br/> 
	  <h3>Siła uruchamiająca - w przypadku środków detekcji uruchamianych za pomocą kontaktu:</h3>
	  <input type="text" name="sila_uruchamiajaca" /> 
      <br/> 
	  <h2>Wykonanie opisu przeprowadzanego testu wraz ze zdjęciami</h2>
	  <h3>Użyte przyrządy pomiarowe, oprogramowanie:</h3>
	  <input type="text" name="uzyte_przyrzady" /> 
      <br/> 
	  <h3>Sposób wykonania testu:</h3>
	  <input type="text" name="sposob_wykonania_testu" /> 
      <br/> 
	  <h3>Uwagi</h3>
	  <input type="text" name="uwagi_probka_testowa" /> 
      <br/> 
	  <h2>Wyniki pomiarów:</h2>  
      <h2>Próbka do badań przy lewej krawędzi wózka</h2>
	  <h3>Skaner 1 / Skaner 2:</h3>
	  <input type="text" name="skaner_1_skaner_2_lewa" /> 
      <br/>
	  <h3>Prędkość wózka:</h3>
	  <input type="text" name="predkosc_wozka_lewa" /> 
      <br/> 
	  <h3>Obciążenie wózka:</h3>
	  <input type="text" name="obciazenie_wozka_lewa" /> 
      <br/> 
	  <h3>Nachylenie powierzchni:</h3>
	  <input type="text" name="nachylenie_powierzchni_lewa" /> 
      <br/>
	   <h3>Odległość próbki od wózka, w jakiej została wykryta przez skaner [mm] - A - pomiar 1:</h3>
	  <input type="text" name="wykryta_przez_skaner_lewa_pomiar_1" /> 
      <br/>
<h3>Odległość próbki od wózka, w jakiej została wykryta przez skaner [mm] - A - pomiar 2:</h3>
	  <input type="text" name="wykryta_przez_skaner_lewa_pomiar_2" /> 
      <br/> 
<h3>Odległość próbki od wózka, w jakiej została wykryta przez skaner [mm] - A - pomiar 3:</h3>
	  <input type="text" name="wykryta_przez_skaner_lewa_pomiar_3" /> 
      <br/>
 <h3>Odległość od próbki po przejechaniu, której nastąpiło zatrzymanie wózka [mm] - B - pomiar 1:</h3>
	  <input type="text" name="zatrzymanie_wozka_lewa_pomiar_1" /> 
      <br/>
<h3>Odległość od próbki po przejechaniu, której nastąpiło zatrzymanie wózka [mm] - B - pomiar 2:</h3>
	  <input type="text" name="zatrzymanie_wozka_lewa_pomiar_2" /> 
      <br/> 
<h3>Odległość od próbki po przejechaniu, której nastąpiło zatrzymanie wózka [mm] - B - pomiar 3:</h3>
	  <input type="text" name="zatrzymanie_wozka_lewa_pomiar_3" /> 
      <br/>
<h3>Długość drogi hamowania [mm] C = A - B - pomiar 1:</h3>
	  <input type="text" name="droga_hamowania_lewa_pomiar_1" /> 
      <br/>
<h3>Długość drogi hamowania [mm] C = A - B - pomiar 2:</h3>
	  <input type="text" name="droga_hamowania_lewa_pomiar_2" /> 
      <br/> 
<h3>Długość drogi hamowania [mm] C = A - B - pomiar 3:</h3>
	  <input type="text" name="droga_hamowania_lewa_pomiar_3" /> 
      <br/> 
 
<h2>Wyniki pomiarów:</h2>  
      <h2>Próbka do badań na środku drogi wózka</h2>
	  <h3>Skaner 1 / Skaner 2:</h3>
	  <input type="text" name="skaner_1_skaner_2_srodek" /> 
      <br/>
	  <h3>Prędkość wózka:</h3>
	  <input type="text" name="predkosc_wozka_srodek" /> 
      <br/> 
	  <h3>Obciążenie wózka:</h3>
	  <input type="text" name="obciazenie_wozka_srodek" /> 
      <br/> 
	  <h3>Nachylenie powierzchni:</h3>
	  <input type="text" name="nachylenie_powierzchni_srodek" /> 
      <br/>
	   <h3>Odległość próbki od wózka, w jakiej została wykryta przez skaner [mm] - A - pomiar 1:</h3>
	  <input type="text" name="wykryta_przez_skaner_srodek_pomiar_1" /> 
      <br/>
<h3>Odległość próbki od wózka, w jakiej została wykryta przez skaner [mm] - A - pomiar 2:</h3>
	  <input type="text" name="wykryta_przez_skaner_srodek_pomiar_2" /> 
      <br/> 
<h3>Odległość próbki od wózka, w jakiej została wykryta przez skaner [mm] - A - pomiar 3:</h3>
	  <input type="text" name="wykryta_przez_skaner_srodek_pomiar_3" /> 
      <br/>
 <h3>Odległość od próbki po przejechaniu, której nastąpiło zatrzymanie wózka [mm] - B - pomiar 1:</h3>
	  <input type="text" name="zatrzymanie_wozka_srodek_pomiar_1" /> 
      <br/>
<h3>Odległość od próbki po przejechaniu, której nastąpiło zatrzymanie wózka [mm] - B - pomiar 2:</h3>
	  <input type="text" name="zatrzymanie_wozka_srodek_pomiar_2" /> 
      <br/> 
<h3>Odległość od próbki po przejechaniu, której nastąpiło zatrzymanie wózka [mm] - B - pomiar 3:</h3>
	  <input type="text" name="zatrzymanie_wozka_srodek_pomiar_3" /> 
      <br/>
<h3>Długość drogi hamowania [mm] C = A - B - pomiar 1:</h3>
	  <input type="text" name="droga_hamowania_srodek_pomiar_1" /> 
      <br/>
<h3>Długość drogi hamowania [mm] C = A - B - pomiar 2:</h3>
	  <input type="text" name="droga_hamowania_srodek_pomiar_2" /> 
      <br/> 
<h3>Długość drogi hamowania [mm] C = A - B - pomiar 3:</h3>
	  <input type="text" name="droga_hamowania_srodek_pomiar_3" /> 
      <br/> 
<h2>Wyniki pomiarów:</h2>  
      <h2>Próbka do badań przy prawej krawędzi drogi wózka</h2>
	  <h3>Skaner 1 / Skaner 2:</h3>
	  <input type="text" name="skaner_1_skaner_2_prawa" /> 
      <br/>
	  <h3>Prędkość wózka:</h3>
	  <input type="text" name="predkosc_wozka_prawa" /> 
      <br/> 
	  <h3>Obciążenie wózka:</h3>
	  <input type="text" name="obciazenie_wozka_prawa" /> 
      <br/> 
	  <h3>Nachylenie powierzchni:</h3>
	  <input type="text" name="nachylenie_powierzchni_prawa" /> 
      <br/>
	   <h3>Odległość próbki od wózka, w jakiej została wykryta przez skaner [mm] - A - pomiar 1:</h3>
	  <input type="text" name="wykryta_przez_skaner_prawa_pomiar_1" /> 
      <br/>
<h3>Odległość próbki od wózka, w jakiej została wykryta przez skaner [mm] - A - pomiar 2:</h3>
	  <input type="text" name="wykryta_przez_skaner_prawa_pomiar_2" /> 
      <br/> 
<h3>Odległość próbki od wózka, w jakiej została wykryta przez skaner [mm] - A - pomiar 3:</h3>
	  <input type="text" name="wykryta_przez_skaner_prawa_pomiar_3" /> 
      <br/>
 <h3>Odległość od próbki po przejechaniu, której nastąpiło zatrzymanie wózka [mm] - B - pomiar 1:</h3>
	  <input type="text" name="zatrzymanie_wozka_prawa_pomiar_1" /> 
      <br/>
<h3>Odległość od próbki po przejechaniu, której nastąpiło zatrzymanie wózka [mm] - B - pomiar 2:</h3>
	  <input type="text" name="zatrzymanie_wozka_prawa_pomiar_2" /> 
      <br/> 
<h3>Odległość od próbki po przejechaniu, której nastąpiło zatrzymanie wózka [mm] - B - pomiar 3:</h3>
	  <input type="text" name="zatrzymanie_wozka_prawa_pomiar_3" /> 
      <br/>
<h3>Długość drogi hamowania [mm] C = A - B - pomiar 1:</h3>
	  <input type="text" name="droga_hamowania_prawa_pomiar_1" /> 
      <br/>
<h3>Długość drogi hamowania [mm] C = A - B - pomiar 2:</h3>
	  <input type="text" name="droga_hamowania_prawa_pomiar_2" /> 
      <br/> 
<h3>Długość drogi hamowania [mm] C = A - B - pomiar 3:</h3>
	  <input type="text" name="droga_hamowania_prawa_pomiar_3" /> 
      <br/>  	 	  
	 
	  
      <button type="submit">Zatwierdź</button>
 </form>

<div id ="dolny_panel">
<?php

echo '<br/><br/> <a href="test_b.php">Wróć</a></p>';

?>
</div>

</div>
</body>

</html>