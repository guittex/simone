<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Usuários
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
                  <th>Nome</th>
                  <th>E-mail</th>                  
                  <th class="actions text-center"><?= __('Ações') ?></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($users as $user): ?>
                <tr>
                  <td><?= $user->id ?></td>
                  <td><?= $user->nome_completo ?></td>
                  <td><?= h($user->email) ?></td>                  
                  <td class="actions text-center">
                      <?= $this->Html->link(__('Editar'), ['action' => 'edit', $user->id], ['class'=>'btn btn-flat btn-warning btn-xs']) ?>
                      <?= $this->Form->postLink(__('Deletar'), ['action' => 'delete', $user->id], ['confirm' => __('Você tem certeza que deseja deletar'), 'class'=>'btn btn-flat btn-danger btn-xs']) ?>
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