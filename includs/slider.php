<?php
$currentPage = basename($_SERVER['PHP_SELF']);
$filter = $_GET['filter'] ?? '';
?>

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
    <a href="ProblemSignaler.php" class="sidebar-item <?= ($currentPage === 'ProblemSignaler.php') ? 'active' : '' ?>">Gestion des plaintes</a>

    <a href="activiteProposées.php" class="sidebar-item <?= ($currentPage === 'activiteProposées.php') ? 'active' : '' ?>">Campagnes proposées</a>

    <a href="ajouteUnNouvell.php" class="sidebar-item <?= ($currentPage === 'ajouteUnNouvell.php') ? 'active' : '' ?>">Ajoute nouveau actualités</a>

    <a href="listeDeL'étulisateure.php?filter=users" class="sidebar-item <?= ($currentPage === "listeDeL'étulisateure.php" && $filter === 'users') ? 'active' : '' ?>">Voir les utilisateurs</a>

    <a href="listeDeL'étulisateure.php?filter=admins" class="sidebar-item <?= ($currentPage === "listeDeL'étulisateure.php" && $filter === 'admins') ? 'active' : '' ?>">Voir les admins</a>
  </aside>

  

</body>

</html>