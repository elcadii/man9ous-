<?php
include("../includs/header.php");
include("scriptphp/script_listeDeL'étulisateure.php");
?>

<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Man9ous - activite Proposées </title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
      integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link rel="stylesheet" href="style/ProblemSignaler.css">
  </head>
  <body>
    <!-- Main Layout -->
    <div class="main-layout">
      <!-- Sidebar -->
     <?php 
     include("../includs/slider.php");
     ?>

      <!-- Content -->
      <main class="content">
        <!-- Stats Cards -->
        <div class="stats-grid">
          <div class="stat-card">
            <div class="stat-number">2</div>
            <div class="stat-label">Campagnes en attente</div>
          </div>
          <div class="stat-card">
            <div class="stat-number">2</div>
            <div class="stat-label">Résolu</div>
          </div>
          <div class="stat-card">
            <div class="stat-number">1</div>
            <div class="stat-label">En cours de traitement</div>
          </div>
          <div class="stat-card">
            <div class="stat-number">3</div>
            <div class="stat-label">total des plaintes</div>
          </div>
        </div>

        <!-- Filter Section -->
        <div class="filter-section">
          <button class="filter-btn">
            <span><i class="fa-solid fa-filter"></i></span>
            Filter
          </button>
          <span>Status</span>
          <select class="filter-dropdown">
            <option>text</option>
            <option>All</option>
            <option>Resolved</option>
          </select>
          <span>type</span>
          <select class="filter-dropdown">
            <option>text</option>
            <option>Location</option>
            <option>Status</option>
          </select>
        </div>

        <!-- Table -->
        <div class="table-container">
          <table class="table">
            <thead>
              <tr>
                <th>La plainte</th>
                <th>La plainte</th>
                <th>localisation</th>
                <th>Statut</th>
                <th>Date</th>
                <th>change</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>
                  <div class="complaint-cell">
                    <img
                      src="img/treo dans la reout"
                      alt="Complaint"
                      class="complaint-image"
                    />
                  </div>
                </td>
                <td>
                  <div class="complaint-text">
                    Campagne de nettoyage proposée<br />
                    La plage de Rabat est très sale et nécessite<br />
                    un nettoyage urgent pour préserver...
                  </div>
                </td>
                <td class="location-text">RABAT-KENITRA(RABAT)</td>
                <td>
                  <select class="status_de_problem">
                    <option>En cours de traitement</option>
                    <option>Résolu</option>
                    <option>signalez</option>
                  </select>
                </td>
                <td class="date-text">16-03-2024</td>
                <td><button>save</button></td>
              </tr>
              <tr>
                <td>
                  <div class="complaint-cell">
                    <img
                      src="img/treo dans la reout"
                      alt="Complaint"
                      class="complaint-image"
                    />
                  </div>
                </td>
                <td>
                  <div class="complaint-text">
                    Campagne de nettoyage proposée<br />
                    La plage de Rabat est très sale et nécessite<br />
                    un nettoyage urgent pour préserver...
                  </div>
                </td>
                <td class="location-text">RABAT-KENITRA(RABAT)</td>
                <td>
                  <select class="status_de_problem">
                    <option>En cours de traitement</option>
                    <option>Résolu</option>
                    <option>signalez</option>
                  </select>
                </td>
                <td class="date-text">16-03-2024</td>
                <td><button>save</button></td>
              </tr>
              <tr>
                <td>
                  <div class="complaint-cell">
                    <img
                      src="img/treo dans la reout"
                      alt="Complaint"
                      class="complaint-image"
                    />
                  </div>
                </td>
                <td>
                  <div class="complaint-text">
                    Campagne de nettoyage proposée<br />
                    La plage de Rabat est très sale et nécessite<br />
                    un nettoyage urgent pour préserver...
                  </div>
                </td>
                <td class="location-text">RABAT-KENITRA(RABAT)</td>
                <td>
                  <select class="status_de_problem">
                    <option>En cours de traitement</option>
                    <option>Résolu</option>
                    <option>signalez</option>
                  </select>
                </td>
                <td class="date-text">16-03-2024</td>
                <td><button>save</button></td>
              </tr>
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
