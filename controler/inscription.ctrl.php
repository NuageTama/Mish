<?php
$config = parse_ini_file('../config/config.ini');

require_once('../framework/view.class.php');
require_once('../model/client.class.php');
require_once('../model/produitDAO.class.php');

$DAO = new ProduitDAO($config['database_path']);
$erreur = NULL;

//On termine forcément sur cette vue
$view = new View('main.view.php');

  //Tous les champs attributs sont définis?
  if(isset($_GET['nom']) && isset($_GET['prenom'])
  && isset($_GET['email']) && isset($_GET['adresse'])
  && isset($_GET['password'])){

    //L'email n'est pas déjà utilisé?
    if($DAO->uniqueEmail($_GET['email'])) {

      $client = new Client();
      $client->id = 0;
      $client->nom = $_GET['nom'];
      $client->prenom = $_GET['prenom'];
      $client->email = $_GET['email'];
      $client->adresse = $_GET['adresse'];

      //Creation de la date
      date_default_timezone_get('UTC');
      $date = date('Y').'-'.date('m').'-'.date('d');
      $client->date = $date;

      $client->password = $_GET['password'];

      //Creation du statut
      $client->admin = FALSE;

      //On insère le client dans la base de données
      $DAO->putClient($client);

      $view->client = $client;
      $view->show();

    } else {
      // L'email est déjà utilisé
      $erreur = "email invalide";
      $view->erreur = $erreur;
      $view->show();
    }
  } else {
    $erreur = "Tous les champs sont obligatoires";
    $view->erreur = $erreur;
    $view->show();
  }

?>
