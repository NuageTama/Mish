<?php
$config = parse_ini_file('../config/config.ini');

require_once('../framework/view.class.php');
require_once('../model/produitDAO.class.php');

$DAO = new ProduitDAO($config['database_path']);
$produits = $DAO->getAll();
foreach ($produits as $produit) {
  $image = $produit->image;
  $image = $config['produit_image_path'].$image;
  $produit->image = $image;
}

$view = new View('main.view.php');
$view->produits = $produits;
$view->show();
?>
