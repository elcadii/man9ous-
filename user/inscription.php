<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Man9ous - Inscription</title>
    <link rel="stylesheet" href="style/inscription.css">
  </head>
  <body>

    <div class="container">
      <div class="form-header">
        <button class="back-arrow">←</button>
        <h1 class="form-title">Inscription</h1>
      </div>

      <div class="form-container">
        <form class="form-grid">
          <div class="form-row">
            <div class="form-group">
              <label for="firstName">first name</label>
              <input
                type="text"
                id="firstName"
                name="firstName"
                placeholder="enter first name"
              />
            </div>
            <div class="form-group">
              <label for="lastName">last name</label>
              <input
                type="text"
                id="lastName"
                name="lastName"
                placeholder="enter last name"
              />
            </div>
          </div>

          <div class="form-row">
            <div class="form-group">
              <label for="email">Email</label>
              <input
                type="email"
                id="email"
                name="email"
                placeholder="entrez email"
              />
            </div>
            <div class="form-group">
              <label for="phone">Numéro de Téléphone</label>
              <input
                type="tel"
                id="phone"
                name="phone"
                placeholder="entrez numéro de téléphone"
              />
            </div>
          </div>

          <div class="form-row">
            <div class="form-group">
              <label for="cin">CIN</label>
              <input type="text" id="cin" name="cin" placeholder="entrez CIN" />
            </div>
            <div class="form-group">
              <label for="municipality">Sélectionnez la municipalité</label>
              <select id="municipality" name="municipality">
                <option value="">Municipalité</option>
                <option value="tunis">Tunis</option>
                <option value="sfax">Sfax</option>
                <option value="sousse">Sousse</option>
                <option value="kairouan">Kairouan</option>
              </select>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group">
              <label for="password">mot de passe</label>
              <input
                type="password"
                id="password"
                name="password"
                placeholder="ajoutez la date"
              />
            </div>
            <div class="form-group">
              <label for="confirmPassword">confirmez mot de pass</label>
              <input
                type="password"
                id="confirmPassword"
                name="confirmPassword"
                placeholder="ajoutez la date"
              />
            </div>
          </div>

          <div class="form-row">
            <div class="form-group">
              <label for="address">Adresse</label>
              <input
                type="text"
                id="address"
                name="address"
                placeholder="ajoutez la date"
              />
            </div>
            <div class="form-group">
              <button type="submit" class="submit-btn">Inscription</button>
            </div>
          </div>
          <!-- 
          <div class="form-group ">
            <label for="address">Adresse</label>
            <input
              type="text"
              id="address"
              name="address"
              placeholder="ajoutez la date"
            />
            <button type="submit" class="submit-btn">Inscription</button>
          </div> -->
        </form>

        <div class="login-link">
          J'ai un compte. <a href="#login">Connectez</a>
        </div>
      </div>
    </div>
  </body>
</html>
