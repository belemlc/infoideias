<?php

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\TextArea;
use Phalcon\Forms\Element\Radio;
use Phalcon\Forms\Element\File;
use Phalcon\Forms\Element\Select;
use Phalcon\Forms\Element\Check;
use Phalcon\Forms\Element\Hidden;

class ImovelForm extends Form
{

    public function initialize($imovel = null, $options = array()) {

        if (!isset($options['edit'])) {
            $element = new Text("id");
            $this->add($element->setLabel("Id"));
        } else {
            $this->add(new Hidden("id"));
        }

        $this->add(
            new Select("tipo_imovel", TipoImovel::find(), [
                "using" => ["id", "nome"],
                "value" => isset($imovel) ? $imovel->tipo_imovel_id : ''
            ])
        );

        $this->add(
            new Select("filial", Filial::find(), [
                "using" => ["id", "nome"],
                "value" => isset($imovel) ? $imovel->filial_id : ''
            ])
        );

        $this->add(new Check("publicado"));

        $attr_data = ["disabled" => true];
        if ($imovel) {
            $attr_data = [];
        }
        $this->add(new Text("data_expiracao", $attr_data));

        $this->add(new Text("codigo"));
        $this->add(new Text("titulo_imovel"));
        $this->add(new TextArea("descricao"));
        $this->add(new Select("bairro", Bairro::find(), [
            "useEmpty" => true,
            "emptyText" => "Selecione",
            "using" => ["id", "nome"],
            "value" => isset($imovel) ? $imovel->getLogradouro()->bairro_id : ''
        ]));
        if (isset($imovel)) {
            $bairro_id = "bairro_id = {$imovel->getLogradouro()->bairro_id}";
            $this->add(new Select("logradouro", Logradouro::find($bairro_id), [
                "using" => ["id", "nome"],
                "value" => $imovel->logradouro_id ?? ''
            ]));
        } else {
            $this->add(new Select("logradouro", [
                "" => "Selecione"
            ]));
        }

        $this->add(new Text("numero"));

        $attr_radio_venda = ["name" => "tipo_negocio", "value" => "V"];
        if (isset($imovel) && $imovel->tipo_negocio == 'V') {
            $attr_radio_venda["checked"] = true;
        }
        $venda = new Radio("venda", $attr_radio_venda);
        $venda->setLabel("Venda");

        $attr_radio_aluguel = ["name" => "tipo_negocio", "value" => "A"];
        if (isset($imovel) && $imovel->tipo_negocio == 'A') {
            $attr_radio_aluguel["checked"] = true;
        }
        $aluguel = new Radio("aluguel", $attr_radio_aluguel);
        $aluguel->setLabel("Aluguel");
        $this->add($venda);
        $this->add($aluguel);

        $this->add(new File('imovel_imagem'));

        $attr_valor_venda = [];
        if ($imovel && $imovel->valor_aluguel > 0) {
            $attr_valor_venda = ["readonly" => true];
        }
        $this->add(new Text("valor_venda", $attr_valor_venda));

        $attr_valor_aluguel = [];
        if ($imovel && $imovel->valor_venda > 0) {
            $attr_valor_aluguel = ["readonly" => true];
        }
        $this->add(new Text("valor_aluguel", $attr_valor_aluguel));

        $this->add(new Text("dormitorios"));
        $this->add(new Text('banheiros'));
        $this->add(new Text('area_terreno'));
        $this->add(new Text('vagas_garagem'));
    }


    public function create() {




    }

}