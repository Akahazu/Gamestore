<?php
session_start();
if(!isset($_SESSION['user'])){
    header("Location: login.php");
}

include "config/db.php";

$game_id = $_GET['id'];
$user_id = $_SESSION['user']['id'];

mysqli_query($conn, "INSERT INTO orders (user_id, game_id) VALUES ('$user_id', '$game_id')");
header("Location: games.php");
?>
