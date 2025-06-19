<?php
include("scriptPHP/script_activiteProposées.php");
include("scriptphp/script_listeDeL'étulisateure.php");
?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Man9ous - activite proposées</title>
  <link rel="stylesheet" href="style/activiteProposées.css">
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
        <h1 class="content-title">Campagnes proposées</h1>
      </div>

      <div class="campaigns-grid">
        <!-- Campaign 1 -->
        <?php foreach ($activities as $activity):
          ?>
          <div class="campaign-card">
            <img
              src="../user/<?= htmlspecialchars($activity['activity_photo']) ?>"
              alt="Image activité"
              class="campaign-image" />
            <div class="campaign-content">
              <h3 class="campaign-title">
                <?= htmlspecialchars($activity['title']) ?>
              </h3>
              <p class="campaign-description">
                <?= nl2br(htmlspecialchars($activity['description'])) ?>
              </p>
              <div class="campaign-meta">
                Proposé par : <?= htmlspecialchars($activity['first_name'] . ' ' . $activity['last_name']) ?> •
                <?= date('d/m/Y', strtotime($activity['event_date'])) ?>
              </div>

              <!-- Formulaire pour accepter/refuser -->
              <form method="POST" action="">
                <input type="hidden" name="activity_id" value="<?= $activity['activite_id'] ?>">
                <button name="action" value="refuser" class="btn btn-reject">Refuser</button>
                <button name="action" value="accepter" class="btn btn-accept">Accepter</button>
              </form>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </main>
  </div>
  <?php
  include("../includs/footer.php");
  ?>
</body>

</html>