<?php

  require_once("../db/db_utilities.php");

  if(isset($_POST['nombre']) && isset($_POST['correo']) && isset($_POST['telefono']) && isset($_POST['contra']) && isset($_POST['contra2']) && isset($_POST['usuario'])){
      agregarCliente($_POST['nombre'],$_POST['correo'],$_POST['telefono'],$_POST['contra'],$_POST['contra2'],$_POST['usuario']);
      header("location: Agregar.php");
      
  }

  


?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Agregar cliente | Beauty & Seams</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="../bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="../bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="../bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-purple sidebar-mini">
<div class="wrapper">

  <?php
    include "../header.php";

  ?>
  <!-- Left side column. contains the logo and sidebar -->
  <?php
    include "menu.php";

  ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->

      <section class="content-header">
      <h1>
        USUARIOS
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-book"></i> Usuarios</a></li>
        <li><a href="#"><i class="fa fa-plus"></i>Agregar usuarios</a></li>
      </ol>
    </section>


    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
    <div class="box box-primary">
      <div class="box-header with-border">
              <h3 class="box-title">Nuevo usuario</h3><a data-toggle="modal" title="Clic aquí para más información" data-target="#myModal"> <i class="fa fa-question-circle"></i></a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form action="Agregar.php" method="POST">
                <!-- text input -->
                <div class="form-group">
                  <label>Nombre</label>
                  <input type="text" class="form-control" name="nombre" placeholder="Nombre del cliente" required>
                </div>
                <div class="form-group">
                  <label>Correo electrónico</label>
                  <input type="email" class="form-control" name="correo" placeholder="Correo electrónico" required>
                </div>
                <div class="form-group">
                  <label>Teléfono</label>
                  <input type="text" class="form-control" name="telefono" placeholder="Teléfono" required>
                </div>
                <div class="form-group">
                  <label>Contraseña</label>
                  <input type="password" class="form-control" name="contra" placeholder="Contraseña" required>
                </div>
                <div class="form-group">
                  <label>Repetir contraseña</label>
                  <input type="password" class="form-control" name="contra2" placeholder="Repetir contraseña" required>
                </div>
                <div class="form-group">
                  <label>Tipo de usuario</label>
                  <select class="form-control" name="usuario" required>
                    <option value="1">Administrador</option>
                    <option value="2">Cliente</option>
                  </select>
                </div>
                <center><button href="Agregar.php" class="btn btn-app"><i class="fa fa-save"></i> Guardar</button></center>
              </form>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
      </div>
    </section>
    <section class="content">
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Cómo agregar un usuario</h4>
              </div>
              <div class="modal-body">
                <h4>Para agregar un <b>Usuario</b> (Cliente o Administrador), es necesario llenar cada uno de los campos.<br>
                En caso de que alguno de los campos mencionados sea omitido, se mostrará la siguiente alerta en el primer campo vacío que sea requerido:</h4>
                <center><img width="500px" src="../img/validacion.png"></center>
                <h4>NOTA: El campo <b>tipo de usuario</b> determinará el acceso del usuario al sistema.</h4>
                <center><img width="500px" src="../img/cliente.png"></center>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-remove"></i> Cerrar</button>
              </div>
            </div>
          </div>
        </div>
    </section>


    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="../bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="../bower_components/raphael/raphael.min.js"></script>
<script src="../bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="../bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="../bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../bower_components/moment/min/moment.min.js"></script>
<script src="../bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="../bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
</body>
</html>
