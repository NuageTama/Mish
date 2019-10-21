<?php
class Produit {
  public $id;
  public $nom;
  public $info;
  public $prix;
  public $categorie;
  public $image; //Chemin relatif vers la ressource avec extension (.png/.jpg)

  function __construct(int $id = 0, string $nom = '', string $info = '', int $prix = 0, string $categorie = '', string $image = '') {
    $this->id = $id;
    $this->nom = $nom;
    $this->info = $info;
    $this->prix = $prix;
    $this->categorie = $categorie;
    $this->image = $image;
  }
}
?>
