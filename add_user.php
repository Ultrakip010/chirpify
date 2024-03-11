<?php
try {
    $db = new PDO("mysql:host=localhost;dbname=y", "root", "");


    if (isset($_POST['verzenden'])) {
        $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
        $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING);
        $password = password_hash("$password", PASSWORD_DEFAULT);

        $query = $db->prepare("INSERT INTO users(username, password) VALUES (:username, :password)");
        $query->bindParam(":username", $username);
        $query->bindParam(":password", $password);

        if($query->execute()) {
            header('location: /chirpify/home.php');
        } else {
            echo "Er is een fout opgetreden!";
        }
        echo "<br>";
    }

} catch (PDOException $e) {
    die("Error!: " . $e->getMessage());
}

