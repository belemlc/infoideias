<?php

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\TextArea;
use Phalcon\Forms\Element\Radio;
use Phalcon\Forms\Element\File;
use Phalcon\Forms\Element\Select;
use Phalcon\Forms\Element\Check;

class ImovelForm extends Form
{

    public function initialize() {
        $this->create();
    }


    public function create() {

        $this->add(
            new Select("tipo_imovel", TipoImovel::find(), [
                "using" => ["id", "nome"]
            ])
        );
        $this->add(
            new Select("filial", Filial::find(), [
                "using" => ["id", "nome"]
            ])
        );

        $this->add(new Check("publicado"));
        $this->add(new Text("data_expiracao", ["disabled" => true]));

        $this->add(new Text("codigo"));
        $this->add(new Text("titulo_imovel"));
        $this->add(new TextArea("descricao"));
        $this->add(new Text("logradouro"));
        $this->add(new Select("bairro", Bairro::find(), [
            "useEmpty" => true,
            "emptyText" => "Selecione",
            "using" => ["id", "nome"]
        ]));
        $this->add(new Select("logradouro", [
            "" => "Selecione um Bairro"
        ]));
        $this->add(new Text("numero"));

        $venda = new Radio("venda", ["name" => "tipo_negocio", "value" => "V"]);
        $venda->setLabel("Venda");
        $aluguel = new Radio("aluguel", ["name" => "tipo_negocio", "value" => "A"]);
        $aluguel->setLabel("Aluguel");
        $this->add($venda);
        $this->add($aluguel);

        $this->add(new File('imovel_imagem'));

        $this->add(new Text("valor_venda"));
        $this->add(new Text("valor_aluguel"));

        $this->add(new Text("dormitorios"));
        $this->add(new Text('banheiros'));
        $this->add(new Text('area_terreno'));
        $this->add(new Text('vagas_garagem'));


    }

}