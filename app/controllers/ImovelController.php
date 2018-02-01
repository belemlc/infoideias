<?php

use Phalcon\Mvc\Controller;

class ImovelController extends Controller
{

	public function listarAction()
	{
        $this->view->imoveis = Imovel::find();
    }
    

    public function adicionarAction()
	{
    }
    
    public function editarAction($id)
	{

    }
    
    public function removerAction($id)
	{

    }
    
    public function visualizarAction($id)
	{

	}

}
