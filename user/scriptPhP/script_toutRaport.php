


<?php
include("../confige/DbConnect.php");

$stmt = $pdo->prepare("SELECT p.*, u.first_name FROM problem p 
                       JOIN users u ON p.user_id = u.user_id 
                       ORDER BY p.problem_id DESC ");
$stmt->execute();
$reports = $stmt->fetchAll(PDO::FETCH_ASSOC);


$status_filter = $_GET['status'] ?? '';
$query = "SELECT p.*, u.first_name, m.status AS management_status
          FROM problem p
          JOIN users u ON p.user_id = u.user_id
          JOIN management m ON p.problem_id = m.problem_id";
$params = [];

if (!empty($status_filter)) {
    $query .= " WHERE m.status = ?";
    $params[] = $status_filter;
}

$query .= " ORDER BY p.problem_id DESC ";
$stmt = $pdo->prepare($query);
$stmt->execute($params);
$reports = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>