<?php
namespace App\Controllers;

use App\Core\App;
use Exception;

class PostController
{
    public function exibirPost()
    {
        return view('site/post-individual');
    }

}
?>