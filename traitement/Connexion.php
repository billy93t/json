<?php
require_once '../model/User.php';
require_once '../manager/Manager.php';

try {
  $user = new Utilisateur([
    'email' => $_POST['email'],
    'mdp' => $_POST['mdp']
  ]);
  $manager = new Manager();
  $manager->connexion($user);
}

catch (Exception $e) {
  $_SESSION['erreur'] = 'Erreur : ' .$e->getMessage();
}
?>
