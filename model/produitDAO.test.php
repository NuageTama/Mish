<?php
require_once('produitDAO.class.php');

require_once('../model/produitDAO.class.php');
$config = parse_ini_file('../config/config.ini');
$DAO = new ProduitDAO($config['database_path']);

$produit = $DAO->get(1);
var_dump($produit); 
?>
