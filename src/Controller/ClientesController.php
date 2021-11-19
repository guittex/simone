<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Clientes Controller
 *
 * @property \App\Model\Table\ClientesTable $Clientes
 * @method \App\Model\Entity\Cliente[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ClientesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $clientes = $this->paginate($this->Clientes);

        $this->set(compact('clientes'));
    }

    /**
     * View method
     *
     * @param string|null $id Cliente id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $cliente = $this->Clientes->get($id, [
            'contain' => [
                'Telefones',
            ],
        ]);

        $telefone = $this->loadModel('Telefones')->newEmptyEntity();

        $endereco = $this->loadModel('Enderecos')->newEmptyEntity();

        $enderecosCliente = $this->loadModel('Enderecos')->find("all")
            ->where(['deleted' => 0]);

        $telefonesCliente = $this->loadModel('Telefones')->find("all")
            ->where(['deleted' => 0]);

        $tipo_documentos = $this->loadModel('TipoDocumentos')->find("all")
            ->contain([
                "Documentos" => [
                    'conditions' => [
                        'deleted' => 0
                    ] 
                ]
            ]);
       
        $this->set(compact(
            'cliente', 
            'telefone', 
            'endereco', 
            'enderecosCliente', 
            'telefonesCliente', 
            'tipo_documentos', 
        ));
    }

    /**
     * Adiciona um telefone a partir da visualização do cliente
     *
     * @param string|null $id Cliente id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
    */
    public function addTelefoneInCliente($id)
    {
        if ($this->request->is('post')) {
            
            if($this->getRequest()->getData('id_telefone')){
                $msg = "Telefone editado com sucesso";

                $telefone = $this->loadModel('Telefones')->get($this->getRequest()->getData('id_telefone'));
            }else{
                $msg = "Telefone adicionado com sucesso";

                $telefone = $this->loadModel('Telefones')->newEmptyEntity();

            }           

            $telefone = $this->loadModel('Telefones')->patchEntity($telefone, $this->request->getData());
            
            if ($this->loadModel('Telefones')->save($telefone)) {
                $this->Flash->success(__("$msg"));

            }else{
                $this->Flash->error(__('Erro ao adicionar Telefone'));

            }
            return $this->redirect(['action' => 'view', $id]);

        }
    }

    /**
     * Deleta um endereco a partir da visualização do cliente
     *
     * @param int|null $id Endereco id.
     * @param int|null $cliente_id Cliente id.
     * @return \Cake\Http\Response|null|void Renders view
    */
    public function deleteEnderecoInCliente($id, $cliente_id)
    {
        if ($this->request->is('post')) {   
            $endereco = $this->loadModel('Enderecos')->get($id);

            $endereco->deleted = 1;

            $this->loadModel('Enderecos')->save($endereco);

            $this->Flash->success(__("Endereco deletado com sucesso"));

            return $this->redirect(['action' => 'view', $id]);
        }
    }

    /**
     * Deleta um telefone a partir da visualização do cliente
     *
     * @param int|null $id Telefone id.
     * @param int|null $cliente_id Cliente id.
     * @return \Cake\Http\Response|null|void Renders view
    */
    public function deleteTelefoneInCliente($id, $cliente_id)
    {
        if ($this->request->is('post')) {   
            $telefone = $this->loadModel('Telefones')->get($id);

            $telefone->deleted = 1;

            $this->loadModel('Telefones')->save($telefone);

            $this->Flash->success(__("Telefone deletado com sucesso"));

            return $this->redirect(['action' => 'view', $cliente_id]);
        }
    }

    /**
     * Adiciona ou edita um endereco a partir da visualização do cliente
     *
     * @param string|null $id Cliente id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
    */
    public function addEnderecoInCliente($id)
    {
        if ($this->request->is('post')) {   
            if($this->getRequest()->getData('id_endereco')){
                $msg = 'Endereco editado com sucesso';

                $endereco = $this->loadModel('Enderecos')->get($this->getRequest()->getData('id_endereco'));
            }else{
                $msg = 'Endereco adicionado com sucesso';

                $endereco = $this->loadModel('Enderecos')->newEmptyEntity();
            }           

            $endereco = $this->loadModel('Enderecos')->patchEntity($endereco, $this->request->getData());

            if ($this->loadModel('Enderecos')->save($endereco)) {
                $this->Flash->success(__("$msg"));

            }else{
                $this->Flash->error(__('Erro ao adicionar Endereço'));

            }
            return $this->redirect(['action' => 'view', $id]);
        }
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $cliente = $this->Clientes->newEmptyEntity();

        if ($this->request->is('post')) {
            $clienteChecker = $this->Clientes->find("all")->where(['cpf' => $this->getRequest()->getData('cpf')])->toArray();

            if(count($clienteChecker) >= 1){
                $this->Flash->error(__('Erro ao adicionar cliente, CPF informado já possui cadastro'));

                return $this->redirect(['action' => 'add']);
            }

            $cliente = $this->Clientes->patchEntity($cliente, $this->request->getData());
            
            if ($this->Clientes->save($cliente)) {
                $this->Flash->success(__('Cliente adicionado com sucesso'));

                return $this->redirect(['action' => 'view', $cliente->id]);
            }

            $this->Flash->error(__('Erro ao adicionar cliente'));
        }

        $this->set(compact('cliente'));
    }


    /**
     * Edit method
     *
     * @param string|null $id Cliente id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $cliente = $this->Clientes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $cliente = $this->Clientes->patchEntity($cliente, $this->request->getData());
            if ($this->Clientes->save($cliente)) {
                $this->Flash->success(__('Cliente editado com sucesso'));

                return $this->redirect(['action' => 'view', $id]);
            }
            $this->Flash->error(__('Erro ao editar cliente'));
        }
        $this->set(compact('cliente'));
    }


    /**
     * Delete method
     *
     * @param string|null $id Cliente id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $cliente = $this->Clientes->get($id);
        if ($this->Clientes->delete($cliente)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Cliente'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Cliente'));
        }

        return $this->redirect(['action' => 'index']);
    }

    /**
     * Adiciona um tipo de documento na aba de documentos em cliente
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function addTipoDocumento()
    {
        $post = $this->getRequest()->getData();

        $documentos = $this->loadModel('Documentos')->newEmptyEntity();

        $documentos = $this->loadModel('Documentos')->patchEntity($documentos, $post);

        try {
            $this->loadModel('Documentos')->save($documentos);

            $this->Flash->success(__('O Tipo de Documento foi adicionado com sucesso'));

            return $this->redirect(['action' => 'view', $post['cliente_id']]);
        } catch (\Throwable $th) {            
            $this->Flash->error(__('Erro ao adicionar o Tipo de Documento'));

            return $this->redirect(['action' => 'view', $post['cliente_id']]);
        }
    }

    public function addDocumento()
    {
        $post = $this->getRequest()->getData();

        $this->checkHasDocumento($post);

        $documento = $this->loadModel('Documentos')->newEmptyEntity();

        $documento = $this->loadModel('Documentos')->patchEntity($documento, $post);

        try {
            $this->loadModel('Documentos')->save($documento);

            $this->Flash->success(__('O Documento foi adicionado com sucesso'));

            return $this->redirect(['action' => 'view', $post['cliente_id']]);
        } catch (\Throwable $th) {
            $this->Flash->error(__('Erro ao adicionar o Documento'));

            return $this->redirect(['action' => 'view', $post['cliente_id']]);
        }
    }

    public function checkHasDocumento($post)
    {
        $documento = $this->loadModel("Documentos")->find("all")
            ->where(['cliente_id' => $post['cliente_id'], 'tipo_documento_id' => $post['tipo_documento_id'], 'deleted' => 0])
            ->toArray();

        if($documento >= 1){
            foreach ($documento as $key => $doc) {
                $doc->deleted = 1;

                $this->loadModel('Documentos')->save($doc);
            }
        }
        
        return;
    }
}
