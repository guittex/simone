<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Carros
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
          <table class="table table_data table-hover">
            <thead>
              <tr>
                  <th>ID</th>
                  <th>Modelo</th>
                  <th>Marca</th>
                  <th>Tipo</th>
                  <th>Placa</th>
                  <th>Cor</th>
                  <th>Criado</th>
                  <th class="actions text-center"><?= __('Ações') ?></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($carros as $carro): ?>
                <tr>
                  <td><?= $this->Number->format($carro->id) ?></td>
                  <td><?= h($carro->modelo) ?></td>
                  <td><?= h($carro->marca) ?></td>
                  <td><?= h($carro->tipo) ?></td>
                  <td><?= h($carro->placa) ?></td>
                  <td><?= h($carro->cor) ?></td>
                  <td><?= h($carro->modified) ?></td>
                  <td class="actions text-right">
                      <?= $this->Html->link(__('Visualizar'), ['action' => 'view', $carro->id], ['class'=>'btn btn-flat btn-info btn-xs']) ?>
                      <?= $this->Form->postLink(__('Deletar'), ['action' => 'delete', $carro->id], ['confirm' => __('Você tem certeza que deseja deletar'), 'class'=>'btn btn-flat btn-danger btn-xs']) ?>
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