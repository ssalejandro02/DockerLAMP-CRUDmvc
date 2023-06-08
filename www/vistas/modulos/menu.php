<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?php echo $admin['foto'] ?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p><?php echo $admin['nombre'] ?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">Menú de Navegación</li>

            <li>
                <a href="usuarios">
                    <i class="fa fa-user"></i> <span>Usuarios</span>

                </a>
            </li>
            <li>
                <a href="roles">
                    <i class="fa fa-link"></i> <span>Roles</span>

                </a>
            </li>
            <li>
                <a href="clientes">
                    <i class="fa fa-users"></i> <span>Clientes</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
