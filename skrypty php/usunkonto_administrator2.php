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

$login=@$_POST['login'];
if($login=="administrator")
{
	header('Location: ostrzezenie.php');
	exit();
}
else
{
$conn = new mysqli($host, $db_user, $db_password, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "DELETE FROM Uzytkownicy WHERE user='$login'";
$sql2 = "SELECT * FROM Uzytkownicy WHERE user='$login'";
$rezultat = $conn->query($sql2);
$ile_kont  = $rezultat->num_rows;

if ($ile_kont==0) {
    //echo "Konto usunięte\n";
	header('Location: usunkonto_administrator4.php'); 
} else {
	if ($conn->query($sql) === TRUE) {
    //echo "Konto usunięte\n";
	header('Location: usunkonto_administrator3.php'); 
} else {
    echo "Błąd: " . $conn->error;
}
    //echo "Błąd: " . $conn->error;
}


}
$conn->close();
?>

<!DOCTYPE HTML>
<html>

<head>
<title> Konto usunięte <title>
</head>


<body>
Konto zostało usunięte.
<a href = "paneladministratora.php"> Powrót </a>

</body>


</html>