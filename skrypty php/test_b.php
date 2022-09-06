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
<title> Testy AB </title>
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
     min-width :200px;
 }

table {
	min-width: 800px;
	min-height: 400px;
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

<h1>Testy AB: </h1>
<p><b><a href = "test_a.php">Test A</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href = "test_b.php">Test B</a></b></p>
<h2>Test B:</h2>

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
				$rezultat2 = $polaczenie->query("SELECT * FROM roboty_test_b WHERE id='$x'");
				$wiersz2 = $rezultat2->fetch_assoc();
				if (!$rezultat) throw new Exception($polaczenie->error);
echo "<b>Data:".@$wiersz2['data']."</b><br/><br/><b>Miejsce i uczestnicy badania</b><br/><table><tr><td>Miejsce badania:</td><td>".@$wiersz2['miejsce_badania']."</td></tr><tr><td>Uczestnicy badania:</td><td>".@$wiersz2['uczestnicy_badania']."</td></tr></table><br/><br/><b>Zebranie danych wejściowych o badanym wózku jezdniowym</b><br/><table><tr><td>Wózek (nazwa,typ)</td><td>".@$wiersz['typ']." ".@$wiersz['seria']."</td></tr><tr><td>Numer VIN 1 / nr identyfikacyjny 1 / nr seryjny</td><td>".@$wiersz2['numer_vin_1']."</td></tr><tr><td>Numer VIN 2</td><td>".@$wiersz2['numer_vin_2']."</td></tr><tr><td>Skaner 1 (nazwa, typ, producent)</td><td>".@$wiersz2['skaner_1']."</td></tr><tr><td>Skaner 1 (nr seryjny)</td><td>".@$wiersz2['skaner_1_nr_seryjny']."</td></tr><tr><td>Skaner 2 (nazwa, typ, producent)</td><td>".@$wiersz2['skaner_2']."</td></tr><tr><td>Skaner 2 (nr seryjny)</td><td>".@$wiersz2['skaner_2_nr_seryjny']."</td></tr><tr><td>Numer rysunku</td><td>".@$wiersz2['numer_rysunku']."</td></tr><tr><td>Numer schematu elektrycznego</td><td>".@$wiersz2['numer_schematu_elektrycznego']."</td></tr><tr><td>Rok produkcji</td><td>".@$wiersz2['rok_produkcji']."</td></tr><tr><td>Maksymalna prędkość</td><td>".@$wiersz2['maksymalna_predkosc']."</td></tr><tr><td>Maksymalne obciążenie / maksymalny uciąg przy braku nachylenia powierzchni</td><td>".@$wiersz2['maksymalne_obciazenie']."</td></tr><tr><td>Maksymalne dopuszczalne obciążenie / maksymalny uciąg dla maksymalnego nachylenia powierzchni</td><td>".@$wiersz2['maksymalne_dopuszczalne_obciazenie']."</td></tr><tr><td>Podłoże po którym może poruszać się wózek</td><td>".@$wiersz2['podloze']."</td></tr><tr><td>Pola detekcji i ich zakres</td><td>".@$wiersz2['pola_detekcji']."</td></tr><tr><td>Inne</td><td>".@$wiersz2['inne']."</td></table><br/><br/>
<b>Przygotowanie próbek testowych i miejsca badania do przeprowadzenia testu</b><br/><table><tr>
<td colspan = '2'>Próbka testowa i miejsce badania (wymagania dotyczące drogi wózka)</td></tr><tr>
<td>Próbka testowa</td><td>".@$wiersz2['probka_testowa']."</td></tr><tr><td>Wymiary próbki</td><td>".@$wiersz2['wymiary_probki']."</td></tr><tr><td>Umiejscowanie próbki na drodze wózka</td><td>".@$wiersz2['umiejscowienie_probki']."</td></tr><tr><td>Siła uruchamiająca - w przypadku środków detekcji uruchamianych za pomocą kontaktu</td><td>".@$wiersz2['sila_uruchamiajaca']."</td></tr></table><br/><br/><b>Wykonanie opisu przeprowadzanego testu wraz ze zdjęciami</b><br/><table><tr><td>Użyte przyrządy pomiarowe, oprogramowanie</td><td>".@$wiersz2['uzyte_przyrzady']."</td></tr><tr><td>Sposób wykonania testu</td><td>".@$wiersz2['sposob_wykonania_testu']."</td></tr><tr><td>Uwagi</td><td>".@$wiersz2['uwagi_1']."</td></tr><tr><td>Zdjęcia</td><td></td></tr></table><br/><b>Wyniki pomiarów</b><br/><table><tr><td colspan = '4'>Próbka do badań przy lewej krawędzi wózka</td></tr><tr>
<td>Skaner 1 / skaner 2</td><td>Prędkość wózka</td><td>Obciążenie wózka</td><td>Nachylenie powierzchni</td>
</tr><tr><td><br/>".@$wiersz2['skaner_1_2_lewa']."<br/></td><td>".@$wiersz2['predkosc_wozka_lewa']."</td><td>".@$wiersz2['obciazenie_wozka_lewa']."</td><td>".@$wiersz2['nachylenie_powierzchni_lewa']."</td></tr><tr><td>Nr pomiaru</td><td>Odległość próbki od wózka, w jakiej została wykryta przez skaner [mm] - A</td><td>Odległość od próbki po przejechaniu, której nastąpiło zatrzymanie wózka [mm] - B</td><td>Długość drogi hamowania [mm] C = A - B</td></tr><tr><td>1. </td><td>".@$wiersz2['wykryta_przez_skaner_lewa_pomiar_1']."</td><td>".@$wiersz2['zatrzymanie_wozka_lewa_pomiar_1']."</td><td>".@$wiersz2['droga_hamowania_lewa_pomiar_1']."</td></tr><tr>
<td>2. </td><td>".@$wiersz2['wykryta_przez_skaner_lewa_pomiar_2']."</td><td>".@$wiersz2['zatrzymanie_wozka_lewa_pomiar_2']."</td><td>".@$wiersz2['droga_hamowania_lewa_pomiar_2']."</td>
</tr><tr><td>3. </td><td>".@$wiersz2['wykryta_przez_skaner_lewa_pomiar_3']."</td><td>".@$wiersz2['zatrzymanie_wozka_lewa_pomiar_3']."</td><td>".@$wiersz2['droga_hamowania_lewa_pomiar_3']."</td></tr>
</table><br/><b>Wyniki pomiarów</b><br/><table><tr><td colspan = '4'>Próbka do badań na środku drogi wózka</td></tr><tr><td>Skaner 1 / skaner 2</td><td>Prędkość wózka</td><td>Obciążenie wózka</td><td>Nachylenie powierzchni</td></tr><tr><td><br/>".@$wiersz2['skaner_1_skaner_2_srodek']."<br/></td><td>".@$wiersz2['predkosc_wozka_srodek']."</td><td>".@$wiersz2['obciazenie_wozka_srodek']."</td><td>".@$wiersz2['nachylenie_powierzchni_srodek']."</td></tr><tr>
<td>Nr pomiaru</td><td>Odległość próbki od wózka, w jakiej została wykryta przez skaner [mm] - A</td><td>Odległość od próbki po przejechaniu, której nastąpiło zatrzymanie wózka [mm] - B</td><td>Długość drogi hamowania [mm] C = A - B</td></tr><tr><td>1. </td><td>".@$wiersz2['wykryta_przez_skaner_srodek_pomiar_1']."</td><td>".@$wiersz2['zatrzymanie_wozka_srodek_pomiar_1']."</td><td>".@$wiersz2['droga_hamowania_srodek_pomiar_1']."</td></tr><tr><td>2. </td><td>".@$wiersz2['wykryta_przez_skaner_srodek_pomiar_2']."</td><td>".@$wiersz2['zatrzymanie_wozka_srodek_pomiar_2']."</td><td>".@$wiersz2['droga_hamowania_srodek_pomiar_2']."</td></tr><tr>
<td>3. </td><td>".@$wiersz2['wykryta_przez_skaner_srodek_pomiar_3']."</td><td>".@$wiersz2['zatrzymanie_wozka_srodek_pomiar_3']."</td><td>".@$wiersz2['droga_hamowania_srodek_pomiar_3']."</td></tr></table><br/><b>Wyniki pomiarów</b><br/>
<table><tr><td colspan = '4'>Próbka do badań przy prawej krawędzi drogi wózka</td></tr><tr>
<td>Skaner 1 / skaner 2</td><td>Prędkość wózka</td><td>Obciążenie wózka</td><td>Nachylenie powierzchni</td>
</tr><tr><td><br/>".@$wiersz2['skaner_1_skaner_2_prawa']."<br/></td><td>".@$wiersz2['predkosc_wozka_prawa']."</td><td>".@$wiersz2['obciazenie_wozka_prawa']."</td><td>".@$wiersz2['nachylenie_powierzchni_prawa']."</td></tr><tr><td>Nr pomiaru</td><td>Odległość próbki od wózka, w jakiej została wykryta przez skaner [mm] - A</td><td>Odległość od próbki po przejechaniu, której nastąpiło zatrzymanie wózka [mm] - B</td><td>Długość drogi hamowania [mm] C = A - B</td></tr>
<tr><td>1. </td><td>".@$wiersz2['wykryta_przez_skaner_prawa_pomiar_1']."</td><td>".@$wiersz2['zatrzymanie_wozka_prawa_pomiar_1']."</td><td>".@$wiersz2['droga_hamowania_prawa_pomiar_1']."</td>
</tr><tr><td>2. </td><td>".@$wiersz2['wykryta_przez_skaner_prawa_pomiar_2']."</td><td>".@$wiersz2['zatrzymanie_wozka_prawa_pomiar_2']."</td><td>".@$wiersz2['droga_hamowania_prawa_pomiar_2']."</td>
</tr><tr><td>3. </td><td>".@$wiersz2['wykryta_przez_skaner_prawa_pomiar_3']."</td><td>".@$wiersz2['zatrzymanie_wozka_prawa_pomiar_3']."</td><td>".@$wiersz2['droga_hamowania_prawa_pomiar_3']."</td>
</tr>
</table>";
}
}	
		catch(Exception $e)
		{
			echo '<span style="color:red;">Błąd serwera!</span>';
			echo '<br />Informacja developerska: '.$e;
		}
?>

<br/>
<form action = "uzupelnij_test_b.php" method="post">
<input type="submit" value="Uzupełnij test B"/>
</form>
</body>

</html>