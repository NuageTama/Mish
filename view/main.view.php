<!-- Page d'accueuil du site-->
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Mish</title>
    <!--general css for every page-->
    <link rel="stylesheet" href="../view/design/headerfooter.css">
    <!--specific css for this page-->
    <link rel="stylesheet" href="../view/design/main.css">
  </head>
  <body>
    <header>
      <!--En-tête avec le logo et la navigation-->
      <div class="iconBar">
        <?php
        if(isset($personne)) {
          print("<h5>Bonjour $personne->prenom $personne->nom</h5>");
        }
        ?>
        <button id="login" onclick="openLoginForm()">
          <img src="../view/design/icon_login.png" alt="login button" width="30px">
        </button>
        <button id="inscription" onclick="openInscriptionForm()">
          <img src="../view/design/icon_create_account.png" alt="inscription button" width="30px">
        </button>
      </div>
      <a href="main.ctrl.php">
        <img src="../view/design/MishHD.png" alt="Logo de Mish" width="256">
      </a>
      <ul>
        <li><a href="#">Chercher</a></li>
        <li><a href="#">Categorie</a></li>
        <li><a href="#">FAQ</a></li>
      </ul>
      </nav>
    </header>
    <!--Popup form-->
    <!--Formulaire de login-->
    <div class="form-popup" id="loginForm">
      <div class="form-container">
        <button type="submit" class="button-cancel" onclick="closeLoginForm()"><img src="../view/design/icon_cancel.png" alt="cancel" width="32px"></button>
        <input type="text" placeholder="Email" name="email" required>
        <input type="password" placeholder="Password" name="password" required>
        <button type="submit" class="button-confirm">Login</button>
      </div>
    </div>
    <!--Formulaire d'inscription-->
    <div class="form-popup" id="inscriptionForm">
      <div class="form-container">
        <button type="submit" class="button-cancel" onclick="closeInscriptionForm()"><img src="../view/design/icon_cancel.png" alt="cancel" width="32px"></button>
        <input type="text" placeholder="First Name" name="prenom">
        <input type="text" placeholder="Last Name" name="nom">
        <input type="text" placeholder="Email" name="email" required>
        <input type="password" placeholder="Password" name="password" required>
        <input type="text" placeholder="Adress" name="adresse">
        <button type="submit" class="button-confirm">Create an account</button>
      </div>
    </div>
    <!--Message d'erreur-->
    <?if(isset($erreur)): ?>
    <div class="message-popup" id="errorPopup">
      <div class="form-container">
        <button type="submit" class="button-cancel" onclick="closeErrorPopup()"><img src="../view/design/icon_cancel.png" alt="cancel" width="32px"></button>
        <textarea name="errorMessage" rows="8" cols="80"><?= $erreur ?></textarea>
      </div>
    </div>
    <?endif;  ?>
    <main>
      <!--Partie principale de la page-->
      <div class="products">
      <?php foreach ($produits as $produit): ?>
        <div class="productCard">
          <a href="../controler/produit.ctrl.php?id=<?= $produit->id ?>"><img src="<?= $produit->image ?>" alt="Image du produit" width="300px"></a>
          <div class="productText">
            <h6><?= $produit->nom ?></h6>
            <h4><?= $produit->prix ?>€</h4>
          </div>
        </div>
      <?php endforeach; ?>
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
