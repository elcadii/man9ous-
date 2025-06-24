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
      <a href="/man9ous/man9ous-/index.php#Accueil">Accueil</a>
      <a href="/man9ous/man9ous-/index.php#mission">À propos</a>
      <a href="/man9ous/man9ous-/index.php#reports">rapports</a>
      <a href="/man9ous/man9ous-/index.php#news">Nouvelles</a>
      <a href="/man9ous/man9ous-/index.php#campaigns">Campagnes</a>
    </nav>

    <div class="auth-buttons">
      <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>

        <a href="/man9ous/man9ous-/user/desconnecter.php" class="login-btn">desconnecter</a>
        <!--  -->
        <a  class="signup-btn" href="/man9ous/man9ous-/admin/ProblemSignaler.php">Admin Panel</a>

      <?php elseif (isset($_SESSION['role']) && $_SESSION['role'] === 'user'): ?>
        <a href="/man9ous/man9ous-/user/profile.php" class="login-btn">
          <i class="fa-solid fa-user" style="color: #ffffff;"></i>
          <?= htmlspecialchars($_SESSION['name']) ?>
        </a>
        <a class="signup-btn" href="/man9ous/man9ous-/user/signalerProblem.php">signaler un probleme</a>
      <?php else: ?>
        <a class="login-btn" href="/man9ous/man9ous-/user/signalerProblem.php">signaler un probleme</a>
        <a class="signup-btn" href="/man9ous/man9ous-/user/inscription.php">Créer un compte</a>
      <?php endif; ?>
    </div>

  </header>
</body>

</html>