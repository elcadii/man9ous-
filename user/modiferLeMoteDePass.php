<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Man9ous - Mettre à jour le mot de passe</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style/modiferLeMoteDePass.css">

</head>
<body>
    <?php
    include("../includs/header.php");
    ?>
    <a class="gotohome" href="go to profile"><i class="fa-solid fa-angles-left" style="color: #ffffff;"></i> go to profile</a>
    <!-- ===== MAIN CONTENT SECTION WITH FLEXBOX ===== -->
    <main class="main-content">
        <!-- Password update form container using flexbox -->
        <div class="password-form-container">
            <!-- Form header with flexbox centering -->
            <div class="form-header">
                <h1 class="form-title">Mettre à jour le mot de passe</h1>
            </div>
            
            <!-- Form content with flexbox layout -->
            <div class="form-content">
                <form class="form-grid" id="passwordForm" novalidate>
                    <!-- Email input group with flexbox -->
                    <div class="form-group">
                        <label for="email">email</label>
                        <input 
                            type="email" 
                            id="email" 
                            name="email" 
                            placeholder="Entrez votre adresse e-mail"
                            required
                            autocomplete="email"
                        >
                        <div class="error-message" id="emailError"></div>
                    </div>

                    <!-- Current password input group with flexbox -->
                    <div class="form-group">
                        <label for="currentPassword">ancien mot de passe</label>
                        <input 
                            type="password" 
                            id="currentPassword" 
                            name="currentPassword" 
                            placeholder="Entrez votre ancien mot de passe"
                            required
                            autocomplete="current-password"
                        >
                        <div class="error-message" id="currentPasswordError"></div>
                    </div>

                    <!-- New password input group with flexbox -->
                    <div class="form-group">
                        <label for="newPassword">nouveau mot de passe</label>
                        <input 
                            type="password" 
                            id="newPassword" 
                            name="newPassword" 
                            placeholder="Entrez un nouveau mot de passe"
                            required
                            autocomplete="new-password"
                        >
                        <div class="error-message" id="newPasswordError"></div>
                    </div>

                    <!-- Confirm new password input group with flexbox -->
                    <div class="form-group">
                        <label for="confirmPassword">Confirmez nouveau mot de passe</label>
                        <input 
                            type="password" 
                            id="confirmPassword" 
                            name="confirmPassword" 
                            placeholder="Confirmez votre nouveau mot de passe"
                            required
                            autocomplete="new-password"
                        >
                        <div class="error-message" id="confirmPasswordError"></div>
                    </div>
                    <!-- Submit button with flexbox centering -->
                    <button type="submit" class="submit-btn" id="submitBtn">
                        Mettre à jour le mot de passe
                    </button>
                </form>
            </div>
        </div>
    </main>
    <?php
    include("../includs/footer.php");
    ?>
</body>
</html>