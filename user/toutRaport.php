<?php
include("scriptphp/script_toutRaport.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="style/toutRaport.css">
</head>

<body>
  <?php
  include("../includs/header.php");
  ?>
  <section class="reports">
    <div class="container">
      <h2 class="section-title">
        Derniers <span class="highlight">rapports</span>
      </h2>
      <p class="section-description">
        Découvrez les derniers problèmes signalés par la communauté
      </p>
      <form class="filterform" method="GET" style="margin-bottom: 20px;">
        <label for="status">Filtrer par statut:</label>
        <select class="select_status" name="status" id="status" onchange="this.form.submit()">
          <option value="">Tous</option>
          <option value="non traité" <?= $_GET['status'] === 'non traité' ? 'selected' : '' ?>>Non traité</option>
          <option value="en cours" <?= $_GET['status'] === 'en cours' ? 'selected' : '' ?>>En cours</option>
          <option value="traité" <?= $_GET['status'] === 'traité' ? 'selected' : '' ?>>Traité</option>
        </select>
      </form>


      <div class="reports-grid">
        <!-- Report Card 1 -->


        <?php foreach ($reports as $report): ?>
          <div class="report-card">
            <img
              src="<?= htmlspecialchars($report['photo_url']) ?>"
              alt="<?= htmlspecialchars($report['problem_name']) ?>"
              class="report-image" />

            <div class="report-content">
              <h4>Rapporté par <?= htmlspecialchars($report['first_name']) ?></h4>
              <h3><?= htmlspecialchars($report['problem_name']) ?></h3>
              <p class="report-location">
                <?= htmlspecialchars($report['description']) ?>
              </p>
              <span class="report-status status-pending">En attente</span>
            </div>
          </div>
        <?php endforeach; ?>


        <!-- Report Card 2 -->
        <!-- <div class="report-card">
          <img
            src="/img/treo dans la reout"
            alt="Éclairage public"
            class="report-image" />
          <div class="report-content">
            <h4>Rapporté par Fatima</h4>
            <h3>Éclairage public défaillant</h3>
            <p class="report-location">
              La route comporte plusieurs nids-de-poule nécessitant une
              réparation urgente. Les réparer améliorera la sécurité pour tous
              les usagers.
            </p>
            <span class="report-status status-progress">En cours</span>
          </div>
        </div> -->

        <!-- Report Card 2 -->
        <!-- <div class="report-card">
          <img
            src="/img/treo dans la reout"
            alt="Éclairage public"
            class="report-image" />
          <div class="report-content">
            <h4>Rapporté par Fatima</h4>
            <h3>Éclairage public défaillant</h3>
            <p class="report-location">
              La route comporte plusieurs nids-de-poule nécessitant une
              réparation urgente. Les réparer améliorera la sécurité pour tous
              les usagers.
            </p>
            <span class="report-status status-progress">En cours</span>
          </div>
        </div> -->

        <!-- Report Card 2 -->
        <!-- <div class="report-card">
          <img
            src="/img/treo dans la reout"
            alt="Éclairage public"
            class="report-image" />
          <div class="report-content">
            <h4>Rapporté par Fatima</h4>
            <h3>Éclairage public défaillant</h3>
            <p class="report-location">
              La route comporte plusieurs nids-de-poule nécessitant une
              réparation urgente. Les réparer améliorera la sécurité pour tous
              les usagers.
            </p>
            <span class="report-status status-progress">En cours</span>
          </div>
        </div> -->

        <!-- Report Card 2 -->
        <!-- <div class="report-card">
          <img
            src="/img/treo dans la reout"
            alt="Éclairage public"
            class="report-image" />
          <div class="report-content">
            <h4>Rapporté par Fatima</h4>
            <h3>Éclairage public défaillant</h3>
            <p class="report-location">
              La route comporte plusieurs nids-de-poule nécessitant une
              réparation urgente. Les réparer améliorera la sécurité pour tous
              les usagers.
            </p>
            <span class="report-status status-progress">En cours</span>
          </div>
        </div> -->


        <!-- Report Card 3 -->
        <!-- <div class="report-card">
          <img
            src="/img/treo dans la reout"
            alt="Graffiti"
            class="report-image" />
          <div class="report-content">
            <h4>Rapporté par Fatima</h4>
            <h3>Graffiti sur bâtiment public</h3>
            <p class="report-location">
              La route comporte plusieurs nids-de-poule nécessitant une
              réparation urgente. Les réparer améliorera la sécurité pour tous
              les usagers.
            </p>
            <span class="report-status status-resolved">Résolu</span>
          </div>
        </div> -->
      </div>
    </div>
  </section>
  <?php
  include("../includs/footer.php");
  ?>
</body>

</html>