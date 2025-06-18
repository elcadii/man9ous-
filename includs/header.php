<!--  -->

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link rel="stylesheet" href="../includs/style/header.css" />
</head>

<body>
  <header>
    <div class="log">
      <img src="../img/Man9ous_w.png" alt="">
    </div>

    <nav>
      <a href="#">Accueil</a>
      <a href="#">À propos</a>
      <a href="#">rapports</a>
      <a href="#">Nouvelles</a>
      <a href="#">Campagnes</a>
    </nav>

    <?php if (!empty($_SESSION['login']) && !empty($_SESSION['name'])): ?>
      <!-- User is logged in -->
      <div class="auth-buttons">
        <button class="login-btn">
          <i class="fa-solid fa-user" style="color: #ffffff;"></i>
          <?= htmlspecialchars($_SESSION['name']) ?>
        </button>
        <button class="signup-btn">signaler un probleme</button>
      </div>
    <?php else: ?>
      <!-- User not logged in -->
      <div class="connection">
        <button id="loginBtn">Se connecter</button>
        <button id="sig-n_upBtn">inscrire</button>
      </div>
    <?php endif; ?>
  </header>
</body>

</html>