<?php
include("scriptphp/script_listeDeL'étulisateure.php");
?>


<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Man9ous - Liste des utilisateurs</title>
  <link rel="stylesheet" href="style/listeDeL'étulisateure.css">
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
      <div class="content-header">
        <h1 class="content-title">liste de l'étulisateure</h1>
      </div>

      <!-- User Table -->
      <div class="table-container">
        <table class="user-table">
          <thead>
            <tr>
              <th>Prénom</th>
              <th>Nom</th>
              <th>CNI</th>
              <th>Numéro de téléphone</th>
              <th>Email</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($results as $row): ?>
              <tr>
                <td><?= htmlspecialchars($row['first_name']) ?></td>
                <td><?= htmlspecialchars($row['last_name']) ?></td>
                <td><?= htmlspecialchars($row['CNI_number']) ?></td>
                <td><?= htmlspecialchars($row['phone_number']) ?></td>
                <td><?= htmlspecialchars($row['email']) ?></td>
              </tr>
            <?php endforeach; ?>
          </tbody>

        </table>
      </div>
    </main>
  </div>
  <?php
  include("../includs/footer.php");
  ?>
</body>

</html>