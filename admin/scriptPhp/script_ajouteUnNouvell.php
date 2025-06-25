<?php
include("../confige/DbConnect.php");
// var_dump($_SESSION);
// die();

// Vérifier si c’est un admin connecté);
if (!isset($_SESSION['login']) || $_SESSION['role'] !== 'admin') {
    header("Location: /man9ous/man9ous-/user/conection.php");
    exit;
}

// Fetch all communes from the database
$sql = "SELECT * FROM commune";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$communes = $stmt->fetchAll(PDO::FETCH_ASSOC);

$errors = [];
$title = $_POST['title'] ?? '';
$municipality = $_POST['municipality'] ?? '';
$description = $_POST['description'] ?? '';

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submitNews"])) {
    $title = trim($_POST['title']);
    $municipality = trim($_POST['commune']);
    $description = trim($_POST['description']);
    $admin_id = $_SESSION['admin_id'] ?? null;
    // var_dump($admin_id);
    // die();

    if (empty($title)) {
        $errors['title'] = "Le titre est obligatoire.";
    }

    if (empty($municipality)) {
        $errors['municipality'] = "La municipalité est obligatoire.";
    }

    if (empty($description)) {
        $errors['description'] = "La description est obligatoire.";
    }

    if (!isset($_FILES['photos']) || empty($_FILES['photos']['name'])) {
        $errors['photos'] = "Veuillez ajouter au moins une photo.";
    } else {
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/heic', 'image/heif'];
        foreach ($_FILES['photos']['tmp_name'] as $key => $tmp_name) {
            $type = $_FILES['photos']['type'][$key];
            if (!in_array($type, $allowedTypes)) {
                $errors['photos'] = "Seules les images JPG, PNG et GIF sont autorisées.";
                break;
            }
        }
    }

    if (empty($errors)) {
        $uploadDir = '../uploads/news_photos/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }

        $photoFilenames = [];
        foreach ($_FILES['photos']['tmp_name'] as $key => $tmp_name) {
            $originalName = basename($_FILES['photos']['name'][$key]);
            $ext = pathinfo($originalName, PATHINFO_EXTENSION);
            $newName = uniqid('news_') . '.' . $ext;
            $destination = $uploadDir . $newName;

            if (move_uploaded_file($tmp_name, $destination)) {
                $photoFilenames[] = $newName;
            } else {
                $errors['photos'] = "Erreur lors du téléchargement de l'image.";
                break;
            }
        }

        if (empty($errors)) {
            // Insert only the first image as 'news_img'
            $mainImage = $photoFilenames[0];

            $stmt = $pdo->prepare("INSERT INTO news (news_title_, news_img, news_description, admin_id, municipality_id)
                                   VALUES (:title, :img, :description, :admin_id, :municipality)");
                                
            $stmt->execute([
                ':title' => $title,
                ':img' => $mainImage,
                ':description' => $description,
                ':admin_id' => $admin_id,
                ':municipality' => $municipality
            
            ]);

            $_SESSION['success_message'] = "Nouvelle actualité ajoutée avec succès.";
            // delet inputs container
            $title = '';
            $municipality = '';
            $description = '';
            $_FILES['photos'] = []; 


            
            
        }
    }
}
