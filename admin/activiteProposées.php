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
          <div class="campaign-card">
            <img
              src="img/activite.png"
              alt="Nettoyage de plage"
              class="campaign-image"
            />
            <div class="campaign-content">
              <h3 class="campaign-title">
                Campagne de nettoyage de la plage de Rabat
              </h3>
              <p class="campaign-description">
                Une initiative pour nettoyer la plage de Rabat<br />
                et éliminer les déchets plastiques.
              </p>
              <div class="campaign-meta">
                Proposé par : Sarah Ahmed • 16/01/2024
              </div>
              <div class="campaign-actions">
                <button class="btn btn-reject">refuser</button>
                <button class="btn btn-accept">accepter</button>
              </div>
            </div>
          </div>

          <!-- Campaign 2 -->
          <div class="campaign-card">
            <img
              src="img/activite.png"
              alt="Nettoyage de plage"
              class="campaign-image"
            />
            <div class="campaign-content">
              <h3 class="campaign-title">
                Campagne de nettoyage de la plage de Rabat
              </h3>
              <p class="campaign-description">
                Une initiative pour nettoyer la plage de Rabat<br />
                et éliminer les déchets plastiques.
              </p>
              <div class="campaign-meta">
                Proposé par : Sarah Ahmed • 16/01/2024
              </div>
              <div class="campaign-actions">
                <button class="btn btn-reject">refuser</button>
                <button class="btn btn-accept">accepter</button>
              </div>
            </div>
          </div>

          <!-- Campaign 3 -->
          <div class="campaign-card">
            <img
              src="img/activite.png"
              alt="Nettoyage de plage"
              class="campaign-image"
            />
            <div class="campaign-content">
              <h3 class="campaign-title">
                Campagne de nettoyage de la plage de Rabat
              </h3>
              <p class="campaign-description">
                Une initiative pour nettoyer la plage de Rabat<br />
                et éliminer les déchets plastiques.
              </p>
              <div class="campaign-meta">
                Proposé par : Sarah Ahmed • 16/01/2024
              </div>
              <div class="campaign-actions">
                <button class="btn btn-reject">refuser</button>
                <button class="btn btn-accept">accepter</button>
              </div>
            </div>
          </div>
        </div>
      </main>
    </div>
    <?php
    include("../includs/footer.php");
    ?>
  </body>
</html>
