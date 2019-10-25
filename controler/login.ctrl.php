<?php

$config = parse_ini_file('../config/config.ini');

require_once('../model/client.class.php');
require_once('../model/produitDAO.class.php');
require_once('../framework/view.class.php');

$DAO = new ProduitDAO($config['database_path']);
$erreur = NULL;

$view = new View('../view/main.view.php');

if(isset($_GET['email']) && isset($_GET['password'])){
  $email = $_GET['email'];
  $password = $_GET['password'];
  $client = $DAO->getClient($email);
  if ($client == null) {
    $erreur = "Email invalide";
    $view->erreur = $erreur;
    $view->show();
  } elseif($client->password != $password){
    $erreur = "Mot de passe incorrect";
    $view->erreur = $erreur;
    $view->show();
  }else{
    $view->client = $client;
    $view->show();
  }
} else {
  $erreur = "information manquante";
  $view->erreur = $erreur;
  $view->show();
}
?>
