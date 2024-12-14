<?php
namespace App\Controllers;

use App\Core\App;
use Exception;

class landingController
{
    public function index()
    {
        $posts = App::get('database')->selectAll('posts');
        
        $usuarios = App::get('database')->selectAll('usuarios');
        
        return view('site/index', compact('posts', 'usuarios'));
    }
}
?>  