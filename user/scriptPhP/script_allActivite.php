<?php

include("../confige/DbConnect.php");
$protected = true;
if ($protected && (!isset($_SESSION['login']) || $_SESSION['login'] !== true)) {
        header("Location: /man9ous/man9ous-/user/conection.php");
        exit();
}

// partizipate in activity
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['participate'])) {
        $user_id = $_SESSION['user_id'] ?? null;
        $activite_id = $_POST['activite_id'] ?? null;

        if ($user_id && $activite_id) {
                $check = $pdo->prepare("SELECT * FROM participates WHERE user_id = ? AND activite_id = ?");
                $check->execute([$user_id, $activite_id]);

                if (!$check->fetch()) {
                        $stmt = $pdo->prepare("INSERT INTO participates (user_id, activite_id) VALUES (?, ?)");
                        $stmt->execute([$user_id, $activite_id]);
                        header("Location: allActivite.php");
                        exit();
                }
        }
}

// get activiet
$sql = "SELECT a.*, u.first_name, u.last_name 
        FROM activity a
        JOIN users u ON a.user_id = u.user_id
        WHERE a.activity_status = 'accepter'
        ORDER BY a.event_date DESC";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$activities = $stmt->fetchAll(PDO::FETCH_ASSOC);

$dateToday = date('Y-m-d');
$search = $_GET['search'] ?? '';

$filteredActivities = [];
foreach ($activities as $activity) {
        if ($activity['event_date'] < $dateToday) {
                continue;
        }
        if (
                $search && stripos($activity['title'], $search) === false
                && stripos($activity['description'], $search) === false
                && stripos($activity['activity_location_'], $search) === false
        ) {
                continue;
        }
        $filteredActivities[] = $activity;
}


$user_id = $_SESSION['user_id'] ?? null;
$participatedActivities = [];
if ($user_id) {
        $stmtParticipated = $pdo->prepare("SELECT activite_id FROM participates WHERE user_id = ?");
        $stmtParticipated->execute([$user_id]);
        $participatedActivities = $stmtParticipated->fetchAll(PDO::FETCH_COLUMN);
}
