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


// ======================= Filter by status =========================
// Filtrer par statut si spécifié
$statusFilter = $_GET['status'] ?? 'all';
$sql = "SELECT a.*, u.first_name, u.last_name
        FROM activity a
        JOIN users u ON a.user_id = u.user_id";


if ($statusFilter !== 'all') {
    $sql .= " AND a.activity_status = :status";
}

$sql .= " ORDER BY a.event_date DESC";

$stmt = $pdo->prepare($sql);

if ($statusFilter !== 'all') {
    $stmt->bindParam(':status', $statusFilter);
}

$stmt->execute();
$activities = $stmt->fetchAll();
