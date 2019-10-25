<?php
class Client {
  public $id;
  public $nom;
  public $prenom;
  public $email;
  public $adresse;
  public $datecreation; // Format: YYYY-MM-DD
  /*
  ATTENTION: Le mot de passe est un champ critique de la sécurité, pour stocker cette information correctement,
  nous utiliserons une fonction encryptage nommée hash_pbkdf2() (voir documentation),
  et le mot de passe ne devra pas apparaitre en clair dans la base de donnée.
  */
  public $password;
  public $admin;

  function __construct($id = 0, $nom = '', $prenom = '', $email = '',
   $adresse = '', $datecreation = '', $password = '', $admin = FALSE) {
    $this->id = $id;
    $this->nom = $nom;
    $this->prenom = $prenom;
    $this->email = $email;
    $this->adresse = $adresse;
    $this->datecreation = $datecreation;
    $this->password = $password;
    $this->admin = $admin;
  }
}
?>
