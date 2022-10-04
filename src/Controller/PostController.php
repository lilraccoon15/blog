<?php

namespace App\Controller;

use App\Model\Repository\PostRepository;

class PostController extends Controller
{
    public function index()
    {
        $repo = new PostRepository;
        $posts = $repo->findAll();

        $data = compact("posts", $posts);

        $this->render("post/index", $data);
    }

    public function show()
    {
        $repo = new PostRepository;
        $post = $repo->findOne($_GET["id"]);

        $data = compact("post", $post);

        $this->render("post/show", $data);
    }
}
