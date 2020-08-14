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
$lang='es';
/*$var=$_GET["date"];
$calendar_info = $object->return_lab_reservation_by_date($var);*/

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
  <link rel="stylesheet" href="../assets/plugins/fullcalendar/fullcalendar.min.css">
  <link rel="stylesheet" href="../assets/plugins/fullcalendar/fullcalendar.print.css" media="print">
  <!-- DataTables -->
  <link rel="stylesheet" href="../assets/plugins/datatables/dataTables.bootstrap.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
   
  <![endif]-->
  <script src="../assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
  <style type="text/css">
    .modal-header {
  
    
    background-color: #f39c12;
    color: #FFF;
    
}
.fcc-other-month { 
        visibility:hidden;
     }
td.details-control {
    background: url('../assets/img/open.png') no-repeat center center;
    cursor: pointer;
}
tr.shown td.details-control {
    background: url('../assets/img/close.png') no-repeat center center;
}
  </style>
</head>
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">
<?php //include("../templates/menu.php"); 
   $lang=$_GET["lang"];
   $dat = $_GET["date"];
   if($lang == 'es'){
        include("../assets/lang/es.php");
        }
        if($lang == 'en')
        {
          include("../assets/lang/en.php"); 
        }

?>
  <?php include("../templates/header_fd.php"); ?>
  <!-- Left side column. contains the logo and sidebar -->
  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="container">
    <section class="content-header">
      <h1>
        <?php echo $dashboard;?>
        <small><?php echo $control_panel;?></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i><?php echo $home;?></a></li>
        <li class="active"><?php echo $dashboard;?></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      
      <!-- Main row -->
       <div class="row">
        
        <!-- /.col -->
        <div class="col-md-12">
          <div class="box box-warning">
            <div class="box-body ">
              <!-- THE CALENDAR -->
              <div id="calendar"></div>
              <div class="row">
                 <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="form-group">
                <label>Date:</label>

                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" id="datepicker">
                  <span class="input-group-btn">
                      <button type="button" class="btn btn-warning btn-flat">Search</button>
                    </span>
                </div>
                <!-- /.input group -->
              </div>
            </div>
            
            <div class="col-md-9 col-sm-9 col-xs-12" align="right"><h2 ><?php echo "Today is " . date("m/d/Y") ; ?></h2></div>
            
              </div>
              <div class="row">
              <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box bg-yellow">
            <span class="info-box-icon"><img src="../assets/img/icon/bite.png" style="width: 35px;height: 35px;color: #000000"></span>

            <div class="info-box-content">
              <span class="info-box-text">Bite</span>
              <span class="info-box-number">4/30</span>

              <div class="progress">
                <div class="progress-bar" style="width: 70%"></div>
              </div>
                  <span class="progress-description">
                    70% Increase in 30 Days
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box bg-yellow">
            <span class="info-box-icon"><img src="../assets/img/icon/crown.png" style="width: 35px;height: 35px;color: #000000"></span>

            <div class="info-box-content">
              <span class="info-box-text">Crown</span>
              <span class="info-box-number">4/30</span>

              <div class="progress">
                <div class="progress-bar" style="width: 70%"></div>
              </div>
                  <span class="progress-description">
                    70% Increase in 30 Days
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box bg-yellow">
            <span class="info-box-icon"><img src="../assets/img/icon/finish_flex.png" style="width: 35px;height: 35px;color: #000000"></span>

            <div class="info-box-content">
              <span class="info-box-text">Finish Flex</span>
              <span class="info-box-number">4/30</span>

              <div class="progress">
                <div class="progress-bar" style="width: 70%"></div>
              </div>
                  <span class="progress-description">
                    70% Increase in 30 Days
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box bg-yellow">
            <span class="info-box-icon"><img src="../assets/img/icon/finish.png" style="width: 35px;height: 35px;color: #000000"></span>

            <div class="info-box-content">
              <span class="info-box-text">Finish</span>
              <span class="info-box-number">4/30</span>

              <div class="progress">
                <div class="progress-bar" style="width: 70%"></div>
              </div>
                  <span class="progress-description">
                    70% Increase in 30 Days
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        </div>
        <div class="row">
          <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box bg-yellow">
            <span class="info-box-icon"><img src="../assets/img/icon/relines.png" style="width: 35px;height: 35px;color: #000000"></span>

            <div class="info-box-content">
              <span class="info-box-text">Metal</span>
              <span class="info-box-number">4/30</span>

              <div class="progress">
                <div class="progress-bar" style="width: 70%"></div>
              </div>
                  <span class="progress-description">
                    70% Increase in 30 Days
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box bg-yellow">
            <span class="info-box-icon"><img src="../assets/img/icon/repair.png" style="width: 35px;height: 35px"></span>

            <div class="info-box-content">
              <span class="info-box-text">Relines</span>
              <span class="info-box-number">4/30</span>

              <div class="progress">
                <div class="progress-bar" style="width: 70%"></div>
              </div>
                  <span class="progress-description">
                    70% Increase in 30 Days
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box bg-yellow">
            <span class="info-box-icon"><img src="../assets/img/icon/tryin.png" style="width: 35px;height: 35px;color: #000000"></span>

            <div class="info-box-content">
              <span class="info-box-text">Repair</span>
              <span class="info-box-number">4/30</span>

              <div class="progress">
                <div class="progress-bar" style="width: 70%"></div>
              </div>
                  <span class="progress-description">
                    70% Increase in 30 Days
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box bg-yellow">
            <span class="info-box-icon"><img src="../assets/img/icon/try_in.png" style="width: 35px;height: 35px;color: #000000"></span>

            <div class="info-box-content">
              <span class="info-box-text">Try In</span>
              <span class="info-box-number">4/30</span>

              <div class="progress">
                <div class="progress-bar" style="width: 70%"></div>
              </div>
                  <span class="progress-description">
                    70% Increase in 30 Days
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /. box -->
        </div>
        <!-- /.col -->
      </div>

    </section>
    <!-- /.content -->
  </div>
  </div>
  <!-- /.content-wrapper -->
 <?php include("../templates/footer.php"); ?>
  
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

        
         <div id="fullCalModal" class="modal">
          <div class="modal-dialog" style="width: 60% !important">
            <div class="modal-content">
              <div class="modal-header" style="background: #CDFVVV !important">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 id="modalTitle" class="modal-title"></h4><h4 id="titleRight"></h4>
              </div>
              <div class="modal-body">
                <input type="hidden" name="step_id" id="step_id">
                <input type="hidden" name="eventID" id="eventID">
                <input type="hidden" name="rd" id="rd">
                <input type="hidden" name="reservation_date" id="reservation_date">
                <script type="text/javascript">
                  var step_id = document.getElementById("step_id").value;
                  var reservation_date = document.getElementById("reservation_date").value;
                  var eventID = document.getElementById("eventID").value;
                </script>
                <table id="table2" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th></th>
                  <th>Case No.</th>
                  <th><?php echo "Patient";?></th>
                  <th><?php echo "Date of Birth";?></th>
                  <th><?php echo "Prothesys Type";?></th>
                  <th><?php echo "Material";?></th>
                  <th><?php echo "Appoinment";?><br><?php echo "Date";?>/<?php echo "Dr.";?>/<?php echo "Office";?></th>
                  
                </tr>
                </thead>
                <tbody>
                
              </tbody>
              </table>
              </div>
              <div class="modal-footer">
                <div class="col-xs-3 pull-right" align="">
                <button type="button" class="btn btn-block btn-warning" data-dismiss="modal">Close</button>
              </div>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        


