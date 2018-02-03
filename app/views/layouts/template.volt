<!DOCTYPE html>
<html>
    <head>
        <title>Avaliação InfoIdéias</title>
        <meta charset="utf-8">
        <link type="text/css" rel="stylesheet" href="/css/bootstrap.min.css">
        <link type="text/css" rel="stylesheet" href="/css/font-awesome.min.css">
        <link type="text/css" rel="stylesheet" href="/css/styles.css">
    </head>
    <body>
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    </button>
                    {{ link_to(['for':'site.inicio'], 'Real State', "class":"navbar-brand") }}
                </div>
                <div id="navbar" class="navbar-collapse collapse navbar-right">
                    <ul class="nav navbar-nav">
                    <li class="active">{{ link_to(['for':'site.inicio'], 'Início', "id": "router-inicio") }}</li>
                    <li>{{ link_to(['for':'site.imovel.listar'], 'Imóveis', "id": "router-imovel") }}</li>
                    </ul>
                </div>
            </div>
        </nav>
        {% block content %}{% endblock %}
        <!--Scripts-->
        <script type="text/javascript" src="/js/jquery-3.3.1.min.js"></script>
        <script type="text/javascript" src="/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="/js/scripts.js"></script>
    </body>
</html>