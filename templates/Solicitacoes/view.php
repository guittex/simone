<section class="content-header">
  <h1>
    Solicitacão
    <small><?php echo __('Visualização'); ?></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="/app/solicitacoes" style="font-size:20px"><i class="fa fa-arrow-left" style="color:#03a9f4"></i> <?php echo __('Voltar'); ?></a></li>
  </ol>
</section>

<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-solid">
        <div class="box-header with-border">
          <i class="fa fa-info"></i>
          <h3 class="box-title"><?php echo __('Informações'); ?></h3>
          <?= $this->Html->link(__('Ficha Completa'), ['controller' => "Carros", 'action' => 'view', $solicitaco->carro->id], ['class' => 'btn btn-flat btn-success btn-xs float-r', 'style' => 'border-radius:25px', 'target' => "_blank"]) ?>
        </div>
        <div class="box-body text-center">
          <div class="col-md-3">
            <label class="m-r-15" style="font-size:20px">Carro</label>
            <span style="font-size:20px"><?= $solicitaco->carro->marca . " " . $solicitaco->carro->modelo ?></span>
          </div>
          <div class="col-md-3">
            <label class="m-r-15" style="font-size:20px">Placa</label>
            <span style="font-size:20px"><?= $solicitaco->carro->placa ?></span>
          </div>
          <div class="col-md-3">
            <label class="m-r-15" style="font-size:20px">Cor</label>
            <span style="font-size:20px"><?= $solicitaco->carro->cor ?></span>
          </div>
          <div class="col-md-3">
            <label class="m-r-15" style="font-size:20px">Status</label>
            <?php if($solicitaco->status == 'Aberta') : ?>
              <span style="background-color: #4caf50;padding:5px; color: white; border-radius: 25px;"><?= h($solicitaco->status) ?></span>
            <?php elseif($solicitaco->status == "aguardando_documentos"): ?>
              <span style="background-color: #ff9800;padding:5px; color: white; border-radius: 25px;">Aguardando Documentos</span>
            <?php elseif($solicitaco->status == "documentos_anexados"): ?>
                    <span style="background-color: #00bcd4; padding: 7px; color: white; border-radius: 25px;">Documentos Anexados</span>
            <?php endif; ?>          
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-12">
      <div class="box box-solid">
        <div class="box-header with-border">
          <i class="fa fa-info"></i>
          <h3 class="box-title"><?php echo __('Dados do Cliente'); ?></h3>
          <?= $this->Html->link(__('Ficha Completa'), ['controller' => "Clientes", 'action' => 'view', $solicitaco->cliente->id], ['class' => 'btn btn-flat btn-success btn-xs float-r', 'style' => 'border-radius:25px', 'target' => "_blank"]) ?>
        </div>
        <div class="box-body text-center">
          <div class="col-md-4">
            <label class="m-r-15" style="font-size:20px">Nome</label>
            <span style="font-size:20px"><?= $solicitaco->cliente->nome ?></span>
          </div>
          <div class="col-md-4">
            <label class="m-r-15" style="font-size:20px">CPF</label>
            <span style="font-size:20px"><?= $solicitaco->cliente->cpf ?></span>
          </div>
          <div class="col-md-4">
            <label class="m-r-15" style="font-size:20px">CNH</label>
            <span style="font-size:20px"><?= $solicitaco->cliente->cnh ?></span>
          </div>
        </div>
      </div>      
    </div>
    <div class="col-md-12">
      Colocar os documentos anexados aqui
    </div>
    <div class="col-md-12 text-center">
      <?php 
        if($solicitaco->status == "aguardando_documentos"){
          echo $this->Form->control(__('Enviar Solicitação de Anexo'), ['class' => 'btn btn-flat btn-success m-r-5', 'disabled' => true, 'type' => 'button', 'label' => false, 'templates' => ['inputContainer' => '{{content}}'] ]);
        }elseif($solicitaco->status == "Aberta"){
          echo $this->Html->link(__('Enviar Solicitação de Anexo'), ['controller' => "Solicitacoes", 'action' => 'sendSolicitationAnexo', $solicitaco->cliente->id, $solicitaco->id], ['class' => 'btn btn-flat btn-success m-r-5']);
        }
      ?>
      <button class="btn btn-danger btn-flat m-r-5">Reprovar Solicitação</button>
      <button class="btn btn-success btn-flat m-r-5">Aprovar Solicitação</button>
      <button class="btn btn-primary btn-flat m-r-5">Enviar e-mail</button>
    </div>
  </div>

</section>
