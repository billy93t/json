<?php
require_once '../model/User.php';
require_once '../manager/Manager.php';

$a = new Utilisateur([
  'email' => $_POST['email']
]);
$b = new Manager();
$b->deconnexion($a);
?>
