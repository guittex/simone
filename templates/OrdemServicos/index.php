<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Ordem Serviços
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
        <div class="box-body">
          <table class="table table-hover table_data">
            <thead>
              <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Diagnostico</th>
                  <th scope="col">Carro</th>
                  <th scope="col">Valor Total Gasto</th>
                  <th scope="col">Data</th>
                  <th scope="col" class="actions text-center">Ações</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($ordemServicos as $ordemServico): ?>
                <tr>
                  <td><?= $this->Number->format($ordemServico->id) ?></td>
                  <td>
                    <span data-toggle="tooltip" data-placement="top" title="<?= $ordemServico->diagnostico ?>">
                      <?= substr($ordemServico->diagnostico, 1, 80) . '...' ?>
                    </span>                    
                  </td>
                  <td><?= $ordemServico->carro->marca . " " . $ordemServico->carro->modelo ?></td>
                  <td><?=  "R$ ". $ordemServico->valor_total_gasto ?></td>
                  <td><?= date_format($ordemServico->created, 'd/m/Y H:i') ?></td>
                  <td class="actions text-right">
                      <?= $this->Html->link(__('Visualizar'), ['action' => 'view', $ordemServico->id], ['class'=>'btn btn-info btn-xs btn-flat']) ?>
                      <?= $this->Html->link(__('Editar'), ['action' => 'edit', $ordemServico->id], ['class'=>'btn btn-warning btn-xs btn-flat']) ?>
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
<script>
  $(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip()
  });
</script>