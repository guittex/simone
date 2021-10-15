<ul class="sidebar-menu" data-widget="tree">
    <li class="treeview">
        <a href="#">
            <i class="fa fa-building"></i> <span>Administrativo</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="<?php echo $this->Url->build('/clientes'); ?>"><i class="fa fa-user"></i>Clientes</a></li>
            <li><a href="<?php echo $this->Url->build('/pages/home2'); ?>"><i class="fa fa-car"></i> Carros</a></li>
            <li><a href="<?php echo $this->Url->build('/pages/home2'); ?>"><i class="fa fa-car"></i> Reservas</a></li>
            <li><a href="<?php echo $this->Url->build('/pages/home2'); ?>"><i class="fa fa-car"></i> Solicitações</a></li>
            <li><a href="<?php echo $this->Url->build('/tipo-documentos'); ?>"><i class="fa fa-user"></i>Tipo Documentos</a></li>
        </ul>
    </li> 
    
</ul>