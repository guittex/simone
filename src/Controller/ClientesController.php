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
                'Telefones'
            ],
        ]);

        $telefone = $this->loadModel('Telefones')->newEmptyEntity();

        $endereco = $this->loadModel('Enderecos')->newEmptyEntity();

        $this->set(compact('cliente', 'telefone', 'endereco'));
    }

    /**
     * Adicionar um telefone a partir da visualização do cliente
     *
     * @param string|null $id Cliente id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
    */
    public function addTelefoneInCliente($id)
    {
        if ($this->request->is('post')) {
            $post = $this->getRequest()->getData();

            $telefone = $this->loadModel('Telefones')->newEmptyEntity();

            $telefone = $this->loadModel('Telefones')->patchEntity($telefone, $this->request->getData());

            if ($this->loadModel('Telefones')->save($telefone)) {
                $this->Flash->success(__('Telefone adicionado com sucesso'));

            }else{
                $this->Flash->error(__('Erro ao adicionar Telefone'));

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
            $cliente = $this->Clientes->patchEntity($cliente, $this->request->getData());
            if ($this->Clientes->save($cliente)) {
                $this->Flash->success(__('Cliente adicionado com sucesso'));

                return $this->redirect(['action' => 'index']);
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
}
