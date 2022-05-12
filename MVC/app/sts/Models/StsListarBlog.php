<?php

namespace Sts\Models;

use PDO;

class StsListarBlog
{
    public $Resultado;

    public function listar()
    {
        $listarArtigos = new \Sts\Models\Conn();
        $listarArtigos->getConn();

        $limit = 10;
        $result_artigos = "SELECT * FROM artigos LIMIT :limit";
        $resultado_artigos = $listarArtigos->getConn()->prepare($result_artigos);
        $resultado_artigos->bindParam(':limit', $limit, \PDO::PARAM_INT);
        $resultado_artigos->execute();

        $this->Resultado['artigos'] = $resultado_artigos->fetchAll();

        return $this->Resultado;
        //var_dump($this->Resultado);
    }
}
