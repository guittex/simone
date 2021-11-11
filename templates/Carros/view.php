<section class="content-header">
  <h1>
    Carro
    <small><?php echo __('Visualizar'); ?></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo $this->Url->build(['action' => 'index']); ?>" style="font-size:20px"><i class="fa fa-arrow-left" style="color:#03a9f4"></i> <?php echo __('Voltar'); ?></a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-solid">
        <!-- /.box-header -->
        <div class="box-body">
          <div class="nav-tabs-custom">
              <ul class="nav nav-tabs">
                <li class="active">
                    <a href="#carros-aba" data-toggle="tab"><?= __('Dados do Carro') ?></a>
                </li>
              </ul>
              <div class="tab-content">
                <div class="active tab-pane" id="carros-aba">
                  <?= $this->Form->create($carro,[
                    'url' => [
                      'action' => 'edit',
                      $carro->id,
                    ],
                    'type' => 'post'
                  ]) ?>
                  <div class="box-body">
                    <div class="col-md-3">
                      <?= $this->Form->control('modelo',['placeholder' => 'Digite...']); ?>
                    </div>
                    <div class="col-md-3">
                      <?= $this->Form->control('marca',['placeholder' => 'Digite...']); ?>
                    </div>
                    <div class="col-md-3">
                      <?= $this->Form->control('tipo',['placeholder' => 'Digite...']); ?>
                    </div>
                    <div class="col-md-3">
                      <?= $this->Form->control('placa',['placeholder' => 'Digite...']); ?>
                    </div>
                    <div class="col-md-3">
                      <?= $this->Form->control('cor',['placeholder' => 'Digite...']); ?>
                    </div>
                  </div>
                  <div class="box-footer">
                    <button class="btn btn-flat btn-warning float-r">Editar</button>
                  </div>
                  <?= $this->Form->end(); ?>
                </div>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</section>
