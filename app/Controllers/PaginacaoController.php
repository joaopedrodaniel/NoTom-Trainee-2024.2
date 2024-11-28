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
                return redirect('admin/posts?paginacaoNumero=1');
            }
        }

        $itensPage = 5;
        $inicio = $itensPage * $page - $itensPage;
        $rows_count = App::get('database')->countAll('posts');

        if ($inicio > $rows_count) {
            return redirect('admin/index');
        }

        $posts = App::get('database')->selectAll('posts');

        $total_pages = ceil($rows_count / $itensPage);

        return view('admin/posts', [
            'posts' => $posts,
            'page' => $page,
            'total_pages' => $total_pages
        ]);
    }
}
