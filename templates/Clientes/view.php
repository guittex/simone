<?php
use App\Model\Entity\Endereco;

?>
<section class="content-header">
  <h1>
    Cliente
    <small><?php echo __('Visualização'); ?></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo $this->Url->build(['action' => 'index']); ?>" style="font-size:20px"><i class="fa fa-arrow-left"></i> <?php echo __('Voltar'); ?></a></li>
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
                      'class' => 'form-control'
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
                        'class' => 'form-control',
                        'label' => 'Número',
                        'value' => '',
                        'placeholder' => 'Digite...',
                      ]) ?>
                    </div>
                    <div class="col-md-12">
                      <button class="btn btn-flat btn-success float-r" type="submit">Adicionar</button>
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
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach($cliente->telefones ?? [] as $key => $telefone) : ?>
                        <tr>
                          <td><?= $key ?></td>
                          <td><?= ucfirst(h($telefone->tipo_telefone)) ?></td>
                          <td><?= h($telefone->numero) ?></td>
                          <td><?= date_format($telefone->created, 'd/m/Y H:i') ?></td>
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
                    <div class="col-md-3">
                      <?= $this->Form->control("cep",[
                        'class' => 'form-control',
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
                      <button class="btn btn-flat btn-success float-r" type="submit">Adicionar</button>
                    </div>
                    <?= $this->Form->end(); ?>
                  </div>
                  <div class="box-footer m-t-15 m-b-15">
                    <table class="table table_data">

                    </table>
                  </div>
              </div>
            </div>
          </div>  
        </div>
      </div>
    </div>
  </div>

</section>
