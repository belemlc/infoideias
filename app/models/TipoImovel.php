<?php 

use Phalcon\Mvc\Model;

class TipoImovel extends Model {
    
    public $id;
    public $nome;
    
    public function initalize() {
        $this->hasMany('id', 'Imovel', 'tipo_imovel_id');
    }
    
}