<?php
include("../confige/DbConnect.php");

$protected = true;
if ($protected && (!isset($_SESSION['login']) || $_SESSION['login'] !== true)) {
    header("Location: /man9ous/man9ous-/user/conection.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$status_filter = $_GET['status'] ?? '';

$sql = "SELECT p.*, m.status AS management_status
        FROM problem p
        LEFT JOIN management m ON p.problem_id = m.problem_id
        WHERE p.user_id = ?";

$params = [$user_id];

// ajouter le filtre si besoin
if (!empty($status_filter)) {
    $sql .= " AND m.status = ?";
    $params[] = $status_filter;
}

$sql .= " ORDER BY p.problem_id DESC";

$stmt = $pdo->prepare($sql);
$stmt->execute($params);
$reports = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
