<?php
include("scriptPHP/script_allActivite.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="style/allActivite.css">
</head>

<body>
  <?php
  include("../includs/header.php");
  include("../includs/herosection.php");
  ?>




  <!-- Campaigns Section -->
  <section class="campaigns">
    <div class="container">
      <h2 class="section-title"><span class="highlight">Campagnes</span></h2>

      <form method="GET" class="filter-bar" style="margin-bottom: 20px;">
        <input type="text" id="search" name="search" placeholder="Titre ou description..." value="<?= htmlspecialchars($_GET['search'] ?? '') ?>" />
        <button type="submit">Rechercher</button>
      </form>



      <div class="campaigns-grid">
        <!-- Campaign Card 1 -->
        <?php
        $dateToday = date('Y-m-d');
        foreach ($activities as $activity):
          if ($activity['event_date'] < $dateToday) {
            continue;
          } ?>
          <div class="campaign-card">
            <img
              src="<?= htmlspecialchars($activity['activity_photo']) ?: 'img/activite.png' ?>"
              alt="Campagne"
              class="campaign-image" />
            <div class="campaign-content">
              <h4>Posted by <?= htmlspecialchars($activity['first_name'] . ' ' . $activity['last_name']) ?></h4>
              <h3><?= htmlspecialchars($activity['title']) ?></h3>
              <h4>Lieu : <?= htmlspecialchars($activity['activity_location_']) ?></h4>
              <p><?= htmlspecialchars($activity['description']) ?></p>

              <form method="POST">
                <input type="hidden" name="activite_id" value="<?= htmlspecialchars($activity['activite_id']) ?>">

                <?php if (in_array($activity['activite_id'], $participatedActivities)): ?>
                  <button type="button" class="campaign-btn done" disabled>Déjà participé</button>
                <?php else: ?>
                  <button type="submit" name="participate" class="campaign-btn">Participer</button>
                <?php endif; ?>
              </form>

            </div>
          </div>
        <?php endforeach; ?>


      </div>
      <div class="Propose_activite">
        <i class="fa-solid fa-circle-plus"></i>
        <h2>Vous avez une idée de campagne communautaire ?</h2>
        <p>
          Partagez vos idées pour améliorer notre communauté et contribuez à
          bâtir un avenir meilleur pour tous.
        </p>
        <a href="proposeActivite.php">Proposition de campagne</a>
      </div>
    </div>
  </section>
  <?php
  include("../includs/footer.php");
  ?>
</body>

</html>