<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Man9ous - Proposition de campagne</title>
    <link rel="stylesheet" href="style/proposeActivite.css"/>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
    />
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

          <!-- Form Content -->
          <form class="campaign-form">
            <div class="form-grid">
              <!-- Left Column -->
              <div class="form-column">
                <div class="form-group">
                  <label for="title">titre</label>
                  <input
                    type="text"
                    id="title"
                    placeholder="Title"
                    class="form-input"
                  />
                </div>

                <div class="form-group">
                  <label for="category">Sélectionnez la catégorie</label>
                  <select id="category" class="form-input">
                    <option value="">Sélectionnez une catégorie</option>
                    <option value="environment">Environnement</option>
                    <option value="community">Communauté</option>
                    <option value="infrastructure">Infrastructure</option>
                  </select>
                </div>

                <div class="form-group">
                  <label for="location">Ajoutez localisation ici</label>
                  <input
                    type="text"
                    id="location"
                    placeholder="Ajoutez le lieu de localisation ici"
                    class="form-input"
                  />
                </div>

                <div class="form-group photo-upload">
                  <label>Ajouter une photo</label>
                  <div class="upload-area">
                    <p>gez-en une depuis votre bibliothèque</p>
                    <button type="button" id="addphotobrn" class="photo-btn">Add a photo</button>
                    <input
                      type="file"
                      id="photoInput"
                      accept="image/*"
                      style="display: none"
                    />
                  </div>
                </div>
              </div>

              <!-- Right Column -->
              <div class="form-column">
                <div class="form-group">
                  <label for="description">Description</label>
                  <textarea id="description" class="form-textarea"></textarea>
                </div>

                <div class="form-group">
                  <label for="municipality">Sélectionnez la municipalité</label>
                  <input
                    type="text"
                    id="municipality"
                    placeholder="Municipalité"
                    class="form-input"
                  />
                </div>

                <div class="form-group">
                  <label for="date">Date de l'activité</label>
                  <input
                    type="text"
                    id="date"
                    placeholder="ajoutez la date"
                    class="form-input"
                  />
                </div>

                <div class="form-group submit-group">
                  <button type="submit" class="submit-btn">
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
        .getElementById("addphotobrn")
        .addEventListener("click", function () {
          document.getElementById("photoInput").click();
        });
    </script>
  </body>
</html>
