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
	    $this->view->tipos = TipoImovel::find();
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
