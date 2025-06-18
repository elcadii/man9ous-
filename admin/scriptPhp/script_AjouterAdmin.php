<?php
include("../confige/DbConnect.php");

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
    
    // Validation pour municipality (select)
    if (empty($_POST['municipality'])) {
        $errors['municipality'] = 'Municipalité requise';
    }

    //  insérer dans la base
    if (empty($errors)) {
        $stmt = $pdo->prepare("INSERT INTO admin (first_name, last_name, email_, password, CNI_number, phone_number, commune_id)
            VALUES (:first_name, :last_name, :email_, :password, :CNI_number, :phone_number, :commune_id)");

        $stmt->execute([
            ':first_name' => $_POST['firstName'],
            ':last_name' => $_POST['lastName'],
            ':email_' => $_POST['email'],
            ':password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
            ':CNI_number' => $_POST['cin'],
            ':phone_number' => $_POST['phone'],
            ':commune_id' => intval($_POST['municipality'])
        ]);

        // Redirection ou message succès
        header("Location: success.php");
        exit;
    }
}
?>
