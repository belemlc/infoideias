<?php

use Phalcon\Mvc\Model;

class Logradouro extends Model
{

    public $id;
    public $bairro_id;
    public $tipo;
    public $nome;

    public function initialize() {
        $this->setSource('logradouro');
    }

    public function getBairroId() {
        return $this->bairro_id;
    }

    public function setBairroId($bairro_id) {
        $this->bairro_id = $bairro_id;
    }

    public function getTipo() {
        return $this->tipo;
    }

    public function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }



}