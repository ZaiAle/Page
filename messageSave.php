<?php
require_once('connection.php');

if (isset($_POST['user_email']) && isset($_POST['user_phone']) && isset($_POST['user_message']))
{
	$stmt = $conn->prepare("INSERT INTO wiadomosci (email, nr_telefonu, wiadomosc, data_wiadomosci) VALUES(?, ?, ?, ?)");
	$stmt->bind_param("ssss", $user_email, $user_phone, $user_message, $data_postu);

	$user_email = $_POST['user_email'];
	$user_phone = $_POST['user_phone'];
    	$user_message = $_POST['user_message'];
	$data_postu = date("Y-m-d");
	$stmt->execute();
	$stmt->close();
}
?>