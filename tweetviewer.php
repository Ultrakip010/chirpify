<?php
try{
    require('conn.php');
    $sql = "SELECT * FROM tweets";
    $query = $db->prepare($sql);
    $query->execute();

    while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
        echo $row['tweet_message'] . "<br>";
    }
} catch (PDOException $e) {
    die("Error!: " . $e->getMessage());
}