<!-- jQuery 2.2.3 -->

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
<script src="../assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="../assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../assets/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../assets/dist/js/app.min.js"></script>
<!-- DataTables -->
<script src="../assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/select/1.2.1/js/dataTables.select.min.js" type="text/javascript"></script>
<script src="../assets/plugins/fullcalendar/fullcalendar.min.js"></script>
<script type="text/javascript">
  /* Formatting function for row details - modify as you need */

var english = {"sProcessing": "Processing...",
                 "sLengthMenu": "Show _MENU_ entries",
                 "sZeroRecords": "There are 0 results",
                 "sInfo": "Showing from _START_ to _END_ de _TOTAL_ registros",
                 "sInfoEmpty": "There are 0 entries",
                 "sInfoFiltered": "(filtrado de un total de _MAX_ líneas)",
                 "sInfoPostFix": "",
                 "sSearch": "Search:",
                 "oPaginate": {
            "sFirst":    "First",
            "sLast":    "Last",
            "sNext":    "Next",
            "sPrevious": "Previous"
        },
                 "sUrl": ""
              };    
var espanol = {"sProcessing": "Procesando...",
                 "sLengthMenu": "Mostrar _MENU_ registros",
                 "sZeroRecords": "No se encontraron resultados",
                 "sInfo": "Mostrando desde _START_ hasta _END_ de _TOTAL_ registros",
                 "sInfoEmpty": "No existen registros",
                 "sInfoFiltered": "(filtrado de un total de _MAX_ líneas)",
                 "sInfoPostFix": "",
                 "sSearch": "Buscar:",
                "oPaginate": {
            "sFirst":    "Primero",
            "sLast":    "Último",
            "sNext":    "Siguiente",
            "sPrevious": "Anterior"
        },
                 "sUrl": ""
              };

