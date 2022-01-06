<ul class="sidebar-menu" data-widget="tree">
    <li class="treeview">
        <a href="#">
            <i class="fa fa-building"></i> <span>Administrativo</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="<?= $this->Url->build(['controller' => 'Clientes', 'action' => 'index'], ['escape' => false]) ?>"><i class="fa fa-circle-o"></i>Clientes</a></li>
            <li><a href="<?php echo $this->Url->build('/users'); ?>"><i class="fa fa-circle-o"></i>Usuários</a></li>
            <li><a href="<?php echo $this->Url->build('/tipo-documentos'); ?>"><i class="fa fa-circle-o"></i>Tipo Documentos</a></li>
        </ul>
    </li> 
    <li class="treeview">
        <a href="#">
            <i class="fa fa-building"></i> <span>Carros</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="<?php echo $this->Url->build('/carros'); ?>"><i class="fa fa-circle-o"></i>Listagem</a></li>
            <li><a href="<?php echo $this->Url->build('/pages/home2'); ?>"><i class="fa fa-circle-o"></i>Reservas</a></li>
            <li><a href="<?= $this->Url->build(['controller' => 'OrdemServicos', 'action' => 'index'], ['escape' => false]) ?>"><i class="fa fa-circle-o"></i>Ordem de Serviço</a></li>
        </ul>
    </li>
</ul>