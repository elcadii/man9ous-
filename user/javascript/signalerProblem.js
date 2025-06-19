// Initialize map centered on Morocco
let map = L.map("map", {
  zoomControl: false,
  attributionControl: false,
}).setView([35.741778, -5.826823], 6); 

let currentMarker = null;
let currentMapType = "satellite";
let searchResults = [];
let isAutoFilled = false;

// Satellite tile layer (using Esri World Imagery)
let satelliteLayer = L.tileLayer(
  "https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}",
  {
    attribution:
      "&copy; Esri &mdash; Source: Esri, i-cubed, USDA, USGS, AEX, GeoEye, Getmapping, Aerogrid, IGN, IGP, UPR-EGP, and the GIS User Community",
    maxZoom: 19,
  }
);

// Street tile layer
let streetLayer = L.tileLayer(
  "https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png",
  {
    attribution:
      '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
    maxZoom: 19,
  }
);

// Add satellite layer by default
satelliteLayer.addTo(map);

// Search functionality
const searchInput = document.getElementById("searchInput");
const searchResultsDiv = document.getElementById("searchResults");
const locationLinkInput = document.getElementById("locationLink");
const locationStatus = document.getElementById("locationStatus");
const locationButtons = document.getElementById("locationButtons");
let searchTimeout;

// Location link input event listeners
locationLinkInput.addEventListener("input", function (e) {
  const value = e.target.value.trim();
  if (value && !isAutoFilled) {
    validateAndProcessManualLink(value);
  }
  updateButtonsVisibility();
});

locationLinkInput.addEventListener("paste", function (e) {
  setTimeout(() => {
    const value = e.target.value.trim();
    if (value) {
      isAutoFilled = false;
      validateAndProcessManualLink(value);
    }
  }, 10);
});

locationLinkInput.addEventListener("focus", function () {
  if (this.value) {
    updateButtonsVisibility();
  }
});

locationLinkInput.addEventListener("blur", function () {
  setTimeout(() => {
    if (!document.activeElement.closest(".location-buttons")) {
      // Don't hide if clicking on buttons
    }
  }, 100);
});

function validateAndProcessManualLink(link) {
  // Reset classes
  locationLinkInput.className = "";

  // Check if it's a valid location link
  const linkPatterns = [
    /google\.com\/maps/i,
    /maps\.google/i,
    /goo\.gl\/maps/i,
    /maps\.app\.goo\.gl/i,
    /openstreetmap\.org/i,
    /osm\.org/i,
    /bing\.com\/maps/i,
    /apple\.com\/maps/i,
    /waze\.com/i,
  ];

  const isValidLocationLink = linkPatterns.some((pattern) =>
    pattern.test(link)
  );

  if (isValidLocationLink) {
    locationLinkInput.classList.add("manual-input", "valid-link");
    showLocationStatus("🔗 Lien de localisation collé manuellement", "info");

    // Try to extract coordinates and show on map
    extractCoordinatesFromLink(link);
  } else if (link.includes("http") || link.includes("www.")) {
    locationLinkInput.classList.add("manual-input", "invalid-link");
    showLocationStatus(
      "⚠️ Ce lien ne semble pas être un lien de localisation valide",
      "warning"
    );
  } else {
    locationLinkInput.classList.add("manual-input");
    showLocationStatus(
      "ℹ️ Tapez ou collez un lien de localisation complet",
      "info"
    );
  }
}

function extractCoordinatesFromLink(link) {
  // Try to extract coordinates from various map link formats
  let lat, lng;

  // Google Maps patterns
  const googlePatterns = [
    /@(-?\d+\.?\d*),(-?\d+\.?\d*)/,
    /q=(-?\d+\.?\d*),(-?\d+\.?\d*)/,
    /ll=(-?\d+\.?\d*),(-?\d+\.?\d*)/,
  ];

  for (const pattern of googlePatterns) {
    const match = link.match(pattern);
    if (match) {
      lat = parseFloat(match[1]);
      lng = parseFloat(match[2]);
      break;
    }
  }

  // If coordinates found, show on map
  if (lat && lng && !isNaN(lat) && !isNaN(lng)) {
    const latlng = L.latLng(lat, lng);
    map.setView(latlng, 16);
    addMarker(latlng, "Localisation depuis le lien collé", "manual");
    showLocationStatus(
      "📍 Localisation extraite du lien et affichée sur la carte",
      "success"
    );
  }
}

function updateButtonsVisibility() {
  if (locationLinkInput.value.trim()) {
    locationButtons.classList.add("visible");
  } else {
    locationButtons.classList.remove("visible");
  }
}

function showLocationStatus(message, type = "info") {
  locationStatus.textContent = message;
  locationStatus.className = `location-status ${type}`;

  // Auto-hide after 5 seconds for non-error messages
  if (type !== "error") {
    setTimeout(() => {
      if (locationStatus.textContent === message) {
        locationStatus.className = "location-status";
      }
    }, 5000);
  }
}