var currentLang = espanol;
var currentLang2 = english;
$(document).ready(function()
{ 
  //var dtable = $('#datatable-buttons').dataTable( {"oLanguage": english} );
    var dtable = $('#table2').dataTable();
    dtable.fnDestroy();
    dtable = null;
    //currentLang = (currentLang == english) ? espanol : english;
    <?php 
    if($lang == 'es')
    {
      ?>
      dtable = $('#table2').dataTable( {"oLanguage": currentLang} ); 
      <?php
    }
    if($lang == 'en')
    {
        ?>
         dtable = $('#table2').dataTable( {"oLanguage": currentLang2} ); 
         <?php
    }
     ?>  
    
    
} );
</script>

<script>
  $(document).ready(function(){
         var fullDate = new Date();
  	     var month = fullDate.getMonth()+1;
  	     var year = fullDate.getFullYear();
         var calendar = $('#calendar').fullCalendar({
            header:{
                left: 'prev,next today',
                center: 'title',
                right: 'agendaWeek'
            },
            defaultView: 'basicWeek',
            editable: false,
            selectable: false,
            allDaySlot: true,
            weekNumbers : true,
            weekMode : 'liquid',
            eventColor: '#3c8dbc',
            eventTextColor: '#ffffff',
            minTime: "00:00:00",
            maxTime: "00:00:00",
            contentHeight: 'auto',
           
            
            events: "../../controllers/front/index.php?view=1&year="+year+"&month="+'0' +month,
             
            
            eventClick:  function(event, jsEvent, view) {
              
             
              //alert(event.id);return 0;
                endtime = $.fullCalendar.moment(event.end).format('h:mm');
                starttime = $.fullCalendar.moment(event.start).format('dddd, MMMM Do YYYY, h:mm');
                starttime2 = $.fullCalendar.moment(event.start).format('YYYY-MM-DD');
               // alert(starttime2);return 0;
                var mywhen = starttime + ' - ' + endtime;
                //var ids = event.status;
                $('#modalTitle').html(event.title);
               /* $('#modalWhen').text(mywhen);*/
                $('#eventID').val(event.id);
                $('#rd').val(starttime2);
                datatable();
                $('#fullCalModal').modal('show');
            },
            
           
          
        });
               
      
    });
