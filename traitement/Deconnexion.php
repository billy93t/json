<?php
require_once '../model/Utilisateur.php';
require_once '../manager/Manager.php';

#Instancie la classe Utilisateur
$a = new Utilisateur([
  'email' => $_POST['email']
]);
#Instancie la classe Manager
$b = new Manager();
#Lance la méthode deconnection
$b->deconnexion($a);
?>
