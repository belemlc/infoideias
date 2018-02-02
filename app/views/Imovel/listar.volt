{% extends "layouts/template.volt" %}

{% block content %}
<div class="container">
    <div class="row">
        <div class="col-xs-12 text-center">
            <h1>Listar Imóveis</h1>
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
                            <div class="col-xs-12 col-sm-3" class="input-group">
                                <input type="text" class="form-control">
                            </div>
                            <div class="col-xs-12 col-sm-3" class="input-group">
                                <select name="tipo_imovel_id" id="tipo_imovel_id" class="form-control">
                                    <option value="1">Casa</option>
                                    <option value="2">Apartamento</option>
                                </select>
                            </div>
                            <div class="col-xs-12 col-sm-3"><input type="submit" value="Buscar" class="btn btn-success"></div>
                            <div class="col-xs-12 col-sm-3 text-right">
                                {{ link_to(['for':'site.imovel.adicionar'], 'Adicionar Novo', "class": "btn btn-primary") }}
                            </div>
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
                                        <th>Ações</th>
                                    </tr>
                                    {% for imovel in imoveis %}
                                    <tr>
                                        <td>{{imovel.codigo}}</td>
                                        <td>{{imovel.getTipoImovel().nome}}</td>
                                        <td>R$ {{imovel.getValorVenda()}}</td>
                                        <td></td>
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
