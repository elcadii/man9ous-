<?php
include("../confige/DbConnect.php");


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

// Filter activities based on the search term and event date
foreach ($activities as $activity) {
        if ($activity['event_date'] < $dateToday) {
                continue;
        }
        // Filter by search desc and lieu and titel
        if (
                $search && stripos($activity['title'], $search) === false
                && stripos($activity['description'], $search) === false
                && stripos($activity['activity_location_'], $search) === false
        ) {
                continue;
        }

        $filteredActivities[] = $activity;
}
