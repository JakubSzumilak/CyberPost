<?php
        session_start();
        if (!isset($_SESSION['userID']))
        {
            header('Location: Oferta.php');
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

        $subscription = $_POST['subscription'];
        echo "Subscription: ".$subscription;

        // FINISH
        $stan_subskrybcji = 1000;
        if ($subscription === "Basic")
        {
            $stan_subskrybcji = 100;
        } else if ($subscription === "Extra") {
            $stan_subskrybcji = 200;
        } else if ($subscription === "Gold") {
            $stan_subskrybcji = 500;
        }

        echo "<br />Subscription state: ".$stan_subskrybcji;





        $sql = "SELECT subskrypcja FROM users WHERE ID = '".$_SESSION['userID']."'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $subskrypcja = $row['subskrypcja'];
		}


        $sql = "UPDATE users SET subskrypcja='$subscription' WHERE ID = '".$_SESSION['userID']."'";
        $conn->query($sql);
        $sql = "UPDATE users SET stan_subskrybcji='$stan_subskrybcji' WHERE ID = '".$_SESSION['userID']."'";
        $conn->query($sql);
        $_SESSION['message'] = "Subskrypcja zaktualizowana";
        setcookie("subscription_state", $stan_subskrybcji);

        $conn->close();
        header('Location: TwojeKonto.php');

        