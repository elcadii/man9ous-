<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link rel="stylesheet" href="../includs//style/slider.css">
</head>

<body>
  <aside class="sidebar">
    <a href="plaintes.php" class="sidebar-item">Gestion des plaintes</a>
    <a href="campagnes.php" class="sidebar-item active">Campagnes proposées</a>
    <a href="ajouteUnNouvell.php" class="sidebar-item">Ajoute nouveau actualités</a>
    <a href="ajouter-admin.php" class="sidebar-item">Ajoute une admin</a>
    <a href="voir-admins.php" class="sidebar-item">Voir tout admin</a>
  </aside>
  <script>
    const items = document.querySelectorAll('.sidebar-item');
    items.forEach(item => {
      item.addEventListener('click', () => {
        items.forEach(i => i.classList.remove('active'));
        item.classList.add('active');
      });
    });
  </script>

</body>

</html>