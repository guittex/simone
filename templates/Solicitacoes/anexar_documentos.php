
<?php $this->disableAutoLayout(); ?>
<style>
    .carousel-control-prev{
        background-color: black;
        border-radius: 50px;
        top: 90%!important;
        left: 100!important;
    }
    .carousel-control-next{
        background-color: black;
        border-radius: 50px;
        top: 90%!important;
        right: 100!important;
    }
    .img-carrosel{
        margin-left: auto;
        margin-right: auto;
    }
    .w-95{
        width: 95%!important;
    }

    .login-wrap{
        background-color: #fdfcfc;
    }

    input[type="file"] {
        display: none;
    }
</style>
<!doctype html>
<html lang="en">
    <head>
        <title>Solicitações</title>

        <meta charset="utf-8">

        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        
        <?= $this->Html->css("solicitacoes_style"); ?>
    </head>
	<body>
        <section class="ftco-section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12 col-lg-12">
                        <div class="wrap d-md-flex">       
                            <?php if($status == "ok"): ?>                    
                            <div class="login-wrap p-4 p-md-5 col-md-12 text-center" id="step1">
                                <h4 style="color:#e3b04b; font-weight:bold; ">
                                    Para continuar com sua solicitação, anexe os documentos obrigátorios abaixo
                                </h4>             
                                <hr> 
                                <?= $this->Form->create(null, ['url' => ['action' => 'send-anexos'], 'type' => 'file', 'id' => 'formFile']) ?>
                                    <!-- Hidden Inputs -->
                                    <input type="hidden" name="cliente_id" value=<?= $solicitacao->cliente_id ?>>
                                    <input type="hidden" name="carro_id" value=<?= $solicitacao->carro_id ?>>
                                    <input type="hidden" name="solicitacao_id" value=<?= $solicitacao->id ?>>

                                    <div class="row text-center">
                                        <?php $cont = 0; ?>
                                        <?php foreach ($tipo_documentos as $key => $tipo_documento) : ?>
                                            <!-- Hidden Inputs -->
                                            <input type="hidden" name="tipo_documentos[]" value="<?= $tipo_documento->id ?>">

                                            <div class="col-md-4" style="margin-bottom:15px">
                                                <div class="card">
                                                    <div class="card-header" style=" background-color: #e3b04b;color: white;font-weight: bold">
                                                        <?= $tipo_documento->nome ?>
                                                    </div>
                                                    <img class="card-img-top" src="/app/files/Imagens/arquivo/imagem2.png" alt="Card image cap" style="border-bottom: 1px solid gainsboro;">
                                                    <div class="card-body">
                                                        <label id="buttonFile<?= $key ?>" class="btn btn-primary">
                                                            <input id="inputFile<?= $key ?>" accept="image/*" class="file" onchange="changeButton('inputFile<?= $key ?>', 'buttonFile<?= $key ?>', 'icon<?= $key ?>')" name="arquivos[]" type="file"/>
                                                            Anexar
                                                        </label>
                                                        <label class="btn btn-primary icon<?= $key ?>" onclick="backFile(<?= $key ?>)" style="display:none"><i class="fa fa-remove"></i></label>
                                                    </div>
                                                </div>                                   
                                            </div>     
                                        <?php $cont = $cont + 1; ?>
                                        <?php endforeach ?>
                                        <div class="col-md-12">
                                            <hr>
                                            <button class="btn btn-success" type="button" onclick="checkAnexos(<?= $cont ?>)" style="float:right">Enviar</button>
                                        </div>
                                    </div>
                                <?= $this->Form->end() ?>
                            </div>
                            <div class="login-wrap p-4 p-md-5" id="step2" style="display:none;height:580px">
                              <input id="helperFormChecked">
                            </div>
                            <?php endif; ?>      
                                        
                            <?php if($status == "documentos_ok") : ?>
                                <div class="login-wrap col-md-12 text-center" style="margin-top:15px">
                                    <h4 style="color:#e3b04b; font-weight:bold; ">
                                        Documentos anexados, em breve entraremos em contato.
                                    </h4>             
                                    <hr> 
                                </div>     
                            <?php endif ?>

                            <?php if($status == "block"): ?>          
                            <div class="login-wrap col-md-12 text-center" style="margin-top:15px">
                                <h4 style="color:#e3b04b; font-weight:bold; ">
                                    Solicitação encerrada, obrigado pelo contato
                                </h4>             
                                <hr> 
                            </div>     
                            <?php endif ?>       
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?php echo $this->Html->script('solicitacoes_jquery.min'); ?>  
        <?php echo $this->Html->script('solicitacoes_popper'); ?>  
        <?php echo $this->Html->script('solicitacoes_bootstrap.min'); ?>  
        <?php echo $this->Html->script('solicitacoes_main'); ?>  
    </body>
</html>
<script>
    $(document).ready(function(){
        
    });

    function checkAnexos()
    {
        $(".file").each(function () {
            if($(this).val() == ""){
                $("#helperFormChecked").val("false");
            }else{
                $("#helperFormChecked").val("true");

            }
        })

        if($("#helperFormChecked").val() == 'false'){
            alert('Existem documentos pendentes para anexar');

        }else{
            $("#formFile").submit()
        }
    }

    function changeButton(file_id, button_id, icon_id)
    {
        if($(`#${file_id}`).val() != ""){
            $(`#${button_id}`).css("display", "none");

            $(`.${icon_id}`).fadeIn();
        }
    }

    function backFile(key)
    {
        $(`#inputFile${key}`).val('');

        $(`.icon${key}`).css("display", "none");

        $(`#buttonFile${key}`).fadeIn();
    }
</script>
