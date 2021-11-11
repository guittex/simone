<?php
use App\Model\Entity\Endereco;

?>
<section class="content-header">
  <h1>
    Cliente
    <small><?php echo __('Visualização'); ?></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo $this->Url->build(['action' => 'index']); ?>" style="font-size:20px"><i class="fa fa-arrow-left" style="color:#03a9f4"></i> <?php echo __('Voltar'); ?></a></li>
  </ol>
</section>
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-solid">
        <!-- /.box-header -->
        <div class="box-body">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active">
                  <a href="#cliente-aba" data-toggle="tab"><?= __('Dados do Cliente') ?></a>
              </li>
              <li>
                <a href="#documentos-aba" data-toggle="tab"><?= __('Documentos Anexados') ?></a>
              </li>
              <li>
                <a href="#contatos-aba" data-toggle="tab"><?= __('Contatos') ?></a>
              </li>
              <li>
                <a href="#enderecos-aba" data-toggle="tab"><?= __('Endereços') ?></a>
              </li>
            </ul>
            <div class="tab-content">
              <!-- ---------- Aba Dados do Cliente --------------->
              <div class="active tab-pane" id="cliente-aba">
                <?= $this->Form->create($cliente,[
                  'url' => [
                    'action' => 'edit',
                    $cliente->id,
                  ],
                  'type' => 'post'
                ]) ?>
                <div class="row">
                  <div class="col-md-4">
                    <?= $this->Form->control('nome',[
                      'value' => $cliente->nome,
                      'class' => 'form-control'
                    ]) ?>
                  </div>
                  <div class="col-md-4">
                    <?= $this->Form->control('cpf',[
                      'value' => $cliente->cpf,
                      'label' => 'CPF',
                      'class' => 'form-control cpf'
                    ]) ?>
                  </div>
                  <div class="col-md-4">
                      <?= $this->Form->control('rg',[
                        'value' => $cliente->rg,
                        'label' => 'RG',
                        'class' => 'form-control'
                      ]) ?>
                  </div>    
                  <div class="col-md-4">
                    <?= $this->Form->control('data_nascimento',[
                        'value' => $cliente->data_nascimento,
                        'label' => 'Data de Nascimento',
                        'class' => 'form-control'
                      ]) ?>
                  </div>    
                  <div class="col-md-4">
                    <?= $this->Form->control('cnh',[
                        'value' => $cliente->cnh,
                        'label' => 'CNH',
                        'class' => 'form-control'
                      ]) ?>
                  </div>       
                  <div class="col-md-4">
                    <?= $this->Form->control('estado_civil',[
                        'value' => $cliente->estado_civil,
                        'label' => 'Estado Civíl',
                        'empty' => 'Selecione...',
                        'options' => [
                          'solteiro' => 'Solteiro(a)',
                          'casado' => 'Casado(a)',
                          'divorciado' => 'Divorciado(a)',
                          'viuvo' => 'Viúvo(a)',
                          'sem_especificacao' => 'Não Divulgado'
                        ],
                        'class' => 'form-control select2'
                      ]) ?>
                  </div>    
                  <div class="col-md-4">
                    <?= $this->Form->control('sexo',[
                        'value' => $cliente->sexo,
                        'label' => 'Sexo',
                        'empty' => 'Selecione...',
                        'options' => [
                          'solteiro' => 'Masculino',
                          'casado' => 'Feminino',
                          'sem_especificacao' => 'Não Divulgado'
                        ],
                        'class' => 'form-control select2'
                      ]) ?>
                  </div>      
                  <div class="col-md-12">
                    <button class="btn btn-flat btn-warning float-r">Editar</button>
                  </div>
                </div>
                <?= $this->Form->end(); ?>
              </div>
              <!-- ---------- Aba Documentos --------------->
              <div class="tab-pane" id="documentos-aba">   
                <div class="box-header">
                  <?= $this->Form->create(null,[
                    'url' => [
                      'action' => 'addTipoDocumento',
                    ],
                    'type' => 'post'
                  ]) ?>
                  <!-- Hidden inputs -->
                  <?= $this->Form->hidden('cliente_id',['value' => $cliente->id]) ?>
                  <div class="col-md-4">
                      <?= $this->Form->control('tipo_documento_id',[
                        'options' => $tipo_documentos_nao_obrigatorios_list,
                        'empty' => 'Selecione...',
                        'class' => 'form-control select2'
                      ]) ?>
                  </div>
                  <div class="col-md-4">
                    <button class="btn btn-success m-t-25 btn-flat">Adicionar</button>
                  </div>
                  <?= $this->Form->end(); ?>
                </div>             
                <div class="box-body">
                  <?php foreach($tipo_documentos_obrigatorios as $key => $tipo_documentos) : ?>
                    <div class="col-md-3">
                      <div class="panel panel-default">
                        <div class="panel-heading text-center"><?= $tipo_documentos->nome ?></div>
                        <div class="panel-body" style="height:200px"><i class="fa fa-user"></i></div>
                        <div class="panel-footer text-center">
                          <i class="fa fa-plus-circle" onclick="openModalAnexarDocumento(<?= $tipo_documentos->id ?>, 'tipo_documento')" style="font-size: 30px;color: green;cursor:pointer"></i>
                        </div>
                      </div>
                    </div>
                  <?php endforeach; ?>
                  <?php foreach($documentos_nao_obrigatorios as $key => $documentos) : ?>
                    <div class="col-md-3">
                      <div class="panel panel-default">
                        <div class="panel-heading text-center"><?= $documentos->tipo_documento->nome ?></div>
                        <div class="panel-body" style="height:200px"><i class="fa fa-user"></i></div>
                        <div class="panel-footer text-center">
                          <i class="fa fa-plus-circle" onclick="openModalAnexarDocumento(<?= $documentos->id ?>, 'documento')" style="font-size: 30px;color: green;cursor:pointer"></i>
                        </div>
                      </div>
                    </div>
                  <?php endforeach; ?>
                </div>
              </div>
              <!-- ---------- Aba Telefones --------------->
              <div class="tab-pane" id="contatos-aba">                
                <div class="box-header">
                  <?= $this->Form->create($telefone,[
                    'url' => [
                      'action' => 'addTelefoneInCliente',
                      $cliente->id,
                    ],
                    'type' => 'post'
                  ]) ?>
                  <div class="row">
                    <!-- Hidden Inputs -->
                    <input type='hidden' name='cliente_id' value=<?= $cliente->id ?>>
                    <input type="hidden" name="id_telefone" id="id_telefone">

                    <div class="col-md-4">
                      <?= $this->Form->control('tipo_telefone',[
                        'class' => 'form-control select2',
                        'label' => 'Tipo de Telefone',
                        'empty' => 'Selecione...',
                        'options' => [
                          'recado' => 'Recado',
                          'celular' => 'Celular',
                          'fixo' => 'Fixo',
                          'comercial' => 'Comercial'
                        ]
                      ]) ?>
                    </div>
                    <div class="col-md-4">
                      <?= $this->Form->control('numero',[
                        'class' => 'form-control numeroMask',
                        'label' => 'Número',
                        'disabled' => true,
                        'value' => '',
                        'placeholder' => 'Digite...',
                      ]) ?>
                    </div>
                    <div class="col-md-12">
                      <button class="btn btn-flat btn-success float-r" type="submit">Enviar</button>
                    </div>                      
                    <?= $this->Form->end(); ?>
                  </div>
                </div>
                <div class="box-footer m-t-15 m-b-15">
                    <table class="table table_data">
                      <thead>
                        <tr>
                          <th>order</th>
                          <th>Tipo de Telefone</th>
                          <th>Número</th>
                          <th>Criado</th>
                          <th>Ações</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach($telefonesCliente ?? [] as $key => $telefone) : ?>
                        <tr>
                          <td><?= $key ?></td>
                          <td><?= ucfirst(h($telefone->tipo_telefone)) ?></td>
                          <td><?= h($telefone->numero) ?></td>
                          <td><?= date_format($telefone->created, 'd/m/Y H:i') ?></td>
                          <td style='width:80px'>
                            <div class="col-md-12">
                              <?php 
                                  echo $this->Form->button(__('Editar'), [
                                    'type' => 'button',
                                    'style' => "width:49px",
                                    'class' => 'btn btn-warning btn-xs btn-flat m-b-4',
                                    "onclick" => "editTelefoneInCliente(" . str_replace('"', "'", json_encode($telefone)) . ");",
                                  ]);
                              ?>
                            </div>
                            <div class="col-md-12">
                              <?= 
                                $this->Form->postButton("Deletar",[                                    
                                  'controller' => 'Clientes',
                                  'action' => 'deleteTelefoneInCliente',
                                  $telefone->id,              
                                  $cliente->id                     
                                ],
                                [
                                  'class' => 'btn btn-xs btn-danger btn-flat'
                                ])
                              ?>                            
                            </div>
                          </td>
                        </tr>
                        <?php endforeach; ?>
                      </tbody>
                    </table>
                </div>
              </div>
              <!-- ---------- Aba Enderecos --------------->
              <div class="tab-pane" id="enderecos-aba">
                  <div class="box-header">
                    <?= $this->Form->create($endereco,[
                      'url' => [
                        'action' => 'addEnderecoInCliente',
                        $cliente->id,
                      ],
                      'type' => 'post'
                    ]) ?>

                    <!-- Hidden Inputs -->
                    <input type='hidden' name='cliente_id' value=<?= $cliente->id ?>>
                    <input type="hidden" name="id_endereco" id="id_endereco">

                    <div class="col-md-3">
                      <?= $this->Form->control("cep",[
                        'class' => 'form-control cep',
                        'label' => 'CEP',
                        'placeholder' => 'Digite...'
                      ]) ?>
                    </div>
                    <div class="col-md-8">
                      <div class="form-group input select">
                        <button class="btn btn-primary btn-flat m-t-25">Pesquisar CEP</button>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <?= $this->Form->control("tipo_endereco",[
                        'class' => 'form-control select2',
                        'label' => 'Tipo de Endereço',
                        'options' => [
                          'comercial' => 'Comercial',
                          'residencial' => 'Residencial',
                          'correspondencia' => 'Correspondência'
                        ],
                        'empty' => 'Selecione...'
                      ]) ?>
                    </div>
                    <div class="col-md-4">
                      <?= $this->Form->control("logradouro",[
                        'class' => 'form-control',
                        'label' => 'Logradouro',                       
                        'placeholder' => 'Digite...'
                      ]) ?>
                    </div>
                    <div class="col-md-4">
                      <?= $this->Form->control("numero",[
                        'class' => 'form-control',
                        'label' => 'Número',           
                        'id' => 'numero_endereco',            
                        'placeholder' => 'Digite...'
                      ]) ?>
                    </div>
                    <div class="col-md-4">
                      <?= $this->Form->control("bairro",[
                        'class' => 'form-control',
                        'label' => 'Bairro',                       
                        'placeholder' => 'Digite...'
                      ]) ?>
                    </div>
                    <div class="col-md-4">
                      <?= $this->Form->control("cidade",[
                        'class' => 'form-control',
                        'label' => 'Cidade',                       
                        'placeholder' => 'Digite...'
                      ]) ?>
                    </div>
                    <div class="col-md-4">
                      <?= $this->Form->control("estado",[
                        'class' => 'form-control select2',
                        'id' => 'estado2',
                        'label' => 'Estado',        
                        'options' => Endereco::ESTADOS,                
                        'empty' => 'Selecione...'
                      ]) ?>
                    </div>
                    <div class="col-md-12">
                      <button class="btn btn-flat btn-success float-r" type="submit">Enviar</button>
                    </div>
                    <?= $this->Form->end(); ?>
                  </div>
                  <div class="box-footer m-t-15 m-b-15">
                    <table class="table table_data">
                        <thead>
                          <tr>
                            <th>order</th>
                            <th>Logradouro</th>
                            <th>Número</th>
                            <th>Bairro</th>
                            <th>Cidade</th>
                            <th>Ações</th>
                        </tr>
                        </thead>
                        <tbody>
                          <?php foreach($enderecosCliente as $key => $endereco) : ?>
                          <tr>
                            <td><?= $key ?></td>
                            <td><?= $endereco->logradouro ?></td>
                            <td><?= $endereco->numero ?></td>
                            <td><?= $endereco->bairro ?></td>
                            <td><?= $endereco->cidade ?></td>
                            <td style='width:80px'>
                              <div class="col-md-12">
                                <?php
                                  echo $this->Form->button(__('Editar'), [
                                    'type' => 'button',
                                    'style' => "width:49px",
                                    'class' => 'btn btn-warning btn-xs btn-flat m-b-4',
                                    "onclick" => "editEnderecoInCliente(" . str_replace('"', "'", json_encode($endereco)) . ");",
                                  ]);
                                ?>
                              </div>
                              <div class="col-md-12">
                                <?= 
                                  $this->Form->postButton("Deletar",[                                    
                                    'controller' => 'Clientes',
                                    'action' => 'deleteEnderecoInCliente',
                                    $endereco->id,
                                    $cliente->id                    
                                  ],
                                  [
                                    'class' => 'btn btn-xs btn-danger btn-flat'
                                  ])
                                ?>
                              </div>
                            </td>                          
                          </tr>
                          <?php endforeach; ?>
                        </tbody>
                    </table>
                  </div>
              </div>
            </div>
          </div>  
        </div>
      </div>
    </div>
  </div>
  <!-- Modais -->
  <div class="modal" tabindex="-1" role="dialog" id="modalAnexarDocumento">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <?= $this->Form->create(null,[
          'url' => [
            'action' => 'addDocumento',
            $cliente->id
          ],
          'type' => 'file'
        ]) ?> 
        <div class="modal-header">
          <h4 class="modal-title">Anexar Documento</h4>
        </div>
        <div class="modal-body" id="bodyModal">
          <!-- Hidden inputs -->
          <?= $this->Form->hidden("cliente_id",['value' => $cliente->id]) ?>
          <input type="hidden" name="tipo_documento_id" id="tipoDocumentoModal">
          
          <div class="row">
            <div class="col-md-12">
              <?= $this->Form->control("arquivo",[
                'type' => 'file',
                'class' => 'form-control',
                'templates' => [
                  'inputContainer' => "{{content}}"
                ]
              ]) ?>
            </div>
            <div class="col-md-12 m-t-10">
              <label for="">Descrição</label>
              <?= $this->Form->textarea("descricao",[
                'class' => 'form-control',
              ]) ?>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger btn-flat" data-dismiss="modal">Fechar</button>
          <button type="submit" class="btn btn-success btn-flat">Adicionar</button>
        </div>
        <?= $this->Form->end() ?>
      </div>
    </div>
  </div>
