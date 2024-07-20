<?php
session_start();
if (!isset($_SESSION['userID']))
{
	header('Location: Glowna.php');
}
include ("login.php");

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

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
</head>
<body>


<div id="container">

    <nav>
		<div id = "left">
			<h3> Internetowy system mailowy </h3>
            <a href="Oferta.php"> Oferta </a>
		</div>

		<div id = "right">
		

		
		    
		
			<a href="Poczta.php" class="btn btn-dark" style="margin-right: 10px;"> Wyślij wiadomość  <br /> <a href="wylogowanie.php" class="btn btn-dark"> Wyloguj sie </a><br />
			
			<?php
			if (isset($_SESSION['message']))
			{
				echo '<span style="color: green;">'.$_SESSION['message'].'</span>';
				unset($_SESSION['message']);
			}
			?>
		</div>
	</nav>











    <section>

 <div id="CyberPostInfo">
		<div id="Profil">
		<h1>Informacje o Użytkowniku</h1>
		</div>
		<?php
		$sql = "SELECT login, email, subskrypcja, stan_subskrybcji FROM users WHERE ID = '".$_SESSION['userID']."'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
			echo '
            <div class="card-body">
                <div class="form-group">
                    <label for="username">Login:</label>
                    <input type="text" class="form-control" id="username" value="'.$row['login'].'" readonly>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" value="'.$row['email'].'" readonly>
                </div>
                <div class="form-group">
                    <label for="Subskrypcja">Subskrypcja:</label>
                    <input type="email" class="form-control" id="Subskrypcja" value="'.$row['subskrypcja'].'" readonly>
                </div>
				<div class="form-group">
                    <label for="LiczbaMaili">Liczba niewykorzystanych wiadomości:</label>
                    <input type="email" class="form-control" id="LiczbaMaili" value="'.$row['stan_subskrybcji'].'" readonly>
                </div> 
			<a href="Oferta.php" class="btn btn-dark" id="dokup"> Dokup! </a>
            </div>
			';
		}
		?>
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