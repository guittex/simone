<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Solicitações
    <div class="pull-right"><button class="btn btn-flat btn-success btn-add-head">Gerar Link de Solicitação</button></div>
  </h1>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title"><?php echo __('Lista'); ?></h3>
        </div>
        <div class="box-body">
          <table class="table table-hover table_data">
            <thead>
              <tr>
                  <th scope="col"><?= __('id') ?></th>
                  <th scope="col"><?= __('Carro') ?></th>
                  <th scope="col"><?= __('Status') ?></th>
                  <th scope="col"><?= __('Cliente') ?></th>
                  <th scope="col"><?= __('Criado') ?></th>
                  <th scope="col" class="actions text-center"><?= __('Ações') ?></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($solicitacoes as $solicitaco): ?>
                <tr>
                  <td><?= $this->Number->format($solicitaco->id) ?></td>
                  <td><?= $solicitaco->carro->marca . ' ' . $solicitaco->carro->modelo ?></td>
                  <td>
                    <?php if($solicitaco->status == 'Aberta') : ?>
                      <span style="background-color: #4caf50; padding: 7px; color: white; border-radius: 25px;"><?= h($solicitaco->status) ?></span>
                    <?php elseif($solicitaco->status == "aguardando_documentos"): ?>
                      <span style="background-color: #ff9800; padding: 7px; color: white; border-radius: 25px;">Aguardando Documentos</span>
                    <?php elseif($solicitaco->status == "documentos_anexados"): ?>
                      <span style="background-color: #00bcd4; padding: 7px; color: white; border-radius: 25px;">Documentos Anexados</span>
                    <?php endif; ?>
                  </td>
                  <td><?= $solicitaco->cliente->nome ?></td>
                  <td><?= date_format($solicitaco->created, 'd/m/Y H:i') ?></td>
                  <td class="actions text-center">
                      <?= $this->Html->link(__('Visualizar'), ['action' => 'view', $solicitaco->id], ['class'=>'btn btn-info btn-xs btn-flat']) ?>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>