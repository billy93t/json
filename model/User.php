<?php
class Utilisateur{
  private $id, $nom, $prenom, $email, $mdp, $dateNaissance, $departement;

  public function __construct($donnees){
    $this->hydrate($donnees);
  }

  public function getId() {
    return $this->id;
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

  public function getDateNaissance() {
    return $this->$dateNaissance;
  }

  public function getDepartement() {
    return $this->departement;
  }

  public function setId($id) {
    $this->id = $id;
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

  public function setDateNaissance($dateNaissance) {
    $this->$dateNaissance = $dateNaissance;
  }

  public function setDepartement($departement) {
    $this->departement = $departement;
  }

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
