{% extends "layouts/template.volt" %}

{% block content %}

<style type="text/css">
    .nav-tabs.no-border {
        border-bottom: 0 !important;
    }
</style>
<div class="container">
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i></a></li>
        <li><a href="#">Imovel</a></li>
        <li class="active">Adicionar</li>
    </ol>
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="row">
                <div class="col-xs-12 text-left">
                    <strong>Adicionar Imovel</strong>
                </div>
            </div>
        </div>
        <div class="panel-body">
            <form action="" method="post">
                <div class="row">
                    <div class="col-xs-12">
                        <div>
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs no-border" role="tablist">
                                <li role="presentation" class="active"><a href="#dados_basicos"
                                                                          aria-controls="dados_basicos" role="tab"
                                                                          data-toggle="tab">Dados Básicos</a></li>
                                <li role="presentation"><a href="#localizacao" aria-controls="localizacao" role="tab"
                                                           data-toggle="tab">Localização</a></li>
                                <li role="presentation"><a href="#valores" aria-controls="valores" role="tab"
                                                           data-toggle="tab">Valores</a></li>
                                <li role="presentation"><a href="#imagens" aria-controls="imagens" role="tab"
                                                           data-toggle="tab">Imagens</a></li>
                                <li role="presentation"><a href="#detalhes" aria-controls="detalhes" role="tab"
                                                           data-toggle="tab">Detalhes</a></li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="dados_basicos">
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-sm-2 col-md-2">
                                                    <div class="form-group">
                                                        <label for="">Tipo Imovel</label>
                                                        <select name="tipo_imovel" id="" class="form-control">
                                                            <option value="">Selecione</option>
                                                            {% for tipo in tipos %}
                                                            <option value="{{tipo.id}}">{{tipo.nome}}</option>
                                                            {% endFor %}
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="cold-sm-2 col-md-2">
                                                    <div class="form-group">
                                                        <label for="">Filial</label>
                                                        <select name="filial" class="form-control">
                                                            <option value="">Selecione</option>
                                                            {% for filial in filiais %}
                                                            <option value="{{filial.id}}">{{filial.nome}}</option>
                                                            {% endFor %}
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="cold-sm-2 col-md-2">
                                                    <div class="form-group">
                                                        <label for="">Código</label>
                                                        <input type="text" name="codigo" class="form-control" placeholder="Código">
                                                    </div>
                                                </div>
                                                <div class="cold-sm-6 col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Título do Imóvel</label>
                                                        <input type="text" name="titulo" class="form-control" placeholder="Informe uma Título">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="cold-sm-12 col-md-12">
                                                    <div class="form-group">
                                                        <label for="">Descrição do Imóvel</label>
                                                        <textarea name="descricao" rows="3" class="form-control"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--Código, tipo de imovel, filial, etc..-->
                                        </div>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="localizacao">
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="cold-sm-2 col-md-2">
                                                    <div class="form-group">
                                                        <label for="">Cep</label>
                                                        <input name="cep" type="text" class="form-control cep" placeholder="Cep">
                                                    </div>
                                                </div>
                                                <div class="cold-sm-4 col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Logradouro</label>
                                                        <input type="text" name="logradouro" id="logradouro" class="form-control" placeholder="Logradouro">
                                                    </div>
                                                </div>
                                                <div class="cold-sm-3 col-md-3">
                                                    <div class="form-group">
                                                        <label for="">Bairro</label>
                                                        <input type="text" name="bairro" id="bairro" class="form-control" placeholder="Bairro">
                                                    </div>
                                                </div>
                                                <div class="cold-sm-1 col-md-1">
                                                    <div class="form-group">
                                                        <label for="">Número</label>
                                                        <input type="text" name="numero" id="numero" class="form-control" placeholder="Nº">
                                                    </div>
                                                </div>
                                                <div class="cold-sm-2 col-md-2">
                                                    <div class="form-group">
                                                        <label for="">Complemento</label>
                                                        <input type="text" class="form-control" placeholder="Complemento">
                                                    </div>
                                                </div>
                                            </div>
                                            <!--logradouro, bairro, numero...-->
                                        </div>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="valores">
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-sm-3 col-md-3">
                                                    <label for="">Tipo de Venda</label>
                                                    <div class="form-group">
                                                        <label class="radio-inline">
                                                            <input type="radio" name="tipo_negocio" value="venda"> Venda
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="tipo_negocio" value="aluguel"> Aluguel
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-3 col-md-3">
                                                    <div class="form-group">
                                                    <span id="ipt-venda" style="display: none">
                                                        <label for="">Valor do Venda</label>
                                                        <input type="text" class="form-control" placeholder="R$0,00">
                                                    </span>
                                                        <span id="ipt-aluguel" style="display: none">
                                                        <label for="">Valor da Aluguel</label>
                                                        <input type="text" class="form-control" placeholder="R$0,00">
                                                    </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--Qual o tipo do negocio (venda, aluguel) (Deve ser input Radio), valores.-->
                                        </div>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="imagens">
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            <div class="photo-upload"></div>
                                            <!--Colocar aqui o Upload da imagem *validação de formato, jpg/jpeg e png apenas.-->
                                            <div class="clone"></div>
                                        </div>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="detalhes">
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-sm-2 col-md-2">
                                                    <div class="form-group">
                                                        <label for="">Qtd. de Dormitórios</label>
                                                        <input type="number" name="" class="form-control"
                                                               placeholder="Quantidade"/>
                                                    </div>
                                                </div>
                                                <div class="col-sm-2 col-md-2">
                                                    <div class="form-group">
                                                        <label for="">Qtd. de Banheiros</label>
                                                        <input type="number" name="" class="form-control"
                                                               placeholder="Quantidade"/>
                                                    </div>
                                                </div>
                                                <div class="col-sm-2 col-md-2">
                                                    <div class="form-group">
                                                        <label for="">Área do Terreno (m2)</label>
                                                        <input type="number" name="" class="form-control"
                                                               placeholder="Área do Terreno"/>
                                                    </div>
                                                </div>
                                                <div class="col-sm-2 col-md-2">
                                                    <div class="form-group">
                                                        <label for="">Vagas na Garagem</label>
                                                        <input type="number" name="" class="form-control"
                                                               placeholder="Vagas na Garagem"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--Qtd de quartos, metragem, etc...-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <div class="text-right">
                            <a href="#" value="Cancelar" class="btn btn-default"><i class="fa fa-close"></i> Cancelar</a>
                            <button type="submit" class="btn btn-success"><i class="fa fa-plus"></i> Salvar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
{% endblock %}
