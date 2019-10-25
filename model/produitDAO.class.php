<?php
require_once('produit.class.php');
class ProduitDAO {
  private $db;

  function __construct($path) {
    $database = 'sqlite:'.$path.'produits.db';
    try {
      $this->db = new PDO($database);
    } catch (PDOException $e) {
      die('erreur de connexion : '.$e.getMessage());
    }
  }

  //---------------------------------------------------------------------------------------------
  //produit
  //---------------------------------------------------------------------------------------------

  public function get(int $id) : Produit {
    $sql = "SELECT * FROM produit WHERE id='$id'";
    $tab = $this->db->query($sql)->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, "Produit");
    return $tab[0];
  }

  public function getAll() {
    $sql = "SELECT * FROM produit";
    $tab = $this->db->query($sql)->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, "Produit");
    return $tab;
  }

//---------------------------------------------------------------------------------------------
//client
//---------------------------------------------------------------------------------------------


  public function putClient(Client $client) {
    //On défini l'identifiant du client qu'on se prepare à insérer
    $sql = "SELECT MAX(id) FROM client";
    $id = $this->db->query($sql);

    $query = $this->dn->prepare(INSERT INTO client(id, nom, prenom,  email, adresse, datecreation, password, admin)
                                                          VALUES ($id[0], $client->nom, $client->$prenom,
                                                                          $client->email,$client->adresse, CURDATE(),
                                                                          $client->password, 0))
    $this->db->query($sql);
  }

  public function uniqueEmail(String $email) : boolean { //on test si l'email est unique
    $sql = "SELECT email FROM client WHERE email='$email'";
    $tab = $this->db->query($sql);
    return isset($tab);//a vérifier
  }

//Obtenir un client grâce à son e-mail
  public function getClient(string $email) {
    $sql = "SELECT * FROM client WHERE email ='$email'";
    $tab = $this->db->query($sql)->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, "Client");
    if(isset($tab[0])){
      return $tab[0];
    } else {
      return null;
    }

  }
}
?>
