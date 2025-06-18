<?php
include("../confige/DbConnect.php");

$filter = $_GET['filter'] ?? 'users';

if ($filter === 'admins') {
    $stmt = $pdo->query("SELECT first_name, last_name, CNI_number, phone_number, email_ AS email FROM admin");
} else {
    $stmt = $pdo->query("SELECT first_name, last_name, CNI_number, phone_number, email FROM users");
}

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
