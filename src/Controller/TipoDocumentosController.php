<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * TipoDocumentos Controller
 *
 * @property \App\Model\Table\TipoDocumentosTable $TipoDocumentos
 * @method \App\Model\Entity\TipoDocumento[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TipoDocumentosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $tipoDocumentos = $this->paginate($this->TipoDocumentos);

        $this->set(compact('tipoDocumentos'));
    }

    /**
     * View method
     *
     * @param string|null $id Tipo Documento id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tipoDocumento = $this->TipoDocumentos->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('tipoDocumento'));
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tipoDocumento = $this->TipoDocumentos->newEmptyEntity();

        if ($this->request->is('post')) {
            $post = $this->request->getData();

            if(isset($post['obrigatorio'])){
                $post['obrigatorio'] = 1;
            }

            $tipoDocumento = $this->TipoDocumentos->patchEntity($tipoDocumento, $post);

            if ($this->TipoDocumentos->save($tipoDocumento)) {
                $this->Flash->success(__('Tipo de Documento adicionado com sucesso'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Erro ao adicionar Tipo de Documento'));
        }
        
        $this->set(compact('tipoDocumento'));
    }


    /**
     * Edit method
     *
     * @param string|null $id Tipo Documento id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tipoDocumento = $this->TipoDocumentos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $post = $this->request->getData();

            if(isset($post['obrigatorio'])){
                $post['obrigatorio'] = 1;
            }else{
                $post['obrigatorio'] = 0;
            }

            $tipoDocumento = $this->TipoDocumentos->patchEntity($tipoDocumento, $post);
            if ($this->TipoDocumentos->save($tipoDocumento)) {
                
                $this->Flash->success(__('Tipo de Documento editado com sucesso'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Erro ao editar Tipo de Documento'));
        }
        $this->set(compact('tipoDocumento'));
    }


    /**
     * Delete method
     *
     * @param string|null $id Tipo Documento id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tipoDocumento = $this->TipoDocumentos->get($id);
        if ($this->TipoDocumentos->delete($tipoDocumento)) {
            $this->Flash->success(__('Tipo de Documento deletado com sucesso'));
        } else {
            $this->Flash->error(__('Erro ao deletar Tipo de Documento'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
