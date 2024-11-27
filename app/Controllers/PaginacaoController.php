<?php

namespace App\Controllers;

use App\Core\App;
use Exception;

class ExampleController
{
    public function index()
    {

        $page = 1;

        if (isset($_GET['paginacaoNumero']) && !empty($_GET['paginacaoNumero'])) {
            $page = intval($_GET['paginacaoNumero']);

            if ($page <= 0) {
                return redirect('admin/lista-posts');
            }
        }

        $itensPage = 5;
        $inicio = $itensPage * $page - $itensPage;
        $colunasConta = App::get('database')->countAll('posts');


        if ($inicio > $colunasConta) {
            return redirect('admin/lista-posts');
        }

        $posts = App::get('database')->selectAll('posts', $inicio, $itensPage);

        $total_pages = ceil($colunasConta/$itensPage);
       
        return view('admin/posts', ['posts' => $posts, 'page' => $page, 'total_pages' => $total_pages]);

    }
}