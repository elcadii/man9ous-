<?php
include("../confige/DbConnect.php");



if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['saveStatus'])) {
    $problem_id = intval($_POST['problem_id']);
    $new_status = trim($_POST['status']);
    $admin_id = $_SESSION['admin_id'] ?? null;

    if ($admin_id && $problem_id && !empty($new_status)) {

        // UPdate statu management and problem tables
        $stmt1 = $pdo->prepare("UPDATE management SET status = ?, admin_id = ?, operation_date = NOW() WHERE problem_id = ?");
        $stmt1->execute([$new_status, $admin_id, $problem_id]);

        // Update the problem status in the problem table
        $stmt2 = $pdo->prepare("UPDATE problem SET problem_status = ? WHERE problem_id = ?");
        $stmt2->execute([$new_status, $problem_id]);

        echo "<div class='alert-success'> Le statut a été mis à jour avec succès dans les deux tables.</div>";
        // var_dump($_SESSION);
        // die();
    } else {
        echo "<div class='alert-error'>❌ Erreur : admin non connecté ou données manquantes.</div>";
    }
}

$stmt = $pdo->prepare("SELECT p.*, m.status AS management_status
                       FROM problem p
                       JOIN management m ON p.problem_id = m.problem_id
                       ORDER BY p.problem_date DESC");
$stmt->execute();
$reports = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
