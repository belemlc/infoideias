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

	        try {
                $id = $this->request->getPost("id", "int");
                if ($id) {
                    $imovel = Imovel::findFirstById($id);
                } else {
                    $imovel = new Imovel();
                }

                # Recebe os dados via post e converte para objeto
                $form = new ImovelForm;
                $this->view->form = $form;
                $data = (object) $this->request->getPost();
                # Setters Imovel
                $imovel->setCodigo($data->codigo);
                $imovel->setTipoImovelId($data->tipo_imovel);
                $imovel->setFilialId($data->filial);
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
                if (isset($data->publicado) && $data->data_expiracao !== '') {
                    $imovel->setPublicado($data->publicado);
                    $imovel->setDataExpiracao($data->data_expiracao);
                }
                # Save
                if ($imovel->save()) {
                    if($this->request->hasFiles()) {
                        $uploadPath = BASE_PATH.'/public/upload/';
                        foreach ($this->request->getUploadedFiles() as $file) {
                            $imagemPath = $uploadPath . $file->getName();
                            $imagem = new ImovelImagem();
                            $imagem->caminho = $imagemPath;
                            $imagem->imovel_id = $imovel->getId();
                            if ($imagem->save()) {
                                $file->moveTo($imagemPath);
                                $imovel->ajustaImageToUpload($imagemPath, $file->getExtension());
                            }
                        }
                    }
                    $this->flash->success("Imovel adicionado com sucesso!");
                    $this->response->redirect('imoveis/');
                }
            } catch (Exception $e) {
	            echo $e->getMessage();
            }
        }
    }
    
    public function editarAction($id)
	{
        $imovel = Imovel::findFirstById($id);
        $this->view->form = new ImovelForm($imovel, array('edit' => true));

        if ($this->request->isPost() && $this->request->isAjax()) {
            $response = new Response();
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
    
    public function removerAction($id) {

	    $imovel = Imovel::findFirstById($id);

	    if ($imovel->delete()) {
            $this->response->redirect('imoveis/');
        }
    }
    
    public function visualizarAction($id)
	{

	}

}
