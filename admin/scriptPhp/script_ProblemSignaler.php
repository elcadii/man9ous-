<?php
include("../confige/DbConnect.php");

// Vérifier si c’est un admin connecté);
if (!isset($_SESSION['login']) || $_SESSION['role'] !== 'admin') {
    header("Location: /man9ous/man9ous-/user/conection.php");
    exit;
}

// 1. Traitement changement de statut
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['saveStatus'])) {
    $problem_id = intval($_POST['problem_id']);
    $new_status = trim($_POST['status']);
    $admin_id = $_SESSION['admin_id'] ?? null;

    if ($admin_id && $problem_id && !empty($new_status)) {
        // Update dans management
        $stmt1 = $pdo->prepare("UPDATE management SET status = ?, admin_id = ?, operation_date = NOW() WHERE problem_id = ?");
        $stmt1->execute([$new_status, $admin_id, $problem_id]);

        // Update dans problem
        $stmt2 = $pdo->prepare("UPDATE problem SET problem_status = ? WHERE problem_id = ?");
        $stmt2->execute([$new_status, $problem_id]);

        echo "<div class='alert-success'>Le statut a été mis à jour avec succès dans les deux tables.</div>";
        header("Refresh: 1; url=ProblemSignaler.php");
    } else {
        echo "<div class='alert-error'> Erreur : admin non connecté ou données manquantes.</div>";
    }
}

// 2. Filtrage par statut
// 2. Filtrage par statut avec commune_id
$status_filter = $_GET['status'] ?? '';
$params = [':commune_id' => $_SESSION['commune_id']];

$query = "SELECT p.*, m.status AS management_status
          FROM problem p
          JOIN management m ON p.problem_id = m.problem_id
          WHERE p.commune_id = :commune_id";

if (!empty($status_filter)) {
    $query .= " AND m.status = :status";
    $params[':status'] = $status_filter;
}

$query .= " ORDER BY p.problem_date DESC";
$stmt = $pdo->prepare($query);
$stmt->execute($params);
$reports = $stmt->fetchAll(PDO::FETCH_ASSOC);



// statistique================================

$waiting = $resolved = $in_progress = $total = 0;

// Requête pour récupérer les stats
$sql = "SELECT problem_status, COUNT(*) AS count 
        FROM problem 
        WHERE commune_id = :commune_id 
        GROUP BY problem_status";

$stmt = $pdo->prepare($sql);
$stmt->execute([':commune_id' => $_SESSION['commune_id']]);
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);


// Remplir les compteurs
foreach ($results as $row) {
    switch (strtolower(trim($row['problem_status']))) {
        case 'non traité':
            $waiting = $row['count'];
            // var_dump($waiting);
            // die();
            break;
        case 'traité':
            $resolved = $row['count'];
            break;
        case 'en cours':
            $in_progress = $row['count'];
            break;
    }
}

// Total
$total = $waiting + $resolved + $in_progress;
