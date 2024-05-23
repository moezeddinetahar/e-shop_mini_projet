<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Mon site e-commerce</title>
    <link rel="stylesheet" href="style.css" />
    <style>
      /* Reset des marges et des paddings */
      body,
      h1,
      h2,
      h3,
      p,
      ul {
        margin: 0;
        padding: 0;
      }
      body {
        position: relative; /* Ajout d'une position relative pour référence */
        min-height: 100vh; /* La hauteur minimale de la page sera 100% de la hauteur de la fenêtre */
        background-image: url("https://eminence.ch/wp-content/uploads/2023/08/techniques-ecommerce-2022.jpg");
        background-size: cover;
        background-repeat: no-repeat;
      }
      /* Styles pour l'en-tête */
      header {
        background-color: #333;
        color: #fff;
        padding: 20px;
        text-align: center;
      }
      main {
        text-align: center;
        margin: 12.5%;
      }
      main .btn {
        display: inline-block;
        background-color: blue;
        color: white;
        padding: 30px 150px;
        border: none;
        border-radius: 20px;
        margin-bottom: 30px;
        text-decoration: none;
        font-size: 20px;
      }
      main .btn:last-child {
        margin-bottom: 0;
      }
      footer {
        position: fixed; /* Positionnement fixe */
        bottom: 0; /* Alignement en bas */
        width: 100%; /* Pour couvrir toute la largeur */
        background-color: #333;
        color: #fff;
        padding: 10px; /* Ajout de padding pour un espacement */
        text-align: center;
      }
    </style>
  </head>
  <body>
    <header>
      <h1>Mon Site E-Commerce</h1>
      <!-- Ajoutez d'autres éléments d'en-tête ici si nécessaire -->
    </header>

    <main>
      <a
        href="vendeur/admin/admin_login.php"
        class="btn"
        >Vendeur</a
      ><br />
      <a
        href="http://localhost/mini-projet/v.1/dev%20html/shop_mini_projet/index.php"
        class="btn"
        >Client</a
      >
    </main>

    <footer>
      <p>&copy; 2024 Mon Site E-Commerce. Tous droits réservés.</p>
    </footer>
  </body>
</html>
