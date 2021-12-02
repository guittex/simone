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
      <small><?php echo __('Adicionar'); ?></small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo $this->Url->build(['action' => 'index']); ?>" style="font-size:20px"><i class="fa fa-arrow-left" style="color:#03a9f4"></i> <?php echo __('Voltar'); ?></a></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title"><?php echo __('Formulário'); ?></h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <?php echo $this->Form->create($ordemServico, ['role' => 'form']); ?>
            <div class="box-body">
              <div class="col-md-12">
                <?= $this->Form->control('diagnostico', ['label' => 'Diagnóstico', 'class' => 'form-control', 'placeholder' => "Digite..."]); ?>
              </div>
              <div class="col-md-12">
                <?= $this->Form->control('solucao', ['label' => 'Solução', 'class' => 'form-control', 'placeholder' => "Digite..."]); ?>
              </div>
              <div class="col-md-12">
                <?= $this->Form->control('valor_total_gasto', ['label' => 'Valor Total Gasto', 'class' => 'form-control', 'placeholder' => "Digite..."]); ?>
              </div>
              <div class="col-md-12">
                <?= $this->Form->control('carro_id', ['label' => 'Carro', 'class' => 'form-control', 'placeholder' => "Digite..."]); ?>
              </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <button class="btn btn-flat btn-success float-r">Adicionar</button>
            </div>

          <?php echo $this->Form->end(); ?>
        </div>
        <!-- /.box -->
      </div>
  </div>
  <!-- /.row -->
</section>

