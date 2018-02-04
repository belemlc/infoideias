<?php

use Phalcon\Mvc\Model;

class Logradouro extends Model
{

    public $id;
    public $bairro;
    public $tipo;
    public $nome;

    public function initialize() {
        $this->setSource('logradouro');
        $this->belongsTo('bairro_id', 'Bairro', 'id');
        $this->hasMany('id', 'Imovel', 'logradouro_id');
    }

    public function getBairro() {
        return $this->getRelated('Bairro');
    }

    public function setBairro($bairro) {
        $this->__set('Bairro', $bairro);
        return $this;
    }

    public function getTipo() {
        return $this->tipo;
    }

    public function setTipo($tipo) {
        $_logradouro = explode(' ', $tipo);
        $_tipo = $_logradouro[0];
        $this->tipo =  $_tipo;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $_logradouro = explode(' ', $nome);
        array_shift($_logradouro);
        $_nome = implode(' ', $_logradouro);
        $this->nome = $_nome;
    }

}