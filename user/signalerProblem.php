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
            <form id="reportForm">
                <div class="form-grid">
                    <!-- Left Column -->
                    <div class="form-section">
                        <div class="form-group">
                            <label for="title">titre</label>
                            <input type="text" id="title" name="title" placeholder="Titre" required>
                        </div>

                        <div class="form-group">
                            <label for="category">select category</label>
                            <select id="category" name="category" required>
                                <option value="">Select a category</option>
                                <option value="infrastructure">Infrastructure</option>
                                <option value="environnement">Environnement</option>
                                <option value="securite">Sécurité</option>
                                <option value="transport">Transport</option>
                                <option value="services">Services publics</option>
                                <option value="urbanisme">Urbanisme</option>
                                <option value="tourisme">Tourisme</option>
                                <option value="autre">Autre</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea id="description" name="description" placeholder="Décrivez le problème en détail..." required></textarea>
                        </div>

                        <div class="form-group">
                            <label for="locationLink">Ajouter un lien de localisation</label>
                            <div class="location-link-container">
                                <input type="text" id="locationLink" name="locationLink" placeholder="Collez un lien de localisation ou sélectionnez un lieu sur la carte">
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
                            <select id="municipality" name="municipality" required>
                                <option value="">Municipalité</option>
                                <option value="rabat">Rabat</option>
                                <option value="casablanca">Casablanca</option>
                                <option value="marrakech">Marrakech</option>
                                <option value="fes">Fès</option>
                                <option value="tanger">Tanger</option>
                                <option value="agadir">Agadir</option>
                                <option value="meknes">Meknès</option>
                                <option value="oujda">Oujda</option>
                                <option value="kenitra">Kénitra</option>
                                <option value="tetouan">Tétouan</option>
                                <option value="safi">Safi</option>
                                <option value="mohammedia">Mohammedia</option>
                                <option value="khouribga">Khouribga</option>
                                <option value="beni-mellal">Béni Mellal</option>
                                <option value="el-jadida">El Jadida</option>
                            </select>
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
                            <input type="file" id="photoInput" accept="image/*" style="display: none;" multiple>
                            <div class="photo-preview" id="photoPreview">
                                <img id="previewImage" src="/placeholder.svg" alt="Preview">
                                <button type="button" class="remove-photo" onclick="removePhoto()">×</button>
                            </div>
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
                        <button type="submit" class="submit-btn">Soumettre le rapport</button>
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
    <script src="javascript/signalerProblem.js"></script>

</body>
</html>