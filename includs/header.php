<!--  -->

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link rel="stylesheet" href="/man9ous/man9ous-/includs/style/header.css" />
</head>

<body>
  <header>
    <div class="log">
      <img src="/man9ous/man9ous-/img/Man9ous_w.png" alt="">
    </div>

    <nav>
      <a href="#">Accueil</a>
      <a href="#">À propos</a>
      <a href="#">rapports</a>
      <a href="#">Nouvelles</a>
      <a href="#">Campagnes</a>
    </nav>

    <div class="auth-buttons">
      <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
        <!--  -->
        <a class="signup-btn" href="/admin/dashboard.php">Admin Panel</a>

      <?php elseif (isset($_SESSION['role']) && $_SESSION['role'] === 'user'): ?>
        <a class="login-btn">
          <i class="fa-solid fa-user" style="color: #ffffff;"></i>
          <?= htmlspecialchars($_SESSION['name']) ?>
        </a>
        <a class="signup-btn" href="/user/profile.php">signaler un probleme</a>
      <?php else: ?>
        <a class="login-btn" href="/login.php">signaler un probleme</a>
        <a class="signup-btn" href="/register.php">Créer un compte</a>
      <?php endif; ?>
    </div>

  </header>
</body>

</html>