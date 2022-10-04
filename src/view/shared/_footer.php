<?php

use App\Controller\AdminController;

$adminController = new AdminController();

?>

<a href="/admin">Panneau d'administration</a>

<?php if($this->adminConnected()) : ?>
    <a href="/admin/disconnect">Se déconnecter</a>
<?php endif;?>