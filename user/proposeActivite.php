<?php
include("scriptPHP/script_proposeActivite.php");
?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Man9ous - Proposition de campagne</title>
  <link rel="stylesheet" href="style/proposeActivite.css" />
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
</head>

<body>
  <?php
  include("../includs/header.php");
  ?>
  <main>
    <div class="container">
      <div class="form-container">
        <!-- Form Header -->
        <div class="form-header">
          <a href="#" class="back-button">
            <i class="fas fa-arrow-left"></i>
          </a>
          <h1>Proposition de campagne communautaire</h1>
        </div>

        <?php if (!empty($success_message)): ?>
            <div class="success-msg"><?= $success_message ?></div>
          <?php endif; ?>

        <!-- Form Content -->
        <form class="campaign-form" method="POST" action="" enctype="multipart/form-data">

          <div class="form-grid">
            <!-- Left Column -->
            <div class="form-column">
              <div class="form-group">
                <label for="title">titre</label>
                <input
                  type="text"
                  value="<?= htmlspecialchars($title ?? '') ?>"
                  id="title"
                  name="title"
                  placeholder="Title"
                  class="form-input" />
                <?php if (!empty($errors['title'])): ?>
                  <p class="text-red-500 text-sm mt-1"><?= $errors['title'] ?></p>
                <?php endif; ?>
              </div>

              <div class="form-group">
                <label for="category">Sélectionnez la catégorie</label>
                <select class="form-input" name="category">
                  <option value="">-- Choisir une catégorie --</option>
                  <option value="environnement" <?= ($category == 'environnement') ? 'selected' : '' ?>>Environnement</option>
                  <option value="sport" <?= ($category == 'sport') ? 'selected' : '' ?>>Sport</option>
                  <option value="culture" <?= ($category == 'culture') ? 'selected' : '' ?>>Culture</option>
                </select>
                <?php if (!empty($errors['category'])): ?>
                  <p class="text-red-500 text-sm mt-1"><?= $errors['category'] ?></p>
                <?php endif; ?>
              </div>

              <div class="form-group">
                <label for="location">Ajoutez localisation ici</label>
                <input
                  type="text"
                  value="<?= htmlspecialchars($location ?? '') ?>"
                  id="location"
                  name="location"
                  placeholder="Ajoutez le lieu de localisation ici"
                  class="form-input" />
                <?php if (!empty($errors['location'])): ?>
                  <p class="text-red-500 text-sm mt-1"><?= $errors['location'] ?></p>
                <?php endif; ?>
              </div>

              <div class="form-group photo-upload">
                <label>Ajouter une photo</label>
                <div class="upload-area">
                  <p>gez-en une depuis votre bibliothèque</p>
                  <button type="button" id="addphotobrn" class="photo-btn">Add a photo</button>
                  <input
                    type="file"
                    id="photoInput"
                    name="photo"
                    accept="image/*"
                    style="display: none" />
                  <?php if (!empty($errors['photo'])): ?>
                    <p class="text-red-500 text-sm mt-1"><?= $errors['photo'] ?></p>
                  <?php endif; ?>
                </div>

                <!-- poure ux de photo -->
                <div id="photoPreviewContainer" style="margin-top:10px;">
                  <img id="photoPreview" src="" alt="Preview de la photo" style="max-width: 100%; display: none; border: 1px solid #ccc; padding: 5px; border-radius: 5px;">
                </div>
              </div>

            </div>

            <!-- Right Column -->
            <div class="form-column">
              <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" name="description" class="form-textarea"><?= htmlspecialchars($description ?? '') ?></textarea>
                <?php if (!empty($errors['description'])): ?>
                  <p class="text-red-500 text-sm mt-1"><?= $errors['description'] ?></p>
                <?php endif; ?>
              </div>

              <div class="form-group">
                <label for="municipality">Sélectionnez la municipalité</label>
                <select class="form-input" id="municipality" name="commune_id">
                  <option value="">Municipalité</option>
                  <option value="1">Tunis</option>
                  <option value="2">Sfax</option>
                  <option value="3">Sousse</option>
                  <option value="4">Kairouan</option>
                </select>
                <?php if (!empty($errors['commune_id'])): ?>
                  <p class="text-red-500 text-sm mt-1"><?= $errors['commune_id'] ?></p>
                <?php endif; ?>
              </div>

              <div class="form-group">
                <label for="date">Date de l'activité</label>
                <input
                  type="date"
                  value="<?= htmlspecialchars($event_date ?? '') ?>"
                  id="date"
                  name="event_date"
                  placeholder="ajoutez la date"
                  class="form-input" />
                <?php if (!empty($errors['event_date'])): ?>
                  <p class="text-red-500 text-sm mt-1"><?= $errors['event_date'] ?></p>
                <?php endif; ?>
              </div>

              <div class="form-group submit-group">
                <button type="submit" name="proposeBtn" class="submit-btn">
                  Soumettre le rapport
                </button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </main>
  <?php
  include("../includs/footer.php");
  ?>
  <script>
    document
    // .getElementById("addphotobrn")
    // .addEventListener("click", function() {
    //   document.getElementById("photoInput").click();
    // });

    document.getElementById('addphotobrn').addEventListener('click', function() {
      document.getElementById('photoInput').click();
    });

    document.getElementById('photoInput').addEventListener('change', function(event) {
      const file = event.target.files[0];
      const preview = document.getElementById('photoPreview');

      if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
          preview.src = e.target.result;
          preview.style.display = 'block';
        }

        reader.readAsDataURL(file);
      } else {
        preview.src = '';
        preview.style.display = 'none';
      }
    });
  </script>
</body>

</html>