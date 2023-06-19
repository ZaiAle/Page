<!doctype html>
<html lang="pl-PL">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="styles/style.css">
  <link rel="icon" type="image/x-icon" href="images/favicon.ico">
  <title>terapiagabinet.pl</title>

<script>
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

  $(() => 
		{
				$("#messageSave").submit(function wyslij() 
				{
					event.preventDefault();

					$.ajax
					({
						method: "POST",
						url: "messageSave.php",
						data: $(this).serialize()
					});
				});
		});
</script>
</head>

<body data-spy="scroll" data-target=".navbar" data-offset="50">

  <nav class="navbar navbar-custom navbar-fixed-top" id="fram_navbar">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#my_navbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
      </div>
      <div>
        <div class="collapse navbar-collapse" id="my_navbar">
          <ul class="nav navbar-nav">
            <li><a href="#start">Start</a></li>
            <li><a href="#gabinet">O poradni</a></li>
            <li><a href="#oferta">Oferta</a></li>
            <li><a href="#o_mnie">O mnie</a></li>
            <li><a href="#kontakt">Kontakt</a></li>
            <li><a href="#dojazd">Dojazd</a></li>
            <li><a href="#regulamin">Regulamin</a></li>
          </ul>
        </div>
      </div>
    </div>
  </nav>

  <div class="container-fluid" id="dark_mode">
    <button id="dark_mode_btn" onclick="darkMode()" data-toggle="tooltip" data-placement="bottom" title="Zmień motyw strony na ciemny" style="display:none;">
      <img src="images/night_mode_icon.webp" alt="Ikona przedstawiająca księżyc.">
    </button>
    <button id="light_mode_btn" onclick="lightMode()" data-toggle="tooltip" data-placement="bottom" title="Zmień motyw strony na jasny" style="display:none;">
      <img src="images/day_mode_icon.webp" alt="Ikona przedstawiająca słońce.">
    </button>
  </div>

  <noscript>
    <div id="noJSwarning">
      <span>
        Niektóre funkcjonalności strony będą niedostępne dopóki JavaScript nie zostanie włączony.
        <a href="https://www.enable-javascript.com/pl/"> Sprawdź jak włączyć JavaScript. </a>
      </span>
    </div>
  </noscript>

  <div id="roll_open" style="display:none;"> 
   <button title="rozwiń zakładkę aktualności" class="open_aktualnosci_btn" id="akt_button" onclick="open_aktualnosci()">&lt;</button>
  </div>

  <div class="sidebar container-fluid" id="aktualnosci_sidebar">
    <div class="sidebar container-fluid" id="aktualnosci_content">
        <div id="posty">
          <div id="displayPostsAJAX"></div>
          <button title="zwiń zakładkę aktualności" class="close_aktualnosci_btn" onclick="close_aktualnosci()">&gt;</button>
        </div>
    </div>
  </div>

  <div id="roll_open_pytania" style="display:none;">
    <button class="open_pytania_btn" id="pyt_button" title="rozwiń formularz kontaktowy" onclick="open_pytania()">&gt;</button>
  </div>

  <div id="pytania_sidebar" class="container-fluid sidebar_pyt">
    <div class="sidebar container-fluid" id="pytania_content">
      <div id="disappearing_act" class="container-fluid">
        <h4>W razie pytań zapraszam do kontaktu.</h4>

        <div id="formularz" class="container-fluid">
          <p>W wiadomości proszę podać preferowaną formę odpowiedzi, i.e. wiadomość SMS, e-mail, telefon w wybranych porach etc.</p>
          <form id="messageSave" method="post" class="FormContainerPytania">

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

        </div>
        <button class="close_pytania_btn" title="zamknij formularz kontaktowy" onclick="close_pytania()">&lt;</button>
      </div>
    </div>
  </div>

  <div id="start" class="container-fluid">
    <img src="images/logo.webp" alt="Logo poradni.">
    <h1>GABINET LOGOPEDYCZNY</h1>
  </div>

  <noscript>
    <ul>
      <li><a href="postNoJS.php">
          <p>Przejdź do zakładki aktualności</p>
        </a></li>
      <li><a href="messageNoJS.php">
          <p>Przejdź do zakładki z formularzem kontaktowym</p>
        </a></li>
    </ul>

  </noscript>

  <div class="modal fade" tabindex="-1" id="podziekuj">
    <div class="modal-content">
      <h2>Dziękuję za przesłanie formularza!</h2>
      <button type="button" title="Zamknij Popup" class="btn btn-primary" data-dismiss="modal" aria-label="Close" id="close_form">Zamknij</button>
    </div>
  </div>

  <div id="gabinet" class="container-fluid">
    <h2>O poradni</h2>
    <p>Gabinet terapeutyczny w Mostach został stworzony z myślą o wsparciu dzieci
      i dorosłych w poprawie ich funkcjonowania.
      W gabinecie zajmuję się diagnozą i terapią.
      W mojej ofercie posiadam szeroki wachlarz zajęć dostosowanych do potrzeb
      i możliwości pacjentów. Mam doświadczenie w pracy z dziećmi w normie rozwojowej
      oraz ze specjalnymi potrzebami edukacyjnymi (w tym z niepełnosprawnością i/lub autyzmem).
      Terapię prowadzę w formie indywidualnej i grupowej.
      W mojej pracy dokładam wszelkich starań aby w życiu pacjentów zachodziły pozytywne zmiany,
      nie tylko w sferze poznawczej ale również emocjonalno-społecznej.</p>
  </div>

  <div id="oferta" class="container-fluid">
    <h2>Oferuję</h2>
    <ul>
      <li>
        <h3>Diagnozę i indywidualną terapię logopedyczną</h3>
      </li>
      <li>
        <h3>Terapię ręki indywidualną i grupową</h3>
      </li>
      <li>
        <h3>Terapię dla dzieci ze spektrum autyzmu</h3>
      </li>
      <li>
        <h3>Dogoterapię</h3>
      </li>
    </ul>
  </div>

  <div id="o_mnie" class="container-fluid">
    <h2>O mnie</h2>
    <h3>Agnieszka Zając</h3>
    <p>Jestem magistrem logopedii (WSP – obecnie Uniwersytet Kazimierza Wielkiego w Bydgoszczy).
      Ponadto ukończyłam studia podyplomowe na kierunku Oligofrenopedagogika oraz Edukacja i terapia
      osób z autyzmem. Od wielu lat prowadzę terapię logopedyczną z dziećmi w placówkach przedszkolnych i
      szkolnych (również specjalnych). Udzielam wsparcia w profilaktyce logopedycznej oraz w terapii
      zaburzeń mowy. Posiadam certyfikat KOLD (Karty Oceny Logopedycznej Dziecka), który umożliwia mi
      dostosowanie najlepszej formy terapii do potrzeb pacjentów. Ukończyłam również trzy stopniowy kurs
      behawioralny oraz kurs komunikacji alternatywnej z wykorzystaniem gestów i symboli MAKATON.
      Jestem diagnosta i terapeutą ręki.</p>
  </div>

  <div id="kontakt" class="container-fluid">
    <h2>Kontakt</h2>
    <h3>Telefon</h3>
    <p>668-586-675</p>
    <a id="tel_link" href="tel:+48668586675" style="display: none;">
      <p>Otwórz numer w aplikacji telefon</p>
    </a>
    <h3>E-mail</h3>
    <p>email</p>
    <h2>Cennik</h2>
    <table id="zaj_indywidualne">
      <tr>
        <th> Zajęcia </th>
        <th> Cena za godzinę </th>
      </tr>
      <tr>
        <td> Zajęcia logopedyczne indywidualne </td>
        <td> 90 PLN </td>
      </tr>
      <tr>
        <td> Zajęcia pedagogiczne indywidualne </td>
        <td> 90 PLN </td>
      </tr>
      <tr>
        <td> Terapia ręki indywidualna </td>
        <td> 90 PLN </td>
      </tr>
    </table>
    <table id="zaj_grupowe">
      <tr>
        <th> Zajęcia </th>
        <th> Cena za miesiąc spotkań </th>
      </tr>
      <tr>
        <td> Terapia ręki grupowa </td>
        <td> 250 PLN </td>
      </tr>
    </table>
  </div>

  <div id="dojazd" class="container-fluid">
    <h2>Dojazd</h2>
    <div class="container">
      <div class="row">
        <div class="col-lg-6" id="adres">
          <h3>Adres</h3>
          <p>Chylońska 150<br>Gdynia <br> 81-007</p>
          <p>Najbliższy przystanek autobusowy - Chylońska - Kcyńska 01
            <br> Autobusy i trolejbusy:
            <br> <a target="_blank" rel="noopener noreferrer" href="https://zkmgdynia.pl/rozklady/0020/w.htm"><span class="glyphicon glyphicon-link"></span>&nbsp;20</a>
            <br> <a target="_blank" rel="noopener noreferrer" href="https://zkmgdynia.pl/rozklady/0022/w.htm"><span class="glyphicon glyphicon-link"></span>&nbsp;22</a>
            <br> <a target="_blank" rel="noopener noreferrer" href="https://zkmgdynia.pl/rozklady/0027/w.htm"><span class="glyphicon glyphicon-link"></span>&nbsp;27</a>
          </p>
        </div>
        <div class="col-lg-6" id="mapa" aria-hidden="true">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d945.3217594814397!2d18.456510004315746!3d54.54673799323182!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46fda42365d469a1%3A0xce541fee64eca470!2sChylo%C5%84ska%20150!5e0!3m2!1sen!2spl!4v1665474734100!5m2!1sen!2spl" width="500" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
      </div>
    </div>
  </div>

  <div id="regulamin" class="container-fluid">
    <h2>Regulamin</h2>
    <ul id="punkty">
      <li>
        <p>Zajęcia terapeutyczne przeznaczone są dla dzieci i dorosłych, trwają zgodnie z ustalonymi usługami świadczonymi przez Gabinet.
          - czas trwania zajęć indywidualnych 45 minut + 10 minut omówienie zajęć z Rodzicem/ Opiekunem
          - czas trwania zajęć grupowych to 45- 50 minut</p>
      </li>
      <li>
        <p>Rodzic/Pacjent zobowiązany jest do przekazania terapeucie wszelkich informacji o stanie zdrowia dziecka lub swoim (jeżeli to jego dotyczy terapia).</p>
      </li>
      <li>
        <p>Na terapię przyprowadzane są dzieci zdrowe, bez objawów chorobowych (kaszel, katar, gorączka, wysypka itp.).
          Jeśli dziecko przed rozpoczęciem zajęć lub w ich trakcie będzie miało objawy infekcji, terapeuta może nie przyjąć dziecka na terapię lub zakończyć ją wcześniej.
          Ponadto przed wejściem do gabinetu dziecko może być poddane pomiarowi temperatury.
          Dzieci przyprowadzane i odbierane są na zajęcia przez zdrowych opiekunów.</p>
      </li>
      <li>
        <p>Terapeuta ma obowiązek na bieżąco informować rodzica/pacjenta o przebiegu i postępach terapii, a rodzic/pacjent przekazuje informację zwrotną
          dotyczącą efektywności zajęć, zachodzących zmian w funkcjonowaniu dziecka. Obowiązkiem rodzica/pacjenta jest również poinformowanie o innych formach terapii,
          którym poddawane jest dziecko/pacjent, jeśli uczęszcza on równolegle na inne zajęcia.</p>
      </li>
      <li>
        <p>Terapeuta może przekazać rodzicowi/pacjentowi zalecenia do pracy w domu lub wskazania do postępowania w innej placówce,
          w której dziecko spędza czas np. żłobek, przedszkole, szkoła. Rodzic/pacjent zobowiązuje się do przestrzegania zaleceń terapeuty dotyczących pracy
          i postępowania terapeutycznego.
          W przeciwnym wypadku terapeuta nie bierze odpowiedzialności za efekty prowadzonej terapii.</p>
      </li>
      <li>
        <p>Terapeuta może zalecić dodatkowe konsultacje u specjalisty lub badania lekarskie w celu dogłębnej diagnozy i jak najlepszych efektów terapii.</p>
      </li>
      <li>
        <p>Opłata za zajęcia terapeutyczne indywidualne dokonywana jest każdorazowo przed lub po zajęciach.
          W gabinecie obowiązuje płatność TYLKO GOTÓWKĄ.</p>
      </li>
      <li>
        <p>Opłata za zajęcia terapeutyczne grupowe są opłacane za miesiąc z góry zgodnie z obowiązującym cennikiem.</p>
      </li>
      <li>
        <p>Spóźnienie na zajęcia nie powoduje przesunięcia ich w czasie, ani nie obniża ich ceny.</p>
      </li>
      <li>
        <p>Wymagana jest systematyczna obecność dziecka/pacjenta na zajęciach terapeutycznych.
          W razie niemożności stawienia się na terapię, rodzic lub opiekun powinien możliwie jak najszybciej odwołać termin spotkania telefonicznie
          – najpóźniej dzień wcześniej do godziny 19:00.
          Niepoinformowanie terapeuty o chęci odwołania zajęć skutkuje koniecznością wniesienia pełnej opłaty za zajęcia, tak jakby się one odbyły.</p>
      </li>
      <li>
        <p>Aby odwołać zajęcia należy: skutecznie, telefonicznie powiadomić terapeutę o odwołaniu zajęć.
          SMS, e-mail, czy wiadomość na messengerze nie gwarantują dotarcia informacji w należytym czasie.</p>
      </li>
      <li>
        <p>Zajęcia odwołane z winy terapeuty przenoszone są na inny możliwy termin uzgodniony z rodzicem/pacjentem.
          W przypadku terapii grupowej i niemożności uzgodnienia zastępczych terminów kwota za zajęcia (lub jej część) zostanie zwrócona.</p>
      </li>
      <li>
        <p>Nieprzestrzeganie zasad regulaminu oraz liczne nieobecności wpływające niekorzystnie na realizację planu terapeutycznego mogą być powodem
          rezygnacji z prowadzenia terapii.</p>
      </li>
      <li>
        <p>Podpisanie przez Rodzica/Opiekuna „Regulaminu Gabinetu Terapeutycznego” jest jednoznaczne ze zobowiązaniem się do ich przestrzegania.</p>
      </li>
    </ul>
  </div>

  <div class="container-fluid">
    <footer class="page-footer">
      <div class="row">
        <div id="first_col" class="col-xs-2">
          <h5>Adres:</h5>
          <p>Chylońska 150<br>Gdynia<br>81-007 </p>
        </div>
        <div class="col-xs-2">
          <h5>Kontakt:</h5>
          <p> Telefon <br> 668-586-675 <br> E-mail <br> email </p>
        </div>
        <div class="col-xs-2">
          <a href="archive.php">Archiwum</a>
        </div>
        <div class="col-xs-2"> <button class="btn btn-link" type="button" data-toggle="modal" data-target="#div_popup">
            <p>Admin</p>
          </button></div>
      </div>
    </footer>
  </div>

  <div class="modal fade" tabindex="-1" aria-hidden="true" id="div_popup">
    <div class="modal-content">
      <img id="avatar" src="images/avatar.webp" alt="Domyślny obrazek profilowy użytkownika">

      <form action="login.php" method="post" class="FormContainer">
        <label for="email">
          E-mail
        </label>
        <input type="text" id="email" placeholder="Adres E-mail" name="email" required>

        <label for="haslo">
          Hasło
        </label>
        <input type="password" id="haslo" placeholder="Hasło" name="haslo" required>

        <button type="submit" class="btn btn-primary" id="submit_form">Potwierdź</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal" aria-label="Close" id="close_form">Zamknij</button>
      </form>

    </div>
  </div>

</body>

<script src="scripts/main.js"></script>
</html>