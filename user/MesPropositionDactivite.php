<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Man9ous - Campagnes Environnementales</title>
    <link rel="stylesheet" href="style/MesPropositionDactivite.css"/>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
    />
  </head>
  <body>
    <?php
    include("../includs/header.php");
    ?>
    <main>
      <div class="container">
        <h1>Mes Proposition de campagne</h1>

        <div class="filter-bar">
          <div class="filter">
            <i class="fas fa-filter"></i>
            <span>Filtre par statut:</span>
            <select>
              <option value="tout">tout</option>
              <option value="accepter">accepter</option>
              <option value="pending">pending</option>
              <option value="refuser">refuser</option>
            </select>
          </div>
        </div>

        <div class="campaigns">
          <!-- Campaign Card 1 -->
          <div class="campaign-card">
            <div class="campaign-image">
              <img
                src="img/activite.png"
                alt="Campagne de nettoyage de la plage"
              />
            </div>
            <div class="campaign-content">
              <h3>Campagne de nettoyage de la plage de Rabat</h3>
              <p>
                Objectif: Nettoyer la plage de Rabat et de collecter des déchets
                plastiques
              </p>
              <div class="campaign-details">
                <p><strong>Lieu:</strong> Plage de Rabat</p>
                <p><strong>120 participants</strong></p>
                <p class="Activite_status"><strong>status:</strong> accepter</p>
              </div>
            </div>
          </div>

          <!-- Campaign Card 2 -->
          <div class="campaign-card">
            <div class="campaign-image">
              <img
                src="img/activite.png"
                alt="Campagne de nettoyage de la plage"
              />
            </div>
            <div class="campaign-content">
              <h3>Campagne de nettoyage de la plage de Rabat</h3>
              <p>
                Objectif: Nettoyer la plage de Rabat et de collecter des déchets
                plastiques
              </p>
              <div class="campaign-details">
                <p><strong>Lieu:</strong> Plage de Rabat</p>
                <p><strong>120 participants</strong></p>
                <p class="Activite_status"><strong>status:</strong> refuser</p>
              </div>
            </div>
          </div>

          <!-- Campaign Card 3 -->
          <div class="campaign-card">
            <div class="campaign-image">
              <img
                src="img/activite.png"
                alt="Campagne de nettoyage de la plage"
              />
            </div>
            <div class="campaign-content">
              <h3>Campagne de nettoyage de la plage de Rabat</h3>
              <p>
                Objectif: Nettoyer la plage de Rabat et de collecter des déchets
                plastiques
              </p>
              <div class="campaign-details">
                <p><strong>Lieu:</strong> Plage de Rabat</p>
                <p><strong>120 participants</strong></p>
                <p class="Activite_status"><strong>status:</strong> accepter</p>
              </div>
            </div>
          </div>

          <!-- Campaign Card 3 -->
          <div class="campaign-card">
            <div class="campaign-image">
              <img
                src="img/activite.png"
                alt="Campagne de nettoyage de la plage"
              />
            </div>
            <div class="campaign-content">
              <h3>Campagne de nettoyage de la plage de Rabat</h3>
              <p>
                Objectif: Nettoyer la plage de Rabat et de collecter des déchets
                plastiques
              </p>
              <div class="campaign-details">
                <p><strong>Lieu:</strong> Plage de Rabat</p>
                <p><strong>120 participants</strong></p>
                <p class="Activite_status"><strong>status:</strong> pending</p>
              </div>
            </div>
          </div>

          <!-- Campaign Card 3 -->
          <div class="campaign-card">
            <div class="campaign-image">
              <img
                src="img/activite.png"
                alt="Campagne de nettoyage de la plage"
              />
            </div>
            <div class="campaign-content">
              <h3>Campagne de nettoyage de la plage de Rabat</h3>
              <p>
                Objectif: Nettoyer la plage de Rabat et de collecter des déchets
                plastiques
              </p>
              <div class="campaign-details">
                <p><strong>Lieu:</strong> Plage de Rabat</p>
                <p><strong>120 participants</strong></p>
                <p class="Activite_status"><strong>status:</strong> accepter</p>
              </div>
            </div>
          </div>
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
          } else if (text.includes("pending")) {
            el.style.color = "#ffc107";
          } else if (text.includes("refuser")) {
            el.style.color = "#f44336";
          }
        });
      });
    </script>
  </body>
</html>
