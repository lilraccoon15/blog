<?php

namespace App\Model\Repository;

use PDO;

class AdminRepository extends Repository
{
    public function findOne(string $pseudo)
    {
        $request = $this->db->prepare("SELECT * FROM admin WHERE pseudo = :pseudo");
        $request->bindParam("pseudo", $pseudo);
        $request->setFetchMode(PDO::FETCH_CLASS, Post::class);
        $request->execute();

        return $request->fetch();
    }
}
