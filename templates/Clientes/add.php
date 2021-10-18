<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cliente $cliente
 */
?>
<!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Cliente
      <small><?php echo __('Adicionar'); ?></small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo $this->Url->build(['action' => 'index']); ?>"><i class="fa fa-dashboard"></i> <?php echo __('Home'); ?></a></li>
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
          <?php echo $this->Form->create($cliente, ['role' => 'form']); ?>
            <div class="box-body">
              <div class="col-md-4">
                <?= $this->Form->control('nome',[
                  'placeholder' => 'Digite...',
                  'class' => 'form-control'
                ]) ?>
              </div>
              <div class="col-md-4">
                <?= $this->Form->control('cpf',[
                  'placeholder' => 'Digite...',
                  'label' => 'CPF',
                  'class' => 'form-control cpf'
                ]) ?>
              </div>
              <div class="col-md-4">
                  <?= $this->Form->control('rg',[
                    'placeholder' => 'Digite...',
                    'label' => 'RG',
                    'class' => 'form-control'
                  ]) ?>
              </div>    
              <div class="col-md-4">
                <?= $this->Form->control('data_nascimento',[
                    'placeholder' => 'Digite...',
                    'label' => 'Data de Nascimento',
                    'class' => 'form-control'
                  ]) ?>
              </div>    
              <div class="col-md-4">
                <?= $this->Form->control('cnh',[
                    'placeholder' => 'Digite...',
                    'label' => 'CNH',
                    'class' => 'form-control'
                  ]) ?>
              </div>       
              <div class="col-md-4">
                <?= $this->Form->control('estado_civil',[
                    'value' => $cliente->estado_civil,
                    'label' => 'Estado Civíl',
                    'empty' => 'Selecione...',
                    'options' => [
                      'solteiro' => 'Solteiro(a)',
                      'casado' => 'Casado(a)',
                      'divorciado' => 'Divorciado(a)',
                      'viuvo' => 'Viúvo(a)',
                      'sem_especificacao' => 'Não Divulgado'
                    ],
                    'class' => 'form-control select2'
                  ]) ?>
              </div>    
              <div class="col-md-4">
                <?= $this->Form->control('sexo',[
                    'value' => $cliente->sexo,
                    'label' => 'Sexo',
                    'empty' => 'Selecione...',
                    'options' => [
                      'solteiro' => 'Masculino',
                      'casado' => 'Feminino',
                      'sem_especificacao' => 'Não Divulgado'
                    ],
                    'class' => 'form-control select2'
                  ]) ?>            
              </div>      
            </div>   
            <div class="box-footer">
              <button class="btn btn-flat btn-success float-r" type='submit'>Adicionar</button>
            </div>   

          <?php echo $this->Form->end(); ?>
        </div>
        <!-- /.box -->
      </div>
  </div>
  <!-- /.row -->
</section>

