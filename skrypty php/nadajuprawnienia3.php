<?php

	session_start();
	
	if (!isset($_SESSION['zalogowany']))
	{
		header('Location: index.php');
		exit();
	}
	
?>

<?php
if($_SESSION['user']!="administrator")
{
	header ('Location: ostrzezenie2.php');
}
?>

<!DOCTYPE HTML>
<html>
<head>
<title> Nadaj uprawnienia </title>
<style>td { border: 1px solid black; } </style>
</head>
<body style = "background-color: #f0f0f0";>
<h2> Uprawnienia </h2>
<?php
require_once "connect.php";
		mysqli_report(MYSQLI_REPORT_STRICT);
		
		try 
		{
			$konto = $_SESSION['konto_uprawnienia'];
			$polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
			if ($polaczenie->connect_errno!=0)
			{
				throw new Exception(mysqli_connect_errno());
			}
			else
			{	
				$rezultat = $polaczenie->query("SELECT * FROM uzytkownicy WHERE user ='$konto'");
				$wiersz = $rezultat->fetch_assoc();
				$ile_kont  = $rezultat->num_rows;
				
				if (!$rezultat) throw new Exception($polaczenie->error);
				echo "<table>";
				echo "<tr>"."<td>"."<b>"."Nazwa użytkownika"."</td>"."<td>"."Uprawnienie do odczytywania danych"."</td>"." <td>"."Uprawnienie do modyfikacji danych"."</td>". "<td>"."Uprawnienie do dodawania i usuwania robotów"."</b>"."</b>"."<br/>"."</td>"."</tr>";
				
				  echo "<tr>"."<td>".$wiersz['user']."</td>"."<td>".$wiersz['Odczyt']."</td>"."<td>".$wiersz['Modyfikacja']."</td>"."<td>".$wiersz['Dodawanie']."<br/>"."</tr>";
				echo "</table>"; 
				 	
			
			}
				$polaczenie->close();
		}
			
		
		catch(Exception $e)
		{
			echo '<span style="color:red;">Błąd serwera!</span>';
			echo '<br />Informacja developerska: '.$e;
		}
?>



<a href = 'nadajuprawnienia_odczyt.php' > <button type='submit' name='zmiana_odczyt'>Zmień uprawnienie odczytu</button> </a><br/>
<a href = 'nadajuprawnienia_modyfikacja.php' > <button type='submit' name='zmiana_modyfikacja'>Zmień uprawnienie modyfikacji danych</button> </a><br/>
<a href = 'nadajuprawnienia_dodawanie.php' > <button type='submit' name='zmiana_dodawanie'>Zmień uprawnienie dodawania/usuwania robotów</button> </a><br/>
<a href = 'nadajuprawnienia.php' > <button type='submit' name='powrot'>Powrót</button> </a>



</body>
</html>