<?php 
session_start();
if(! isset($_SESSION['loggedIn'])) 
{
	header('Location: index.php');
} 
session_destroy();
unset($_SESSION);
session_write_close();
session_start(); 
setcookie(session_name(),'',0,'/');
session_regenerate_id(true);
?>

<!DOCTYPE html>
<html lang="pl-PL">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="styles/style.css">
    <link rel="icon" type="image/x-icon" href="images/favicon.ico">
    <title>Admin</title>
<script>
$(() => 
	{
	$("#zapiszPostForm").submit(function wyslij() 
	{
		event.preventDefault();

		$.ajax
		({
			method: "POST",
			url: "postSave.php",
			data: $(this).serialize()
		});
	});
	});

$(() => 
	{ 
	displayMessage();
	period = 1000;
	setInterval(displayMessage, period);
	function displayMessage()
	{ 
		$.ajax
		({
			method: "GET",
			url:'messageDisplay.php',
			dataType: 'html',
			success: function (display)
			{
				$('#displayPytaniaAJAX').html(display);
			}
		});
	}
	});

$(() => 
	{ 
	displayPost();
	period = 1000;
	setInterval(displayPost, period);
	function displayPost()
	{ 
		$.ajax
		({
			method: "GET",
			url:'postDisplay.php',
			dataType: 'html',
			success: function (display)
			{
				$('#displayPostsAJAX').html(display);
			}
		});
	}
	});
</script>
</head>

<body>

<nav class="navbar navbar-custom navbar-fixed-top">
	<div class="container-fluid" id="admin_bar">Profil administratora</div>
</nav>  

<div class="container" id="dark_mode">
	<button id="dark_mode_btn" onclick="darkMode()" data-toggle="tooltip" data-placement="bottom" title="Zmień motyw strony na ciemny">
		<img src="images/night_mode_icon.webp" alt="Ikona przedstawiająca księżyc.">
	</button>
	<button id="light_mode_btn" onclick="lightMode()" data-toggle="tooltip" data-placement="bottom" title="Zmień motyw strony na jasny">
		<img src="images/day_mode_icon.webp" alt="Ikona przedstawiająca słońce.">
	</button>
</div>

<div id="roll_open">
	<button class="open_aktualnosci_btn" onclick="open_aktualnosci()">&lt;</button>  
</div>

<div class="sidebar" id="aktualnosci_sidebar">
	<div id="posty">
		<div id="displayPostsAJAX"></div>
		<button class="close_aktualnosci_btn" onclick="close_aktualnosci()">&gt;</button>
	</div>
	
</div>

<div id="roll_open_pytania">
		<button class="open_pytania_btn" onclick="open_pytania()">&gt;</button>
</div>

<div id="pytania_sidebar" class="sidebar">
	<div id="disappearing_act" class="container-fluid">
		<div id="#displayPytaniaAJAX"></div>
		<?php require_once('messageDisplay.php') ?>
		<button class="close_pytania_btn" onclick="close_pytania()">&lt;</button> 
	</div>
	
</div>


<div class="container-fluid" id="przyciski">
<div class="row">
		
	<div class="col-lg-12 text-center">
		<a class="btn btn-primary" id="wylog" href="logout.php" role="button">Wyloguj się</a>
	</div>
	<div class="col-lg-12 text-center">
		<form action="postDelete.php" method="post">
			<button class="btn btn-primary" id="pokaz_post" type="submit">Pokaż historię postów</button>
		</form>
	</div>
	<div class="col-lg-12 text-center">
		<form action="postEdit.php" method="post">
			<button class="btn btn-primary" id="edit_post" type="submit">Edytuj post</button>
		</form>
	</div>
</div>
</div>

<div class="container-fluid form-group text-center">
<div class="row">
	<form id="zapiszPostForm">
	<div class="form-group" id="post_edytor">
		<label for="tytul"><b>Tytuł:</b></label>
		<input id="tytul" type="text" name="tytul" class="form-control">

		<label for="tresc"><b>Treść postu:</b></label>
		<textarea class="form-control" name="tresc" rows="8" id="tresc"></textarea>
	</div>
	<div class="form-group col-lg-12 ">
		<button  class="btn btn-primary" id="zapisz_post" type="submit">Zapisz</button>		
	</div>
	</form>
</div>
</div>

<footer class="page-footer" id="footer_dla_ozdoby">	
</footer>

<script src="scripts/main.js"></script>

</body>
</html>