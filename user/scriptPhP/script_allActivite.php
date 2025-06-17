<?php
include("../confige/DbConnect.php");

$sql = "SELECT a.*, u.first_name , u.last_name 
        FROM activity a
        JOIN users u ON a.user_id = u.user_id
        WHERE a.activity_status = 'accepter'
        ORDER BY a.event_date DESC";

$stmt = $pdo->prepare($sql);
$stmt->execute();
$activities = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
