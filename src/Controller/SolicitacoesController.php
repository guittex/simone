<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Mailer\Email;



/**
 * Solicitacoes Controller
 *
 * @property \App\Model\Table\SolicitacoesTable $Solicitacoes
 * @method \App\Model\Entity\Solicitaco[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SolicitacoesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Carros', 'Clientes'],
        ];
        $solicitacoes = $this->paginate($this->Solicitacoes);
       
        $this->set(compact('solicitacoes'));
    }

    /**
     * View method
     *
     * @param string|null $id Solicitaco id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $solicitaco = $this->Solicitacoes->get($id, [
            'contain' => ['Carros', 'Clientes'],
        ]);

        $this->set(compact('solicitaco'));
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $solicitaco = $this->Solicitacoes->newEmptyEntity();
        if ($this->request->is('post')) {
            $solicitaco = $this->Solicitacoes->patchEntity($solicitaco, $this->request->getData());
            if ($this->Solicitacoes->save($solicitaco)) {
                $this->Flash->success(__('The {0} has been saved.', 'Solicitaco'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Solicitaco'));
        }
        $carros = $this->Solicitacoes->Carros->find('list', ['limit' => 200]);
        $clientes = $this->Solicitacoes->Clientes->find('list', ['limit' => 200]);
        $this->set(compact('solicitaco', 'carros', 'clientes'));
    }


    /**
     * Edit method
     *
     * @param string|null $id Solicitaco id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $solicitaco = $this->Solicitacoes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $solicitaco = $this->Solicitacoes->patchEntity($solicitaco, $this->request->getData());
            if ($this->Solicitacoes->save($solicitaco)) {
                $this->Flash->success(__('The {0} has been saved.', 'Solicitaco'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Solicitaco'));
        }
        $carros = $this->Solicitacoes->Carros->find('list', ['limit' => 200]);
        $clientes = $this->Solicitacoes->Clientes->find('list', ['limit' => 200]);
        $this->set(compact('solicitaco', 'carros', 'clientes'));
    }


    /**
     * Delete method
     *
     * @param string|null $id Solicitaco id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $solicitaco = $this->Solicitacoes->get($id);
        if ($this->Solicitacoes->delete($solicitaco)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Solicitaco'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Solicitaco'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function sendSolicitationAnexo($cliente_id, $solicitacao_id)
    {
        $cliente = $this->loadModel("Clientes")->get($cliente_id);

        if($cliente->email == "" || $cliente->email == null){
            $this->Flash->error(__('Não é possivel enviar o e-mail, e-mail do cliente não cadastrado'));

            return $this->redirect(['action' => 'view', $solicitacao_id]);
        }

        $textMail = $this->textSolicitationAnexo($cliente->nome, $cliente->id);

        $email = new Email();

        $email->setProfile('default');
        
        $email->setFrom(['sendmailcakephp16@gmail.com' => 'Solicitação de Aluguel'])
            ->setEmailFormat('html')
            ->setTo($cliente->email)
            ->setSubject('Temos uma novidade para você');

        try {
            $email->send($textMail);

        } catch (\Cake\Network\Exception\SocketException $exception) {
            $this->Flash->error(__('Erro não previsto, favor contatar o administrador'));

            return $this->redirect(['action' => 'view', $solicitacao_id]);
        }

        $solicitacao = $this->Solicitacoes->get($solicitacao_id);

        $solicitacao->status = "aguardando_documentos";

        $this->Solicitacoes->save($solicitacao);

        $this->Flash->success(__('E-mail enviado com sucesso'));

        return $this->redirect(['action' => 'view', $solicitacao_id]);
    }

    public function anexarDocumentos($solicitacao_id)
    {
        $solicitacao = $this->Solicitacoes->find("all")
            ->where(['Solicitacoes.id' => $solicitacao_id])
            ->contain(['Clientes', 'Carros'])
            ->first();

        if($solicitacao->status == "aguardando_documentos"){
            $status = 'ok';

        }elseif ($solicitacao->status == 'documentos_anexados') {
            $status = "documentos_ok";
        }else{
            $status = "block";
        }

        $tipo_documentos = $this->loadModel('TipoDocumentos')->find("all")
            ->where(['obrigatorio' => 1]);

        $this->set(compact('tipo_documentos', 'solicitacao', "status"));
    }

    public function sendAnexos()
    {
        $post = $this->getRequest()->getData();

        if(count($post['arquivos']) >= 1){
            for ($i=0; $i < count($post['arquivos']); $i++) { 
                $documento = $this->loadModel('Documentos')->newEmptyEntity();
                $documento->arquivo = $post['arquivos'][$i];
                $documento->carro_id = $post['carro_id'];
                $documento->cliente_id = $post['cliente_id'];
                $documento->tipo_documento_id = $post['tipo_documentos'][$i];
                $documento->solicitacao_id = $post['solicitacao_id'];

                $documento = $this->loadModel('Documentos')->patchEntity($documento, []);

                $this->loadModel('Documentos')->save($documento);

            }

            $solicitacao = $this->Solicitacoes->get($post['solicitacao_id']);
            $solicitacao->status = "documentos_anexados";

            $this->Solicitacoes->save($solicitacao);

            return $this->redirect(['action' => 'anexarDocumentos', $post['solicitacao_id']]);
        }else{
            $this->Flash->error(__('Erro, Nenhum arquivo selecionado'));

            return $this->redirect(['action' => 'anexarDocumentos', $post['solicitacao_id']]);
        }
    }

    private function textSolicitationAnexo($name, $client_id)
    {

        $message = '
        <table class="m_8422322315806239809content" align="center" cellpadding="0" cellspacing="0" border="0" bgcolor="#fff" style="border:20px solid #f3f3f3">
            <tbody>
                <tr>
                    <td width="510" height="30" colspan="2"></td>
                </tr>           
                <tr>
                    <td>
                        <p style="font-family:Lato,Calibri,Arial,sans-serif;font-size:18px;color: #31a599;text-align:center;">
                            <strong>Caro '.$name.'<span>,</span> </strong>
                        </p>            
                    <p style="font-family:Lato,Calibri,Arial,sans-serif;font-size:18px;color: #363436;text-align:center;">
                            <strong>Agradecemos pela sua solicitação !</strong>
                        </p></td>
                </tr>
                <tr>
                    <td class="m_8422322315806239809innerpadding">
                        <p style="font-family:Lato,Calibri,Arial,sans-serif;font-size:16px;color:#58595b;text-align:center;padding: 0px;">Para darmos continuidade, precisamos de alguns documentos</p>
                        <p style="font-family:Lato,Calibri,Arial,sans-serif;font-size:16px;color:#58595b;text-align:center;padding: 0px;">Clique no link abaixo, e anexe os documentos obrigatórios</p><hr style="
                            margin-bottom: 26px;
                            border: 0.1px solid #8080802e;
                        ">
                    </td>
                </tr>       
                <tr>
                    <td>
                        <table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
                            <tbody>                       
                                <tr>
                                    <td align="center">
                                        <strong> 
                                            <a clicktracking="off" href="https://'.$_SERVER['HTTP_HOST'].'/app/solicitacoes/anexar-documentos" title="Simba Digital" style="font-family:Lato,Calibri,Arial,sans-serif;font-size:18px;color: #ffffff;text-align:center;text-decoration:none;padding: 6px;background: #30a498;border-radius: 5px;border-color: #363436;" target="_blank">Clique aqui</a>
                                        </strong>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center">
                                        <p style="font-family:Lato,Calibri,Arial,sans-serif;font-size:12px;margin-top:20px;color:#58595b;text-align:center;text-decoration:none">
                                            email@email.com.br<br>
                                        </p>
                                        <p style="font-family:Lato,Calibri,Arial,sans-serif;font-size:12px;color:#58595b;text-align:center;text-decoration:none">
                                            Todos os direitos reservados © 2022
                                            <br>
                                        </p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>';

        return $message;
    }
}
