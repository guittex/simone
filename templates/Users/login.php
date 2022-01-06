<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<!-- Content Header (Page header) -->
<?php $this->layout = 'AdminLTE.login'; ?>
<?php
// echo $this->Form->create(false, ['url' => $this->Url->build(['controller' => 'Users', 'action' => 'login'], ['escape' => false, 'fullBase' => true,])]);
?>

<?= $this->Form->create() ?>
<div class="form-group has-feedback">
    <?= $this->Flash->render() ?>
</div>
<div class="form-group has-feedback">
    <?= $this->Form->control('email', ['class' => 'form-control', 'placeholder' => __('Email'), 'label' => false]) ?>
    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
</div>
<div class="form-group has-feedback">
    <?= $this->Form->control('password', ['name' => 'password', 'label' => false, 'class' => 'form-control', 'placeholder' => __('Password')]) ?>
    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
</div>
<div class="row">
    <hr>
    <div class="col-xs-12 float-r">
        <?= $this->Form->button(__('Enviar'),['class' => 'btn btn-flat btn-success', 'type' => 'submit', 'style' => 'float:right']); ?>
    </div>
</div>
<?= $this->Form->end(); ?>