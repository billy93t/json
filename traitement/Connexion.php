<?php
require_once '../model/Utilisateur.php';
require_once '../manager/Manager.php';

try {
  #Instancie la classe Utilisateur
  $user = new Utilisateur([
    'email' => $_POST['email'],
    'mdp' => $_POST['mdp']
  ]);
  #Instancie la classe Manager
  $manager = new Manager();
  #Lance la méthode connexion
  $manager->connexion($user);
}

#Affiche un message d'erreur
catch (Exception $e) {
  $_SESSION['erreur'] = 'Erreur : ' .$e->getMessage();
}
?>
