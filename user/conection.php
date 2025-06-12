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
            <form class="form-grid" onsubmit="handleSubmit(event)">
                <!-- Email input group -->
                <div class="form-group">
                    <label for="email">Email</label>
                    <input 
                        type="email" 
                        id="email" 
                        name="email" 
                        placeholder="entrez Email"
                        required
                        autocomplete="email"
                    >
                </div>

                <!-- Password input group -->
                <div class="form-group">
                    <label for="password">mot de passe</label>
                    <input 
                        type="password" 
                        id="password" 
                        name="password" 
                        placeholder="mot de passe"
                        required
                        autocomplete="current-password"
                    >
                </div>

                <!-- Submit button -->
                <button type="submit" class="submit-btn" id="submitBtn">
                    Connexion   
                </button>
            </form>
        </div>
    </div>
</body>
</html>