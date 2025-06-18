<?php
session_start();
include("../confige/DbConnect.php");


if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit;
}

$user_id = $_SESSION['admin_id'] ;
$checkAdmin = $pdo->prepare("SELECT * FROM admin WHERE admin_id = :id");
$checkAdmin->execute([':id' => $user_id]);
$adminData = $checkAdmin->fetch(PDO::FETCH_ASSOC);

if (!$adminData) {
    echo "<h2 style='color:red;'>Access interdit. Cette page est réservée aux administrateurs.</h2>";
    exit;
}


$admin_id = $_SESSION['admin_id'] ?? $adminData['admin_id'] ?? null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $activity_id = $_POST['activity_id'] ?? null;
    $action = $_POST['action'] ?? null;

    if ($activity_id && in_array($action, ['accepter', 'refuser']) && $admin_id) {
        $newStatus = $action;



        $sql = "UPDATE activity 
                SET activity_status = :status, admin_id = :admin_id 
                WHERE activite_id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':status' => $newStatus,
            ':admin_id' => $admin_id,
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
