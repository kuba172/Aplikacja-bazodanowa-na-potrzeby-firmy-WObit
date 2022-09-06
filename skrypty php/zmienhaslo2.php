<?php

	session_start();
	
	if (!isset($_SESSION['zalogowany']))
	{
		header('Location: index.php');
		exit();
	}
	
	$haslo1 = $_POST['haslo1'];
	$haslo2 = $_POST['haslo2'];
	
	if(((strlen($haslo1)>20 || strlen($haslo1)<8) || (strlen($haslo2)>20 || strlen($haslo2)<8))||($haslo1!=$haslo2))
	{
		header('Location: zmienhaslo3.php');
	}else{
require_once "connect.php";

$login=@$_SESSION['user'];
$haslo=$haslo1;
$haslo_hash = password_hash($haslo1, PASSWORD_DEFAULT);
$conn = new mysqli($host, $db_user, $db_password, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "UPDATE Uzytkownicy SET pass='$haslo_hash' WHERE user='$login'";

if ($conn->query($sql) === TRUE) {
    header ('Location: zmienhaslo4.php');
} else {
    echo "Error updating record: " . $conn->error;
}
	}
$conn->close();
?>

