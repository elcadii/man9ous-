<?php
include("scriptPHP/script_MesPropositionDactivite.php");
?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Man9ous - Campagnes Environnementales</title>
  <link rel="stylesheet" href="style/MesPropositionDactivite.css" />
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
</head>

<body>
  <?php
  include("../includs/header.php");
  ?>
  <main>
    <div class="container">
      <h1>Mes Proposition de campagne</h1>

      <form class="filter-bar" method="GET">
        <div class="filter">
          <i class="fas fa-filter"></i>
          <span>Filtre par statut:</span>
          <select name="status" id="status" onchange="this.form.submit()">
            <option value="all" <?= $statusFilter == 'all' ? 'selected' : '' ?>>Tous</option>
            <option value="accepter" <?= $statusFilter == 'accepter' ? 'selected' : '' ?>>Accepté</option>
            <option value="en attente" <?= $statusFilter == 'en attente' ? 'selected' : '' ?>>En attente</option>
            <option value="refuser" <?= $statusFilter == 'refuser' ? 'selected' : '' ?>>Refusé</option>
          </select>
        </div>
      </form>


      <div class="campaigns">

        <!-- Campaign Card 3 -->
        <?php
        foreach ($activities as $activity): ?>
          <div class="campaign-card">
            <div class="campaign-image">
              <img
                src="<?= htmlspecialchars($activity['activity_photo']) ?: 'img/activite.png' ?>"
                alt="Image de la campagne" />
            </div>
            <div class="campaign-content">
              <h3><?= htmlspecialchars($activity['title']) ?></h3>
              <p><?= htmlspecialchars($activity['description']) ?></p>
              <div class="campaign-details">
                <p><strong>Lieu:</strong> <?= htmlspecialchars($activity['activity_location_']) ?></p>
                <p><strong>100 participants</strong></p>
                <p class="Activite_status"><strong>status:</strong> <?= htmlspecialchars($activity['activity_status']) ?></p>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </main>
  <?php
  include("../includs/footer.php");
  ?>
  <script>
    document.addEventListener("DOMContentLoaded", () => {
      const statusElements = document.querySelectorAll(".Activite_status");

      statusElements.forEach((el) => {
        const text = el.textContent.toLowerCase();

        if (text.includes("accepter")) {
          el.style.color = "#54d12b";
        } else if (text.includes("en attente")) {
          el.style.color = "#ffc107";
        } else if (text.includes("refuser")) {
          el.style.color = "#f44336";
        }
      });
    });
  </script>
</body>

</html>