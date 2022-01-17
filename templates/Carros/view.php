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
                <li>
                  <a href="#imagens-aba" data-toggle="tab"><?= __('Imagens do Carro') ?></a>
                </li>
                <li>
                  <a href="#ordem-servico-aba" data-toggle="tab"><?= __('Ordem de Serviço') ?></a>
                </li>
                <li>
                  <a href="#multa-aba" data-toggle="tab"><?= __('Multas') ?></a>
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
                    <div class="col-md-3">
                      <?= $this->Form->control('km_total_mensal',['placeholder' => 'Digite...', 'label' => 'KM Total Mensal']); ?>
                    </div>
                    <div class="col-md-3">
                      <div class="pretty p-switch p-fill p-bigger m-t-35">
                          <input type="checkbox" name="alugado" <?= $carro->alugado ? "checked" : "" ?> value="<?= $carro->alugado ?>" />
                          <div class="state p-success">
                              <label style="font-weight:700!important">Alugado</label>
                          </div>
                      </div>
                    </div>  
                  </div>
                  <div class="box-footer">
                    <button class="btn btn-flat btn-warning float-r">Editar</button>
                  </div>
                  <?= $this->Form->end(); ?>
                </div>
                <div class="tab-pane" id="imagens-aba">
                  <div class="box-header">
                    <?= $this->Form->create(null, ['url' => ['action' => 'addImagensToCar'], 'role' => 'form', 'type' => 'file', 'enctype' => "multipart/form-data" ]) ?>
                      <?= $this->Form->hidden("carro_id",['value' => $carro->id]) ?>
                      <div class="col-md-4">
                        <?= $this->Form->control("arquivo[]",[
                          'type' => 'file',
                          'class' => 'form-control',
                          'required' => true,
                          'accept' => ".jpg, .jpeg, .png",
                          'label' => 'Imagens',
                          'multiple' => 'multiple',
                          'templates' => [
                            'inputContainer' => "{{content}}"
                          ]
                        ]) ?>
                      </div>
                      <div class="col-md-3">
                        <button class="btn btn-success btn-flat" style="margin-top:24px">Adicionar</button>
                      </div>
                    <?= $this->Form->end(); ?>
                  </div>
                  <div class="box-body">
                  <hr>
                  <?php foreach($imagens_carro as $key => $file) : ?>
                      <div class="col-md-3">
                        <div class="panel panel-default">
                          <div class="panel-heading text-center">
                            Imagem <?= $key + 1 ?>
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
                <div class="tab-pane" id="ordem-servico-aba">
                    <div class="box-header">
                      <?= $this->Html->link('Adicionar', [
                          'controller' => 'OrdemServicos',
                          'action' => 'add'
                      ], ['class' => 'btn btn-success float-r btn-flat', 'target' => '_blank', 'style' => "border-radius:20px"]) ?>
                    </div>
                    <div class="box-body">
                      <hr style="margin-top:5px">
                      <table class="table table-hover table_data">
                        <thead>
                          <tr>
                            <th>id</th>
                            <th>Diagnóstico</th>
                            <th>Valor Total Gasto</th>
                            <th>Data</th>
                            <th>Ações</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php foreach($ordem_servicos as $key => $ordem) : ?>
                            <tr>
                              <td><?= $ordem->id ?></td>
                              <td><?= substr($ordem->diagnostico, 1, 80) . '...' ?></td>
                              <td><?= $this->Number->currency($ordem->valor_total_gasto); ?></td>
                              <td><?= date_format($ordem->created, 'd/m/Y H:i') ?></td>
                              <td>
                                <button class="btn btn-primary btn-flat btn-xs" onclick="openModalOrdem(<?= $ordem->id ?>)">Visualizar</button>
                              </td>
                            </tr>
                          <?php endforeach; ?>
                        </tbody>
                      </table>
                    </div>
                </div>
                <div class="tab-pane" id="multa-aba">
                  <div class="box-body">
                    
                  </div>
                </div>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="modal" tabindex="-1" role="dialog" id="modalViewOrdem">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <div class="col-md-6">
            <h3 class="modal-title">
              <i class="fa fa-info-circle"></i> Informações
            </h3>
          </div>
          <div class="col-md-6">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true" style="font-size:37px">&times;</span>
            </button>
          </div>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-12" id="divBodyViewOrdem" style="font-size:16px">

            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
        </div>
      </div>
    </div>
  </div>  
</section>
<script>
  $(document).ready(function(){
    
  });
  
  function urlViewOrdem() {
      return "<?= $this->Url->build("/carros/view-ordem"); ?>"
  }

  function openModalOrdem(id)
  {
    $("#modalViewOrdem").modal("show");

    $.ajax({
        url: urlViewOrdem(),
        method: 'GET',
        data:{
            id: id
        },
        beforeSend: function(xhr){
            xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"').val());
        },
        success: function(data){
          $("#divBodyViewOrdem").empty();

          retorno = JSON.parse(data);

          $("#divBodyViewOrdem").append(`<p><b>Diagnóstico: </b>${retorno.diagnostico}</p>`)
          $("#divBodyViewOrdem").append(`<p><b>Solução: </b>${retorno.solucao}</p>`)

          
          if(retorno.documentos.length >= 1){
            $("#divBodyViewOrdem").append(`<p><b>Imagens: </b></p>`)

            $(retorno.documentos).each(function(){
              var extension = this.arquivo.split('.').pop();

              if(extension == 'pdf'){
                $("#divBodyViewOrdem").append(`<div class="col-md-3"><a href="/app/files/documentos/arquivo/${this.arquivo}" target="_blank" download="Documento"><img src="/app/files/Imagens/arquivo/pdf.png" target="_blank" style="width:140px" alt=""></a></div>`);
              }else{
                $("#divBodyViewOrdem").append(`<div class="col-md-3"><img src="/app/files/Documentos/arquivo/${this.arquivo}" target="_blank" style="width:193px" alt=""></div>`);
              }
            });
          }
        }
    });
  }
</script>