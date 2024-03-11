<?php
try {
    $db = new PDO("mysql:host=localhost;dbname=y", "root", "");
    if(isset($_POST['inloggen'])) {
    $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
    $password = $_POST['password'];
    $query = $db->prepare("SELECT * FROM users WHERE username = :username");
    $query->bindParam(":username", $username);
    $query->execute();
    if ($query->rowCount() == 1) {
    $result = $query->fetch(PDO::FETCH_ASSOC);
    if (password_verify($password, $result['password'])) {
    echo "Welkom!";
    } else {
      echo "Onjuist wachtwoord!";
    }
    } else {
    echo "Onjuiste gebruikersnaam!";
    }
    echo "<br>";
    }
} catch (PDOException $e) {
    die("Error!: " . $e->getMessage());
}
header("Location: /chirpify/home.php");