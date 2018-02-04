{% extends "layouts/template.volt" %}

{% block content %}

<div class="container">
    <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-home"></i></a></li>
        <li><a href="/imoveis">Imoveis</a></li>
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
            <!--<form action="save" method="post">-->
            {{ form('imoveis/save', 'role': 'form') }}
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
                                                <div class="col-sm-4 col-md-4">
                                                    <div class="form-group">
                                                        <div class="checkbox">
                                                            <label>
                                                                {{ form.render('publicado', ['class': 'publicado']) }} Publicado
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-2 col-md-2">
                                                    <div class="form-group">
                                                        <label for="">Tipo Imovel</label>
                                                        {{ form.render('tipo_imovel', ['class': 'form-control tipo-imovel']) }}
                                                    </div>
                                                </div>
                                                <div class="cold-sm-2 col-md-2">
                                                    <div class="form-group">
                                                        <label for="">Filial</label>
                                                        {{ form.render('filial', ['class': 'form-control filial']) }}
                                                    </div>
                                                </div>
                                                <div class="cold-sm-2 col-md-2">
                                                    <div class="form-group">
                                                        <label for="">Código</label>
                                                        {{ form.render('codigo', ['class': 'form-control codigo', 'placeholder': 'Código' ,'autocomplete': 'off']) }}
                                                        <small id="codigo-help-block" class="help-block" style="display: none;">Código já cadastrado</small>
                                                    </div>
                                                </div>
                                                <div class="cold-sm-4 col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Título do Imóvel</label>
                                                        {{ form.render('titulo_imovel', ['class': 'form-control', 'placeholder': 'Título']) }}
                                                    </div>
                                                </div>
                                                <div class="cold-sm-2 col-md-2">
                                                    <label>Expira em</label>
                                                    <div class="input-group">
                                                        {{ form.render('data_expiracao', ['class': 'form-control data_expiracao', 'placeholder': '__/__/____']) }}
                                                        <div class="input-group-addon">
                                                            <span class="fa fa-calendar"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="cold-sm-12 col-md-12">
                                                    <div class="form-group">
                                                        <label for="">Descrição do Imóvel</label>
                                                        {{ form.render('descricao', ['rows': '3','class': 'form-control']) }}
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
                                                <div class="cold-sm-4 col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Bairro</label>
                                                        {{ form.render('bairro', ['class': 'form-control bairro']) }}
                                                    </div>
                                                </div>
                                                <div class="cold-sm-5 col-md-5">
                                                    <div class="form-group">
                                                        <label for="">Logradouro</label>
                                                        {{ form.render('logradouro', ['class': 'form-control logradouro']) }}
                                                    </div>
                                                </div>
                                                <div class="cold-sm-3 col-md-3">
                                                    <div class="form-group">
                                                        <label for="">Número</label>
                                                        {{ form.render('numero', ['class': 'form-control', 'placeholder': 'Nº']) }}
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
                                                        {{ form.render('venda') }}
                                                        {{ form.label('venda')}}
                                                        &nbsp;&nbsp;
                                                        {{ form.render('aluguel')}}
                                                        {{form.label('aluguel')}}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-3 col-md-3">
                                                    <div class="form-group">
                                                        <label for="">Valor do Venda</label>
                                                        {{ form.render('valor_venda', ['class': 'form-control money', 'placeholder': 'R$0,00']) }}
                                                    </div>
                                                </div>
                                                <div class="col-sm-3 col-md-3">
                                                    <div class="form-group">
                                                        <label for="">Valor da Aluguel</label>
                                                        {{ form.render('valor_aluguel', ['class': 'form-control money', 'placeholder': 'R$0,00']) }}
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
                                            <div class="form-group">
                                                <label>Foto do Imóvel</label>
                                                {{ form.render('imovel_imagem') }}
                                            </div>
                                            <!--Colocar aqui o Upload da imagem *validação de formato, jpg/jpeg e png apenas.-->
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
                                                        {{ form.render('dormitorios', ['type': 'number', 'class': 'form-control', 'placeholder': 'Quantidade']) }}
                                                    </div>
                                                </div>
                                                <div class="col-sm-2 col-md-2">
                                                    <div class="form-group">
                                                        <label for="">Qtd. de Banheiros</label>
                                                        {{ form.render('banheiros', ['class': 'form-control', 'placeholder': 'Qunatidade']) }}
                                                    </div>
                                                </div>
                                                <div class="col-sm-2 col-md-2">
                                                    <div class="form-group">
                                                        <label for="">Área do Terreno (m2)</label>
                                                        {{ form.render('area_terreno', ['class': 'form-control', 'placeholder': 'Área do Terreno']) }}
                                                    </div>
                                                </div>
                                                <div class="col-sm-2 col-md-2">
                                                    <div class="form-group">
                                                        <label for="">Vagas na Garagem</label>
                                                        {{ form.render('vagas_garagem', ['class': 'form-control', 'placeholder': 'Vagas na Garagem']) }}
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
                            <a href="/imoveis" value="Cancelar" class="btn btn-default"><i class="fa fa-close"></i> Cancelar</a>
                            <button type="submit" class="btn btn-success"><i class="fa fa-plus"></i> Salvar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
{% endblock %}
