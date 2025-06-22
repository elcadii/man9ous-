<?php
include("../confige/DbConnect.php");

$protected = true;
if ($protected && (!isset($_SESSION['login']) || $_SESSION['login'] !== true)) {
    header("Location: /man9ous/man9ous-/user/conection.php");
    exit();
}

$user_id = $_SESSION['user_id'] ?? null;
// var_dump($_SESSION['user_id']);
//           die();

if (!$user_id) {
    die("Utilisateur non connecté.");
}

// Filtrage
$status_filter = $_GET['status'] ?? '';
$params = [$user_id];

$query = "SELECT p.problem_name, p.description, p.photo_url, p.problem_status, u.first_name
          FROM problem p 
          JOIN users u ON p.user_id = u.user_id
          WHERE p.user_id = ?";




if (!empty($status_filter)) {
    $query .= " AND p.problem_status = ?";
    $params[] = $status_filter;
}

$query .= " ORDER BY p.problem_id DESC";

$stmt = $pdo->prepare($query);
$stmt->execute($params);
$reports = $stmt->fetchAll(PDO::FETCH_ASSOC);
