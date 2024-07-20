<?php

session_start();
if (isset($_SESSION["userID"]))
{
	header('location: TwojeKonto.php');
}

?>

<!DOCTYPE html>
<lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="style-upload.css">
	<script type="text/javascript" src="GlownaJS.js"></script>

	<style>
		#registration-menu {
			position: fixed;
			padding: 10px;
			width: 300px;
			height: 400px;
			top: 75px;
			right: 50px;
			background-color: #101010;
			border: 1px solid white;
			visibility: hidden;
		}

	</style>

</head>
<body>


<div id="container">

    <nav>
		<div id = "left">
			<h3> Internetowy system mailowy </h3>
            <a href="Glowna.php"> CyberPost </a>
            <a href="Oferta.php"> Oferta </a>
		</div>

		<div id = "right">
			<form name="name" action="logowanie.php" method="POST">
			Login: <input type="text" name="login" required> 
			Password: <input type="password" name="haslo" required>
			<input type="submit" class="btn btn-dark" value="Zaloguj sie">
			<div class="btn btn-dark" onclick="showRegistrationMenu();"> Zarejestruj </div>
			</form>
			<?php
			if (isset($_SESSION['message']))
			{
				$color = "red";
				if (isset($_SESSION['registration_success']))
				{
					$color = "green";
					unset($_SESSION['registration_success']);
				}
				echo '<span style="color: '.$color.';">'.$_SESSION['message'].'</span>';
				unset($_SESSION['message']);
			}
			?>
		</div>
	</nav>

	<div id="registration-menu">
	<h1>Zarejestruj</h1>
            <form name="rejestracja" action="rejestracja.php" method="post" onsubmit="return validateRegistration();">

            <div id="input-flex">
                <div class="input-field">
                    <label for="login">Login: </label><br />
                    <input type="text" name="login" id="login" placeholder="login..." required /><br />
					<label for="email">Adres E-mail: </label><br />
                    <input type="text" name="email" id="email" placeholder="email..." required /><br />
                    <label for="haslo">Haslo: </label><br />
                    <input type="password" name="haslo" id="haslo" placeholder="haslo..." required /><br />
                    <label for="powtorz-haslo">Powtórz haslo: </label><br />
                    <input type="password" name="powtorz-haslo" id="powtorz-haslo" placeholder="powtorz haslo..." required /><br />


                    <input type="radio" id="basic" name="subscription" value="basic" checked>
                    <label for="basic">Basic</label><br>
                    <input type="radio" id="extra" name="subscription" value="extra">
                    <label for="extra">Extra</label><br>
                    <input type="radio" id="gold" name="subscription" value="gold">
                    <label for="gold">Gold</label><br>
                    <input type="submit" value="Zarejestruj" />
                </div>
            </div>
        </form>
	</div>











    <section>
		<div id = "sectionLeft">
			<h1>  CyberPost  </h1>
			<h2> <br> Twoja hurtowa poczta mailowa! </h2>
		</div>
		
		<div id = "sectionRight">
			<p>

				Zarejestruj się już dziś i skorzystaj z naszej wyjątkowej promocji! Oferujemy darmowe 100 maili na start, abyś mógł przetestować wszystkie możliwości naszej platformy bez żadnych zobowiązań. To doskonała okazja, aby przekonać się, jak nasza usługa może usprawnić Twoją komunikację z klientami i zwiększyć skuteczność kampanii marketingowych.
				<br><br>
				Nie czekaj! Dołącz do grona zadowolonych użytkowników naszej platformy i zacznij wysyłać e-maile hurtowo już teraz. Skorzystaj z promocji i sprawdź, jak łatwo możesz osiągnąć lepsze wyniki w komunikacji e-mailowej.
				<br>
				Dołącz do nas i przekonaj się, jak nasza platforma do masowej wysyłki e-maili może zrewolucjonizować sposób, w jaki komunikujesz się ze swoimi klientami.
			</p>
		</div>
	</section>




    <footer>
		<div id = "footerText"> 
		<h3> Follow us! </h3>
		</div>

    </footer>
    <div class = "Icons">
		<div id = "Ikonka1"><img src="img/icons/blip.png" alt="Ikonka"></div>
		<div id = "Ikonka2"><img src="img/icons/fb.png" alt="Ikonka"></div>
		<div id = "Ikonka3"><img src="img/icons/link.png" alt="Ikonka"></div>
		<div id = "Ikonka4"><img src="img/icons/pint.png" alt="Ikonka"></div>
		<div id = "Ikonka5fix"></div>
		<div id = "Ikonka5"><img src="img/icons/skype.png" alt="Ikonka"></div>
		<div id = "Ikonka6"><img src="img/icons/twit.png" alt="Ikonka"></div>
		<div id = "Ikonka7"><img src="img/icons/what.png" alt="Ikonka"></div>
		<div id = "Ikonka8"><img src="img/icons/yt.png" alt="Ikonka"></div>
    </div>
	
</div>


</body>
</html>