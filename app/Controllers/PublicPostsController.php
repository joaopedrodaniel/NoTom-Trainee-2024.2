<?php

namespace App\Controllers;

use App\Core\App;
use Exception;

class PublicPostsController
{


    public function index()
    {
        $_posts = App::get('database')->selectAll('posts');

        return view('site/lista-posts', compact('_posts'));
    }

}