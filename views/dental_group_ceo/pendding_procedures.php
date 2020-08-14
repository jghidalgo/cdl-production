<?php
include("../../models/admin.php");
$object = new Admin();
session_start();
$user = $_SESSION['user'];
$id_user = $_SESSION['id_user'];
$array = $object->get_employee_by_id($id_user);
$array2 = $object->get_user_by_id($id_user);
$id_user_type = $array2[0]["id_user_type"];
$array_module = $object->get_module_by_user($id_user_type);
//$id_module = $array_module[0]["id_module"];
////////////////////////////////////////////////////////////////////////////
if ($_SESSION["login"] != "1") { 
    //si no está logueado lo envío a la página de autentificación 
    header("Location: ../../index.html"); 
} else { 
    //sino, calculamos el tiempo transcurrido 
    $fechaGuardada = $_SESSION["tokenExpiration"]; 
    $ahora = date("Y-n-j H:i:s"); 
    $tiempo_transcurrido = (strtotime($ahora)-strtotime($fechaGuardada)); 

    //comparamos el tiempo transcurrido 
     if($tiempo_transcurrido >= 600) { 
     //si pasaron 10 minutos o más 
      session_destroy(); // destruyo la sesión 
      header("Location: ../../index.html"); //envío al usuario a la pag. de autenticación 
      //sino, actualizo la fecha de la sesión 
    }else { 
    $_SESSION["tokenExpiration"] = $ahora; 
   } 
} 

 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>CDL</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../assets/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../assets/dist/css/skins/_all-skins.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../assets/plugins/iCheck/flat/blue.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="../assets/plugins/morris/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="../assets/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="../assets/plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../assets/plugins/daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="../assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <!-- DataTables -->
  <link rel="stylesheet" href="../assets/plugins/datatables/dataTables.bootstrap.css">
  <script type="text/javascript">
      function submit()
      {
           // alert("OK");
           document.getElementById("insert_office").submit();
      }
    </script>
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">
<?php //include("../templates/menu.php"); 
   $lang=$_GET["lang"];
   if($lang == 'es'){
        include("../assets/lang/es.php");
        }
        if($lang == 'en')
        {
          include("../assets/lang/en.php"); 
        }

?>
   <?php include("../templates/header_ceo.php"); ?>
  <!-- Left side column. contains the logo and sidebar -->
  
