<!-- Page d'accueuil du site-->
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Mish</title>
    <link rel="stylesheet" href="../view/design/main.css">
  </head>
  <body>
    <header>
      <!--En-tête avec le logo et la navigation-->
      <div class="iconBar">
        <button id="login" onclick="openLoginForm()">
          <img src="../view/design/icon_login.png" alt="login button" width="30px">
        </button>
        <button id="inscription" onclick="openInscriptionForm()">
          <img src="../view/design/icon_create_account.png" alt="inscription button" width="30px">
        </button>
      </div>
      <a href="main.view.php">
        <img src="../view/design/MishHD.png" alt="Logo de Mish" width="256">
      </a>
      <ul>
        <li><a href="#">Chercher</a></li>
        <li><a href="#">Categorie</a></li>
        <li><a href="#">FAQ</a></li>
      </ul>
      </nav>
    </header>
    <main>
      <!--Partie principale de la page-->
      <?php foreach ($produits as $produit): ?>
        <div class="productCard">
          <img src="<?= $produit->image ?>" alt="Image du produit">
          <div class="productText">
            <h5><?= $produit->nom ?></h5>
            <h4><?= $produit->prix ?>€</h4>
          </div>
        </div>
      <?php endforeach; ?>
      <!--Popup form-->
      <div class="form-popup" id="loginForm">

      </div>
      <div class="form-popup" id="inscriptionForm">

      </div>
    </main>
    <footer>
      <!--footer vide pour occuper l'espace-->
    </footer>
    <!--Javascript pour afficher les popups-->
    <script>
      function openLoginForm() {
        document.getElementById("loginForm").style.display = "block";
      }
      function openInscriptionForm() {
        document.getElementById("inscriptionForm").style.display = "block";
      }
      function closeLoginForm() {
        document.getElementById("loginForm").style.display = "none";
      }
      function closeInscriptionForm() {
        document.getElementById("inscriptionForm").style.display = "none";
      }
    </script>

  </body>
</html>
