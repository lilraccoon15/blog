<?php

use App\Controller\AdminController;

$errorPseudo = $error["pseudo"] ?? null;
$errorPassword = $error["password"] ?? null;
$errorAdmin = $error["admin"] ?? null;
$errorVerif = $error["verif"] ?? null;
$adminController = new AdminController();

?>

Panneau d'administration

<?php if($this->adminConnected()) : ?>
    lalala
<?php else :?>


    <form action="/admin/index" method="post">
        <label for="pseudo">Identifiant :</label>
        <input type="text" name="pseudo" placeholder="Votre identifiant" maxlength="256" required>
        <p><?= $errorPseudo ?></p>
        <p><?= $errorAdmin ?></p>
        <label for="password">Mot de passe :</label>
        <input type="password" name="password" placeholder="Votre mot de passe" maxlength="256" required>
        <p><?= $errorPassword ?></p>
        <p><?= $errorVerif ?></p>

        <button type="submit" value="submit">Envoyer</button>
        <button type="reset" value="submit">Annuler</button>

    </form>

<?php endif; ?>
