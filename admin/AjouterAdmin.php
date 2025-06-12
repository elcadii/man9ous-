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
      <form class="form-content">
        <div class="form-grid">
          <!-- Left Column -->
          <div>
            <div class="form-group">
              <label for="firstName" class="form-label">first name</label>
              <input
                type="text"
                id="firstName"
                class="form-control"
                placeholder="enter first name" />
            </div>

            <div class="form-group">
              <label for="email" class="form-label">Email</label>
              <input
                type="email"
                id="email"
                class="form-control"
                placeholder="entre email" />
            </div>

            <div class="form-group">
              <label for="cin" class="form-label">CIN</label>
              <input
                type="text"
                id="cin"
                class="form-control"
                placeholder="entre CIN" />
            </div>

            <div class="form-group">
              <label for="password" class="form-label">mot de passe</label>
              <input
                type="password"
                id="password"
                class="form-control"
                placeholder="ajoutez la date" />
            </div>
          </div>

          <!-- Right Column -->
          <div>
            <div class="form-group">
              <label for="lastName" class="form-label">last name</label>
              <input
                type="text"
                id="lastName"
                class="form-control"
                placeholder="enter last name" />
            </div>

            <div class="form-group">
              <label for="phone" class="form-label">Numéro de Téléphone</label>
              <input
                type="tel"
                id="phone"
                class="form-control"
                placeholder="entre numéro de téléphone" />
            </div>

            <div class="form-group">
              <label for="municipality" class="form-label">Sélectionnez la municipalité</label>
              <input
                type="text"
                id="municipality"
                class="form-control"
                placeholder="Municipalité" />
            </div>

            <div class="form-group">
              <label for="confirmPassword" class="form-label">confirmé mot de pass</label>
              <input
                type="password"
                id="confirmPassword"
                class="form-control"
                placeholder="ajoutez la date" />
            </div>
          </div>
        </div>

        <div class="submit-container">
          <button type="submit" class="submit-button">
            Soumettre le rapport
          </button>
        </div>
      </form>
    </main>
  </div>
  <?php
  include("../includs/footer.php");
  ?>
</body>

</html>