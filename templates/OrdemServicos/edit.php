<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\OrdemServico $ordemServico
 */
?>
<!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Ordem Servico
      <small><?php echo __('Edit'); ?></small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo $this->Url->build(['action' => 'index']); ?>"><i class="fa fa-dashboard"></i> <?php echo __('Home'); ?></a></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title"><?php echo __('Form'); ?></h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <?php echo $this->Form->create($ordemServico, ['role' => 'form', 'type' => 'file', 'enctype' => "multipart/form-data"]); ?>
            <div class="box-body">
              <?php
                echo $this->Form->control('diagnostico',['label' => 'Diagnóstico']);
                echo $this->Form->control('solucao',['label' => 'Solução']);
                echo $this->Form->control('valor_total_gasto');
                echo $this->Form->control('carro_id', ['options' => $carros, 'empty' => true, 'disabled' => true]);
                echo $this->Form->hidden('carro_id');
                echo $this->Form->control('arquivo', ['type' => 'file', 'name' => "arquivos[]", 'class' => 'form-control', 'placeholder' => "Selecione", "multiple" => "multiple"]);
              ?>
            </div>
            <!-- /.box-body -->

          <?php echo $this->Form->submit(__('Salvar'),['class' => "float-r btn btn-flat btn-success"]); ?>

          <?php echo $this->Form->end(); ?>
        </div>
        <!-- /.box -->
      </div>
  </div>
  <!-- /.row -->
</section>
<script>
  $(document).ready(function(){
    $('#valor-total-gasto').maskMoney();
  });
</script>