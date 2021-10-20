<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TipoDocumento $tipoDocumento
 */
?>
<!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Tipo Documento
      <small><?php echo __('Edição'); ?></small>
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
          <?php echo $this->Form->create($tipoDocumento, ['role' => 'form']); ?>
            <div class="box-body">
              <?php
                echo $this->Form->control('nome');
              ?>
            </div>
            <div class="box-footer">
              <button type="submit" class="btn btn-flat btn-success btn-flat float-r">Editar</button>
            </div>
            <!-- /.box-body -->
          <?php echo $this->Form->end(); ?>
        </div>
        <!-- /.box -->
      </div>
  </div>
  <!-- /.row -->
</section>
