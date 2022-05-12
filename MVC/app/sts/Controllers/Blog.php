<?php

namespace Sts\Controllers;

require './app/sts/core/ConfigController.php';

class Blog
{
    public $Dados;

    public function index()
    {
        //echo "Controller blog";

        $listarArtigo =  new \Sts\Models\StsListarBlog();
        $this->Dados = $listarArtigo->listar();
        //var_dump($this->Dados);

        $carregarView = new \Core\ConfigView("sts/Views/blog/listarArtigo", $this->Dados);
        $carregarView->renderizar();
    }
}
