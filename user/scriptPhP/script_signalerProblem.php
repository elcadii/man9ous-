<?php
include("../confige/DbConnect.php");
// var_dump($_SESSION);
// die();

$errors = [];
$title = $description = $photo_path = $location = $problem_date = $status = "";
$commune_id = $user_id = $category_id = null;

// Récupération des communes et catégories
$sql = "SELECT * FROM commune";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$communes = $stmt->fetchAll(PDO::FETCH_ASSOC);

$stmt = $pdo->prepare("SELECT category_id, category_name_ FROM problem_category");
$stmt->execute();
$categories = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Vérification de l'utilisateur connecté
if (!isset($_SESSION['user_id'])) {
    die("Vous devez être connecté pour signaler un problème.");
}

// Traitement du formulaire
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['somiBTn'])) {
    $title = trim($_POST['title'] ?? '');
    $description = trim($_POST['description'] ?? '');
    $location = trim($_POST['locationLink'] ?? '');
    $commune_id = intval($_POST['commune'] ?? 0);
    $category_id = intval($_POST['category'] ?? 0);
    $user_id = $_SESSION['user_id'];
    $problem_date = date('Y-m-d');
    $status = 'non traité';

    // Validation
    if (empty($title)) $errors['title'] = "Le titre est requis.";
    if (empty($description)) $errors['description'] = "La description est requise.";
    if (empty($location)) $errors['location'] = "Le lien de localisation est requis.";
    if (empty($commune_id)) $errors['commune'] = "La municipalité est requise.";
    if (empty($category_id)) $errors['category'] = "La catégorie est requise.";
    if (!isset($_FILES['photo']) || $_FILES['photo']['error'] !== 0) {
        $errors['photo'] = "La photo est obligatoire.";
    }

    // Empêcher l'insertion si erreurs
    if (empty($errors)) {
        $photo_name = time() . "_" . basename($_FILES['photo']['name']);
        $target_dir = "uploads/";
        if (!file_exists($target_dir)) {
            mkdir($target_dir, 0755, true);
        }
        $target_file = $target_dir . $photo_name;

        if (move_uploaded_file($_FILES['photo']['tmp_name'], $target_file)) {
            $photo_path = $target_file;

            $stmt = $pdo->prepare("INSERT INTO problem (
                problem_name, description, photo_url, problem_date, problem_status,
                location_map, commune_id, user_id, category_id
            ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");

            $success = $stmt->execute([
                $title,
                $description,
                $photo_path,
                $problem_date,
                $status,
                $location,
                $commune_id,
                $user_id,
                $category_id
            ]);

            if ($success) {
                // Fetch the latest problem_id inserted by this user
                $stmt_check = $pdo->prepare("SELECT problem_id FROM problem WHERE user_id = ? ORDER BY problem_id DESC LIMIT 1");
                $stmt_check->execute([$user_id]);
                $row = $stmt_check->fetch(PDO::FETCH_ASSOC);
                $problem_id = $row ? $row['problem_id'] : null;

                if ($problem_id) {
                    // Insert into management table
                    $operation_date = date('Y-m-d H:i:s');
                    $stmt2 = $pdo->prepare("INSERT INTO management (
                        admin_id, problem_id, status, operation_date
                    ) VALUES (?, ?, ?, ?)");

                    $stmt2->execute([
                        null, 
                        $problem_id,
                        $status,
                        $operation_date
                    ]);
                }
                $success_message = "Le problème a été signalé avec succès.";
                $title = $description = $location = "";
                $commune_id = $category_id = 0;
            } else {
                $errors['db'] = "Erreur lors de l'enregistrement du problème.";
            }
        } else {
            $errors['photo'] = "Erreur lors du téléchargement de la photo.";
        }
    }
}
