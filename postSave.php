<?php
require_once('connection.php');

	$stmt = $conn->prepare("INSERT INTO posts (tytul, tresc, data_postu) VALUES(?, ?, ?)");
	$stmt->bind_param("sss", $tytul, $tresc , $data_postu);

	$tytul = $_POST['tytul'];
	$tresc = $_POST['tresc'];
	$data_postu = date("Y-m-d");
	$stmt->execute();
	$stmt->close();
?>