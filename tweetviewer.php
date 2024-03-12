<?php
session_start(); // Start the session at the beginning of the file
require_once('authenticate.php');
if (!isset($_SESSION['user_id'])) {
    // If the user is not logged in, redirect them to the login page
    header('Location: login.php');
    exit;
}

try{
    require('conn.php');
    $sql = "SELECT tweets.*, users.username FROM tweets JOIN users ON tweets.user_id = users.user_id";
    $query = $db->prepare($sql);
    $query->execute();

    while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
        echo $row['username'] . " posted: " . $row['content'] . "<br>";
    }
} catch (PDOException $e) {
    die("Error!: " . $e->getMessage());
}