<?php
/*
$hash = password_hash("haslo1", PASSWORD_DEFAULT);
echo 'haslo1: '.$hash.'<br />';
$hash = password_hash("haslo2", PASSWORD_DEFAULT); 
echo 'haslo2: '.$hash.'<br />';
$hash = password_hash("haslo3", PASSWORD_DEFAULT); 
echo 'haslo3: '.$hash.'<br />';
$hash = password_hash("haslo4", PASSWORD_DEFAULT); 
echo 'haslo4: '.$hash.'<br />';
*/
        session_start();
        if (isset($_SESSION['userID']))
        {
            unset($_SESSION['userID']);
        }

        $error = 0;

        include ("login.php");

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            $error = 1;
            die("Connection failed: " . $conn->connect_error);
            echo "ERROR! - CONNECTION COULD NOT BE ESTABLISHED";
        }

        $u_login = $_POST["login"];
        $u_haslo = $_POST["haslo"];

        echo 'haslo: '.$u_haslo.'<br />';
        $hash = password_hash($u_haslo, PASSWORD_DEFAULT); 
        echo 'hashed: '.$hash.'<br />';

        
        $sql = "SELECT ID, login, haslo, stan_subskrybcji FROM users WHERE login = '".$u_login."'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if (password_verify($u_haslo, $row['haslo']))
            {
                $_SESSION['userID'] = $row['ID'];
                $_SESSION['message'] = "Zalogowano pomyślnie!";
                setcookie("subscription_state", $row['stan_subskrybcji']);
            } else {
                $_SESSION['message'] = "Błędny login lub hasło!";
                $error = 1;
            }
        } else {
            $_SESSION['message'] = "Błędny login lub hasło!";
            $error = 1;
        }
        $conn->close();
        
        if ($error == 1)
        {
            header('Location: Glowna.php');
        } else {
            header('Location: TwojeKonto.php');
        }
        