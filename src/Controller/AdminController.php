<?php 

namespace App\Controller;

use App\Model\Repository\AdminRepository;
use App\Service\FormHandler;

class AdminController extends Controller
{
    public function adminConnected()
    {
        if(isset($_SESSION["admin"]))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function index(): void
    {
        if(!$_POST)
        {
            $this->render("admin/index");
            return;
        }

        $formHandler = new FormHandler;
        $error = $formHandler->isValidAdminForm($_POST);
        $repo = new AdminRepository;
        $admin = $repo->findOne($_POST["pseudo"]);

        if(!$admin)
        {
            $error["admin"] = "L'identifiant renseigné n'existe pas.";
            $this->render("admin/index", compact("error"));
            exit();
        }

        $error = $formHandler->isValidAdmin($_POST, $admin);

        if(!$error)
        {
            $_SESSION["admin"]["pseudo"] = $admin["pseudo"];
            $_SESSION["admin"]["id"] = $admin["id"];
            header("Location: index");
        }
        
        $this->render("admin/index", compact("error"));
    }

    public function disconnect()
    {
        session_destroy();

        header("Location: index");
        exit();
    }
}