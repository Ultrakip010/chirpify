<?php
if (isset($_SESSION['user_id'])) {
    echo "Welcome to the homepage!";
} else {
    header('Location: index.php');
    exit;
}