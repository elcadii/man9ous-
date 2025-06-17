<?php
session_start();
include("../confige/DbConnect.php");

$errors = []; // tableau d'erreurs
$title = $category = $location = $description = $commune_id = $event_date = "";
$photo_path = "";

if (!isset($_SESSION['user_id'])) {
    die("Vous devez être connecté pour proposer une activité.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title'] ?? '');
    $category = trim($_POST['category'] ?? '');
    $location = trim($_POST['location'] ?? '');
    $description = trim($_POST['description'] ?? '');
    $commune_id = trim($_POST['commune_id'] ?? '');
    $event_date = trim($_POST['event_date'] ?? '');
    $user_id = $_SESSION['user_id'];

    // Validation
    if (empty($title)) $errors['title'] = "Le titre est requis.";
    if (empty($category)) $errors['category'] = "Veuillez sélectionner une catégorie.";
    if (empty($location)) $errors['location'] = "La localisation est requise.";
    if (empty($description)) $errors['description'] = "La description est requise.";
    if (empty($commune_id)) $errors['commune_id'] = "Veuillez choisir une municipalité.";
    if (empty($event_date)) $errors['event_date'] = "La date est requise.";
    if (empty($_FILES['photo']) || $_FILES['photo']['error'] !== 0) {
        $errors['photo'] = "La photo est obligatoire.";
    }

    // Si pas d'erreurs, continuer
    if (empty($errors)) {
        $photo_name = time() . "_" . basename($_FILES['photo']['name']);
        $target_dir = "uploads/";
        if (!file_exists($target_dir)) {
            mkdir($target_dir, 0755, true);
        }
        $target_file = $target_dir . $photo_name;

        if (move_uploaded_file($_FILES['photo']['tmp_name'], $target_file)) {
            $photo_path = $target_file;
        }

        $sql = "INSERT INTO activity (
            title, description, event_date, activity_status,
            activity_photo, activity_location_, activity_category,
            commune_id, user_id
        ) VALUES (
            :title, :description, :event_date, 'pending',
            :photo, :location, :category, :commune_id, :user_id
        )";

        $stmt = $pdo->prepare($sql);

        $success = $stmt->execute([
            ':title' => $title,
            ':description' => $description,
            ':event_date' => $event_date,
            ':photo' => $photo_path,
            ':location' => $location,
            ':category' => $category,
            ':commune_id' => $commune_id,
            ':user_id' => $user_id
        ]);

        if ($success) {
            $success_message = " L'activité a été ajoutée avec succès !";
        } else {
            $success_message =  " Erreur lors de l'ajout.";
        }
    }
}
