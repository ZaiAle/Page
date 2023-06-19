<style>
#archive {
opacity: 1;
overflow-y: scroll;
padding-bottom: 5%;
}

#fram_navbar h2{
color: var(--background_color_font);
padding: 2% 0;
margin: 0;
}

#fram_navbar {
height: fit-content !important;
}

.navbar-header {
float: none !important;
}

#arch_bar {
margin-right: auto;
margin-left: auto;
width: 40%;
text-align: center;
}

</style>

<!DOCTYPE html>
<html lang="pl-PL">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<script src="scripts/main.js"></script>
	<link rel="stylesheet" href="styles/style.css">
	<link rel="icon" type="image/x-icon" href="images/favicon.ico">
	<title>terapiagabinet.pl/Aktualnosci</title>
</head>

<body data-spy="scroll" data-target=".navbar" data-offset="50">

<nav class="navbar navbar-custom navbar-fixed-top dummy_bar" id="fram_navbar">
	<div class="container-fluid" id="arch_bar">
		<div class="navbar-header"><h2>Archiwum aktualności</h2></div>
	</div>
</nav>

<div id="archive">

<?php
require_once('connection.php');

$q = "SELECT * FROM posts ORDER BY post_id DESC";
	$r = mysqli_query($conn, $q);
	if ( $r !== false && mysqli_num_rows($r) > 0 ) 
	{
		while ( $a = mysqli_fetch_assoc($r) ) 
		{
			$tytul = $a['tytul'];
        		$tresc = $a['tresc'];
			$data_postu = $a['data_postu'];

			echo "<div><h3>$tytul</h3><br><p>$tresc<br><br>$data_postu</p></div>";
      		} 
	} else 
	{
    		echo "<h3>Na tej stronie nie ma jeszcze żadnych postów.</h3>";
    	}

?>

</div>
</body>
</html>