<?php

namespace App\Controllers;

use App\Core\App;
use Exception;

class PaginacaoController
{
    public function index()
    {

        $page = 1;
        if (isset($_GET['paginacaoNumero']) && !empty($_GET['paginacaoNumero'])) {
            $page = intval($_GET['paginacaoNumero']);

            if ($page <= 1) {
                return redirect('admin/posts');
            }
        }

        $itensPage = 8;
        $inicio = $itensPage * $page - $itensPage;
        $rows_count = App::get('database')->countAll('posts');



        if ($inicio >= $rows_count) {
            return redirect('admin/posts');
        }
        $posts = App::get('database')->selectAll('posts',$inicio, $itensPage);

        $total_pages = ceil($rows_count / $itensPage);

        return view('admin/lista-posts', compact('posts', 'page','total_pages'));
    }
}
