<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Carro $carro
 */
?>
<!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Usuários
      <small><?php echo __('Editar'); ?></small>
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
          <?php echo $this->Form->create($user, ['role' => 'form']); ?>
            <div class="box-body">
                <div class="col-md-6">
                    <?= $this->Form->control('nome_completo'); ?>
                </div>
                <div class="col-md-3">
                    <?= $this->Form->control('email'); ?>
                </div>
                <div class="col-md-3">
                    <?= $this->Form->control('password',['type' => 'password', 'label' => 'Senha', 'value' => '', 'placeholder' => 'Digite...']); ?>
                </div>
            </div>
            <!-- /.box-body -->

            <div class="box-footer">
              <button class="btn btn-success btn-flat float-r" type="submit">Adicionar</button>
            </div>

          <?php echo $this->Form->end(); ?>
        </div>
        <!-- /.box -->
      </div>
  </div>
  <!-- /.row -->
</section>
