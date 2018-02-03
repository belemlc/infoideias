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
	    if ($this->request->isPost()) {
            $data = $this->request->getPost();
            $imovel = new Imovel();

        }
        $this->view->tipos = TipoImovel::find();
	    $this->view->filiais = Filial::find();
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
