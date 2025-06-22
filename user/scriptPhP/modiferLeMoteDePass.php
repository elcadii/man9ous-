<?php
include("../confige/DbConnect.php");

$protected = true;
if ($protected && (!isset($_SESSION['login']) || $_SESSION['login'] !== true)) {
    header("Location: /man9ous/man9ous-/user/conection.php");
    exit();
}

$errors = [];
$successMessage = "";
$email = "";

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["modifierBtn"])) {
    $email = trim($_POST["email"]);
    $currentPassword = trim($_POST["currentPassword"]);
    $newPassword = trim($_POST["newPassword"]);
    $confirmPassword = trim($_POST["confirmPassword"]);

    // === VALIDATION ===
    if (empty($email)) {
        $errors["email"] = "Veuillez entrer votre adresse e-mail.";
    }

    if (empty($currentPassword)) {
        $errors["currentPassword"] = "Veuillez entrer votre ancien mot de passe.";
    }

    if (empty($newPassword)) {
        $errors["newPassword"] = "Veuillez entrer un nouveau mot de passe.";
    }

    if ($newPassword !== $confirmPassword) {
        $errors["confirmPassword"] = "Les mots de passe ne correspondent pas.";
    }

    // === SI PAS D'ERREURS ===
    if (!array_filter($errors)) {
        $stmt = $pdo->prepare("SELECT password FROM users WHERE email = :email");
        $stmt->execute(['email' => $email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($currentPassword, $user["password"])) {
            $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
            $updateStmt = $pdo->prepare("UPDATE users SET password = :newPassword WHERE email = :email");
            $updateStmt->execute([
                'newPassword' => $hashedPassword,
                'email' => $email
            ]);
            $successMessage = "Mot de passe mis à jour avec succès.";
            $email = ""; // vider champ email après succès
            header("Location: ../user/profile.php");
        } else {
            $errors["currentPassword"] = "Email ou mot de passe actuel incorrect.";
        }
    }
}
