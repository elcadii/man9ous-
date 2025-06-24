<?php
include("../confige/DbConnect.php");

// Vérifier si c’est un admin connecté);
if (!isset($_SESSION['login']) || $_SESSION['role'] !== 'admin') {
    header("Location: /man9ous/man9ous-/user/conection.php");
    exit;
}

$filter = $_GET['filter'] ?? 'users';
$commune_id = $_SESSION['commune_id'] ?? null;

if ($filter === 'admins') {
    $stmt = $pdo->prepare("SELECT first_name, last_name, CNI_number, phone_number, email_ AS email FROM admin WHERE commune_id = :commune_id");
} else {
    $stmt = $pdo->prepare("SELECT first_name, last_name, CNI_number, phone_number, email FROM users WHERE commune_id = :commune_id");
}

$stmt->execute([':commune_id' => $commune_id]);
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

