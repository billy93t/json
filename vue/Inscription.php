<?php
?>

<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Inscription</title>
  </head>
  <body>
    <h1>Inscrivez-vous !</h1>
    <hr>
    <form
      <div>
        <div>
          <input type="text" name="nom" placeholder="Nom" required>
        </div>
        <div>
          <input type="text" name="prenom" placeholder="Prénom" required>
        </div>
        <div>
          <input type="date" name="dateNaissance" placeholder="Date de naissance" required>
        </div>
        <div>
          <input type="email" name="email" placeholder="E-mail" required>
        </div>
        <div>
          <input type="password" name="mdp" placeholder="Mot de passe" required>
        </div>
      </div>
      <div>
        <input type="submit" value="S'inscrire" />
      </div>
    </form>
    <div>
<!-- PHP : Message d'erreur de modification -->
      <?php if (isset($_SESSION['erreur'])) { echo $_SESSION['erreur']; }?>
    </div>
  </body>
</html>
