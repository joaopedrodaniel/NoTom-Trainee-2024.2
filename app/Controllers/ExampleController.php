<?php

namespace App\Controllers;

use App\Core\App;
use Exception;

class ExampleController
{
    public function header()
    {
        return view('site/header');
    }
    
    public function publicacoes()
    {
        return view('site/lista-posts');
    }
}




?>