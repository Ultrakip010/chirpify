<?php
session_start();

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <title>Document</title>
</head>
<body class="home">
    <nav>
        <ul>
            <li><a href="home.php">Home</a></li>
            <li><a href="tweet.php">Tweet</a></li>
            <li><a href="index.php">Logout</a></li>
        </ul>
    </nav>
</body>
</html>