searchInput.addEventListener("input", function (e) {
  clearTimeout(searchTimeout);
  const query = e.target.value.trim();

  if (query.length > 2) {
    searchTimeout = setTimeout(() => {
      searchLocation(query, true);
    }, 300);
  } else {
    hideSearchResults();
  }
});

searchInput.addEventListener("keypress", function (e) {
  if (e.key === "Enter") {
    e.preventDefault();
    performSearch();
  }
});

// Hide search results when clicking outside
document.addEventListener("click", function (e) {
  if (!e.target.closest(".map-search")) {
    hideSearchResults();
  }
});

function performSearch() {
  const query = searchInput.value.trim();
  if (query.length > 0) {
    searchLocation(query, false);
    hideSearchResults();
  }
}

function searchLocation(query, showDropdown = false) {
  // Using Nominatim for geocoding with Morocco focus
  const moroccoQuery = `${query}, Morocco`;
  fetch(
    `https://nominatim.openstreetmap.org/search?format=json&q=${encodeURIComponent(
      moroccoQuery
    )}&limit=10&countrycodes=ma&bounded=1&viewbox=-17.0204,35.9224,2.1751,20.7539&addressdetails=1`
  )
    .then((response) => response.json())
    .then((data) => {
      if (data.length > 0) {
        searchResults = data;

        if (showDropdown) {
          showSearchResults(data);
        } else {
          // Use first result for direct search
          const result = data[0];
          const latlng = L.latLng(
            parseFloat(result.lat),
            parseFloat(result.lon)
          );
          map.setView(latlng, 16);
          addMarker(latlng, result.display_name, "search");
        }
      } else {
        // Fallback search without Morocco constraint
        fetch(
          `https://nominatim.openstreetmap.org/search?format=json&q=${encodeURIComponent(
            query
          )}&limit=10&countrycodes=ma&addressdetails=1`
        )
          .then((response) => response.json())
          .then((data) => {
            if (data.length > 0) {
              searchResults = data;

              if (showDropdown) {
                showSearchResults(data);
              } else {
                const result = data[0];
                const latlng = L.latLng(
                  parseFloat(result.lat),
                  parseFloat(result.lon)
                );
                map.setView(latlng, 16);
                addMarker(latlng, result.display_name, "search");
              }
            }
          })
          .catch((error) => {
            console.error("Search error:", error);
          });
      }
    })
    .catch((error) => {
      console.error("Search error:", error);
    });
}

function showSearchResults(results) {
  searchResultsDiv.innerHTML = "";

  results.slice(0, 5).forEach((result) => {
    const item = document.createElement("div");
    item.className = "search-result-item";
    item.textContent = result.display_name;
    item.onclick = () => selectSearchResult(result);
    searchResultsDiv.appendChild(item);
  });

  searchResultsDiv.style.display = "block";
}

function hideSearchResults() {
  searchResultsDiv.style.display = "none";
}

function selectSearchResult(result) {
  const latlng = L.latLng(parseFloat(result.lat), parseFloat(result.lon));
  map.setView(latlng, 16);
  addMarker(latlng, result.display_name, "search");
  searchInput.value = result.display_name.split(",")[0]; // Show only the main location name
  hideSearchResults();
}

// Add click event to map
map.on("click", function (e) {
  addMarker(e.latlng, "", "click");
});

function addMarker(latlng, title = "", source = "") {
  // Remove existing marker
  if (currentMarker) {
    map.removeLayer(currentMarker);
  }

  // Create custom marker icon
  const customIcon = L.divIcon({
    className: "custom-marker",
    html: '<div style="background-color: #54D12B; width: 20px; height: 20px; border-radius: 50%; border: 3px solid white; box-shadow: 0 2px 8px rgba(0,0,0,0.3);"></div>',
    iconSize: [20, 20],
    iconAnchor: [10, 10],
  });

  // Add new marker
  currentMarker = L.marker(latlng, { icon: customIcon }).addTo(map);

  if (title) {
    currentMarker
      .bindPopup(
        `<div style="color: #171F14; font-weight: 500; font-size: 14px;">${title}</div>`
      )
      .openPopup();
  }

  // Generate and update location link (only for automatic selections)
  if (source !== "manual") {
    updateLocationLink(latlng, title, source);
  }
}

