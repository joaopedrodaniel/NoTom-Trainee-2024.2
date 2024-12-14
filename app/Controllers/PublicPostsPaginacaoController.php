<?php

namespace App\Controllers;

use App\Core\App;
use Exception;

class PublicPostsPaginacaoController
{
    public function index()
    {

        $page = 1;
        if (isset($_GET['paginacaoNumero']) && !empty($_GET['paginacaoNumero'])) {
            $page = intval($_GET['paginacaoNumero']);

            if ($page <= 1) {
                return redirect('posts');
            }
        }

        $itensPage = 5;
        $inicio = $itensPage * $page - $itensPage;
        $rows_count = App::get('database')->countAll('posts');



        if ($inicio >= $rows_count) {
            return redirect('posts');
        }
        $posts = App::get('database')->selectAll('posts',$inicio, $itensPage);

        $total_pages = ceil($rows_count / $itensPage);

        return view('site/lista-posts', compact('posts', 'page','total_pages'));
    }


    public function search()
    {

        $page = 1;
        if (isset($_GET['paginacaoNumero']) && !empty($_GET['paginacaoNumero'])) {
            $page = intval($_GET['paginacaoNumero']);

            if ($page <= 1) {
                return redirect('posts');
            }
        }

        $itensPage = 5;
        $inicio = $itensPage * $page - $itensPage;
        $rows_count = App::get('database')->countAll('posts');



        if ($inicio >= $rows_count) {
            return redirect('posts');
        }
        $posts = App::get('database')->selectAll('posts',$inicio, $itensPage);

        $total_pages = ceil($rows_count / $itensPage);

        
        if (isset($_GET['search'])) {
            $posts = App::get('database')->selectAllWithSearch('posts', 'titulo', $_GET['search']);
        } else {
            $posts = App::get('database')->selectAll('posts');
        }

        
        return view('site/lista-posts', compact('posts', 'page','total_pages'));
    }

}


