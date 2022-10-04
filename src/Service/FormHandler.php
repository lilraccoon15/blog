<?php

namespace App\Service;

class FormHandler
{
    public function isValidAdminForm(array $form)
    {
        $error = [];

        if(strlen($form["pseudo"]) > 256)
        {
            $error["pseudo"] = "Votre identifiant doit faire maximum 256 caractères.";
        }

        if(strlen($form["password"]) > 256)
        {
            $error["pseudo"] = "Votre mot de passe doit faire maximum 256 caractères.";
        }

        if(!isset($form["pseudo"]) || empty($form["pseudo"]))
        {
            $error["pseudo"] = "Vous devez renseigner un identifiant.";
        }

        if(!isset($form["password"]) || empty($form["password"]))
        {
            $error["password"] = "Vous devez renseigner un mot de passe.";
        }

        return $error;
    }

    public function isValidAdmin(array $post, array $admin)
    {
        $error = [];
        $verifPassword = password_verify($post["password"], $admin["password"]);

        if(!$verifPassword)
        {
            $error["verif"] = "Le mot de passe renseigné est incorrect.";
        }

        return $error;
    }
}
