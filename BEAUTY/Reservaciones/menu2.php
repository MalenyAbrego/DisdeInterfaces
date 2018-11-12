<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Buscar...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">NAVEGACIÓN PRINCIPAL</li>
        <li class="treeview">
          <a href="../Inicio">
            <i class="fa fa-home"></i> <span>Inicio</span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-book"></i> <span>Servicios</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="../Servicios/Agregar.php"><i class="fa fa-plus"></i>Agregar servicio</a></li>
            <li><a href="../Servicios/Actualizar.php"><i class="fa fa-navicon"></i>Ver servicios</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i> <span>Usuarios</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="../Usuarios/Agregar.php"><i class="fa fa-plus"></i>Agregar usuario</a></li>
            <li><a href="../Usuarios/Actualizar.php"><i class="fa fa-navicon"></i>Ver clientes</a></li>
            <li><a href="../Usuarios/Administradores.php"><i class="fa fa-navicon"></i>Ver administradores</a></li>
          </ul>
        </li>
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-calendar"></i> <span>Reservaciones</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="../Reservaciones/Agregar.php"><i class="fa fa-plus"></i>Agregar reservación</a></li>
            <li class="active"><a href="../Reservaciones/Actualizar.php"><i class="fa fa-navicon"></i>Ver reservaciones</a></li>
          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>