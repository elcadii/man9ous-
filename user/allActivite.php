<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style/allActivite.css">
</head>
<body>
    <?php
    include("../includs/header.php");
    ?>

    
    <!-- Campaigns Section -->
    <section class="campaigns">
      <div class="container">
        <h2 class="section-title"><span class="highlight">Campagnes</span></h2>

        <div class="campaigns-grid">
          <!-- Campaign Card 1 -->
          <div class="campaign-card">
            <img
              src="img/activite.png"
              alt="Campagne 1"
              class="campaign-image"
            />
            <div class="campaign-content">
              <h4>Posted by City Council</h4>
              <h3>Ville Propre 2024</h3>
              <h4>Lieu : Plage de Rabat</h4>
              <p>
                Participez à notre campagne pour une ville plus propre et plus
                verte
              </p>

              <button class="campaign-btn">Participer</button>
            </div>
          </div>.

          <div class="campaign-card">
            <img
              src="img/activite.png"
              alt="Campagne 1"
              class="campaign-image"
            />
            <div class="campaign-content">
              <h4>Posted by City Council</h4>
              <h3>Ville Propre 2024</h3>
              <h4>Lieu : Plage de Rabat</h4>
              <p>
                Participez à notre campagne pour une ville plus propre et plus
                verte
              </p>

              <button class="campaign-btn">Participer</button>
            </div>
          </div>

          <!-- Campaign Card 2 -->
          <div class="campaign-card">
            <img
              src="img/activite.png"
              alt="Campagne 2"
              class="campaign-image"
            />
            <div class="campaign-content">
              <h4>Posted by City Council</h4>
              <h3>Sécurité Routière</h3>
              <h4>Lieu : Plage de Rabat</h4>
              <p>
                Aidez-nous à identifier les zones dangereuses pour améliorer la
                sécurité
              </p>

              <button class="campaign-btn">Participer</button>
            </div>
          </div>

          <!-- Campaign Card 3 -->
          <div class="campaign-card">
            <img
              src="img/activite.png"
              alt="Campagne 3"
              class="campaign-image"
            />
            <div class="campaign-content">
              <h4>Posted by City Council</h4>
              <h3>Espaces Verts</h3>
              <h4>Lieu : Plage de Rabat</h4>
              <p>
                Contribuez à l'amélioration et à la création d'espaces verts
                urbains
              </p>

              <button class="campaign-btn">Participer</button>
            </div>
          </div>
        </div>
        <div class="Propose_activite">
          <i class="fa-solid fa-circle-plus"></i>
          <h2>Vous avez une idée de campagne communautaire ?</h2>
          <p>
            Partagez vos idées pour améliorer notre communauté et contribuez à
            bâtir un avenir meilleur pour tous.
          </p>
          <a href="">Proposition de campagne</a>
        </div>
      </div>
    </section>
     <?php
    include("../includs/footer.php");
    ?>
</body>
</html>