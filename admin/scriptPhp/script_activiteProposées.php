<?php
include("../confige/DbConnect.php");


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $activity_id = $_POST['activity_id'] ?? null;
    $action = $_POST['action'] ?? null;

    if ($activity_id && in_array($action, ['accepter', 'refuser'])) {
        $newStatus = $action;
        $sql = "UPDATE activity SET activity_status = :status WHERE activite_id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':status' => $newStatus,
            ':id' => $activity_id
        ]);
        header("Location: " . $_SERVER['PHP_SELF']); 
        exit;
    }
}


$sql = "SELECT a.*, u.first_name, u.last_name 
        FROM activity a
        JOIN users u ON a.user_id = u.user_id
        WHERE a.activity_status = 'en attente'
        ORDER BY a.event_date DESC";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$activities = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>