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

<?php
require_once "connect.php";
		mysqli_report(MYSQLI_REPORT_STRICT);
		
		
			$konto = $_SESSION['konto_uprawnienia'];
			$polaczenie = new mysqli($host, $db_user, $db_password, $db_name);

				
				$rezultat = $polaczenie->query("SELECT Odczyt FROM uzytkownicy WHERE user ='$konto'");
				
				$wiersz = $rezultat->fetch_assoc();

				
				 if($wiersz['Odczyt'] == 'TAK')
				 {
					 $sql = "UPDATE uzytkownicy SET Odczyt = 'NIE' WHERE user = '$konto'";
					 if ($polaczenie->query($sql) === TRUE) 
					 {
					 header ('Location: nadajuprawnienia3.php');
					  }
				 }

				 if($wiersz['Odczyt'] == 'NIE')
				 {
                 $sql2 = "UPDATE uzytkownicy SET Odczyt = 'TAK' WHERE user = '$konto'";
				 if ($polaczenie->query($sql2) === TRUE)
					 {
                 header ('Location: nadajuprawnienia3.php');
					}
				}
				
				$polaczenie->close();
?>

