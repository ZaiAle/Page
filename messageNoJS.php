<style>
#kontakt_no_JS {
opacity: 1;
padding-bottom: 10vh;
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

#wiad_bar {
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
	<title>terapiagabinet.pl/Kontakt</title>
</head>

<body data-spy="scroll" data-target=".navbar" data-offset="50">

<nav class="navbar navbar-custom navbar-fixed-top dummy_bar" id="fram_navbar">
	<div class="container-fluid" id="wiad_bar">
		<div class="navbar-header"><h2>Kontakt</h2></div>
	</div>
</nav>

<div class="container-fluid" id ="kontakt_no_JS">
      <h2>W razie pytań zapraszam do kontaktu.</h2>

      <div id="formularz" class="container-fluid">
        <p>W wiadomości proszę podać preferowaną formę odpowiedzi, i.e. wiadomość SMS, e-mail, telefon w wybranych porach etc.</p>
        <form action="messageSave.php" method="post" class="FormContainerPytania">

          <label for="user_email">
            E-mail
          </label>
          <input type="text" id="user_email" placeholder="Adres E-mail" name="user_email" required>

          <label for="user_phone">
            Nr telefonu
          </label>
          <input onclick="phone_function()" type="text" id="user_phone" placeholder="123 - 456 - 789" name="user_phone" required>

          <label for="user_message">
            Wiadomość:
          </label>
          <textarea rows="8" id="user_message" name="user_message"></textarea>

          <div>
            <button type="submit" data-toggle="modal" data-target="#podziekuj" class="btn btn-primary send">Wyślij</button>
          </div>
        </form>

  <div class="modal fade" tabindex="-1" id="podziekuj">
    <div class="modal-content">
      <button type="button" title="Zamknij Popup" class="btn btn-primary" data-dismiss="modal" aria-label="Close" id="close_form">X</button>
      <h2>Dziękuję za przesłanie formularza!</h2>
    </div>
  </div>
 
</body>
</html>