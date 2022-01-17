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
          <?php echo $this->Form->create($tipoDocumento, ['role' => 'form']); ?>
            <div class="box-body">
              <div class="col-md-8">
                <?= $this->Form->control('nome'); ?>
              </div>
              <div class="col-md-3">
                <div class="pretty p-switch p-fill p-bigger m-t-35">
                    <input type="checkbox" name="obrigatorio" <?= $tipoDocumento->obrigatorio ? "checked" : "" ?> value="<?= $tipoDocumento->obrigatorio ?>" />
                    <div class="state p-success">
                        <label>Documento obrigatório para solicitação de aluguel</label>
                    </div>
                </div>
              </div>          
            </div>
            <div class="box-footer">
                <button type="submit" class="btn btn-flat btn-success btn-flat float-r">Editar</button>
            </div>
        <?php echo $this->Form->end(); ?>
      </div>
  </div>
  <!-- /.row -->
</section>
