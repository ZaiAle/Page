<?php
require_once('connection.php');

$q = "SELECT * FROM posts ORDER BY post_id DESC LIMIT 5";
	$r = mysqli_query($conn, $q);
	if ( $r !== false && mysqli_num_rows($r) > 0 ) 
	{
		while ( $a = mysqli_fetch_assoc($r) ) 
		{
			$tytul = $a['tytul'];
        	$tresc = $a['tresc'];
			$data_postu = $a['data_postu'];

			echo "<div><h4>$tytul</h4><p>$tresc<br><br>$data_postu</p></div>";
      		} 
	} else 
	{
    		echo "<h4>Na tej stronie nie ma jeszcze żadnych postów.</h4>";
    	}

?>