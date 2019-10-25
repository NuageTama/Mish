<?php
require_once('client.class.php');

  if(isset($_GET['nom']) && isset($_GET['prenom'])
  && isset($_GET['email']) && isset($_GET['adresse'])
  && isset($_GET['password'])){
    $client = new Client();
    $client->id = 0;
    $client->nom = $_GET['nom'];
    $client->prenom = $_GET['prenom'];
    $client->email = $_GET['email'];
    $client->adresse = $_GET['adresse'];
    //date
    $client->password = $_GET['password'];
    //admin
  } //pas de return en cas d'erreur


$DAO = new ProduitDAO($config['database_path']);
$view = new View('main.view.php');
$erreur = NULL;

if($DAO->uniqueEmail($client->email) != 0){ // on test la validité de l'email
  $erreur = "email invalide";
  $view->$erreur;
  $view->show();
}

$DAO->putClient($client);

?>
