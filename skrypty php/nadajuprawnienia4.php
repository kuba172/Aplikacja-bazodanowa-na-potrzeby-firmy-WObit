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
	td { border: 1px solid black; }

</style>
</head>
<body style = "background-color: #f0f0f0";>
<h2> Uprawnienia </h2>
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
<h3> Wpisz użytkownika, któremu chcesz zmienić uprawnienia </h3>
<form action="nadajuprawnienia2.php" method="post">
		 <br /> <input type="text" name="login" /> <br />
		<input type="submit" value="Ok" />
	</form>
	<p>Nie ma takiego konta!</p>

<br/><br/>
<a href = "paneladministratora.php" > Powrót </a>


</body>
</html>