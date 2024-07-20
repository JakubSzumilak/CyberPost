<?php
        session_start();
        if (isset($_SESSION['userID']))
        {
            unset($_SESSION['userID']);
            $_SESSION['message'] = "Pomyślnie wylogowano";
            header('Location: Glowna.php');
        } else {
            $_SESSION['message'] = "Wystąpił błąd podczas wylogowywania";
            header('Location: TwojeKonto.php');
        }

        