<!-- Page d'accueuil du site-->
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Mish</title>
    <link rel="stylesheet" href="design/main.css">
  </head>
  <body>
    <header>
      <!--En-tête avec le logo et la navigation-->
      <a href="main.view.php">
        <img src="design/MishHD.png" alt="Logo de Mish" width="256">
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
    </main>
    <footer>
      <!--footer vide pour occuper l'espace-->
    </footer>
  </body>
</html>
