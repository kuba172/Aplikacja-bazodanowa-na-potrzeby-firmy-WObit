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
<title> Usuń konto </title>
<style>td { border: 1px solid black; } </style>
</head>

<body style = "background-color: #f0f0f0";>
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
<h3> Wpisz użytkownika, którego chcesz usunąć: </h3>
<form action="usunkonto_administrator2.php" method="post">
	
		 <br /> <input type="text" name="login" /> <br />
		<input type="submit" value="Usuń" />
	
	</form>

</body>

</html>



















