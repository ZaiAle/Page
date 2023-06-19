<?php
require_once('connection.php');

$q = "SELECT * FROM wiadomosci ORDER BY wiadomosc_id";
	$r = mysqli_query($conn, $q);
	if ( $r !== false && mysqli_num_rows($r) > 0 ) 
	{
		while ( $a = mysqli_fetch_assoc($r) ) 
		{
			$user_email = $a['email'];
			$user_phone = $a['nr_telefonu'];
			$user_message = $a['wiadomosc'];
			$data_postu = $a['data_wiadomosci'];

			echo "<div id=\"wiadom\"><small><u>email:</u>  $user_email<br><u>nr telefonu:</u>  $user_phone<br>$data_postu
			<br><br>$user_message</small></div>";
      		} 
	} else 
	{
    		echo "<h4>Nie masz jeszcze żadnych wiadomości.</h4>";
    	}

?>