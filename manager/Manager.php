<?php
# Appelle le ficher 'BDD.php'
require_once 'BDD.php';
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

# Début classe Manager

class Manager {

# Connexion

  public function connexion(Utilisateur $user) {
    $bdd = new BDD();
    $req = $bdd->co_bdd()->prepare('SELECT * FROM user
      WHERE email = :email
      AND mdp = :mdp
    ');
    $req -> execute([
      'email' => $user->getEmail(),
      'mdp' => $user->getMdp()
    ]);
    $res = $req->fetch();

    if ($res) {
      $_SESSION['idUtil'] = $res['idUtil'];
      $_SESSION['nom'] = $res['nom'];
      $_SESSION['prenom'] = $res['prenom'];
      $_SESSION['email'] = $res['email'];
      $_SESSION['dateNaissance'] = $res['dateNaissance'];
      $_SESSION['departement'] = $res['departement'];
      header("Location: ../vue/Accueil.php");
    }

    else {
      header("Location: ../index.php");
      throw new Exception ("L'e-mail ou le mot de passe est incorrecte ou n'existe pas.");
    }
  }

# Déconnexion

  public function deconnexion(Utilisateur $user) {
    session_destroy();
    header("Location: ../vue/Connexion.php");
  }

# Inscription

  public function inscription(Utilisateur $user) {
    $bdd = new BDD();
    $req = $bdd -> co_bdd()->prepare('SELECT email FROM user
      WHERE email = :email
    ');
    $req -> execute([
      'email' => $user->getEmail()
    ]);
    $res = $req -> fetchall();

    if ($res) {
      header("Location: ../vue/Inscription.php");
      throw new Exception("Ce compte existe.");
    }

    else {
      $req = $bdd->co_bdd()->prepare('INSERT INTO user (email, mdp, nom, prenom, dateNaissance, departement)
        VALUES (:email, :mdp, :nom, :prenom, :dateNaissance, :departement)
      ');
      $res2 = $req->execute([
        'email' => $user->getEmail(),
        'mdp' => $user->getMdp(),
        'nom' => $user->getNom(),
        'prenom' => $user->getPrenom(),
        'dateNaissance' => $user->getDateNaissance(),
        'departement' => $user->getDepartement()
      ]);

      if ($res2) {
        header("Location: ../vue/Connexion.php");
      }

      else {
        header("Location: ../vue/Inscription.php");
        throw new Exception("Inscription échouée !");
      }
    }
  }
}
?>
