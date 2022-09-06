<?php

	session_start();
	
	if (!isset($_SESSION['zalogowany']))
	{
		header('Location: index.php');
		exit();
	}
	
?>

<?php

	if (($_SESSION['user']!="administrator"))
	{
		header('Location: ostrzezenie2.php');
		exit();
	}
	
?>


<!DOCTYPE html>
<html lang="pl">

<head>
<meta charset = "utf-8">
<title> Panel administratora </title>
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

#tabela
{
font-size: 20px;

}

td { border: 1px solid black; }
 
</style>
<body style = "background-color:#f0f0f0";>



<div id = "Zakladki">

<h2>Lista kont</h2>
</div>
<div id = "tabela">
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
				$rezultat = $polaczenie->query("SELECT * FROM uzytkownicy WHERE user !='administrator'");
				//$wiersz = $rezultat->fetch_assoc();
				if (!$rezultat) throw new Exception($polaczenie->error);
				echo "<table>";
				echo "<tr>"."<td>"."<b>"."Nazwa użytkownika"."</td>"."<td>"."Uprawnienie do odczytywania danych"."</td>"." <td>"."Uprawnienie do modyfikacji danych"."</td>". "<td>"."Uprawnienie do dodawania i usuwania robotów"."</b>"."</b>"."<br/>"."</td>"."</tr>";
				while($wiersz = $rezultat->fetch_assoc())
				{
				   echo "<tr>"."<td>".$wiersz['user']."</td>"."<td>".$wiersz['Odczyt']."</td>"."<td>".$wiersz['Modyfikacja']."</td>"."<td>".$wiersz['Dodawanie']."<br/>"."</tr>";
				}
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
</div>
<?php
echo '<br/><br/> <a href="nadajuprawnienia.php" style = "font-size: 24px">Nadaj uprawnienia</a></p>';
?>

<?php
echo '<br/><br/> <a href="usunkonto_administrator.php" style = "font-size: 24px">Usuń wybrane konto</a></p>';
?>

<?php
echo '<br/><br/> <a href="nrseryjny.php" style = "font-size: 20px">Powrót</a></p>';
?>
</body>
</html>

