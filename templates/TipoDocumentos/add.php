<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TipoDocumento $tipoDocumento
 */
?>
<!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Tipo de Documento
      <small><?php echo __('Adicionar'); ?></small>
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
            <h3 class="box-title"><?php echo __('Formulário'); ?></h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <?php echo $this->Form->create($tipoDocumento, ['role' => 'form']); ?>
            <div class="box-body">
              <div class="col-md-8">
                <?= $this->Form->control('nome'); ?>
              </div>
              <div class="col-md-3">
                <div class="pretty p-switch p-fill p-bigger m-t-35">
                    <input type="checkbox" name="obrigatorio" />
                    <div class="state p-success">
                        <label>Documento Obrigatório</label>
                    </div>
                </div>
                
              </div>
            </div>
            <!-- /.box-body -->

          <?php echo $this->Form->submit(__('Adicionar'), ['class' => 'btn btn-flat btn-success float-r']); ?>

          <?php echo $this->Form->end(); ?>
        </div>
        <!-- /.box -->
      </div>
  </div>
  <!-- /.row -->
</section>

