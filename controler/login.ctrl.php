<?php

require_once('../model/client.class.php');
require_once('../model/produitDAO.class.php');
require_once('../framework/view.class.php');

$config = parse_ini_file('../config/config.ini');

  $erreur = NULL;
if(isset($_GET['email']) && isset($_GET['password'])){
  $email = $_GET['email'];
  $password = $_GET['password'];
} else {
  $erreur = "information manquante";
  $view->erreur = $erreur;
  $view->show();
}

  $DAO = new ProduitDAO($config['database_path']);
  $view = new View('../view/main.view.php');

  $client = $DAO->getClient($email);
  if ($client == null) {
    $erreur = "email invalide";
    $view->erreur = $erreur;
    $view->show();
  } elseif($client->password != $password){
    $erreur = "mauvais mdp";
    $view->erreur = $erreur;
    $view->show();
  }else{
    $view->$client;
    $view->show();
  }

?>
