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
        <form id="newsForm" class="form-content">
          <div class="form-row">
            <div class="form-group">
              <label for="title" class="form-label">titre</label>
              <input
                type="text"
                id="title"
                class="form-control"
                placeholder="Titre"
              />
            </div>
            <div class="form-group">
              <label for="municipality" class="form-label"
                >Sélectionnez la municipalité</label
              >
              <input
                type="text"
                id="municipality"
                class="form-control"
                placeholder="Municipalité"
              />
            </div>
          </div>

          <div class="form-row">
            <div class="form-group">
              <label class="form-label">pqhotos</label>
              <div class="photo-upload" id="photoUpload">
                <div class="upload-title">Ajouter une photo</div>
                <div class="upload-subtitle">
                  glisser une depuis votre bibliothèque
                </div>
                <button type="button" class="upload-button" id="uploadButton">
                  Add a photo
                </button>
                <input
                  type="file"
                  id="fileInput"
                  class="file-input"
                  accept="image/*"
                  multiple
                />
                <div class="preview-container" id="previewContainer"></div>
              </div>
            </div>
            <div class="form-group">
              <label for="description" class="form-label">Description</label>
              <textarea
                id="description"
                class="form-control form-textarea"
              ></textarea>
            </div>
          </div>

          <div class="submit-container">
            <button type="submit" class="submit-button">
              Soumettre le rapport
            </button>
          </div>
        </form>
      </main>
    </div>
     <?php
       include("../includs/footer.php");
       ?>
  </body>
</html>
