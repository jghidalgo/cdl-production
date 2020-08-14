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
      function submit2()
      {
           // alert("OK");
           document.getElementById("insert_deparment").submit();
      }
      function submitproc()
      {
           // alert("OK");
           document.getElementById("insert_procedure").submit();
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
 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="container">
    <section class="content-header">
      <h1>
        Laboratory/Employees
        <!--small>Laboratorios/Empleados</small-->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Administrator</a></li>
        <li class="active">Laboratorios/Empleados</li>
      </ol>
    </section>

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
              <li class="active"><a href="#sales-chart2" data-toggle="tab">Procedimientos</a></li>
              <li ><a href="#revenue-chart" data-toggle="tab">Departamentos</a></li>
              <li><a href="#sales-chart" data-toggle="tab">Empleados del Laboratorio</a></li>
              
              <!--li class="pull-left header"><i class="fa fa-inbox"></i> Sales</li-->
            </ul>
            <div class="tab-content no-padding">
              <!-- Morris chart - Sales -->
              <div class="chart tab-pane" id="revenue-chart" style="position: relative; ">
                <div class="box">
            <div class="box-header">
              <h3 class="box-title">Lista de Departamentos</h3>
               <div class="btn-group" style="margin-left: 90% !important">
                  <button type="button" class="btn btn-warning" style="background: #fdb813 !important">Action</button>
                  <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" style="background: #bd1e2c !important">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#" data-toggle="modal" data-target="#myModalD">Adicionar Departamento</a></li>
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
                  <th>Departamento</th>
                  <th>Descripcion</th>
                  
                </tr>
                </thead>
                <tbody>
               <?php
               $deparments = $object->get_deparments();
               foreach ($deparments as $keyd => $valued) {
                 # code...
                ?>
                <tr><td><?php echo $valued["ld_name"]; ?></td><td><?php echo $valued["ld_decription"]; ?></td></tr>
                <?php
               }
                ?>
                
            
                </tfoot>
              </table>
                <div class="example-modal">
        <div class="modal" id="myModalD" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" >
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" style="color: #fdb813 !important">Adicionar Departamento</h4>
              </div>
              <div class="modal-body">
                 <!-- Form Element sizes -->
          <div class="box box-danger">
            <div class="box-header with-border">
              <!--h3 class="box-title">Different Height</h3-->
            </div>
            <div class="box-body">
               <form role="form" id="insert_deparment" method="post" action="../../controllers/admin/add_deparment.php">
                <input type="hidden" name="id_user_hidde" value="<?php echo $id_user; ?>">
                <div class="form-group">
                  <div class="col-xs-12">
                    
                  <label>Nombre del Departamento</label>

              <input class="form-control input-lg" name="deparment" type="text" >
            
            </div>
            </div>
            <div class="form-group">
                  <div class="col-xs-12">
                    
                  <label>Descripcion</label>

              <textarea class="form-control" placeholder="Enter ..." rows="3" name="description"></textarea>
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
                <button type="button" class="btn btn-primary" onclick="submit2();" style="background: #fdb813 !important">Save changes</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
      </div>
              
            </div>
            <!-- /.box-body -->
          </div>
              </div>
              <div class="chart tab-pane" id="sales-chart" style="position: relative; ">
                <div class="box">
            <div class="box-header">
              <h3 class="box-title">Lista de Empleados del Laboratoroio</h3>
               <div class="btn-group" style="margin-left: 90% !important">
                  <button type="button" class="btn btn-warning" style="background: #fdb813 !important">Action</button>
                  <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" style="background: #bd1e2c !important">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#" data-toggle="modal" data-target="#myModalE">Adicionar Empleado</a></li>
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
                  <th>Nombre y Apellido</th>
                  <th>Telefono</th>
                  <th>Correo Electronico</th>
                  <th>Departamento</th>
                </tr>
                </thead>
                <tbody>
               <?php
               $lab_employes = $object->get_lab_employes();
               foreach ($lab_employes as $keyle => $valuele) {
                 # code...
                ?>
                <tr><td><?php echo $valuele["e_name"]; ?><?php echo $valuele["e_middle_name"]; ?><?php echo $valuele["e_last_name"]; ?></td><td><?php echo $valuele["e_phone"]; ?></td><td><?php echo $valuele["e_email"]; ?></td><td><?php echo $valuele["id_user"]; ?></td></tr>
                <?php
               }
                ?>
                
            
                </tfoot>
              </table>
                <div class="example-modal">
        <div class="modal" id="myModalE" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" >
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" style="color: #fdb813 !important">Adicionar Empleado</h4>
              </div>
              <div class="modal-body">
                 <!-- Form Element sizes -->
          <div class="box box-danger">
            <div class="box-header with-border">
              <!--h3 class="box-title">Different Height</h3-->
            </div>
            <div class="box-body">
               <form role="form" id="insert_emp" method="post" action="../../controllers/admin/add_emp.php">
                <input type="hidden" name="id_user_hidde" value="<?php echo $id_user; ?>">
                <div class="form-group">
                  <div class="col-xs-5">
                    
                  <label>Nombre del Empleado</label>

              <input class="form-control input-lg" name="name" type="text" >
            
            </div>
            
                  <div class="col-xs-2">
                    
                  <label>MI</label>

              <input class="form-control input-lg" name="mi" type="text" >
            </div>
            <div class="col-xs-5">
                    
                  <label>Apellido</label>

             <input class="form-control input-lg" name="last_name" type="text" >
            </div>
            
            </div>
           <div class="form-group">
              <div class="col-xs-6">
                    
                  <label>Telefono</label>

              <input class="form-control input-lg" name="phone" type="text" >
            
            </div>
             <div class="col-xs-6">
                    
                  <label>Correo Electronico</label>

              <input class="form-control input-lg" name="email" type="text" >
            
            </div>
           </div>
             <div class="form-group">
               <div class="col-xs-12">
               <label>Departamento</label>
               <select name="id_deparment" class="form-control input-lg">
                 <option>-Seleccione-</option>
                 <?php 
                     $all_deparments = $object->get_deparments();
                     foreach ($all_deparments as $keyad => $valuead) {
                       # code...
                      ?>
                      <option value="<?php echo $valuead['id_laboratory_department']; ?>"><?php echo $valuead["ld_name"]; ?></option>
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
                <button type="button" class="btn btn-primary" onclick="submitemp();" style="background: #fdb813 !important">Save changes</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
      </div>
              
            </div>
            <!-- /.box-body -->

              </div></div>
              <div class="chart tab-pane active" id="sales-chart2" style="position: relative; ">
                <div class="box">
            <div class="box-header">
              <h3 class="box-title">Lista de Procedimientos</h3>
               <div class="btn-group" style="margin-left: 90% !important">
                  <button type="button" class="btn btn-warning" style="background: #fdb813 !important">Action</button>
                  <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" style="background: #bd1e2c !important">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#" data-toggle="modal" data-target="#myModalP">Adicionar Procedimiento</a></li>
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
                  <th>Nombre del Procedimiento</th>
                  <th>Cantidad Maxima Diaria</th>
                  <th>Costo</th>
                  <th>Dias Estimados</th>
                </tr>
                </thead>
                <tbody>
               <?php
               $procedures = $object->get_procedures();
               foreach ($procedures as $keyp => $valuep) {
                 # code...
                ?>
                <tr><td><?php echo $valuep["lp_name"]; ?></td><td><?php echo $valuep["lp_max_quantity_by_day"]; ?></td><td><?php echo $valuep["lp_cost"]; ?></td><td><?php echo $valuep["lp_estimated_days"]; ?></td></tr>
                <?php
               }
                ?>
                
            
                </tfoot>
              </table>
                <div class="example-modal">
        <div class="modal" id="myModalP" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" >
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" style="color: #fdb813 !important">Adicionar Procedimiento</h4>
              </div>
              <div class="modal-body">
                 <!-- Form Element sizes -->
          <div class="box box-danger">
            <div class="box-header with-border">
              <!--h3 class="box-title">Different Height</h3-->
            </div>
            <div class="box-body">
               <form role="form" id="insert_procedure" method="post" action="../../controllers/admin/add_procedure.php">
                <input type="hidden" name="id_user_hidde" value="<?php echo $id_user; ?>">
                <div class="form-group">
                  <div class="col-xs-12">
                    
                  <label>Nombre del Procedimiento</label>

              <input class="form-control input-lg" name="lab_proc_name" type="text" >
            
            </div>
            </div>
            <div class="form-group">
                  <div class="col-xs-4">
                    
                  <label>Cantidad Maxima Diaria</label>

              <input class="form-control input-lg" name="lab_proc_max_quan" type="text" >
            </div>
            <div class="col-xs-4">
                    
                  <label>Costo</label>

             <input class="form-control input-lg" name="lab_proc_cost" type="text" >
            </div>
             <div class="col-xs-4">
                    
                  <label>Dias Estimados</label>

             <input class="form-control input-lg" name="lab_proc_days" type="text" >
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
                <button type="button" class="btn btn-primary" onclick="submitproc();" style="background: #fdb813 !important">Save changes</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
      </div>
              
            </div>
            <!-- /.box-body -->
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
  <?php include("../templates/footer.php"); ?>
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
