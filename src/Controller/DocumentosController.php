<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Documentos Controller
 *
 * @property \App\Model\Table\DocumentosTable $Documentos
 * @method \App\Model\Entity\Documento[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DocumentosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Clientes', 'TipoDocumentos'],
        ];
        $documentos = $this->paginate($this->Documentos);

        $this->set(compact('documentos'));
    }

    /**
     * View method
     *
     * @param string|null $id Documento id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $documento = $this->Documentos->get($id, [
            'contain' => ['Clientes', 'TipoDocumentos'],
        ]);

        $this->set(compact('documento'));
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $documento = $this->Documentos->newEmptyEntity();
        if ($this->request->is('post')) {
            $documento = $this->Documentos->patchEntity($documento, $this->request->getData());
            if ($this->Documentos->save($documento)) {
                $this->Flash->success(__('The {0} has been saved.', 'Documento'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Documento'));
        }
        $clientes = $this->Documentos->Clientes->find('list', ['limit' => 200]);
        $tipoDocumentos = $this->Documentos->TipoDocumentos->find('list', ['limit' => 200]);
        $this->set(compact('documento', 'clientes', 'tipoDocumentos'));
    }


    /**
     * Edit method
     *
     * @param string|null $id Documento id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $documento = $this->Documentos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $documento = $this->Documentos->patchEntity($documento, $this->request->getData());
            if ($this->Documentos->save($documento)) {
                $this->Flash->success(__('The {0} has been saved.', 'Documento'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Documento'));
        }
        $clientes = $this->Documentos->Clientes->find('list', ['limit' => 200]);
        $tipoDocumentos = $this->Documentos->TipoDocumentos->find('list', ['limit' => 200]);
        $this->set(compact('documento', 'clientes', 'tipoDocumentos'));
    }


    /**
     * Delete method
     *
     * @param string|null $id Documento id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $documento = $this->Documentos->get($id);
        if ($this->Documentos->delete($documento)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Documento'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Documento'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
