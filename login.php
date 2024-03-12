<?php
session_start();
require_once ('authenticate.php');
require 'conn.php';

if (isset($_POST['username'], $_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = $db->prepare("SELECT * FROM users WHERE username = :username");
    $query->bindParam(":username", $username);
    $query->execute();

    $user = $query->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        // The username and password are correct. Start the session and store the user_id
        $_SESSION['user_id'] = $user['User_id'];

        // Redirect the user to the homepage or wherever you want
        header('Location: home.php');
        exit;
    } else {
        // The username or password are incorrect
        echo "Invalid username or password";
    }
}
?>