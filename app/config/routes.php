<?php
use Phalcon\Mvc\Router;
$router = new Router(false);
$router->removeExtraSlashes(true);
$router->notFound(['controller' => 'Error', 'action' => 'error404']);
$router->add('/', ['controller' => 'Index', 'action' => 'index'])->setName('site.inicio');


$router->add('/imoveis', ['controller' => 'Imovel', 'action' => 'listar'])->setName('site.imovel.listar');
$router->add('/imoveis/adicionar', ['controller' => 'Imovel', 'action' => 'adicionar'])->setName('site.imovel.adicionar');
$router->add('/imoveis/editar/:int', ['controller' => 'Imovel', 'action' => 'editar', 'params' => 1])->setName('site.imovel.editar');
$router->add('/imoveis/save', ['controller' => 'Imovel', 'action' => 'save'])->setName('site.imovel.save');
$router->add('/imoveis/remover/:int', ['controller' => 'Imovel', 'action' => 'remover', 'params' => 1])->setName('site.imovel.excluir');


return $router;