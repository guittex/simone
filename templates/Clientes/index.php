<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Clientes
    <div class="pull-right"><?php echo $this->Html->link(__('Adicionar'), ['action' => 'add'], ['class'=>'btn btn-flat btn-success btn-add-head']) ?></div>
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
                  <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                  <th scope="col">Nome</th>
                  <th scope="col">CPF</th>
                  <th scope="col" class="actions text-right">Ações</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($clientes as $cliente): ?>
                <tr>
                  <td><?= $this->Number->format($cliente->id) ?></td>
                  <td><?= h($cliente->nome) ?></td>
                  <td><?= h($cliente->cpf) ?></td>
                  <td class="actions text-right">
                      <?= $this->Html->link(__('Visualizar'), ['action' => 'view', $cliente->id], ['class'=>'btn btn-info btn-flat btn-xs']) ?>
                      <?= $this->Form->postLink(__('Deletar'), ['action' => 'delete', $cliente->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cliente->id), 'class'=>'btn btn-danger btn-flat btn-xs']) ?>
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
