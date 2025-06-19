<?php
include("scriptPhp/script_AjouterAdmin.php");
include("scriptphp/script_listeDeL'étulisateure.php");
?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Man9ous - Ajouter un(e) admin</title>
  <link rel="stylesheet" href="style/AjouterAdmin.css">
</head>

<body>
  <!-- Header -->
  <?php
  include("../includs/header.php");
  ?>

  <!-- Main Layout -->
  <div class="main-layout">
    <!-- Sidebar -->
    <?php
    include("../includs/slider.php");
    ?>

    <!-- Content -->
    <main class="content">
      <!-- Form Header -->
      <div class="form-header">
        <button class="back-button">←</button>
        <h1 class="form-title">Ajouter un(e) admin</h1>
      </div>

      <!-- Form Content -->
      <form class="form-content" method="POST" action="">
        <div class="form-grid">
          <!-- Left Column -->
          <div>
            <div class="form-group">
              <label for="firstName" class="form-label">First name</label>
              <input type="text" id="firstName" name="firstName" class="form-control" placeholder="Enter first name"
                value="<?= htmlspecialchars($_POST['firstName'] ?? '') ?>" />
              <?php if (!empty($errors['firstName'])): ?>
                <p class="text-red-500 text-sm mt-1"><?= $errors['firstName'] ?></p>
              <?php endif; ?>
            </div>

            <div class="form-group">
              <label for="email" class="form-label">Email</label>
              <input type="email" id="email" name="email" class="form-control" placeholder="Enter email"
                value="<?= htmlspecialchars($_POST['email'] ?? '') ?>" />
              <?php if (!empty($errors['email'])): ?>
                <p class="text-red-500 text-sm mt-1"><?= $errors['email'] ?></p>
              <?php endif; ?>
            </div>

            <div class="form-group">
              <label for="cin" class="form-label">CIN</label>
              <input type="text" id="cin" name="cin" class="form-control" placeholder="Enter CIN"
                value="<?= htmlspecialchars($_POST['cin'] ?? '') ?>" />
              <?php if (!empty($errors['cin'])): ?>
                <p class="text-red-500 text-sm mt-1"><?= $errors['cin'] ?></p>
              <?php endif; ?>
            </div>

            <div class="form-group">
              <label for="password" class="form-label">Mot de passe</label>
              <input type="password" id="password" name="password" class="form-control" placeholder="Mot de passe" />
              <?php if (!empty($errors['password'])): ?>
                <p class="text-red-500 text-sm mt-1"><?= $errors['password'] ?></p>
              <?php endif; ?>
            </div>
          </div>

          <!-- Right Column -->
          <div>
            <div class="form-group">
              <label for="lastName" class="form-label">Last name</label>
              <input type="text" id="lastName" name="lastName" class="form-control" placeholder="Enter last name"
                value="<?= htmlspecialchars($_POST['lastName'] ?? '') ?>" />
              <?php if (!empty($errors['lastName'])): ?>
                <p class="text-red-500 text-sm mt-1"><?= $errors['lastName'] ?></p>
              <?php endif; ?>
            </div>

            <div class="form-group">
              <label for="phone" class="form-label">Numéro de Téléphone</label>
              <input type="tel" id="phone" name="phone" class="form-control" placeholder="Enter phone number"
                value="<?= htmlspecialchars($_POST['phone'] ?? '') ?>" />
              <?php if (!empty($errors['phone'])): ?>
                <p class="text-red-500 text-sm mt-1"><?= $errors['phone'] ?></p>
              <?php endif; ?>
            </div>

            <div class="form-group">
              <label for="municipality" class="form-label">Municipalité</label>
              <select id="municipality" name="commune" class="form-control">
                <option value="">Municipalité</option>
                <?php foreach ($communes as $commune): ?>
                  <option value="<?= htmlspecialchars($commune['commune_id']) ?>">
                    <?= htmlspecialchars($commune['commune_name']) ?>
                  </option>
                <?php endforeach; ?>
              </select>
              <?php if (!empty($errors['municipality'])): ?>
                <p class="text-red-500 text-sm mt-1"><?= $errors['municipality'] ?></p>
              <?php endif; ?>
            </div>

            <div class="form-group">
              <label for="confirmPassword" class="form-label">Confirmer mot de passe</label>
              <input type="password" id="confirmPassword" name="confirmPassword" class="form-control"
                placeholder="Confirmer mot de passe" />
              <?php if (!empty($errors['confirmPassword'])): ?>
                <p class="text-red-500 text-sm mt-1"><?= $errors['confirmPassword'] ?></p>
              <?php endif; ?>
            </div>
          </div>
        </div>

        <div class="submit-container">
          <button type="submit" class="submit-button">
            Soumettre le rapport
          </button>
        </div>
      </form>
      >


    </main>
  </div>
  <?php
  include("../includs/footer.php");
  ?>
</body>

</html>