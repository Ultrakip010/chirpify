<?php
session_start();
try {
    $db = new PDO("mysql:host=localhost;dbname=y", "root", "");
    if(isset($_POST['username']) && isset($_POST['password'])) {
        $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
        $password = $_POST['password'];
        $query = $db->prepare("SELECT * FROM users WHERE username = :username");
        $query->bindParam(":username", $username);
        $query->execute();
        if ($query->rowCount() == 1) {
            $result = $query->fetch(PDO::FETCH_ASSOC);
            if (password_verify($password, $result['password'])) {
                header("Location: /chirpify/home.php");
                exit();
            } else {
                $_SESSION['error'] = "Incorrect password!";
                header("Location: index.php");
                exit();
            }
        } else {
            $_SESSION['error'] = "Username not found!";
            header("Location: index.php");
            exit();
        }
    }
} catch (PDOException $e) {
    die("Error!: " . $e->getMessage());
}