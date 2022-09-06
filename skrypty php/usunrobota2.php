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

<?php
        require_once "connect2.php";
		mysqli_report(MYSQLI_REPORT_STRICT);
		
		
			
				
		        $numer_robota = $_SESSION['Numer_seryjny'];
				
				$polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
				$rezultat = $polaczenie->query("SELECT id FROM roboty WHERE numer_seryjny ='$numer_robota'");
				$wiersz = $rezultat->fetch_assoc();
				$x = $wiersz['id'];
					$polaczenie->query("DELETE FROM roboty WHERE id = '$x'");
					$polaczenie->query("DELETE FROM roboty_elektronika WHERE id = '$x'");
					$polaczenie->query("DELETE FROM roboty_mechanika WHERE id = '$x'");
					$polaczenie->query("DELETE FROM roboty_formularz WHERE id = '$x'");
					$polaczenie->query("DELETE FROM roboty_oprogramowanie WHERE id = '$x'");
					$polaczenie->query("DELETE FROM roboty_test_a WHERE id = '$x'");
					$polaczenie->query("DELETE FROM roboty_test_b WHERE id = '$x'");
					$polaczenie->query("DELETE FROM roboty_uwagi WHERE id = '$x'");
					
					$polaczenie->query("DELETE FROM roboty WHERE id = '$x'");
					$polaczenie->query("DELETE FROM roboty_elektronika WHERE id = '$x'");
					$polaczenie->query("DELETE FROM roboty_mechanika WHERE id = '$x'");
					$polaczenie->query("DELETE FROM roboty_formularz WHERE id = '$x'");
					$polaczenie->query("DELETE FROM roboty_oprogramowanie WHERE id = '$x'");
					$polaczenie->query("DELETE FROM roboty_test_a WHERE id = '$x'");
					$polaczenie->query("DELETE FROM roboty_test_b WHERE id = '$x'");
					$polaczenie->query("DELETE FROM roboty_uwagi WHERE id = '$x'");
					
			
?>

<!DOCTYPE HTML>
<html>

<head>

<title> Usuwanie robota robota </title>

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
<p><b>Robot został usunięty z bazy danych</b></p>
<br/><a href = "nrseryjny.php"> Powrót </a>
</body>
<?php
$polaczenie->close();
?>
</html>