<?php

use Phalcon\Mvc\Model;

class Bairro extends Model
{

    public $id;
    public $nomel;

    public function initialize() {
        $this->setSource('bairro');
        $this->hasMany('id', 'Logradouro', 'bairro_id');
    }

    public function getNomel() {
        return $this->nomel;
    }

    public function setNomel($nomel) {
        $this->nomel = $nomel;
    }

}