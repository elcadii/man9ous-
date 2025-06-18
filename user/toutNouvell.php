<?php
session_start();
include("../confige/DbConnect.php");


$sql = "SELECT * FROM news";
$stmt = $pdo->query($sql);
$newsList = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="style/toutNouvell.css">
</head>

<body>
  <?php
  include("../includs/header.php");
  ?>
  <!-- News Section -->
  <section class="news">
    <div class="container">
      <h2 class="section-title"><span class="highlight">Actualités</span></h2>

      <div class="news-grid">
        <!-- News Card 1 -->
        <?php foreach ($newsList as $news): ?>
          <div class="news-card">
            <img src="../uploads/news_photos/<?= htmlspecialchars($news['news_img']) ?>" alt="Actualité" class="news-image" />
            <div class="news-content">
              <h4>
                Posted by <?= htmlspecialchars($_SESSION['name'] ?? 'City Council') ?>
              </h4>
              <h3><?= htmlspecialchars($news['news_title_']) ?></h3>
              <p><?= htmlspecialchars($news['news_description']) ?></p>
            </div>
          </div>
        <?php endforeach; ?>


      </div>
    </div>
  </section>
  <?php
  include("../includs/footer.php");
  ?>
</body>

</html>