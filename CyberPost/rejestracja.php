<?php
        session_start();
        if (isset($_SESSION['userID']))
        {
            unset($_SESSION['userID']);
        }

        include ("login.php");

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
            echo "ERROR! - CONNECTION COULD NOT BE ESTABLISHED";
        }

        $u_login = $_POST["login"];
        $u_haslo = password_hash($_POST["haslo"], PASSWORD_DEFAULT);;
        $u_email = $_POST["email"];
        $u_subskrypcja = $_POST["subscription"];
        $u_stan_subskrypcji = 0;

         

        // Setting the amount of emails that can be sent to the right amount based on subscription type
        if ($u_subskrypcja == "basic")
        {
            $u_stan_subskrypcji = 100;
        } else if ($u_subskrypcja == "extra") {
            $u_stan_subskrypcji = 200;
        } else if ($u_subskrypcja == "gold") {
            $u_stan_subskrypcji = 500;
        } else {
            $u_stan_subskrypcji = 1000;
        }

        // Check if user with the same login already exists
        $sql = "SELECT ID FROM users WHERE login = '$u_login' OR email = '$u_email'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $_SESSION['message'] = "Błąd - istnieje już użytkownik o podanym loginie lub mailu";
        } else {
            $sql = "INSERT INTO users VALUES(NULL, '$u_login', '$u_haslo', '$u_email', 'user', '$u_subskrypcja', '$u_stan_subskrypcji')";

            if ($conn->query($sql) === TRUE) {
                $_SESSION['message'] = "Zarejestrowano pomyślnie! Można się zalogować";
                $_SESSION['registration_success'] = 1;
            } else {
                echo "Error inserting record: " . $conn->error;
                $_SESSION['message'] = "Wystąpił błąd przy rejestracji!";
            }
        }
        $conn->close();
        header('Location: Glowna.php');