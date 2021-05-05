<?php
require_once '../model/User.php';
require_once '../manager/Manager.php';

try {
  $mdp = $_POST['mdp'];
  $user = new Utilisateur([
    'nom' => $_POST['nom'],
    'prenom' => $_POST['prenom'],
    'mdp' => $_POST['mdp'],
    'email' => $_POST['email'],
    'dateNaissance' => $_POST['dateNaissance'],
    'departement' => $_POST['departement'],
  ]);
  $manager = new Manager();
  $manager->inscription($user);
}

catch (Exception $e) {
  $_SESSION['erreur'] = 'Erreur : ' .$e->getMessage();
}
?>
