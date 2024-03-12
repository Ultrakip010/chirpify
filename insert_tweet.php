<?php
session_start(); // Start the session
require ('authenticate.php');
try {
    require('conn.php');

    if (isset($_POST)) {
        $content = $_POST['content'];
        $user_id = $_SESSION['user_id']; // assuming you have user_id in session

        $query = $db->prepare("INSERT INTO tweets(content, user_id) VALUES (:content, :user_id)");
        $query->bindParam(":content", $content);
        $query->bindParam(":user_id", $user_id);

        if($query->execute()) {
            header('location: /chirpify/tweetviewer.php');
        } else {
            echo "Er is een fout opgetreden!";
        }
        echo "<br>";
    }

} catch (PDOException $e) {
    die("Error!: " . $e->getMessage());
}
