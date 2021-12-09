<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * OrdemServicos Controller
 *
 * @property \App\Model\Table\OrdemServicosTable $OrdemServicos
 * @method \App\Model\Entity\OrdemServico[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class OrdemServicosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Carros'],
        ];
        $ordemServicos = $this->paginate($this->OrdemServicos);

        $this->set(compact('ordemServicos'));
    }

    /**
     * View method
     *
     * @param string|null $id Ordem Servico id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ordemServico = $this->OrdemServicos->get($id, [
            'contain' => [
                'Carros', 'Documentos'
            ],
        ]);

        $this->set(compact('ordemServico'));
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $ordemServico = $this->OrdemServicos->newEmptyEntity();

        if ($this->request->is('post')) {
            $post = array_filter($this->request->getData());

            $ordemServico = $this->OrdemServicos->patchEntity($ordemServico, $this->request->getData());

            if ($this->OrdemServicos->save($ordemServico)) {                
                if(isset($post['arquivos'])){
                    if(count($post['arquivos']) >= 1){
                        for ($i=0; $i < count($post['arquivos']); $i++) { 
                            $documento = $this->loadModel('Documentos')->newEmptyEntity();
                            $documento->arquivo = $post['arquivos'][$i];
                            $documento->carro_id = $post['carro_id'];
                            $documento->ordem_servico_id = $ordemServico->id;
                            $documento = $this->loadModel('Documentos')->patchEntity($documento, []);

                            $this->loadModel('Documentos')->save($documento);
                        }
                    }
                }

                $this->Flash->success(__('The {0} has been saved.', 'Ordem Servico'));

                return $this->redirect(['action' => 'index']);
            }

            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Ordem Servico'));
        }

        $carros = $this->OrdemServicos->Carros->find('list', ['limit' => 200]);

        $this->set(compact('ordemServico', 'carros'));
    }


    /**
     * Edit method
     *
     * @param string|null $id Ordem Servico id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ordemServico = $this->OrdemServicos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ordemServico = $this->OrdemServicos->patchEntity($ordemServico, $this->request->getData());
            if ($this->OrdemServicos->save($ordemServico)) {
                $this->Flash->success(__('The {0} has been saved.', 'Ordem Servico'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Ordem Servico'));
        }
        $carros = $this->OrdemServicos->Carros->find('list', ['limit' => 200]);
        $this->set(compact('ordemServico', 'carros'));
    }


    /**
     * Delete method
     *
     * @param string|null $id Ordem Servico id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ordemServico = $this->OrdemServicos->get($id);
        if ($this->OrdemServicos->delete($ordemServico)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Ordem Servico'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Ordem Servico'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
