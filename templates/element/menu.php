<style>
    .skin-blue .sidebar a{
        color: azure!important;
    }
</style>
<ul class="sidebar-menu" data-widget="tree" style="display:none">
    <li class="treeview">
        <a href="<?php echo $this->Url->build('/'); ?>">
            <i class="fa fa-building"></i> <span>Dashboard</span>
        </a>        
    </li> 
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
            <li><a href="<?= $this->Url->build(['controller' => 'Solicitacoes', 'action' => 'index'], ['escape' => false]) ?>"><i class="fa fa-circle-o"></i>Solicitacoes de Aluguel</a></li>
            <li><a href="<?= $this->Url->build(['controller' => 'OrdemServicos', 'action' => 'index'], ['escape' => false]) ?>"><i class="fa fa-circle-o"></i>Ordem de Serviço</a></li>
        </ul>
    </li>
</ul>

<ul class="sidebar-menu" data-widget="tree">
    <li>
        <a href="<?php echo $this->Url->build('/carros'); ?>">
            <i class="fa fa-car"></i> <span>Carros</span>
        </a>
    </li>
    <li>
        <a href="<?= $this->Url->build(['controller' => 'Clientes', 'action' => 'index'], ['escape' => false]) ?>">
            <i class="fa fa-user"></i> <span>Clientes</span>
        </a>
    </li>
    <li>
        <a href="<?php echo $this->Url->build('/'); ?>">
            <i class="fa fa-chart-line"></i> <span>Dashboard</span>
        </a>        
    </li> 
    <li>
        <a href="<?= $this->Url->build(['controller' => 'OrdemServicos', 'action' => 'index'], ['escape' => false]) ?>">
            <i class="fa fa-list-alt"></i> <span>Ordem de Serviço</span>
        </a>
    </li>
    <li>
        <a href="<?= $this->Url->build(['controller' => 'Solicitacoes', 'action' => 'index'], ['escape' => false]) ?>">
            <i class="fa fa-envelope"></i> <span>Solicitações de Aluguel</span>
        </a>
    </li>
    <li>
        <a href="<?php echo $this->Url->build('/tipo-documentos'); ?>">
            <i class="fa fa-file-image"></i> <span>Tipo de Documentos</span>
        </a>
    </li>
    <li>
        <a href="<?php echo $this->Url->build('/users'); ?>">
            <i class="fa fa-users"></i> <span>Usuários</span>
        </a>
    </li>
    
</ul>