</script>
<script type="text/javascript">
  function datatable(){
  $(document).ready(function() {
    var rd = document.getElementById("rd").value;
    var ids = document.getElementById("eventID").value;
     var table = $('#table2').DataTable({
          
        "bProcessing": true,
        "destroy": true,
        "bLengthChange": false,
        "ordering": false,
        //"sAjaxSource": "../../controllers/front/get_cases.php",
        "sAjaxSource": "../../controllers/front/get_cases.php?ids="+ids+"&rd="+rd,
      
        
        "aoColumns": [
            {
                "className":      'details-control',
               "orderable": false,
                "ordering":       false,
                "data":           null,
                "defaultContent": ''
            },
            { "data": "id_patient" },
            { "data": "p_name" },
            { "data": "p_dob" },
            { "data": "pt_name_es" },
            { "data": "lp_material_es" },
            { "data": "plp_appoiment_date" }
             /* { mData: 'id_patient' } ,
              { mData: 'p_name' },
              { mData: 'p_dob' },
              { mData: 'pt_name_es' },
              { mData: 'lp_material_es' },
              { mData: 'plp_appoiment_date' }*/
             
            ]
      });  

      $('#table2 tbody').on('click', 'td.details-control', function () {
        var tr = $(this).closest('tr');
        var row = table.row(tr);
 
        if ( row.child.isShown() ) {
            // This row is already open - close it
            row.child.hide();
            tr.removeClass('shown');
        }
        else {
            // Open this row
            row.child( format(row.data()) ).show();
            tr.addClass('shown');
             
        }

    } );
 function format ( d ) {
    // `d` is the original data object for the row
    return  '<div class="row invoice-info" align="right">'+
      ' <div class="col-sm-3 invoice-col"> '+
         '</div>'+
         ' <div class="col-sm-3 invoice-col"> <a href="print_label.php?idcaso='+d.id_patient_lab_procedure+'" title="Print Label"><i class="fa fa-fw fa-print"></i></a><a href="" title="Edit Case"><i class="fa fa-fw fa-edit"></i></a><a href="" title="Reschedule"><i class="fa fa-fw fa-calendar"></i></a>'+
         '</div>'+
       ' <div class="col-sm-3 invoice-col"> <address>'+
         '<strong>Step:'+d.pt_name_en+'('+d.lp_material_en+')'+'</strong><br>'+
           ' Indicated by:'+d.doctor_name+' '+d.doctor_last_name+'<br>'+
            
           
          '</address></div>'+
           ' <div class="col-sm-3 invoice-col"> <address>'+
         
            'Reservation Date:'+d.start_date+'<br>'+
            'Appoinment Date:'+d.plp_appoiment_date+'<br>'+
           
          '</address></div>'+
          '</div>'+
        

      ' <div class="row">'+
       ' <div class="col-md-12">'+
          
         ' <ul class="timeline">'+
           
          '  <li class="time-label"><span class="bg-yellow">'+d.start_date+'</span></li>' +         
           ' <li><i class="fa fa-clock-o bg-gray"></i>'+
              '<div class="timeline-item"><span class="time"><i class="fa fa-clock-o"></i> 5 mins ago</span><h3 class="timeline-header no-border"><a href="#">Location:</a> '+d.office_name+'<a href="#">     Activity:</a>Reservation</h3></div></li>'+
            '<li><i class="fa fa-clock-o bg-gray"></i>'+
              '<div class="timeline-item"><span class="time"><i class="fa fa-clock-o"></i> 27 mins ago</span>'+
                '<h3 class="timeline-header"><a href="#">Location:</a> Delivery <a href="#">Activity:</a>In Transit to Lab</h3>'+
                ' </div> </li>'+
            '  <li class="time-label"><span class="bg-yellow">'+d.lab_asign_date+'</span></li>' +         
           ' <li><i class="fa fa-clock-o bg-gray"></i>'+
              '<div class="timeline-item"><span class="time"><i class="fa fa-clock-o"></i> 5 mins ago</span><h3 class="timeline-header no-border"><a href="#">Location:</a> Lab(Reception)<a href="#">     Activity:</a>Admision</h3></div></li>'+
            '<li><i class="fa fa-clock-o bg-gray"></i>'+
              '<div class="timeline-item"><span class="time"><i class="fa fa-clock-o"></i> 27 mins ago</span>'+
                '<h3 class="timeline-header"><a href="#">Location:</a> Lab(Bite Dptment) <a href="#">Activity:</a>Bite Proccesing</h3>'+
                ' </div> </li>'+' </ul></div></div>'            
    ;

}
      $(document).on('hide.bs.modal','#fullCalModal', function () {
               location.reload();
 //Do stuff here
});
     
  });
  }
  

   