function updateLocationLink(latlng, title = "", source = "") {
  // Generate Google Maps link
  const googleMapsLink = `https://www.google.com/maps?q=${latlng.lat},${latlng.lng}`;

  // Update the input field
  isAutoFilled = true;
  locationLinkInput.value = googleMapsLink;
  locationLinkInput.className = "auto-filled link-updated";

  // Show buttons
  updateButtonsVisibility();

  // Update status message
  let statusMessage = "";

  switch (source) {
    case "search":
      statusMessage = `📍 Lien généré automatiquement pour: ${
        title ? title.split(",")[0] : "Lieu recherché"
      }`;
      break;
    case "click":
      statusMessage = `📍 Lien généré pour les coordonnées: ${latlng.lat.toFixed(
        6
      )}, ${latlng.lng.toFixed(6)}`;
      break;
    case "geolocation":
      statusMessage = `📍 Lien généré pour votre position actuelle`;
      break;
    default:
      statusMessage = `📍 Lien de localisation généré automatiquement`;
  }

  showLocationStatus(statusMessage, "success");

  // Remove animation class after animation completes
  setTimeout(() => {
    locationLinkInput.classList.remove("link-updated");
    isAutoFilled = false;
  }, 300);
}

function copyLocationLink() {
  if (locationLinkInput.value) {
    navigator.clipboard
      .writeText(locationLinkInput.value)
      .then(() => {
        showLocationStatus("✅ Lien copié dans le presse-papiers!", "success");
      })
      .catch((err) => {
        console.error("Failed to copy: ", err);
        showLocationStatus("❌ Erreur lors de la copie", "error");
      });
  }
}

function clearLocationLink() {
  locationLinkInput.value = "";
  locationLinkInput.className = "";
  locationButtons.classList.remove("visible");
  locationStatus.className = "location-status";

  // Remove marker from map
  if (currentMarker) {
    map.removeLayer(currentMarker);
    currentMarker = null;
  }

  showLocationStatus("🗑️ Lien de localisation effacé", "info");
}

function openLocationLink() {
  if (locationLinkInput.value) {
    window.open(locationLinkInput.value, "_blank");
    showLocationStatus("🔗 Lien ouvert dans un nouvel onglet", "info");
  }
}

function getCurrentLocation() {
  if (navigator.geolocation) {
    showLocationStatus("🔍 Recherche de votre position...", "info");

    navigator.geolocation.getCurrentPosition(
      function (position) {
        const latlng = L.latLng(
          position.coords.latitude,
          position.coords.longitude
        );
        map.setView(latlng, 16);
        addMarker(latlng, "Ma position", "geolocation");
      },
      function (error) {
        showLocationStatus(
          "❌ Erreur de géolocalisation: " + error.message,
          "error"
        );
      }
    );
  } else {
    showLocationStatus(
      "❌ La géolocalisation n'est pas supportée par ce navigateur",
      "error"
    );
  }
}

function toggleMapType() {
  if (currentMapType === "satellite") {
    map.removeLayer(satelliteLayer);
    map.addLayer(streetLayer);
    currentMapType = "street";
  } else {
    map.removeLayer(streetLayer);
    map.addLayer(satelliteLayer);
    currentMapType = "satellite";
  }
}

// Photo upload functionality
document.getElementById("photoInput").addEventListener("change", function (e) {
  const files = e.target.files;
  if (files.length > 0) {
    const file = files[0];

    // Check file size (5MB limit)
    if (file.size > 5 * 1024 * 1024) {
      alert("Le fichier est trop volumineux. Taille maximale: 5MB");
      return;
    }

    const reader = new FileReader();
    reader.onload = function (e) {
      document.getElementById("previewImage").src = e.target.result;
      document.getElementById("photoPreview").style.display = "block";
    };
    reader.readAsDataURL(file);
  }
});

function removePhoto() {
  document.getElementById("photoInput").value = "";
  document.getElementById("photoPreview").style.display = "none";
}

// Drag and drop functionality
const photoUpload = document.querySelector(".photo-upload");

photoUpload.addEventListener("dragover", function (e) {
  e.preventDefault();
  photoUpload.classList.add("dragover");
});

photoUpload.addEventListener("dragleave", function (e) {
  e.preventDefault();
  photoUpload.classList.remove("dragover");
});

photoUpload.addEventListener("drop", function (e) {
  e.preventDefault();
  photoUpload.classList.remove("dragover");

  const files = e.dataTransfer.files;
  if (files.length > 0) {
    const file = files[0];
    if (file.type.startsWith("image/")) {
      document.getElementById("photoInput").files = files;
      document.getElementById("photoInput").dispatchEvent(new Event("change"));
    }
  }
});

// Form submission
document.getElementById("reportForm").addEventListener("submit", function (e) {
  e.preventDefault();

  // Collect form data
  const formData = new FormData(this);
  const data = Object.fromEntries(formData);

  // Add location data if available
  if (currentMarker) {
    data.latitude = currentMarker.getLatLng().lat;
    data.longitude = currentMarker.getLatLng().lng;
  }
  data.locationLink = locationLinkInput.value;

  // Here you would typically send the data to your server
  console.log("Form data:", data);
  alert("Rapport soumis avec succès!");
});

// Initialize map size
setTimeout(() => {
  map.invalidateSize();
}, 100);
