<?php
session_start();
if (!isset($_SESSION['userID']))
{
	header('Location: Glowna.php');
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

	<script type="text/javascript">
		function read_cookie(key)
		{
    		var result;
    		return (result = new RegExp('(?:^|; )' + encodeURIComponent(key) + '=([^;]*)').exec(document.cookie)) ? (result[1]) : null;
		}

		function validateForm() {
			let subscriptionState = read_cookie("subscription_state");
			let emailCount = read_cookie("email_count");
			let remainings = subscriptionState - emailCount;
			console.log("Remainings: " + remainings);
			console.log("SubscriptionState: " + subscriptionState);
			console.log("EmailCount: " + emailCount);
			if (remainings < 0)
			{
				let msgBox = document.getElementById('message-box');
				msgBox.innerHTML = '<span style="color: white;">Za mały stan subskrybcji! Brakuje: ' + (-remainings) + ' <a href="Oferta.php">Dokup</a></span>';
				return false;
			} else {
				document.cookie="subscription_state=" + (subscriptionState-emailCount);
				return true;
			}
		}
	</script>

</head>
<body>


<div id="container">

    <nav>
		<div id = "left">
			<h3> Internetowy system mailowy </h3>
            <a href="Oferta.php"> Oferta </a>
		</div>

		<div id = "right">

		<a href="TwojeKonto.php" class="btn btn-dark" style="margin-right: 10px;"> Konto <br /> <a href="wylogowanie.php" class="btn btn-dark"> Wyloguj sie </a><br />
		<div id="message-box">
		<?php
		if (isset($_SESSION['message']))
		{
			echo '<span style="color: white;">'.$_SESSION['message'].' Pozostało: '.$_COOKIE['subscription_state'].' wiadomości</span>';
			unset($_SESSION['message']);
		}
		?>
		</div>
		</div>
	</nav>











    <section>
			<div id = "CyberPost">
			<h1> Wyślij wiadomość </h1>
			
			<form action="wyslijWiadomosc.php" onsubmit="return validateForm()" method="post">
				<div class="form-group">
					<label for="yourEmail">Twój Email</label>
					<input type="email" class="form-control" id="yourEmail" name="senderEmail" placeholder="Wprowadź swój email" required>
				</div>
				<div class="form-group">
					<label for="recipientEmail">Email Odbiorcy</label>
					<input type="text" class="form-control" id="recipientEmail" placeholder="Tu pojawią się adresy odbiorców załadowane z pliku CSV" required readonly>
				</div>
				<div class="form-group">
					<label for="subject">Tytuł</label>
					<input type="text" class="form-control" id="subject" name="subject" placeholder="Tytuł maila">
				</div>
				<div class="form-group">
					<label for="messageContent">Treść</label>
					<textarea class="form-control" id="messageContent" name="emailContent" rows="9" placeholder="Wprowadź treść wiadomości" required></textarea>
				</div>
				<!-- funcionality not fully implemented
					<div class="form-group" id="zalacznik"> 
					<label for="attachment">Załącznik:</label>
					<input type="file" class="form-control-file"  id="attachment" multiple >
				</div>-->
					<label for="csvFile" id="zalacznik2">Plik CSV:</label> 
					<input type="file" id="csvFile" class="customBTN" accept=".csv">
					<p id="emailCount">Liczba wybranych osób: 0</p>
				<button type="submit" class="btn btn-dark" id="wyslijButton">Wyślij</button>


			</form>
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



    <script src="WczytywanieEXCELA.js"></script>
	
</body>
</html>