<?php
include("../confige/DbConnect.php");



// Vérifier si c’est un admin connecté

if (!isset($_SESSION['login']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../login.php");
    exit;
}

$admin_id = $_SESSION['admin_id'];

// Confirmer que l’admin existe bien en base
$checkAdmin = $pdo->prepare("SELECT * FROM admin WHERE admin_id = :id");
$checkAdmin->execute([':id' => $admin_id]);
$adminData = $checkAdmin->fetch(PDO::FETCH_ASSOC);

if (!$adminData) {
    echo "<div style='padding:20px; background:#ffe0e0; color:#a00; border:1px solid #a00;'>
            <h2>Access interdit</h2>
            <p>Cette page est réservée aux administrateurs.</p>
          </div>";
    exit;
}

// Traitement du formulaire (accepter/refuser une activité)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $activity_id = $_POST['activity_id'] ?? null;
    $action = $_POST['action'] ?? null;

    if ($activity_id && in_array($action, ['accepter', 'refuser'])) {
        // Vérifier que l’activité existe
        $checkActivity = $pdo->prepare("SELECT * FROM activity WHERE activite_id = :id");
        $checkActivity->execute([':id' => $activity_id]);
        $activity = $checkActivity->fetch();

        if ($activity) {
            $sql = "UPDATE activity 
                    SET activity_status = :status, admin_id = :admin_id 
                    WHERE activite_id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                ':status' => $action,
                ':admin_id' => $admin_id ,
                ':id' => $activity_id 
                
            ]);

            header("Location: " . $_SERVER['PHP_SELF']);
            exit;
        }
    }
}

// Récupérer les activités en attente
$sql = "SELECT a.*, u.first_name, u.last_name 
        FROM activity a
        JOIN users u ON a.user_id = u.user_id
        WHERE a.activity_status = 'en attente'
        ORDER BY a.event_date DESC";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$activities = $stmt->fetchAll(PDO::FETCH_ASSOC);
