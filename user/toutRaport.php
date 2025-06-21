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
  include("../includs/herosection.php");
  ?>
  <section class="reports">
    <div class="container">
      <h2 class="section-title">
        Derniers <span class="highlight">rapports</span>
      </h2>
      <p class="section-description">
        Découvrez les derniers problèmes signalés par la communauté
      </p>
      <form method="GET" class="filter-bar">
        <label style="margin-left: 8%;" for="status">Filtrer par statut:</label>
        <select name="status" id="status" onchange="this.form.submit()">
          <option value="">Tous</option>
          <option value="non traité" <?= ($status_filter === 'non traité') ? 'selected' : '' ?>>Non traité</option>
          <option value="en cours" <?= ($status_filter === 'en cours') ? 'selected' : '' ?>>En cours</option>
          <option value="traité" <?= ($status_filter === 'traité') ? 'selected' : '' ?>>Traité</option>
        </select>



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
                  <?= nl2br(htmlspecialchars($report['description'])) ?>
                </p>
                <span class="report-status">
                  <?= trim(htmlspecialchars($report['problem_status'])) ?>
                </span>

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
  <script>
    document.querySelectorAll('.report-status').forEach(function(el) {
      const text = el.textContent.trim().toLowerCase();

      el.classList.remove('status-pending', 'status-progress', 'status-resolved');

      if (text === 'non traité') {
        el.classList.add('status-pending');
      } else if (text === 'en cours') {
        el.classList.add('status-progress');
      } else if (text === 'traité') {
        el.classList.add('status-resolved');
      }
    });
  </script>


</body>

</html>