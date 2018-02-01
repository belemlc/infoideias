<?php

use Phalcon\Mvc\Model;

class Imovel extends Model
{
    /* Dica: Olhar Schema do Banco de dados para criar os atributos e relacionamentos corretamente */
    public $id;
    public $valor_venda;
    
    public function initialize()
    {
        $this->setSource("imovel");
        $this->belongsTo('tipo_imovel_id', 'TipoImovel', 'id', [
            'reusable' => true
        ]);
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getValorVenda()
    {
        return number_format($this->valor_venda, 2,'.', ',');
    }


}
