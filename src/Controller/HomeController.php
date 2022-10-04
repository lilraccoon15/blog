<?php

namespace App\Controller;

use App\Model\Repository\PostRepository;

class HomeController extends Controller
{
    public function index()
    {
        $repo = new PostRepository;
        $posts = $repo->findLasts();

        $data = compact("posts", $posts);

        $this->render("home/index", $data);
    }
}
