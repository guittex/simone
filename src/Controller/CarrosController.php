<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Carros Controller
 *
 * @method \App\Model\Entity\Carro[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CarrosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $carros = $this->paginate($this->Carros);

        $this->set(compact('carros'));
    }

    /**
     * View method
     *
     * @param string|null $id Carro id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $carro = $this->Carros->get($id, [
            'contain' => [],
        ]);

        $ordem_servicos = $this->loadModel('OrdemServicos')->find("all")
            ->where(['carro_id' => $id]);

        $imagens_carro = $this->loadModel('Documentos')->find("all")
            ->where(['carro_id' => $id, 'ordem_servico_id is' => null]);

        $this->set(compact('carro', 'ordem_servicos', "imagens_carro"));
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $carro = $this->Carros->newEmptyEntity();
        if ($this->request->is('post')) {
            $carro = $this->Carros->patchEntity($carro, $this->request->getData());
            if ($this->Carros->save($carro)) {
                $this->Flash->success(__('The {0} has been saved.', 'Carro'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Carro'));
        }
        $this->set(compact('carro'));
    }


    /**
     * Edit method
     *
     * @param string|null $id Carro id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $carro = $this->Carros->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $carro = $this->Carros->patchEntity($carro, $this->request->getData());
            if ($this->Carros->save($carro)) {
                $this->Flash->success(__('The {0} has been saved.', 'Carro'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Carro'));
        }
        $this->set(compact('carro'));
    }


    /**
     * Delete method
     *
     * @param string|null $id Carro id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $carro = $this->Carros->get($id);
        if ($this->Carros->delete($carro)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Carro'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Carro'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function viewOrdem()
    {
        $this->autoRender = false;

        $get = $this->getRequest()->getQuery();

        $ordem = $this->loadModel('OrdemServicos')->get($get['id'],[
            'contain' => "Documentos"
        ]);

        echo json_encode($ordem);
    }

    public function addImagensToCar()
    {
        $this->request->allowMethod(['patch', 'post', 'put']);

        $post = $this->getRequest()->getData();

        if(count($post['arquivo']) >= 1){
            for ($i=0; $i < count($post['arquivo']); $i++) { 
                $documento = $this->loadModel('Documentos')->newEmptyEntity();
                $documento->arquivo = $post['arquivo'][$i];
                $documento->carro_id = $post['carro_id'];
                $documento = $this->loadModel('Documentos')->patchEntity($documento, []);

                $this->loadModel('Documentos')->save($documento);               
            }
        }

        $this->Flash->success(__('Imagens adicionada com sucesso'));

        return $this->redirect(['action' => 'view', $post['carro_id'] ]);
    }
}
