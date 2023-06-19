<?php 

session_start(); 

include "connection.php";
if (isset($_POST['email']) && isset($_POST['haslo'])) 
{
	$email = $_POST['email'];
	$haslo = $_POST['haslo'];
	
	if (empty($email)) 
	{
		header("Location: index.php?error= Proszę podać poprawny adres email.");
		exit();

	} else if (empty($haslo))
	{
		header("Location: index.php?error= Proszę podać poprawne hasło.");
		exit();
	} else
	{	
		$haslo_legit = htmlspecialchars($haslo, ENT_QUOTES);
		$query = "SELECT email, haslo FROM users WHERE email='$email'";

		$result = mysqli_query($conn, $query);
		$row = mysqli_fetch_assoc($result);
		$hashedHaslo = $row['haslo'];
		$boolHaslo = password_verify($haslo_legit, $hashedHaslo);
		$id = $row['Id'];

		if ($row['email'] === $email && $boolHaslo) 
		{
				$_SESSION['Id'] = $id;
				$_SESSION['loggedIn'] = "True";
				header("Location: admin.php");
				exit();
		} else
		{
				header("Location: index.php?error=Błędna nazwa użytkownika lub hasło.");
				exit();
		}
	}
} else
{
	header("Location: index.php");
	exit();
}