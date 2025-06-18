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
    <a href="../admin/ProblemSignaler.php" class="sidebar-item">Gestion des plaintes</a>
    <a href="../admin/activiteProposées.php" class="sidebar-item active">Campagnes proposées</a>
    <a href="../admin/ajouteUnNouvell.php" class="sidebar-item">Ajoute nouveau actualités</a>
    <a href="../admin/listeDeL'étulisateure.php?filter=users" class="sidebar-item" <?= ($filter === 'users')  ?>>Voir les utilisateurs</a>
    <a href="../admin/listeDeL'étulisateure.php?filter=admins" <?= ($filter === 'admins')  ?> class="sidebar-item">Voir les admins</a>
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