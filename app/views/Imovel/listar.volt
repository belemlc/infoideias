{% extends "layouts/template.volt" %}

{% block content %}
<div class="container">
    <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-home"></i></a></li>
        <li class="active">Imóveis</li>
    </ol>
    <div class="row">
        <div class="col-xs-12 text-center">
            <h1>Listar Imóveis</h1>
            <p><?php $this->flashSession->output() ?></p>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Buscar</h3>
                </div>
                <div class="panel-body">
                        <div class="row">
                            <form>
                                <div class="col-xs-12 col-sm-3" class="input-group">
                                    <input type="text" name="search" class="form-control">
                                </div>
                                <div class="col-xs-12 col-sm-3" class="input-group">
                                    <select name="tipo_imovel" class="form-control">
                                        <option value="">Selecione</option>
                                        {%for item in tipos %}
                                            <option value="{{imovel.id}}">{{item.nome}}</option>
                                        {%endfor%}
                                    </select>
                                </div>
                                <div class="col-xs-12 col-sm-3">
                                    <input type="submit" value="Buscar" class="btn btn-success">
                                </div>
                                <div class="col-xs-12 col-sm-3 text-right">
                                    {{ link_to(['for':'site.imovel.adicionar'], '<i class="fa fa-plus"></i> Adicionar Novo', "class": "btn btn-primary") }}
                                </div>
                            </form>
                        </div>
                        <br>
                        <div class="row">
                            <!-- Lista -->
                            <div class="col-xs-12">
                                <table class="table table-striped">
                                    <tr>
                                        <th>Código</th>
                                        <th>Tipo de Imóvel</th>
                                        <th>Valor do Imóvel</th>
                                        <th>Valor do Aluguel</th>
                                        <th>Ações</th>
                                    </tr>
                                    {% for imovel in imoveis %}
                                    <tr>
                                        <td>{{imovel.codigo}}</td>
                                        <td>{{imovel.getTipoImovel().nome}}</td>
                                        <td>R$ {{imovel.getValorVenda()}}</td>
                                        <td>R$ {{imovel.getValorAluguel()}}</td>
                                        <td width="160">
                                            {{ link_to("imoveis/editar/" ~imovel.id, '<i class="fa fa-edit"></i> Editar', "class": "btn btn-sm btn-link") }}
                                            {{ link_to("imoveis/remover/" ~imovel.id, '<i class="fa fa-trash"></i> Excluir', "class": "btn btn-sm btn-link remover") }}
                                        </td>
                                    </tr>
                                    {% endFor %}
                                </table>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
{% endblock %}
