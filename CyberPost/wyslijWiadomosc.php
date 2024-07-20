<?php
session_start();
include ("login.php");

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    $error = 1;
    die("Connection failed: " . $conn->connect_error);
    echo "ERROR! - CONNECTION COULD NOT BE ESTABLISHED";
}

$sender_name = "unknown";
$sql = "SELECT login FROM users WHERE ID = '" . $_SESSION['userID'] . "'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $sender_name = $row['login'];
}

$subscription_state = $_COOKIE['subscription_state'];
echo "Pozostałe maile: " . $subscription_state;
$sql = "UPDATE users SET stan_subskrybcji='$subscription_state' WHERE ID = '" . $_SESSION['userID'] . "'";
$conn->query($sql);

$_SESSION['message'] = "Wiadomości wysłane poprawnie!";
$conn->close();

echo "<br /><br />";
//ini_set("SMTP", "smtp.poczta.onet.pl");
//ini_set("smtp_port", "465");
echo "SMTP: " . ini_get("SMTP") . "<br />";
echo "smtp_port: " . ini_get("smtp_port") . "<br /><br />";

$msg = $_POST['emailContent'];
$sender  = $sender_name;
$sender .= " &lt";
$sender .= $_POST['senderEmail'];
$sender .= "&gt";
if ($_POST['subject'] === ""){
    $msgname = "no subject specified";
} else {
    $msgname = $_POST['subject'];
}


$headers  = 'From: '.$sender_name.' <'.$_POST['senderEmail'].'>'." \r\n";
$headers  .= 'Reply-To: <'.$_POST['senderEmail'].'>'."\r\n";
echo $headers;

$emails = json_decode($_COOKIE['emailsJSON']);

echo "Emails JSON: <br /><br />";


for ($i = 0; $i < $_COOKIE['email_count']; $i++)
{
    $count = $i + 1;
    echo 'Email '.$count.' = '.$emails[$i].'<br />';
    if (mail($emails[$i],$msgname, $msg, $headers))
    {
        echo 'Success!<br /><br />';
    } else {
        echo 'Failure!<br /><br />';
        $_SESSION['message'] = "Przynajmniej jedna wiadomość nie została wysłana!";
    }
}

header('Location: Poczta.php');



