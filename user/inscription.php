<?php
include("../confige/DbConnect.php");
include("scriptPhP/script_inscription.php");
?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Man9ous - Inscription</title>
  <link rel="stylesheet" href="style/inscription.css">
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.4.1/dist/tailwind.min.css" rel="stylesheet">
</head>

<body>

  <div class="container">
    <div class="form-header">
      <button class="back-arrow">←</button>
      <h1 class="form-title">Inscription</h1>
    </div>

    <div class="form-container">
      <form class="form-grid" action="" method="POST">
        <div class="form-row">
          <div class="form-group">
            <label for="firstName">first name</label>
            <input
              type="text"
              id="firstName"
              name="firstName"
              placeholder="enter first name" />
            <?php if (!empty($errors['first_name'])): ?>
              <p class="text-red-500 text-sm mt-1"><?= $errors['first_name'] ?></p>
            <?php endif; ?>
          </div>
          <div class="form-group">
            <label for="lastName">last name</label>
            <input
              type="text"
              id="lastName"
              name="lastName"
              placeholder="enter last name" />
            <?php if (!empty($errors['lastName'])): ?>
              <p class="text-red-500 text-sm mt-1"><?= $errors['lastName'] ?></p>
            <?php endif; ?>
          </div>
        </div>

        <div class="form-row">
          <div class="form-group">
            <label for="email">Email</label>
            <input
              type="email"
              id="email"
              name="email"
              placeholder="entrez email" />
            <?php if (!empty($errors['email'])): ?>
              <p class="text-red-500 text-sm mt-1"><?= $errors['email'] ?></p>
            <?php endif; ?>
          </div>
          <div class="form-group">
            <label for="phone">Numéro de Téléphone</label>
            <input
              type="tel"
              id="phone"
              name="phone"
              placeholder="entrez numéro de téléphone" />
            <?php if (!empty($errors['phone'])): ?>
              <p class="text-red-500 text-sm mt-1"><?= $errors['phone'] ?></p>
            <?php endif; ?>
          </div>
        </div>

        <div class="form-row">
          <div class="form-group">
            <label for="cin">CIN</label>
            <input type="text" id="cin" name="cin" placeholder="entrez CIN" />
            <?php if (!empty($errors['cin'])): ?>
              <p class="text-red-500 text-sm mt-1"><?= $errors['cin'] ?></p>
            <?php endif; ?>
          </div>
          <div class="form-group">
            <label for="municipality">Sélectionnez la municipalité</label>
            <select id="municipality" name="commune">
              <option value="">Municipalité</option>
              <option value="1">Tunis</option>
              <option value="2">Sfax</option>
              <option value="3">Sousse</option>
              <option value="4">Kairouan</option>
            </select>
            <?php if (!empty($errors['commune'])): ?>
              <p class="text-red-500 text-sm mt-1"><?= $errors['commune'] ?></p>
            <?php endif; ?>
          </div>
        </div>

        <div class="form-row">
          <div class="form-group">
            <label for="password">mot de passe</label>
            <input
              type="password"
              id="password"
              name="password"
              placeholder="ajoutez la date" />
            <?php if (!empty($errors['password'])): ?>
              <p class="text-red-500 text-sm mt-1"><?= $errors['password'] ?></p>
            <?php endif; ?>
          </div>
          <div class="form-group">
            <label for="confirmPassword">confirmez mot de pass</label>
            <input
              type="password"
              id="confirmPassword"
              name="confirmPassword"
              placeholder="ajoutez la date" />
            <?php if (!empty($errors['confirm_password'])): ?>
              <p class="text-red-500 text-sm mt-1"><?= $errors['confirm_password'] ?></p>
            <?php endif; ?>
          </div>
        </div>

        <div class="form-row">
          <div class="form-group">
            <label for="address">Adresse</label>
            <input
              type="text"
              id="address"
              name="address"
              placeholder="ajoutez la date" />
            <?php if (!empty($errors['address'])): ?>
              <p class="text-red-500 text-sm mt-1"><?= $errors['address'] ?></p>
            <?php endif; ?>
          </div>
          <div class="form-group">
            <button type="submit" name="singup" class="submit-btn">Inscription</button>
          </div>
        </div>
        <!-- 
          <div class="form-group ">
            <label for="address">Adresse</label>
            <input
              type="text"
              id="address"
              name="address"
              placeholder="ajoutez la date"
            />
            <button type="submit" class="submit-btn">Inscription</button>
          </div> -->
      </form>

      <div class="login-link">
        J'ai un compte. <a href="#login">Connectez</a>
      </div>
    </div>
  </div>
</body>

</html>