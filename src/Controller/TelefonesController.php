<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Telefones Controller
 *
 * @property \App\Model\Table\TelefonesTable $Telefones
 * @method \App\Model\Entity\Telefone[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TelefonesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Clientes'],
        ];
        $telefones = $this->paginate($this->Telefones);

        $this->set(compact('telefones'));
    }

    /**
     * View method
     *
     * @param string|null $id Telefone id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $telefone = $this->Telefones->get($id, [
            'contain' => ['Clientes'],
        ]);

        $this->set(compact('telefone'));
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $telefone = $this->Telefones->newEmptyEntity();
        if ($this->request->is('post')) {
            $telefone = $this->Telefones->patchEntity($telefone, $this->request->getData());
            if ($this->Telefones->save($telefone)) {
                $this->Flash->success(__('The {0} has been saved.', 'Telefone'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Telefone'));
        }
        $clientes = $this->Telefones->Clientes->find('list', ['limit' => 200]);
        $this->set(compact('telefone', 'clientes'));
    }


    /**
     * Edit method
     *
     * @param string|null $id Telefone id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $telefone = $this->Telefones->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $telefone = $this->Telefones->patchEntity($telefone, $this->request->getData());
            if ($this->Telefones->save($telefone)) {
                $this->Flash->success(__('The {0} has been saved.', 'Telefone'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Telefone'));
        }
        $clientes = $this->Telefones->Clientes->find('list', ['limit' => 200]);
        $this->set(compact('telefone', 'clientes'));
    }


    /**
     * Delete method
     *
     * @param string|null $id Telefone id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $telefone = $this->Telefones->get($id);
        if ($this->Telefones->delete($telefone)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Telefone'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Telefone'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
