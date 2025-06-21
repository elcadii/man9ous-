<?php
include("scriptPhP/script_profile.php");

?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Man9ous - Dashboard</title>
  <link rel="stylesheet" href="style/profile.css" />
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
</head>

<body>
  <?php
  include("../includs/header.php");
  ?>
  <div class="user-controls">
    <div class="container">
      <div class="logout">
        <a href="desconnecter.php"><i class="fas fa-sign-out-alt"></i> Se déconnecter</a>
        <a href="modiferLeMoteDePass.php">modifie le mot de passe</a>
      </div>
    </div>
  </div>

  <main>
    <div class="container">
      <div class="welcome-section">
        <h1>Bienvenue <span class="highlight">
            <?php echo htmlspecialchars($name); ?>
          </span></h1>
        <p>
          Contribuez à l'amélioration de notre infrastructure en signalant les
          problèmes
        </p>
      </div>

      <div class="features-grid">
        <!-- Feature Card 1 -->
        <a href="proposeActivite.php">
          <div class="feature-card">
            <div class="feature-icon">
              <i class="fas fa-users"></i>
            </div>
            <h2>Proposition de campagne</h2>
            <p>Proposez une campagne communautaire</p>
          </div>
        </a>

        <!-- Feature Card 2 -->
        <a href="mesPropositionDactivite.php">
          <div class="feature-card">
            <div class="feature-icon">
              <i class="fas fa-clipboard-list"></i>
            </div>
            <h2>Mes Proposition de campagne</h2>
            <p>Proposez une campagne communautaire</p>
          </div>
        </a>

        <!-- Feature Card 3 -->
        <a href="maiRaport.php">
          <div class="feature-card">
            <div class="feature-icon">
              <i class="fas fa-file-alt"></i>
            </div>
            <h2>Mes rapports</h2>
            <p>Suivez l’état de vos plaintes soumises</p>
          </div>
        </a>

        <!-- Feature Card 4 -->
        <a href="signalerProblem.php">
          <div class="feature-card">
            <div class="feature-icon">
              <i class="fas fa-plus-circle"></i>
            </div>
            <h2>Déposer une plainte</h2>
            <p>Signalez un problème d’infrastructure</p>
          </div>
        </a>
      </div>
      <div class="content-grid">
        <!-- News Column -->
        <div class="content-column">
          <h2 class="column-title">Dernières actualités</h2>

          <!-- News Card 1 -->
          <!-- <div class="content-card">
            <div class="card-meta">Posted by City Council</div>
            <h3 class="card-title">
              Amélioration des routes et de l'éclairage
            </h3>
            <p class="card-description">
              Le conseil municipal a annoncé un nouveau projet pour améliorer
              les routes et l'éclairage public au centre-ville. Les travaux
              devraient commencer bientôt.
            </p>
          </div> -->

          <!-- News Card 2 -->
          <?php foreach ($latestNews as $news): ?>
            <div class="content-card">
              <div class="card-meta">
                Posté par <?= htmlspecialchars($news['first_name'] . ' ' . $news['last_name']) ?>
              </div>
              <h3 class="card-title"><?= htmlspecialchars($news['news_title_']) ?></h3>
              <p class="card-description">
                <?= nl2br(htmlspecialchars($news['news_description'])) ?>
              </p>
            </div>
          <?php endforeach; ?>

          <!-- View All News Link -->
          <a href="toutNouvell.php" class="view-all-link">
            <i class="fas fa-arrow-right"></i> Afficher toutes les actualités
          </a>
        </div>

        <!-- Reports Column -->
        <div class="content-column">
          <!-- No title for this column in the design -->
          <h2 class="column-title">Dernières Rapports</h2>
          <!-- Report Card 1 -->
          <!-- <div class="content-card">
            <div class="card-meta">Rapporté par Fatima</div>
            <h3 class="card-title">Nid-de-poule dans la rue principale</h3>
            <p class="card-description">
              Un grand nid-de-poule dans la rue principale cause des
              embouteillages et représente un danger pour la sécurité des
              conducteurs.
            </p>
          </div> -->

          <!-- Report Card 2 -->
          <?php foreach ($latestReports as $report): ?>
            <div class="content-card">
              <div class="card-meta">Rapporté par <?= htmlspecialchars($report['first_name']) ?></div>
              <h3 class="card-title"><?= htmlspecialchars($report['problem_name']) ?></h3>
              <p class="card-description">
                <?= nl2br(htmlspecialchars($report['description'])) ?>
              </p>
            </div>
          <?php endforeach; ?>

          <!-- View All Reports Link -->
          <a href="toutRaport.php" class="view-all-link">
            <i class="fas fa-arrow-right"></i> Afficher tous les rapports
          </a>
        </div>
      </div>

      <!-- fuwe9ufyew7ryf87ewryr874yr87w4yr834r -->

      <div class="stats-container">
        <!-- Stat Card 1 -->
        <div class="stat-card">
          <div class="stat-number"><?= htmlspecialchars($stats['resolved_count']) ?></div>
          <div class="stat-label">Résolu</div>
        </div>

        <!-- Stat Card 2 -->
        <div class="stat-card">
          <div class="stat-number"><?= htmlspecialchars($stats['in_progress_count']) ?></div>
          <div class="stat-label">En cours de traitement</div>
        </div>

        <!-- Stat Card 3 -->
        <div class="stat-card">
          <div class="stat-number"><?= htmlspecialchars($stats['total_count']) ?></div>
          <div class="stat-label">Total des rapports</div>
        </div>
      </div>
    </div>
  </main>
  <?php
  include("../includs/footer.php");
  ?>
</body>

</html>