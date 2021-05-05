<?php
require_once '../model/Utilisateur.php';
require_once '../manager/Manager.php';

#Vérifie si les mot de passes et emails sont identiques
if ($_POST['mdp'] === $_POST['mdpconfirm'] && $_POST['email'] === $_POST['emailconfirm']) {
  try {
    #Instancie la classe Utilisateur
    $mdp = $_POST['mdp'];
    $user = new Utilisateur([
      'nom' => $_POST['nom'],
      'prenom' => $_POST['prenom'],
      'mdp' => $_POST['mdp'],
      'email' => $_POST['email'],
      'rang' => 'USER',
      'idTarif' => '1'
    ]);
    #Instancie la classe Manager
    $manager = new Manager();
    #Lance la méthode inscription
    $manager->inscription($user);
    //$_SESSION['succes'] = $s->getMessage();
  }
  #Affiche un message d'erreur
  catch (Exception $e) {
    $_SESSION['erreur'] = 'Erreur : ' .$e->getMessage();
  }
}

#Affiche un message d'erreur
else {
  header("Location: ../vue/Inscription.php");
  echo 'Erreur : Les mots de passes ou e-mails ne sont pas identiques.';
}
?>
