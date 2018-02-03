<?php

use Phalcon\Mvc\Model;

class Imovel extends Model
{
    /* Dica: Olhar Schema do Banco de dados para criar os atributos e relacionamentos corretamente */
    public $id;
    public $codigo;
    public $tipo_imovel_id;
    public $filial_id;
    public $logradouro_id;
    public $numero;
    public $tipo_negocio;
    public $valor_venda;
    public $valor_aluguel;
    public $dormitorios;
    public $area_terreno;
    public $vagas_garagem;
    public $titulo_imovel;
    public $descricao;
    public $cep;
    
    public function initialize() {
        $this->setSource("imovel");
        $this->belongsTo(
            'tipo_imovel_id',
            'TipoImovel', 'id',
            ['reusable' => true]
        );
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getCodigo() {
        return $this->codigo;
    }

    public function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    public function getTipoImovelId() {
        return $this->tipo_imovel_id;
    }

    public function setTipoImovelId($tipo_imovel_id) {
        $this->tipo_imovel_id = $tipo_imovel_id;
    }

    public function getFilialId() {
        return $this->filial_id;
    }

    public function setFilialId($filial_id) {
        $this->filial_id = $filial_id;
    }

    public function getLogradouroId() {
        return $this->logradouro_id;
    }

    public function setLogradouroId($logradouro_id) {
        $this->logradouro_id = $logradouro_id;
    }

    public function getNumero() {
        return $this->numero;
    }

    public function setNumero($numero) {
        $this->numero = $numero;
    }

    public function getTipoNegocio() {
        return $this->tipo_negocio;
    }

    public function setTipoNegocio($tipo_negocio) {
        $this->tipo_negocio = $tipo_negocio;
    }

    public function getValorAluguel() {
        return $this->valor_aluguel;
    }

    public function setValorAluguel($valor_aluguel) {
        $this->valor_aluguel = $valor_aluguel;
    }

    public function getDormitorios() {
        return $this->dormitorios;
    }

    public function setDormitorios($dormitorios) {
        $this->dormitorios = $dormitorios;
    }

    public function getAreaTerreno() {
        return $this->area_terreno;
    }

    public function setAreaTerreno($area_terreno) {
        $this->area_terreno = $area_terreno;
    }

    public function getVagasGaragem() {
        return $this->vagas_garagem;
    }

    public function setVagasGaragem($vagas_garagem) {
        $this->vagas_garagem = $vagas_garagem;
    }

    public function getTituloImovel() {
        return $this->titulo_imovel;
    }

    public function setTituloImovel($titulo_imovel) {
        $this->titulo_imovel = $titulo_imovel;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    public function getCep() {
        return $this->cep;
    }

    public function setCep($cep) {
        $this->cep = $cep;
    }

    public function getValorVenda() {
        return number_format($this->valor_venda, 2,'.', ',');
    }


}
