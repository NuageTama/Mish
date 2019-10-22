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
}
?>
