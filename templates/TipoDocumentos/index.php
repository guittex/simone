<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Tipo Documentos

    <div class="pull-right"><?php echo $this->Html->link(__('Adicionar'), ['action' => 'add'], ['class'=>'btn btn-success btn-add-head']) ?></div>
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
        <!-- /.box-header -->
        <div class="box-body">
          <table class="table table-hover table_data">
            <thead>
              <tr>
                  <th scope="col"><?= __('ID') ?></th>
                  <th scope="col"><?= __('Nome') ?></th>
                  <th scope="col"><?= __('Criado') ?></th>
                  <th scope="col" class="actions float-r"><?= __('Ações') ?></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($tipoDocumentos as $tipoDocumento): ?>
                <tr>
                  <td><?= $this->Number->format($tipoDocumento->id) ?></td>
                  <td><?= h($tipoDocumento->nome) ?></td>
                  <td><?= date_format($tipoDocumento->created, 'd/m/Y H:i') ?></td>
                  <td class="actions text-right">
                      <!-- </?= $this->Html->link(__('Visualizar'), ['action' => 'view', $tipoDocumento->id], ['class'=>'btn btn-flat btn-info btn-xs']) ?> -->
                      <?= $this->Html->link(__('Editar'), ['action' => 'edit', $tipoDocumento->id], ['class'=>'btn btn-flat btn-warning btn-xs']) ?>
                      <?= $this->Form->postLink(__('Deletar'), ['action' => 'delete', $tipoDocumento->id], ['confirm' => __('Tem certeza que deseja deletar?'), 'class'=>'btn btn-flat btn-danger btn-xs']) ?>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
  </div>
</section>