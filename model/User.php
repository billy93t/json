<?php
class Utilisateur{
  private $idUtil, $nom, $prenom, $email, $mdp, $rang, $placeRes, $sommeTarif;

  public function __construct($donnees){
    $this->hydrate($donnees);
  }

# Getters

  public function getIdUtil() {
    return $this->idUtil;
  }

  public function getEmail() {
    return $this->email;
  }

  public function getMdp() {
    return $this->mdp;
  }

  public function getNom() {
    return $this->nom;
  }

  public function getPrenom() {
    return $this->prenom;
  }

  public function getRang() {
    return $this->rang;
  }

  public function getPlaceRes() {
    return $this->placeRes;
  }

  public function getSommeTarif() {
    return $this->sommeTarif;
  }

# Setters

  public function setIdUtil($idUtil) {
    $this->idUtil = $idUtil;
  }

  public function setEmail($email) {
    if (is_string($email)) {
      $this->email = $email;
    }
  }

  public function setMdp($mdp) {
    if (is_string($mdp)) {
      $this->mdp = $mdp;
    }
  }

  public function setNom($nom) {
    if (is_string($nom)) {
      $this->nom = $nom;
    }
  }

  public function setPrenom($prenom) {
    if (is_string($prenom)) {
      $this->prenom = $prenom;
    }
  }

  public function setRang($rang) {
    if (is_string($rang)) {
      $this->rang = $rang;
    }
  }

  public function setSommeTarif($sommeTarif) {
    $this->sommeTarif = $sommeTarif;
  }

  public function setPlaceRes($placeRes) {
    $this->placeRes = $placeRes;
  }

# Hydratation

  public function hydrate(array $res) {
    foreach ($res as $key => $value) {
      $method = 'set'.ucfirst($key);
      if (method_exists($this, $method)) {
        $this->$method($value);
      }
    }
  }
}
?>