</section>
<script>
  $(document).ready(function(){
    $("#tipo-telefone").on("change", function (){
      $(".numeroMask").val('');
      $(".numeroMask").removeAttr("disabled");

      if($("#tipo-telefone").val() == 'celular'){
        $(".numeroMask").mask("(99)99999-9999");

      }else{
        $(".numeroMask").mask("(99)9999-9999");

      }
    });
  });

  function openModalAnexarDocumento(id, tipo)
  {
    $("#tipoDocumentoModal").val(id);

    $("#modalAnexarDocumento").modal("show");
  }

  function editTelefoneInCliente(telefone)
  {
    $("#numero").removeAttr("disabled");

    $("#tipo-telefone").val(telefone.tipo_telefone).trigger("change");

    $("#numero").val(telefone.numero);

    $("#id_telefone").val(telefone.id);
  }

  function editEnderecoInCliente(endereco)
  {
    $("#id_endereco").val(endereco.id);

    $("#cep").val(endereco.cep);

    $("#tipo-endereco").val(endereco.tipo_endereco).trigger("change");

    $("#logradouro").val(endereco.logradouro);

    $("#numero_endereco").val(endereco.numero);

    $("#bairro").val(endereco.bairro);

    $("#cidade").val(endereco.cidade);

    $("#estado2").val(endereco.estado).trigger("change");
  }
</script>
