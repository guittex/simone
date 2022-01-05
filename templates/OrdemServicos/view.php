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
            <span style="font-size:20px"><?= "R$ ". $ordemServico->valor_total_gasto ?></span>
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
  <div class="row">
    <div class="col-md-12">
      <div class="box box-solid">
        <div class="box-header with-border">
          <i class="fa fa-image"></i>
          <h3 class="box-title"><?= __('Imagens') ?></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body" style="text-align:center">
          <!-- </?php 
            if(count($ordemServico->documentos) >= 1) :
            foreach ($ordemServico->documentos as $key => $file) : 
          ?>
            <div class="col-md-4">                        
              </?= $this->Html->image($file->arquivo, [
                    'target' => '_blank',
                    'pathPrefix' => "files/Documentos/arquivo/",
                    'style' => 'width:193px;border-radius:10px'
                ]);                
              ?>
            </div>
          </?php 
            endforeach; 
            endif;
          ?> -->
          <?php foreach($ordemServico->documentos as $key => $file) : ?>
            <div class="col-md-3">
              <div class="panel panel-default">
                <div class="panel-heading text-center">
                  Arquivo <?= $key + 1 ?>
                </div>
                <div class="panel-body" style="height:240px;text-align:center;overflow:auto">
                  <?php 
                      $type_file = pathinfo($file->arquivo, PATHINFO_EXTENSION);

                      $type_images = ['png', 'PNG', 'jpg', 'JPG', 'jpeg', 'JPEG'];

                      if(in_array($type_file, $type_images)){
                        $file = $file->arquivo;

                        $link = $this->Html->image($file, [
                            'target' => '_blank',
                            'pathPrefix' => "files/Documentos/arquivo/",
                            'style' => 'width:193px'
                        ]);
                        
                        echo $link;

                      }else{
                        $file = $file->arquivo;

                        $link_file = $this->Html->link('replace_icon', [
                              'controller' => "files",
                              'action' => "Documentos",
                              "arquivo",
                              $file
                            ],[
                              "target" => '_blank',
                              'download' => "Documento"
                            ]
                        );

                        $link_image = $this->Html->image('pdf.png', [
                            'target' => '_blank',
                            'pathPrefix' => "files/Imagens/arquivo/",
                            'style' => 'width:140px'
                        ]);

                        echo str_replace("replace_icon", $link_image, $link_file);
                      }                    
                  ?>
                </div>
                <div class="panel-footer text-center">
                  <?php
                    $link_file = $this->Html->link('replace_icon', [
                            'controller' => "files",
                            'action' => "Documentos",
                            "arquivo",
                            $file
                          ],[
                            "target" => '_blank',
                            'download' => "Documento"
                          ]
                      );

                    echo str_replace("replace_icon", '<i class="fa fa-download m-r-10" style="font-size: 30px;color: #3f51b5;cursor:pointer"></i>', $link_file);
                  ?>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
</section>
