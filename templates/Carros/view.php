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
                  </div>
                  <div class="box-footer">
                    <button class="btn btn-flat btn-warning float-r">Editar</button>
                  </div>
                  <?= $this->Form->end(); ?>
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
              console.log(this.arquivo);
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