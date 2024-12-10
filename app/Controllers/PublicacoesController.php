<?php

namespace App\Controllers;

use App\Core\App;
use Exception;

class PublicacoesController
{
    public function publicacoes()
    {
        return view('site/lista-posts');
    }
}

?>