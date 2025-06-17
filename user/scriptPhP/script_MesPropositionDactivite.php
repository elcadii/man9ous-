<?php
// session_start();
include("../confige/DbConnect.php");

if (!isset($_SESSION['user_id'])) {
    die("Vous devez être connecté.");
}

$user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM activity WHERE user_id = :user_id ORDER BY event_date DESC";
$stmt = $pdo->prepare($sql);
$stmt->execute([':user_id' => $user_id]);
$activities = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

