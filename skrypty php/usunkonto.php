<?php

	session_start();
	
	if (!isset($_SESSION['zalogowany']))
	{
		header('Location: index.php');
		exit();
	}
	
?>

<html>

<head>
</head>

<body style = "background-color: #f0f0f0">
<h3>Czy napewno chcesz usunąć konto?</h3>
<form action = "usunkonto2.php" method="post">
<br/>
<input type="submit" value="Usuń konto" />
</form>
</body>
</html>
