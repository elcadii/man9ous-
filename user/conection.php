<?php
include("../confige/DbConnect.php");
include("scriptPhP/script_conection.php");
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Man9ous - Connexion</title>
    <link rel="stylesheet" href="style/conection.css">

</head>

<body>
    <!-- Main login container -->
    <div class="login-container">
        <!-- Header section with back navigation and title -->
        <div class="form-header">
            <button class="back-arrow" onclick="goBack()" aria-label="Retour">←</button>
            <h1 class="form-title">Connexion</h1>
        </div>

        <!-- Form container with login fields -->
        <div class="form-container">
            <form class="form-grid" action="" method="POST" onsubmit="handleSubmit(event)">
                <!-- Email input group -->
                <div class="form-group">
                    <label for="email">Email</label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        placeholder="entrez Email"
                        autocomplete="email">
                    <?php if (!empty($errors['email'])): ?>
                        <p class="text-red-500 text-sm mt-1"><?= $errors['email'] ?></p>
                    <?php endif; ?>
                </div>

                <!-- Password input group -->
                <div class="form-group">
                    <label for="password">mot de passe</label>
                    <input
                        type="password"
                        id="password"
                        name="password"
                        placeholder="mot de passe"
                        autocomplete="current-password">
                    <?php if (!empty($errors['password'])): ?>
                        <p class="text-red-500 text-sm mt-1"><?= $errors['password'] ?></p>
                    <?php endif; ?>
                </div>
                <!-- Submit button -->
                <button type="submit" name="loginbtn" class="submit-btn" id="submitBtn">
                    Connexion
                </button>
                <!-- Link to registration page -->
                <p style="display: inline; margin:auto; width: fit-content;" class="register-link">
                    Vous n'avez pas de compte ? <a href="inscription.php">Inscrivez-vous</a>
            </form>
        </div>
    </div>
</body>

</html>