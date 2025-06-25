<?php
include("../confige/DbConnect.php");

$protected = true;
if ($protected && (!isset($_SESSION['login']) || $_SESSION['login'] !== true)) {
        header("Location: /man9ous/man9ous-/user/conection.php");
        exit();
}

$sql = "SELECT n.*, a.first_name, a.last_name
        FROM news n
        JOIN admin a ON n.admin_id = a.admin_id
        ORDER BY n.news_id DESC
        LIMIT 3";

$stmt = $pdo->prepare($sql);
$stmt->execute();
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
  include("../includs/herosection.php");
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
                Posted by <?= htmlspecialchars($news['first_name'] . ' ' . $news['last_name']) ?>
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