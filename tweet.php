
<?php
/*
if(isset($_POST['name'])) {
    if(preg_match("/[^A-Za-z'-]/",$_POST['name'] )) {
        die ("invalid name and name should be alpha");
    }
    echo $_POST['name']. "<br />";

    exit();
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <title>tweaking</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
        Plaats bericht: <input type="text" name="name" />
        <input type="submit" />
    </form>
</body>
</html>
*/


try {
    require('conn.php'); // connectie maken met de database
   
    if (isset($_POST)) {
        $tweet_message = $_POST['tweet_message'];

        $query = $db->prepare("INSERT INTO tweets(tweet_message) VALUES (:tweet_message)");
        $query->bindParam(":tweet_message", $tweet_message);

        if($query->execute()) {
            echo "Tweet is geplaatst!";
        } else {
            echo "Er is een fout opgetreden!";
        }
        echo "<br>";
    }

} catch (PDOException $e) {
    die("Error!: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <title>tweaking</title>
    <!-- <link rel="stylesheet" href="css/main.css"> -->
</head>
<body>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
        Plaats bericht: <input type="text" name="tweet_message" />
        <input type="submit" />
    </form>
</body>
</html>
