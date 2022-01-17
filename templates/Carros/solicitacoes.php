
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

    @media screen and (max-width: 450px) {
        .carouselFadeOut {
            width: 100%!important;
        }

        #step2{
            height: 60%!important;
        }

        #btnPrevStep1{
            margin-bottom: 10px;
        }
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
                    <div class="col-md-12 col-lg-10">
                        <div class="wrap d-md-flex">   
                            <?php foreach ($img_format as $key => $carro_array) : ?>
                                <div class="carousel slide carouselFadeOut" id="carouselExampleControls<?= $key ?>"  data-ride="carousel" style="width:50%;display:none;height:373px">
                                        <div class="carousel-inner" id="bodyCarrosel<?= $key ?>">
                                            <?php 
                                                foreach ($carro_array as $key2 => $img_file) : 
                                                    if($key2 == 0){
                                                        $active = "active";
                                                    }else{
                                                        $active = "";
                                                    }
                                            ?>                                            
                                                <div class="carousel-item <?= $active ?>">
                                                    <?= $this->Html->image($img_file['file'], [
                                                            'target' => '_blank',
                                                            'pathPrefix' => "files/Documentos/arquivo/",
                                                            'class' => 'd-block w-95 img-carrosel'
                                                        ]); ?>
                                                </div>
                                            <?php endforeach; ?>                                        
                                        </div>
                                    <a class="carousel-control-prev" href="#carouselExampleControls<?= $key ?>" role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                <a class="carousel-control-next" href="#carouselExampleControls<?= $key ?>" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                            <?php endforeach ?>
                            <div class="img" id="imgInicial" style="background-image: url(/app/img/back1.jpg);"></div>
                            <div class="login-wrap p-4 p-md-5" id="step1">
                                <div class="d-flex">
                                    <div class="w-100">
                                        <h3 class="mb-4">Para começar, selecione o modelo desejado!</h3>
                                    </div>                                
                                </div>
                                <div class="form-group mb-3">
                                    <?= $this->Form->control("carro",[
                                        'options' => $carros,
                                        'label' => 'Carros',
                                        'onchange' => 'changeImg(this)',
                                        'class' => 'form-control',
                                        'empty' => 'Selecione um modelo...'
                                    ]) ?>
                                </div>                                
                                <div class="form-group">
                                    <button type="button" id="btnNextStep2" class="btn btn-success w-100 rounded submit px-3" disabled>Próximo</button>
                                </div>                            
                            </div>
                            <div class="login-wrap p-4 p-md-5" id="step2" style="display:none;height:580px">
                                <div class="d-flex">
                                    <div class="w-100">
                                        <h3 class="mb-4">Preencha as informações</h3>
                                    </div>                                
                                </div>
                                <?= $this->Form->control("nome",[
                                    'label' => 'Nome Completo',
                                    'id' => 'nome-cliente',
                                    'class' => 'form-control checkInfo',
                                    'placeholder' => 'Digite...'
                                ]) ?>
                                <?= $this->Form->control("cpf",[
                                    'label' => 'CPF',
                                    'id' => 'cpf-cliente',
                                    'class' => 'form-control checkInfo',
                                    'placeholder' => 'Digite...'
                                ]) ?>
                                 <?= $this->Form->control("email",[
                                    'label' => 'E-mail',
                                    'id' => 'email-cliente',
                                    'class' => 'form-control checkInfo',
                                    'placeholder' => 'Digite...'
                                ]) ?>
                                <?= $this->Form->control("cnh",[
                                    'label' => 'CNH',
                                    'id' => 'cnh-cliente',
                                    'class' => 'form-control checkInfo',
                                    'placeholder' => 'Digite...'
                                ]) ?>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <button type="button" id="btnPrevStep1" class="w-100 btn btn-danger rounded submit px-3">Voltar</button>
                                        </div>
                                        <div class="col-md-6">
                                            <button type="button" id="btnNextStep3" class="w-100 btn btn-success rounded submit px-3">Concluir</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="login-wrap p-4 p-md-5" id="step3" style="display:none;width:480px">
                                <div class="d-flex">
                                    <div class="w-100">
                                        <h3 class="mb-4">Obrigado por preencher as informações, em breve entraremos em contato para dar continuidade na sua solicitação</h3>
                                    </div>                                
                                </div>
                                <div class="row" style="display:none">
                                    <form id="formCadastro" action="">

                                    </form>
                                </div>
                            </div>
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
        $("#btnNextStep2").on("click", function(){
            $("#formCadastro").empty();

            $("#step1").css("display", 'none');

            $("#step2").fadeIn();

            $("#formCadastro").append(`<input name="carro" value="${$("#carro").val()}">`)
        });

        $("#btnPrevStep1").on("click", function(){
            $("#step2").css("display", 'none');

            $("#step1").fadeIn();
        });

        $("#btnNextStep3").on("click", function(){
            if($("#nome-cliente").val() != "" && $("#cpf-cliente").val() != "" && $("#cnh-cliente").val() != "" && $("#email-cliente").val() != ""){
                $("#formCadastro").append(`<input name="nome" value="${$("#nome-cliente").val()}">`)

                $("#formCadastro").append(`<input name="cpf" value="${$("#cpf-cliente").val()}">`)

                $("#formCadastro").append(`<input name="cnh" value="${$("#cnh-cliente").val()}">`)

                $("#formCadastro").append(`<input name="email" value="${$("#email-cliente").val()}">`)

                $("#step2").css("display", 'none');

                $("#step3").fadeIn();

                $.ajax({
                    url: saveSolicitation(),
                    type: 'POST',
                    data: $("#formCadastro").serializeArray(),
                    beforeSend: function(xhr) {
                        xhr.setRequestHeader('X-CSRF-Token', '<?= $this->request->getAttribute('csrfToken'); ?>');
                    },
                    success: function(retorno){
                        
                    }
                })
            }else{
                alert('Preencha as informações restante');
            }
        });     
    });

    function saveSolicitation(){
        return "<?= $this->Url->build("/carros/save-solicitation") ?>"
    }

    function changeImg(element)
    {
        $("#formCadastro").empty();

        if($(element).val().length == 0){
            $("#imgInicial").fadeIn();

            $("#btnNextStep2").attr("disabled", true);
        }else{
            $("#imgInicial").css("display", "none");
            
            $("#btnNextStep2").attr("disabled", false);
        }

        $(".carouselFadeOut").css("display", "none");


        $(`#carouselExampleControls${$(element).val()}`).fadeIn();
    }
</script>
