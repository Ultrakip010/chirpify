<?php
require_once ('authenticate.php');
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <title>tweaking</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
<nav>
    <ul>
        <li><a href="home.php">Home</a></li>
        <li><a href="tweet.php">Tweet</a></li>
        <li><a href="index.php">Logout</a></li>
    </ul>
</nav>
<form action="insert_tweet.php" method="post">
    Plaats bericht: <input type="text" name="content" />
    <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>" />
    <input type="submit" />
</form>
</body>
</html>