</script>
<script>
  $(function () {
    /* jQueryKnob */

    $(".knob").knob({
      /*change : function (value) {
       //console.log("change : " + value);
       },
       release : function (value) {
       console.log("release : " + value);
       },
       cancel : function () {
       console.log("cancel : " + this.value);
       },*/
      draw: function () {

        // "tron" case
        if (this.$.data('skin') == 'tron') {

          var a = this.angle(this.cv)  // Angle
              , sa = this.startAngle          // Previous start angle
              , sat = this.startAngle         // Start angle
              , ea                            // Previous end angle
              , eat = sat + a                 // End angle
              , r = true;

          this.g.lineWidth = this.lineWidth;

          this.o.cursor
          && (sat = eat - 0.3)
          && (eat = eat + 0.3);

          if (this.o.displayPrevious) {
            ea = this.startAngle + this.angle(this.value);
            this.o.cursor
            && (sa = ea - 0.3)
            && (ea = ea + 0.3);
            this.g.beginPath();
            this.g.strokeStyle = this.previousColor;
            this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sa, ea, false);
            this.g.stroke();
          }

          this.g.beginPath();
          this.g.strokeStyle = r ? this.o.fgColor : this.fgColor;
          this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sat, eat, false);
          this.g.stroke();

          this.g.lineWidth = 2;
          this.g.beginPath();
          this.g.strokeStyle = this.o.fgColor;
          this.g.arc(this.xy, this.xy, this.radius - this.lineWidth + 1 + this.lineWidth * 2 / 3, 0, 2 * Math.PI, false);
          this.g.stroke();

          return false;
        }
      }
    });
    /* END JQUERY KNOB */

    //INITIALIZE SPARKLINE CHARTS
    $(".sparkline").each(function () {
      var $this = $(this);
      $this.sparkline('html', $this.data());
    });

    /* SPARKLINE DOCUMENTATION EXAMPLES http://omnipotent.net/jquery.sparkline/#s-about */
    drawDocSparklines();
    drawMouseSpeedDemo();

  });
  function drawDocSparklines() {

    // Bar + line composite charts
    $('#compositebar').sparkline('html', {type: 'bar', barColor: '#aaf'});
    $('#compositebar').sparkline([4, 1, 5, 7, 9, 9, 8, 7, 6, 6, 4, 7, 8, 4, 3, 2, 2, 5, 6, 7],
        {composite: true, fillColor: false, lineColor: 'red'});


    // Line charts taking their values from the tag
    $('.sparkline-1').sparkline();

    // Larger line charts for the docs
    $('.largeline').sparkline('html',
        {type: 'line', height: '2.5em', width: '4em'});

    // Customized line chart
    $('#linecustom').sparkline('html',
        {
          height: '1.5em', width: '8em', lineColor: '#f00', fillColor: '#ffa',
          minSpotColor: false, maxSpotColor: false, spotColor: '#77f', spotRadius: 3
        });

    // Bar charts using inline values
    $('.sparkbar').sparkline('html', {type: 'bar'});

    $('.barformat').sparkline([1, 3, 5, 3, 8], {
      type: 'bar',
      tooltipFormat: '{{value:levels}} - {{value}}',
      tooltipValueLookups: {
        levels: $.range_map({':2': 'Low', '3:6': 'Medium', '7:': 'High'})
      }
    });

    // Tri-state charts using inline values
    $('.sparktristate').sparkline('html', {type: 'tristate'});
    $('.sparktristatecols').sparkline('html',
        {type: 'tristate', colorMap: {'-2': '#fa7', '2': '#44f'}});

    // Composite line charts, the second using values supplied via javascript
    $('#compositeline').sparkline('html', {fillColor: false, changeRangeMin: 0, chartRangeMax: 10});
    $('#compositeline').sparkline([4, 1, 5, 7, 9, 9, 8, 7, 6, 6, 4, 7, 8, 4, 3, 2, 2, 5, 6, 7],
        {composite: true, fillColor: false, lineColor: 'red', changeRangeMin: 0, chartRangeMax: 10});

    // Line charts with normal range marker
    $('#normalline').sparkline('html',
        {fillColor: false, normalRangeMin: -1, normalRangeMax: 8});
    $('#normalExample').sparkline('html',
        {fillColor: false, normalRangeMin: 80, normalRangeMax: 95, normalRangeColor: '#4f4'});

    // Discrete charts
    $('.discrete1').sparkline('html',
        {type: 'discrete', lineColor: 'blue', xwidth: 18});
    $('#discrete2').sparkline('html',
        {type: 'discrete', lineColor: 'blue', thresholdColor: 'red', thresholdValue: 4});

    // Bullet charts
    $('.sparkbullet').sparkline('html', {type: 'bullet'});

    // Pie charts
    $('.sparkpie').sparkline('html', {type: 'pie', height: '1.0em'});

    // Box plots
    $('.sparkboxplot').sparkline('html', {type: 'box'});
    $('.sparkboxplotraw').sparkline([1, 3, 5, 8, 10, 15, 18],
        {type: 'box', raw: true, showOutliers: true, target: 6});

    // Box plot with specific field order
    $('.boxfieldorder').sparkline('html', {
      type: 'box',
      tooltipFormatFieldlist: ['med', 'lq', 'uq'],
      tooltipFormatFieldlistKey: 'field'
    });

    // click event demo sparkline
    $('.clickdemo').sparkline();
    $('.clickdemo').bind('sparklineClick', function (ev) {
      var sparkline = ev.sparklines[0],
          region = sparkline.getCurrentRegionFields();
      value = region.y;
      alert("Clicked on x=" + region.x + " y=" + region.y);
    });

    // mouseover event demo sparkline
    $('.mouseoverdemo').sparkline();
    $('.mouseoverdemo').bind('sparklineRegionChange', function (ev) {
      var sparkline = ev.sparklines[0],
          region = sparkline.getCurrentRegionFields();
      value = region.y;
      $('.mouseoverregion').text("x=" + region.x + " y=" + region.y);
    }).bind('mouseleave', function () {
      $('.mouseoverregion').text('');
    });
  }

  /**
   ** Draw the little mouse speed animated graph
   ** This just attaches a handler to the mousemove event to see
   ** (roughly) how far the mouse has moved
   ** and then updates the display a couple of times a second via
   ** setTimeout()
   **/
  function drawMouseSpeedDemo() {
    var mrefreshinterval = 500; // update display every 500ms
    var lastmousex = -1;
    var lastmousey = -1;
    var lastmousetime;
    var mousetravel = 0;
    var mpoints = [];
    var mpoints_max = 30;
    $('html').mousemove(function (e) {
      var mousex = e.pageX;
      var mousey = e.pageY;
      if (lastmousex > -1) {
        mousetravel += Math.max(Math.abs(mousex - lastmousex), Math.abs(mousey - lastmousey));
      }
      lastmousex = mousex;
      lastmousey = mousey;
    });
    var mdraw = function () {
      var md = new Date();
      var timenow = md.getTime();
      if (lastmousetime && lastmousetime != timenow) {
        var pps = Math.round(mousetravel / (timenow - lastmousetime) * 1000);
        mpoints.push(pps);
        if (mpoints.length > mpoints_max)
          mpoints.splice(0, 1);
        mousetravel = 0;
        $('#mousespeed').sparkline(mpoints, {width: mpoints.length * 2, tooltipSuffix: ' pixels per second'});
      }
      lastmousetime = timenow;
      setTimeout(mdraw, mrefreshinterval);
    };
    // We could use setInterval instead, but I prefer to do it this way
    setTimeout(mdraw, mrefreshinterval);
  }
  //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    });
</script>
</body>
</html>
