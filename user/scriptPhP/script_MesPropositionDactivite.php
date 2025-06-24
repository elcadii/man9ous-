<?php
include("../confige/DbConnect.php");

if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {
    header("Location: /man9ous/man9ous-/user/conection.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$statusFilter = $_GET['status'] ?? 'all';

$sql = "SELECT a.*, u.first_name, u.last_name
        FROM activity a
        JOIN users u ON a.user_id = u.user_id
        WHERE a.user_id = :user_id";

$params = [':user_id' => $user_id];

if ($statusFilter !== 'all') {
    $sql .= " AND a.activity_status = :status";
    $params[':status'] = $statusFilter;
}

$sql .= " ORDER BY a.event_date DESC";

$stmt = $pdo->prepare($sql);
$stmt->execute($params);
$activities = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
