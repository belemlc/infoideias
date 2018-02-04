<?php

use Phalcon\Mvc\Model;

class Filial extends Model
{

    public $id;
    public $nome;

    public function initialize() {
        $this->setSource('filial');
        $this->hasMany('id', 'Imovel', 'filial_id');
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }



}