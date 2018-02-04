<?php 

use Phalcon\Mvc\Model;

class TipoImovel extends Model {
    
    public $id;
    public $nome;
    
    public function initalize() {
        $this->setSource('tipo_imovel');
        $this->hasMany('id', 'Imovel', 'tipo_imovel_id');
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }


    
}