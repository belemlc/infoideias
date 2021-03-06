<?php

use Phalcon\Mvc\Model;
use Phalcon\Mvc\Model\Relation;

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
    public $banheiros;
    public $vagas_garagem;
    public $titulo_imovel;
    public $descricao;
    public $publicado;
    public $data_expiracao;
    
    public function initialize() {
        $this->setSource("imovel");
        $this->belongsTo('tipo_imovel_id','TipoImovel', 'id');
        $this->belongsTo('filial_id', 'Filial', 'id');
        $this->belongsTo('logradouro_id', 'Logradouro', 'id');
        $this->hasMany("id", "ImovelImagem", "imovel_id", [
            "foreignKey" => [
                "action" => Relation::ACTION_CASCADE,
            ]
        ]);

    }

    public function getId() {
        return $this->id;
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

    public function setTipoImovelId($tipo_imovel) {
        $this->tipo_imovel_id = $tipo_imovel;
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
        $this->numero = (float) $numero;
    }

    public function getTipoNegocio() {
        return $this->tipo_negocio;
    }

    public function setTipoNegocio($tipo_negocio) {
        $this->tipo_negocio = $tipo_negocio;
    }

    public function getValorAluguel() {
        return $this->formataMoeda($this->valor_aluguel);
    }

    public function setValorAluguel($valor_aluguel) {
        $this->valor_aluguel =  $this->formataMoeda($valor_aluguel, true);
    }

    public function getValorVenda() {
        return $this->formataMoeda($this->valor_venda);
    }

    public function setValorVenda($valor_venda) {
        $this->valor_venda =  $this->formataMoeda($valor_venda, true);
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

    public function getBanheiros() {
        return $this->banheiros;
    }

    public function setBanheiros($banheiros) {
        $this->banheiros = $banheiros;
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

    public function getPublicado() {
        return $this->publicado;
    }

    public function setPublicado($publicado) {
        $this->publicado = ($publicado) ? 'S' : 'N';
    }

    public function getDataExpiracao() {
        return !empty($this->data_expiracao) ? date('d/m/Y', strtotime($this->data_expiracao)) : null;
    }

    public function setDataExpiracao($data_expiracao) {
        $this->data_expiracao = implode('-', array_reverse(explode('/', $data_expiracao)));
    }

    private function formataMoeda($valor, $float = false) {
        if ($float) {
            $search = array('.', ',');
            $replace = array('', '.');
            return str_replace($search, $replace, $valor);
        }
        return number_format($valor, 2,',', '.');
    }

    /**
     * Pega uma imagem e reduz sua qualidade para ocupar menos espaço
     *
     * @param $imagem
     * @param string $type
     * @param int $qualidade
     */
    public function ajustaImageToUpload($imagem, $type = 'jpg', $qualidade = 60) {

        switch ($type) {
            case 'jpeg':
                $source_image = imagecreatefromjpeg($imagem);
                $source_imagex = imagesx($source_image);
                $source_imagey = imagesy($source_image);
                $dest_image = imagecreatetruecolor($source_imagex, $source_imagey);
                imagecopyresampled($dest_image, $source_image, 0, 0, 0, 0, $source_imagex,
                    $source_imagey, $source_imagex, $source_imagey);
                imagejpeg($dest_image, $imagem, $qualidade);
                break;
            case 'png':
                $source_image = imagecreatefrompng($imagem);
                $source_imagex = imagesx($source_image);
                $source_imagey = imagesy($source_image);
                $dest_image = imagecreatetruecolor($source_imagex, $source_imagey);
                imagecopyresampled($dest_image, $source_image, 0, 0, 0, 0, $source_imagex,
                    $source_imagey, $source_imagex, $source_imagey);
                imagepng($dest_image, $imagem, $qualidade);
                break;
            case 'gif':
                $source_image = imagecreatefromgif($imagem);
                $source_imagex = imagesx($source_image);
                $source_imagey = imagesy($source_image);
                $dest_image = imagecreatetruecolor($source_imagex, $source_imagey);
                imagecopyresampled($dest_image, $source_image, 0, 0, 0, 0, $source_imagex,
                    $source_imagey, $source_imagex, $source_imagey);
                imagegif($dest_image, $imagem, $qualidade);
                break;
            default:
                $source_image = imagecreatefromjpeg($imagem);
                $source_imagex = imagesx($source_image);
                $source_imagey = imagesy($source_image);
                $dest_image = imagecreatetruecolor($source_imagex, $source_imagey);
                imagecopyresampled($dest_image, $source_image, 0, 0, 0, 0, $source_imagex,
                    $source_imagey, $source_imagex, $source_imagey);
                imagejpeg($dest_image, $imagem, $qualidade);
                break;
        }
    }
}
