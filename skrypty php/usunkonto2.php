
<?php 
session_start();

	if (!isset($_SESSION['zalogowany']))
	{
		header('Location: index.php');
		exit();
	}
require_once "connect.php";

$login=@$_SESSION['user'];
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

if ($conn->query($sql) === TRUE) {
    //echo "Konto usunięte\n";
	header('Location: usunkonto3.php'); 
} else {
    echo "Błąd: " . $conn->error;
}
}
$conn->close();
?>