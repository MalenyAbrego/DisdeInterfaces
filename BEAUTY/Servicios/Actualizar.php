<?php

  require_once("../db/db_utilities.php");


  $user_access = get_all();           //Se obtienen todos los registros y se llena el array mediante los usuarios encontrados en la base de datos.
  $total_users = count($user_access); //Se hace un conteo de cuantos registros se tinen en el sistema.
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Data Tables</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-purple sidebar-mini">
<div class="wrapper">

  <?php
    include "../header.php";
  ?>
  <!-- Left side column. contains the logo and sidebar -->

  <?php
    include "menu2.php";
  ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Servicios<a data-toggle="modal" title="Clic aquí para más información" data-target="#myModal"> <i class="fa fa-question-circle"></i></a></h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-book"></i> Servicios</a></li>
        <li class="active treeview"><a href="#"><i class="fa fa-eye"></i>Ver servicios</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
              <?php if($total_users){ ?>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>

                    <td colspan="4"><b>Total de registros: </b> <?php echo $total_users; ?></td>
                  </tr>
                <tr>
                  <th>Id</th>
                  <th>Nombre</th>
                  <th>Descripción</th>
                  <th>Precio</th>
                  <th></th>

                </tr>
                </thead>
                <tbody>
                <?php foreach( $user_access as $id => $user ){ ?>
                  <tr>
                    <td><?php echo $user['id'] ?></td>
                    <td><?php echo $user['nombre'] ?></td>
                    <td><?php echo $user['descripcion'] ?></td>
                    <td>$ <?php echo $user['precio'] ?>.00</td>
                    <?//Se generan dos botones, que redireccionan a acutalizaar y eliminar respectivamente."?>
                    <td><a width="10 px" title="Modificar servicio" href="./editar.php?id=<?php echo($user['id']); ?>" class="btn btn bg-purple"><i class="fa fa-edit"></i></a>
                    <a href="./delete.php?id=<?php echo($user['id']); ?>" title="Eliminar servicio" class="btn btn bg-maroon"><i class="fa fa-trash"></i></a></td>
                    <!--td><a class="btn btn-app">
                <i class="fa fa-edit"></i> Edit
              </a></td-->
                  </tr>
                  <?php } ?>  
                  
                </tbody>
              </table>
              <?php }else{ ?>
              No hay registros
              <?php } ?>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <section class="content">
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">¿Qué puedo hacer en esta sección?</h4>
              </div>
              <div class="modal-body">
                <h4>En esta sección se visualizan los <b>Servicios</b> agregados.<br><br>
                El siguiente botón cumple con la función de editar cualquier servicio seleccionado:</h4>
                <center><img width="40px" src="../img/modificar.png"></center>
                <h4>
                Mientras que el siguiente botón cumple con la función de eliminar cualquier servicio:</h4>
                <center><img width="40px" src="../img/eliminar.png"></center>
                
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

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
</body>
</html>
