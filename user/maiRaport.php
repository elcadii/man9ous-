<?php
include("scriptphp/script_maiRaport.php");
?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Man9ous - Rapports de Dommages</title>
  <link rel="stylesheet" href="style/maiRaport.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
  <?php
  include("../includs/header.php");
  ?>
  <main>
    <div class="container">
      <h1>mais raporst</h1>

      <div class="filter">
        <i class="fas fa-filter"></i>
        <span>Filtre par statut:</span>
        <form method="GET">
          <select name="status" onchange="this.form.submit()">
            <option value="">Tous</option>
            <option value="non traité" <?= ($status_filter === 'non traité') ? 'selected' : '' ?>>Non traité</option>
            <option value="en cours" <?= ($status_filter === 'en cours') ? 'selected' : '' ?>>En cours</option>
            <option value="traité" <?= ($status_filter === 'traité') ? 'selected' : '' ?>>Traité</option>
          </select>
        </form>
      </div>


      <div class="reports-grid">
        <!-- Report Card 1 -->

        <?php foreach ($reports as $report): ?>
          <div class="report-card">
            <div class="report-header">
              <h3>Rapporté par Vous</h3>
              <h2><?= htmlspecialchars($report['problem_name']) ?></h2>
              <p><?= htmlspecialchars($report['description']) ?></p>
            </div>
            <div class="report-status">
              <button class="status-btn">
                <?= htmlspecialchars($report['management_status'] ?? 'Statut inconnu') ?>
              </button>
            </div>
            <div class="report-image">
              <img src="<?= htmlspecialchars($report['photo_url']) ?>" alt="<?= htmlspecialchars($report['problem_name']) ?>">
            </div>
          </div>
        <?php endforeach; ?>

        <!-- Report Card 2 -->

        <!-- Report Card 3 -->
        <!-- <div class="report-card">
          <div class="report-header">
            <h3>Rapporté par Fatima</h3>
            <h2>Nid-de-poule dans la rue principale</h2>
            <p>Un grand nid-de-poule dans la rue principale cause des dommages aux véhicules et présente un danger pour la sécurité des conducteurs.</p>
          </div>
          <div class="report-status">
            <button class="status-btn">En cours de traitement</button>
          </div>
          <div class="report-image">
            <img src="/pothole.jpg" alt="Nid-de-poule dans la rue">
          </div>
        </div> -->
      </div>
    </div>
  </main>
  <?php
  include("../includs/footer.php");
  ?>
</body>

</html>