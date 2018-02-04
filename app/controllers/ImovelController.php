<?php

use Phalcon\Mvc\Controller;
use Phalcon\Http\Response;

class ImovelController extends Controller
{

	public function listarAction()
	{
        $this->view->imoveis = Imovel::find();
    }

    public function adicionarAction() {
	    $this->view->form = new ImovelForm;
        $response = new Response();

        if ($this->request->isPost() && $this->request->isAjax()) {
            if ($this->request->getPost("bairro")) {
                $bairro = $this->request->getPost("bairro");
                $logradouro = Logradouro::find("bairro_id = {$bairro}");
                $response->setStatusCode(200);
                $response->setJsonContent($logradouro);
            } if ($this->request->getPost("codigo")) {
                $codigo = $this->request->getPost("codigo");
                $hasCodigo = Imovel::find("codigo = '{$codigo}'")->count();
                $response->setStatusCode(200);
                $response->setJsonContent($hasCodigo);
            }
            $this->response->setContentType('application/json');
            $response->send();
            exit;
        }
    }
    

    public function saveAction() {
	    if ($this->request->isPost()) {

	        $id = $this->request->getPost("id", "int");

	        try {
                $imovel = new Imovel();
                # Recebe os dados via post e converte para objeto
                $data = (object) $this->request->getPost();
                # Setters Imovel
                $imovel->setCodigo($data->codigo);
                $imovel->setTipoImovelId($data->tipo_imovel);
                $imovel->setFilial($data->filial);
                $imovel->setLogradouroId($data->logradouro);
                $imovel->setNumero($data->numero);
                $imovel->setTipoNegocio($data->tipo_negocio);
                $imovel->setValorVenda($data->valor_venda);
                $imovel->setValorAluguel($data->valor_aluguel);
                $imovel->setDormitorios($data->dormitorios);
                $imovel->setAreaTerreno($data->area_terreno);
                $imovel->setBanheiros($data->banheiros);
                $imovel->setVagasGaragem($data->vagas_garagem);
                $imovel->setTituloImovel($data->titulo_imovel);
                $imovel->setDescricao($data->descricao);
                $imovel->setPublicado($data->publicado);
                $imovel->setDataExpiracao($data->data_expiracao);
                # Save
                if ($imovel->save()) {
                    $this->dispatcher->forward([
                        "controller" => "imovel",
                        "action" => "listar"
                    ]);
                }
            } catch (Exception $e) {
	            echo $e->getMessage();
            }
        }
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
