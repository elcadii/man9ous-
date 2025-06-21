<?php
include("confige/DbConnect.php");

// select rapports 
$sql = "SELECT p.*, u.first_name 
        FROM problem p 
        JOIN users u ON p.user_id = u.user_id 
        ORDER BY p.problem_id DESC 
        LIMIT 3";

$stmt = $pdo->prepare($sql);
$stmt->execute();
$reports = $stmt->fetchAll(PDO::FETCH_ASSOC);


// select last 3 news
$sql = "SELECT n.*, a.first_name, a.last_name
        FROM news n
        JOIN admin a ON n.admin_id = a.admin_id
        ORDER BY n.news_id DESC
        LIMIT 3";

$stmt = $pdo->prepare($sql);
$stmt->execute();
$newsItems = $stmt->fetchAll(PDO::FETCH_ASSOC);



$sql = "SELECT a.*, u.first_name, u.last_name
        FROM activity a
        JOIN users u ON a.user_id = u.user_id
        ORDER BY a.activite_id DESC
        LIMIT 3";

$stmt = $pdo->prepare($sql);
$stmt->execute();
$activities = $stmt->fetchAll(PDO::FETCH_ASSOC);


?>


<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Man9ous - Signalez les problèmes, améliorez notre ville</title>
  <link rel="stylesheet" href="indesx.css" />
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
    integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer" />
  <link
    href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap"
    rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
  <!-- Header Navigation -->
  <?php
  include("includs/header.php");
  ?>
  <!-- Hero Section -->
  <section class="hero">
    <div class="hero-content">
      <h1 class="hero-title">
        Signalez les problèmes,<br />
        <span class="highlight">améliorez notre ville</span>
      </h1>
      <p class="hero-description">
        Participez activement à l'amélioration de votre communauté en
        signalant les problèmes urbains
      </p>
      <a href="user/signalerProblem.php" class="hero-cta">signaler un probleme</a>
    </div>
    <!-- Hero background image would be added via CSS -->
  </section>

  <!-- Mission Section -->
  <section class="mission">
    <h1 class="section_titel"><span class="span">Notre </span> mission</h1>
    <div class="container">
      <div class="mission-content">
        <!-- Mission Illustration -->
        <div class="mission-illustration">
          <img
            src="img/Business mission-amico.png"
            alt="Illustration de la mission"
            class="mission-image" />
        </div>
        <div class="mission-text">
          <p class="mission-description">
            Nous nous engageons à améliorer la qualité de vie dans notre ville
            en offrant une plateforme permettant aux citoyens de signaler les
            problèmes d'infrastructure. Notre objectif est de faire en sorte
            que chaque voix soit entendue et que notre communauté reste un
            lieu sûr et prospère pour tous.
          </p>
        </div>
      </div>
      <!-- Mission Stats -->
      <div class="mission-stats">
        <div class="stat-item">
          <i class="fa-solid fa-location-dot"></i>
          <h2>Signaler des problèmes</h2>
          <p>
            Signalez facilement les problèmes d'infrastructure dans votre
            quartier.
          </p>
        </div>
        <div class="stat-item">
          <i class="fa-solid fa-users"></i>
          <h2>Collaboration communautaire</h2>
          <p>
            Collaborez avec vos voisins pour résoudre les problèmes ensemble.
          </p>
        </div>
        <div class="stat-item">
          <i class="fa-solid fa-microphone"></i>
          <h2>Restez informé</h2>
          <p>
            Restez informé de l’avancement des problèmes signalés et des
            actualités de la communauté.
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- Platform Features Section -->
  <section class="features">
    <div class="container">
      <h2 class="section-title">
        Platform <span class="highlight">Features</span>
      </h2>

      <div class="features-layout">
        <!-- Features Grid -->
        <div class="features-grid">
          <!-- Feature Card 1 -->
          <div class="feature-card">
            <h3>Déposer une plainte</h3>
            <p>
              Signalez les problèmes avec des photos, des descriptions et une
              localisation précise
            </p>
          </div>

          <!-- Feature Card 2 -->
          <div class="feature-card">
            <h3>Suivre l'état</h3>
            <p>
              Surveillez vos plaintes depuis l'enregistrement jusqu'à la
              résolution
            </p>
          </div>

          <!-- Feature Card 3 -->
          <div class="feature-card">
            <h3>Campagnes communautaires</h3>
            <p>
              Proposez et participez à des initiatives communautaires
              bénévoles
            </p>
          </div>

          <!-- Feature Card 4 -->
          <div class="feature-card">
            <h3>Actualités locales</h3>
            <p>
              Restez informé des nouvelles municipales et des activités
              communautaires
            </p>
          </div>
        </div>

        <!-- Features Illustration -->
        <div class="features-illustration">
          <img
            src="img/Preferences-pana.png"
            alt="Interface de préférences de la plateforme"
            class="features-image" />
        </div>
      </div>
    </div>
  </section>

  <!-- Latest Reports Section -->
  <section class="reports">
    <div class="container">
      <h2 class="section-title">
        Derniers <span class="highlight">rapports</span>
      </h2>
      <p class="section-description">
        Découvrez les derniers problèmes signalés par la communauté
      </p>

      <div class="reports-grid">
        <!-- Report Card 1 -->
        <?php foreach ($reports as $report): ?>
          <div class="report-card">
            <img
              src="user/<?= htmlspecialchars($report['photo_url']) ?>"
              alt="<?= htmlspecialchars($report['problem_name']) ?>"
              class="report-image" />

            <div class="report-content">
              <h4>Rapporté par <?= htmlspecialchars($report['first_name']) ?></h4>
              <h3><?= htmlspecialchars($report['problem_name']) ?></h3>
              <p class="report-location">
                <?= nl2br(htmlspecialchars($report['description'])) ?>
              </p>
              <span class="report-status">
                <?= htmlspecialchars($report['problem_status']) ?>
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
    <a class="voir_tout" href="user/toutRapport.php">voir plus <i class="fa-solid fa-angles-right" style="color: #ffffff;"></i></a>
  </section>

  <!-- News Section -->
  <section class="news">
    <div class="container">
      <h2 class="section-title"><span class="highlight">Actualités</span></h2>

      <div class="news-grid">
        <!-- News Card 1 -->
        <?php foreach ($newsItems as $news): ?>
          <div class="news-card">
            <img src="uploads/news_photos/<?= htmlspecialchars($news['news_img']) ?>" alt="Actualité" class="news-image" />
            <div class="news-content">
              <h4>Posted by <?= htmlspecialchars($news['first_name'] . ' ' . $news['last_name']) ?></h4>
              <span class="news-date"><?= date('d M Y', strtotime($news['created_at'] ?? 'now')) ?></span>
              <h3><?= htmlspecialchars($news['news_title_']) ?></h3>
              <p><?= htmlspecialchars($news['news_description']) ?></p>
            </div>
          </div>
        <?php endforeach; ?>



      </div>
    </div>
    <a class="voir_tout" href="user/toutNouvell.php">voir plus <i class="fa-solid fa-angles-right" style="color: #ffffff;"></i></a>
  </section>

  <!-- Campaigns Section -->
  <section class="campaigns">
    <div class="container">
      <h2 class="section-title"><span class="highlight">Campagnes</span></h2>

      <div class="campaigns-grid">
        <!-- Campaign Card 1 -->
        <?php foreach ($activities as $activity): ?>
          <div class="campaign-card">
            <img
              src="user/<?= htmlspecialchars($activity['activity_photo']) ?>"
              alt="<?= htmlspecialchars($activity['title']) ?>"
              class="campaign-image" />
            <div class="campaign-content">
              <h4>Posté par <?= htmlspecialchars($activity['first_name'] . ' ' . $activity['last_name']) ?></h4>
              <h3><?= htmlspecialchars($activity['title']) ?></h3>
              <h4>Lieu : <?= htmlspecialchars($activity['activity_location_']) ?></h4>
              <p><?= htmlspecialchars($activity['description']) ?></p>
              <button class="campaign-btn">Participer</button>
            </div>
          </div>
        <?php endforeach; ?>

       
      </div>
      <a class="voir_tout" href="user/allActivite.php">voir plus <i class="fa-solid fa-angles-right" style="color: #ffffff;"></i></a>
      <div class="Propose_activite">
        <i class="fa-solid fa-circle-plus"></i>
        <h2>Vous avez une idée de campagne communautaire ?</h2>
        <p>
          Partagez vos idées pour améliorer notre communauté et contribuez à
          bâtir un avenir meilleur pour tous.
        </p>
        <a href="user/proposeActivite.php">Proposition de campagne</a>
      </div>
    </div>

  </section>

  <?php

  include("includs/footer.php");
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