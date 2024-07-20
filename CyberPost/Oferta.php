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

		<?php
		session_start();
		include ("login.php");
		$subskrypcja = 'basic';
		if (isset($_SESSION['userID']))
		{
			echo "<div id = 'right'>
				<a href='wylogowanie.php' class='btn btn-dark'> Wyloguj sie </a>
			</div>";
			$conn = new mysqli($servername, $username, $password, $dbname);
			$sql = "SELECT subskrypcja FROM users WHERE ID = '".$_SESSION['userID']."'";
        	$result = $conn->query($sql);
        	if ($result->num_rows > 0) {
            	$row = $result->fetch_assoc();
            	$subskrypcja = $row['subskrypcja'];
			}
		}
		else {
			echo "
			<div id = 'right'>
			<form name='name' action='logowanie.php' method='POST'>
			Login: <input type='text' name='login' required> 
			Password: <input type='password' name='haslo' required>
			<input type='submit' class='btn btn-dark' value='Zaloguj sie'>
			<div class='btn btn-dark' onclick='showRegistrationMenu();'> Zarejestruj </div>
			</form>
			</div>
			";
		}
		?>
	</nav>











    <section>
		<div id = "Oferta1">
			<h1> Basic </h1>
			<p>
			-do 100 maili <br>
			-bez załaczników <br>
			-limit 128 znaków
			</p><br />
			<form method="POST" action="dokup.php">
				<input type="hidden" name="subscription" value="Basic">
				<?php
				$text = "";
				if ($subskrypcja === 'basic')
				{
					$text = "Odnów";
				} else {
					$text = "Wykup";
				}
				echo '<input type="submit" class="btn btn-dark" id="ofertaButton" value="'.$text.'">';
				?>
			</form>
		</div>
		<div id = "Oferta2">
		<h1> Extra </h1>
			<p>
			-do 2 000 maili <br>
			-możliwość przesyłania załaczników <br>
			-limit 258 znaków <br>
			</p>
			<form method="POST" action="dokup.php">
				<input type="hidden" name="subscription" value="Extra">
				<?php
				$text = "";
				if ($subskrypcja === 'extra')
				{
					$text = "Odnów";
				} else if ($subskrypcja === 'basic') {
					$text = "Ulepsz";
				} else {
					$text = "Wykup";
				}
				echo '<input type="submit" class="btn btn-dark" id="ofertaButton" value="'.$text.'">';
				?>
			</form>
		</div>
		<div id = "Oferta3">
			<h1> Gold </h1>
			<p>
			-do 10 000 maili <br>
			-możliwość przesyłania załaczników <br>
			-limit 1024 znaków <br>
			</p>
			<form method="POST" action="dokup.php">
				<input type="hidden" name="subscription" value="Gold">
				<?php
				$text = "";
				if ($subskrypcja === 'gold')
				{
					$text = "Odnów";
				} else {
					$text = "Ulepsz";
				}
				echo '<input type="submit" class="btn btn-dark" id="ofertaButton" value="'.$text.'">';
				?>
			</form>
		</div>
	</section>


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