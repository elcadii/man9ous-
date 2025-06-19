<?php
include("../confige/DbConnect.php");



// Vérifier si c’est un admin connecté);
if (!isset($_SESSION['login']) || $_SESSION['role'] !== 'admin') {
    echo "<div style='padding:20px; background:#ffe0e0; color:#a00; border:1px solid #a00;'>
            <h2>Accès interdit</h2>
            <p>Cette page est réservée aux administrateurs.</p>
          </div>";
    exit;
}

// Fetch all communes from the database
$sql = "SELECT * FROM commune";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$communes = $stmt->fetchAll(PDO::FETCH_ASSOC);

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validation
    if (empty($_POST['firstName'])) {
        $errors['firstName'] = 'Le prénom est requis';
    }
    if (empty($_POST['lastName'])) {
        $errors['lastName'] = 'Le nom est requis';
    }
    if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Email invalide';
    }
    if (empty($_POST['cin'])) {
        $errors['cin'] = 'CIN requis';
    }
    if (empty($_POST['password'])) {
        $errors['password'] = 'Mot de passe requis';
    }
    if (empty($_POST['confirmPassword'])) {
        $errors['confirmPassword'] = 'Confirmez le mot de passe';
    } elseif ($_POST['password'] !== $_POST['confirmPassword']) {
        $errors['confirmPassword'] = 'Les mots de passe ne correspondent pas';
    }
    if (empty($_POST['phone'])) {
        $errors['phone'] = 'Numéro de téléphone requis';
    }
    if (empty($_POST['municipality'])) {
        $errors['municipality'] = 'Municipalité requise';
    }

    // Insert only if no errors
    if (empty($errors)) {
        // Hash password
        $hashedPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);

        // Insert admin
        $stmt = $pdo->prepare("INSERT INTO admin (first_name, last_name, email_, password, CNI_number, phone_number, commune_id)
            VALUES (:first_name, :last_name, :email_, :password, :CNI_number, :phone_number, :commune_id)");

        $stmt->execute([
            ':first_name' => $_POST['firstName'],
            ':last_name' => $_POST['lastName'],
            ':email_' => $_POST['email'],
            ':password' => $hashedPassword,
            ':CNI_number' => $_POST['cin'],
            ':phone_number' => $_POST['phone'],
            ':commune_id' => intval($_POST['municipality'])
        ]);

        // Select admin from DB using email
        $stmt1 = $pdo->prepare("SELECT * FROM admin WHERE email_ = ?");
        $stmt1->execute([$_POST['email']]);
        $admin = $stmt1->fetch(PDO::FETCH_ASSOC);

        // Set session
        if ($admin) {
            $_SESSION['login'] = true;
            $_SESSION['admin_id'] = $admin['admin_id'];
            $_SESSION['name'] = $admin['first_name'];
            header("Location: dashboard.php");
            exit;
        } else {
            $errors['global'] = "Une erreur s’est produite lors de la connexion.";
        }
    }
}
