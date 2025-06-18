<?php
include("scriptPhp/script_ajouteUnNouvell.php");
include("scriptphp/script_listeDeL'étulisateure.php");
?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Man9ous - Ajouter Nouvelles</title>
  <link rel="stylesheet" href="style/ajouteUnNouvell.css">
</head>

<body>
  <!-- Header -->
  <?php
  include("../includs/header.php");
  ?>

  <!-- Main Layout -->
  <div class="main-layout">
    <!-- Sidebar -->
    <?php
    include("../includs/slider.php");
    ?>

    <!-- Content -->
    <main class="content">
      <!-- Form Header -->
      <div class="form-header">
        <button class="back-button">←</button>
        <h1 class="form-title">Ajouter Nouvelles</h1>
      </div>

      <!-- Form Content -->

      <form id="newsForm" class="form-content" method="POST" enctype="multipart/form-data" novalidate>
        <div class="form-row">
          <div class="form-group">
            <label for="title" class="form-label">Titre</label>
            <input type="text" id="title" name="title" class="form-control" placeholder="Titre" required
              value="<?= htmlspecialchars($title) ?>" />
            <?php if ($_SERVER["REQUEST_METHOD"] === "POST" && !empty($errors['title'])): ?>
              <div class="error-message"><?= htmlspecialchars($errors['title']) ?></div>
            <?php endif; ?>
          </div>

          <div class="form-group">
            <label for="municipality" class="form-label">Sélectionnez la municipalité</label>
            <select id="municipality" name="municipality" class="form-control" required>
              <option value="">-- Sélectionnez la municipalité --</option>
              <option value="1" <?= ($municipality == '1') ? 'selected' : '' ?>>Tunis</option>
              <option value="2" <?= ($municipality == '2') ? 'selected' : '' ?>>Sfax</option>
              <option value="3" <?= ($municipality == '3') ? 'selected' : '' ?>>Sousse</option>
              <option value="4" <?= ($municipality == '4') ? 'selected' : '' ?>>Kairouan</option>
            </select>
            <?php if ($_SERVER["REQUEST_METHOD"] === "POST" && !empty($errors['municipality'])): ?>
              <div class="error-message"><?= htmlspecialchars($errors['municipality']) ?></div>
            <?php endif; ?>
          </div>
        </div>

        <div class="form-row">
          <div class="form-group">
            <label class="form-label">Photos</label>
            <div class="photo-upload" id="photoUpload">
              <div class="upload-title">Ajouter une photo</div>
              <div class="upload-subtitle">Glisser une depuis votre bibliothèque</div>
              <button type="button" class="upload-button" id="uploadButton">Add a photo</button>
              <input type="file" id="fileInput" name="photos[]" class="file-input" accept="image/*" multiple style="display: none;" required />

              <div class="preview-container" id="previewContainer"></div>
            </div>
            <?php if ($_SERVER["REQUEST_METHOD"] === "POST" && !empty($errors['photos'])): ?>
              <div class="error-message"><?= htmlspecialchars($errors['photos']) ?></div>
            <?php endif; ?>
          </div>

          <div class="form-group">
            <label for="description" class="form-label">Description</label>
            <textarea id="description" name="description" class="form-control form-textarea" required><?= htmlspecialchars($description) ?></textarea>
            <?php if ($_SERVER["REQUEST_METHOD"] === "POST" && !empty($errors['description'])): ?>
              <div class="error-message"><?= htmlspecialchars($errors['description']) ?></div>
            <?php endif; ?>
          </div>
        </div>

        <div class="submit-container">
          <button type="submit" class="submit-button" name="submitNews">Soumettre le rapport</button>
        </div>
      </form>




    </main>
  </div>
  <?php
  include("../includs/footer.php");
  ?>


</body>
<script>
  document.getElementById("uploadButton").addEventListener("click", function() {
    document.getElementById("fileInput").click();
  });

  const fileInput = document.getElementById('fileInput');
  const previewContainer = document.getElementById('previewContainer');

  fileInput.addEventListener('change', function() {
    previewContainer.innerHTML = '';
    Array.from(fileInput.files).forEach(file => {
      const reader = new FileReader();
      reader.onload = function(e) {
        const img = document.createElement('img');
        img.src = e.target.result;
        img.style.maxWidth = "150px";
        img.style.marginRight = "10px";
        previewContainer.appendChild(img);
      };
      reader.readAsDataURL(file);
    });
  });
</script>

</html>