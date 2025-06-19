<?php
include("scriptPhp/script_signalerProblem.php");
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nouveau Rapport</title>
    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <link rel="stylesheet" href="style/signalerProblem.css">
    <!-- Leaflet Control Geocoder CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />

</head>

<body>
    <!-- ==========header==========00000 -->
    <?php
    include("../includs/header.php");
    ?>
    <div class="container">
        <div class="header">
            <button class="back-btn" onclick="history.back()">←</button>
            <h1>Nouveau rapport</h1>
        </div>

        <div class="form-container">
            <?php if (!empty($success_message)): ?>
                <div class="alert-success">
                    <?= htmlspecialchars($success_message) ?>
                </div>
            <?php endif; ?>
            <form id="reportForm" method="POST" enctype="multipart/form-data">
                <div class="form-grid">
                    <!-- Left Column -->
                    <div class="form-section">
                        <div class="form-group">
                            <label for="title">titre</label>
                            <input type="text" id="title" name="title" placeholder="Titre" value="<?= htmlspecialchars($title) ?>">
                            <?php if (!empty($errors['title'])): ?>
                                <p class="text-error"><?= $errors['title'] ?></p>
                            <?php endif; ?>

                        </div>

                        <div class="form-group">
                            <label for="category">select category</label>
                            <select id="category" name="category">
                                <option value="">Select a category</option>
                                <?php foreach ($categories as $cat): ?>
                                    <option value="<?= htmlspecialchars($cat['category_id']) ?>" <?= $cat['category_id'] == $category_id ? 'selected' : '' ?>>
                                        <?= htmlspecialchars($cat['category_name_']) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                            <?php if (!empty($errors['category'])): ?>
                                <p class="text-error"><?= $errors['category'] ?></p>
                            <?php endif; ?>

                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>

                            <textarea id="description" name="description" placeholder="Décrivez le problème en détail..."><?= htmlspecialchars($description) ?></textarea>
                            <?php if (!empty($errors['description'])): ?>
                                <p class="text-error"><?= $errors['description'] ?></p>
                            <?php endif; ?>

                        </div>

                        <div class="form-group">
                            <label for="locationLink">Ajouter un lien de localisation</label>
                            <div class="location-link-container">
                                <input type="text" id="locationLink" name="locationLink" value="<?= htmlspecialchars($location) ?>">
                                <?php if (!empty($errors['location'])): ?>
                                    <p class="text-error"><?= $errors['location'] ?></p>
                                <?php endif; ?>

                                <div class="location-buttons" id="locationButtons">
                                    <button type="button" class="location-btn" id="copyBtn" onclick="copyLocationLink()">Copier</button>
                                    <button type="button" class="location-btn secondary" id="clearBtn" onclick="clearLocationLink()">Effacer</button>
                                    <button type="button" class="location-btn secondary" id="openBtn" onclick="openLocationLink()">Ouvrir</button>
                                </div>
                            </div>
                            <div class="location-status" id="locationStatus"></div>
                        </div>

                        <div class="form-group">
                            <label for="municipality">Sélectionnez la municipalité</label>
                            <select id="municipality" name="commune">
                                <option value="">Municipalité</option>
                                <?php foreach ($communes as $commune): ?>
                                    <option value="<?= htmlspecialchars($commune['commune_id']) ?>" <?= $commune['commune_id'] == $commune_id ? 'selected' : '' ?>>
                                        <?= htmlspecialchars($commune['commune_name']) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                            <?php if (!empty($errors['commune'])): ?>
                                <p class="text-error"><?= $errors['commune'] ?></p>
                            <?php endif; ?>

                        </div>
                    </div>

                    <!-- Right Column -->
                    <div class="form-section">
                        <div class="photo-upload-section">
                            <label>Ajouter une photo</label>
                            <div class="photo-upload" onclick="document.getElementById('photoInput').click()">
                                <div class="upload-text">Ajouter une photo</div>
                                <div class="upload-subtext">Prenez une photo ou téléchargez-en une depuis votre appareil</div>
                                <button type="button" class="upload-button">Ajouter une photo</button>
                            </div>
                            <div class="photo-preview" id="photoPreview">
                                <img id="previewImage" src="/placeholder.svg" alt="Preview">
                                <button type="button" class="remove-photo" onclick="removePhoto()">×</button>
                            </div>
                            <input type="file" id="photoInput" name="photo" accept="image/*" style="display: none;">
                            <?php if (!empty($errors['photo'])): ?>
                                <p class="text-error"><?= $errors['photo'] ?></p>
                            <?php endif; ?>

                        </div>

                        <div class="location-section">
                            <label>Ajouter localisation</label>
                            <div class="map-container">
                                <div class="map-search">
                                    <div style="position: relative; flex: 1;">
                                        <div class="search-icon">🔍</div>
                                        <input type="text" class="search-input" id="searchInput" placeholder="Rechercher un lieu au Maroc...">
                                        <div class="search-results" id="searchResults"></div>
                                    </div>
                                    <button type="button" class="search-btn" onclick="performSearch()">Rechercher</button>
                                </div>
                                <div id="map"></div>
                                <div class="map-controls">
                                    <button type="button" class="map-btn" onclick="getCurrentLocation()" title="Ma position">📍</button>
                                    <button type="button" class="map-btn" onclick="toggleMapType()" title="Changer la vue">🗺️</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="submit-section">
                        <button type="submit" name="somiBTn" class="submit-btn">Soumettre le rapport</button>
                    </div>
                </div>
            </form>


        </div>
    </div>
    <?php
    include("../includs/footer.php");
    ?>

    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

    <!-- Leaflet Control Geocoder JS -->
    <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
    <script src="javascript/signalerProblem.js?v=1.0.2"></script>

</body>

</html>