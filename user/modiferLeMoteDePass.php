<?php
include("scriptPhP/modiferLeMoteDePass.php");
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Man9ous - Mettre à jour le mot de passe</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="style/modiferLeMoteDePass.css">
</head>
<body>
    <?php include("../includs/header.php"); ?>

    <a class="gotohome" href="/man9ous/man9ous-/user/profile.php"><i class="fa-solid fa-angles-left" style="color: #ffffff;"></i> go to profile</a>

    <main class="main-content">
        <div class="password-form-container">
            <div class="form-header">
                <h1 class="form-title">Mettre à jour le mot de passe</h1>
            </div>

            <div class="form-content">

                
                <?php if (!empty($successMessage)): ?>
                    <div class="success-message" style="color: green; text-align:center; font-weight: bold; margin-bottom: 1rem;">
                        <?= $successMessage ?>
                    </div>
                <?php endif; ?>

                <form class="form-grid" id="passwordForm" method="POST" action="">
                    <div class="form-group">
                        <label for="email">email</label>
                        <input 
                            type="email" 
                            id="email" 
                            name="email" 
                            placeholder="Entrez votre adresse e-mail"
                            
                            autocomplete="email"
                            value="<?= htmlspecialchars($email ?? '') ?>"
                        >
                        <div class="error-message"><?= $errors["email"] ?? '' ?></div>
                    </div>

                    <div class="form-group">
                        <label for="currentPassword">ancien mot de passe</label>
                        <input 
                            type="password" 
                            id="currentPassword" 
                            name="currentPassword" 
                            placeholder="Entrez votre ancien mot de passe"
                            
                            autocomplete="current-password"
                        >
                        <div class="error-message"><?= $errors["currentPassword"] ?? '' ?></div>
                    </div>

                    <div class="form-group">
                        <label for="newPassword">nouveau mot de passe</label>
                        <input 
                            type="password" 
                            id="newPassword" 
                            name="newPassword" 
                            placeholder="Entrez un nouveau mot de passe"
                            
                            autocomplete="new-password"
                        >
                        <div class="error-message"><?= $errors["newPassword"] ?? '' ?></div>
                    </div>

                    <div class="form-group">
                        <label for="confirmPassword">Confirmez nouveau mot de passe</label>
                        <input 
                            type="password" 
                            id="confirmPassword" 
                            name="confirmPassword" 
                            placeholder="Confirmez votre nouveau mot de passe"
                            
                            autocomplete="new-password"
                        >
                        <div class="error-message"><?= $errors["confirmPassword"] ?? '' ?></div>
                    </div>

                    <button type="submit" name="modifierBtn" class="submit-btn" id="submitBtn">
                        Mettre à jour le mot de passe
                    </button>
                </form>
            </div>
        </div>
    </main>

    <?php include("../includs/footer.php"); ?>
</body>
</html>