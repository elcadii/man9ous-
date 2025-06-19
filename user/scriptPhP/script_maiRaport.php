<?php
include("../confige/DbConnect.php");

if (!isset($_SESSION['user_id'])) {
    die("Vous devez être connecté pour voir vos rapports.");
}

$user_id = $_SESSION['user_id'];

$sql = "SELECT p.*, m.status AS management_status
        FROM problem p
        LEFT JOIN management m ON p.problem_id = m.problem_id
        WHERE p.user_id = ?
        ORDER BY p.problem_id DESC";

$stmt = $pdo->prepare($sql);
$stmt->execute([$user_id]);
$reports = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>