<div class="container">
    <!-- Main content -->
    <section class="content">
      
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-12 connectedSortable">
          <!-- Custom tabs (Charts with tabs)-->
          <div class="nav-tabs-custom">
            <!-- Tabs within a box -->
            <ul class="nav nav-tabs pull-right">
              <li class="active"><a href="#sales-chart" data-toggle="tab">Usuarios</a></li>
              <li ><a href="#revenue-chart" data-toggle="tab">Tipos de Usuario</a></li>
              <li ><a href="#revenue-chart2" data-toggle="tab">Módulos</a></li>
          
              
              <!--li class="pull-left header"><i class="fa fa-inbox"></i> Sales</li-->
            </ul>
            <div class="tab-content no-padding">
              <!-- Morris chart - Sales -->
              <div class="chart tab-pane active" id="sales-chart" style="position: relative; ">
                <div class="box">
            <div class="box-header">
              <h3 class="box-title">Lista de Usuarios</h3>
               <div class="btn-group" style="margin-left: 90% !important">
                  <button type="button" class="btn btn-warning" style="background: #fdb813 !important">Action</button>
                  <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" style="background: #bd1e2c !important">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#" data-toggle="modal" data-target="#myModal">Adicionar Usuario</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li class="divider"></li>
                    <li><a href="#">Separated link</a></li>
                  </ul>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Usuario</th>
                  <th>Password</th>
                  <th>Tipo de usuario</th>
                 
                </tr>
                </thead>
                <tbody>
               <?php
               $users = $object->users();
               foreach ($users as $key4 => $value4) {
                 # code...
                ?>
                <tr><td><?php echo $value4["u_username"]; ?></td><td><?php echo $value4["u_password"]; ?></td>
                  <td><?php echo $value4["id_user_type"]; ?>
                    
                  </td>
                </tr>
                <?php
               }
                ?>
                
            
                </tfoot>
              </table>
                <div class="example-modal">
        <div class="modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" >
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" style="color: #fdb813 !important">Adicionar Usuario</h4>
              </div>
              <div class="modal-body">
                 <!-- Form Element sizes -->
          <div class="box box-danger">
            <div class="box-header with-border">
              <!--h3 class="box-title">Different Height</h3-->
            </div>
            <div class="box-body">
               <form role="form" id="insert_office" method="post" action="../../controllers/admin/add_user.php">
                <input type="hidden" name="id_user_hidde" value="<?php echo $id_user; ?>">
                <div class="form-group">
                  <div class="col-xs-12">
                    
                  <label>Usuario</label>

              <input class="form-control input-lg" name="user" type="text" >
            
            </div>
            </div>
            <div class="form-group">
                  <div class="col-xs-12">
                    
                  <label>Contraseña</label>

              <input class="form-control input-lg" name="password" type="password" >
            
            </div>
            </div>
            <div class="form-group">
              <div class="col-xs-12">
                  <label>Tipo de Usuario</label>
                  <select class="form-control input-lg" name="user_type">
                    <option>-Seleccione-</option>
                    <?php
                      $user_types = $object->return_user_type();
                      foreach ($user_types as $keyut => $valueut) {
                        # code...
                        if($valueut['id_user_type'] != '2' && $valueut['id_user_type'] != '3' && $valueut['id_user_type'] != '4' && $valueut['id_user_type'] != '6'){
                        ?>

                        <option value="<?php echo $valueut['id_user_type'];?>"><?php echo  $valueut['ut_name']; ?></option>
                        <?php
                       }
                      }
                     ?>
                  </select>
            
             
            </div>
            
           
           
              </form>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="submit();" style="background: #fdb813 !important">Save changes</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
      </div>
              
            
            <!-- /.box-body -->
          </div>
              </div></div></div>
              <div class="chart tab-pane" id="revenue-chart" style="position: relative; ">
                
              <div class="box">
            <div class="box-header">
              <h3 class="box-title">Tipos de Usuarios</h3>
               <div class="btn-group" style="margin-left: 90% !important">
                  <button type="button" class="btn btn-warning" style="background: #fdb813 !important">Action</button>
                  <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" style="background: #bd1e2c !important">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#" data-toggle="modal" data-target="#myModal4">Adicionar Tipo Usuario</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li class="divider"></li>
                    <li><a href="#">Separated link</a></li>
                  </ul>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Tipo de Usuario</th>
                  <th>Descripcion</th>
                  
                 
                </tr>
                </thead>
                <tbody>
               <?php
               $type_users = $object->get_type_users();
               foreach ($type_users as $key5 => $value5) {
                 # code...
                ?>
                <tr><td><?php echo $value5["ut_name"]; ?></td><td><?php echo $value5["ut_description"]; ?></td>
                  
                </tr>
                <?php
               }
                ?>
                
            
                </tfoot>
              </table>
                <div class="example-modal">
        <div class="modal" id="myModal4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" >
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" style="color: #fdb813 !important">Adicionar Tipo de Usuario</h4>
              </div>
              <div class="modal-body">
                 <!-- Form Element sizes -->
          <div class="box box-danger">
            <div class="box-header with-border">
              <!--h3 class="box-title">Different Height</h3-->
            </div>
            <div class="box-body">
               <form role="form" id="insert_office" method="post" action="../../controllers/admin/add_type_user.php">
                <input type="hidden" name="id_user_hidde" value="<?php echo $id_user; ?>">
                <div class="form-group">
                  <div class="col-xs-12">
                    
                  <label>Tipo de Usuario</label>

              <input class="form-control input-lg" name="type_user" type="text" >
            
            </div>
            </div>
            <div class="form-group">
                  <div class="col-xs-12">
                    
                  <label>Descripcion</label>

              <input class="form-control input-lg" name="description" type="text" >
            
            </div>
            </div>
             <div class="form-group">
                  <div class="col-xs-12">
                    
                  <label>Modulo</label>

              <select name="id_module" class="form-control input-lg">
                <option >-Seleccione-</option>
                <?php
                 $modules = $object->get_modules();
                 foreach ($modules as $keym => $valuem) {
                   # code...
                  ?>
                  <option value="<?php echo $valuem['id_module'] ?>"><?php echo $valuem["m_name"]; ?></option>
                  <?php
                 }
                 ?>
              </select>
            
            </div>
            </div>
              
            
           
           
              </form>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="submit();" style="background: #fdb813 !important">Save changes</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
      </div>
              
            
            <!-- /.box-body --> 

              </div></div></div>
              <div class="chart tab-pane" id="revenue-chart2" style="position: relative; height: 300px;">
                444444
              </div>
            </div>
          </div>
          <!-- /.nav-tabs-custom -->

          

          

        </section>
        <!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
      
        <!-- right col -->
      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>
  </div>
  <!-- /.content-wrapper -->
 <?php include("../templates/footer.php") ?>

  <!-- Control Sidebar -->
 
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="../assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="../assets/bootstrap/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="../assets/plugins/morris/morris.min.js"></script>
<!-- Sparkline -->
<script src="../assets/plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="../assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="../assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="../assets/plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="../assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="../assets/plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="../assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../assets/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../assets/dist/js/app.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../assets/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../assets/dist/js/demo.js"></script>
<!-- DataTables -->
<script src="../assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
</body>
</html>
