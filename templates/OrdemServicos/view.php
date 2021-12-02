<section class="content-header">
  <h1>
    Ordem Servico
    <small><?php echo __('View'); ?></small>
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
        <div class="box-header with-border">
          <i class="fa fa-info"></i>
          <h3 class="box-title">Informações</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body text-center">
          <div class="col-md-4">
            <label class="m-r-15" style="font-size:20px">Carro</label>
            <span style="font-size:20px"><?= $ordemServico->carro->marca . " " . $ordemServico->carro->modelo ?></span>
          </div>
          <div class="col-md-4">
            <label class="m-r-15" style="font-size:20px">Valor Total Gasto</label>
            <span style="font-size:20px"><?= $this->Number->currency($ordemServico->valor_total_gasto)?></span>
          </div>
          <div class="col-md-4">
            <label class="m-r-15" style="font-size:20px">Data</label>
            <span style="font-size:20px"><?= date_format($ordemServico->created, 'd/m/Y H:i') ?></span>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="box box-solid">
        <div class="box-header with-border">
          <i class="fa fa-text-width"></i>
          <h3 class="box-title">Diagonóstico</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <?= $this->Text->autoParagraph($ordemServico->diagnostico); ?>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="box box-solid">
        <div class="box-header with-border">
          <i class="fa fa-text-width"></i>
          <h3 class="box-title"><?= __('Solucao') ?></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <?= $this->Text->autoParagraph($ordemServico->solucao); ?>
        </div>
      </div>
    </div>
  </div>
</section>
