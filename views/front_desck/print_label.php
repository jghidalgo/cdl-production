<?php
/**
 * Created by PhpStorm.
 * User: Net
 * Date: 6/10/2015
 * Time: 7:37 PM
 */

   
    
    include("../../models/admin.php");
    $object = new Admin();
    $pat_lab_proc_id = $_GET["idcaso"];
    $array = $object->return_invoice_info($pat_lab_proc_id);
    //echo print_r($array[1]);return 0;

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">

    <head>
        <title>Label Print</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
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
  <link rel="stylesheet" href="../assets/dist/css/bootstrap-multiselect.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="../assets/plugins/iCheck/all.css">
  <link rel="stylesheet" type="text/css" href="../assets/dist/js/dropdown.min.css">
  <link rel="stylesheet" type="text/css" href="../assets/dist/js/semantic.min.css">
  <script src="../assets/dist/js/JsBarcode.all.js"></script>
   <script type="text/javascript" src="../assets/js/code39.js"></script>
  <style type="text/css">
            body { font-size: 11pt; height: 50px; }
            
            table, th, td 
            {
                border: 0px solid black;
                border-collapse: collapse;
                vertical-align: top;
            }
            
            p { margin: 0; margin-top: 10px; padding:0; font-size: 12pt; font-weight: bold; }
            
            p:first-child { margin-top: 0px; }
            
            p.small {  margin-top: 1px; font-size: 8pt; font-weight: 300; }
            
            p.regular {  margin-top: 1px; font-size: 12pt; font-weight: 300; }
            #barcode2 {font-weight: normal; font-style: normal; line-height:normal; sans-serif; font-size: 12pt}
        </style>
        
   <script type="text/javascript">
       function printear()
       {
           
           window.print();
           setTimeout("closePrintView()", 3000); //delay required for IE to realise what's going on
           window.onafterprint = closePrintView(); //this is the thing that makes it work i
          function closePrintView() { //this function simply runs something you want it to do
         document.location.href = "main_frontdesck.php?date=2018-05-30"; //in this instance, I'm doing a re-direct
   }
       }
   </script>
    </head>
    <body onload="printear();">
        <input type="hidden" name="code" id="code" value="<?php echo "000".$array[0]['lab_case']; ?>">
        <div style="width:620px; margin: 0 auto;" align="center">

            <div id="printMe">
                <div class="col-xs-12">
                <div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <table><tr><td colspan="3">
            <div class="widget-user-header bg-aqua-active" style="background: #fdb813 !important">
              <h3 class="widget-user-username" style="color: #FFF !important">CDL CONTACT: (786) 393-6867</h3>
              <h5 class="widget-user-desc"></h5>
            </div></td>

            <div class="widget-user-image">
              <img class="img-circle" src="../assets/dist/img/cdl.jpg" alt="User Avatar">
            </div></tr>
            <tr><td>
            <div class="box-footer">
              <tr><td>
                <div class="col-sm-6 ">
                  <div class="description-block">
                    <span class="description-text"><p style="text-align: left !important">Código Caso</p></span>
                    <h5 class="description-header"><p id="case_code_invoice" style="text-align: left;font-size: 11px !important"><?php echo $array[0]["lab_case"]; ?></p></h5>
                    <span class="description-text"><p style="text-align: left !important">Paciente</p></span>
                    <h5 class="description-header"><p id="patient_invoice" style="text-align: left;font-size: 11px !important"><?php echo $array[0]["p_name"]."".$array[0]["p_last_name"]; ?></p></h5>
                    
                    
                  </div>
                  <!-- /.description-block -->
                </div></td><td>
                <!-- /.col -->
                </td><td>
                <!-- /.col -->
                <div class="col-sm-6">
                  <div class="description-block">
                    <span class="description-text" ><p style="text-align: right !important">Clínica</p></span>
                    <h5 class="description-header" ><p id="clinic_invoice" style="text-align: right;font-size: 11px !important"><?php echo $array[0]["o_name"]; ?></p></h5>
                    <span class="description-text" ><p style="text-align: right !important">Doctor</p></span>
                    <h5 class="description-header"><p id="doctor_invoice" style="text-align: right;font-size: 11px !important"><?php echo $array[0]["d_name"]." ".$array[0]["d_last_name"]; ?></p></h5>
                     <span class="description-text" ><p style="text-align: right !important">Fecha de la Cita</p></span>
                    <h5 class="description-header"><p id="appo_date_invoice" style="text-align: right;font-size: 11px !important"><?php echo $array[0]["appoiment_date"]; ?></p></h5>
                    <!--span class="description-text">Procedimiento</span>
                     <h5 class="description-header"><p id="procedimiento_invoice"></p></h5-->
                    
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
              </td></tr>
              <!-- /.row -->
              <tr>
                 <?php if($array[0]["arch"] == 1 && $array[1] == null){ ?>
                <td>
           
                <div class="col-sm-6 ">
                  <div class="description-block">
                    <span class="description-text"><p >Tipo de Caso Upp</p></span>
        <h5 class="description-header"><p id="case_type_upp_invoice" style="font-size: 11px !important"><?php echo $array[0]["es_material"]." ".$array[0]["en_proth_type"]."(".$array[0]["en_step"].")"; ?></p></h5>
                    <span class="description-text"><p>Color</p></span>
                    <h5 class="description-header"><p id="color_invoice_upp" style="font-size: 11px !important"></p></h5>
                    <span class="description-text"><p>Fecha de Devolución</p></span>
                    <h5 class="description-header"><p id="finish_date_invoice_upp" style="font-size: 11px !important"><?php echo $array[0]["delivery_date"];  ?></p></h5>
                     <span class="description-text"><p>Fecha de Reserva</p></span>
                    <h5 class="description-header"><p id="reservation_date_up_invoice" style="font-size: 11px !important"><?php echo $array[0]["lab_asign_date"];  ?></p></h5>
                  </div>
                  <!-- /.description-block -->
                </div></td>
                <td>
                <!-- /.col -->
              </td>
              <td>
                <!-- /.col -->
                <div class="col-sm-6">
                  <div class="description-block">
                  <span class="description-text"><p style="text-align: right !important">Tipo de Caso Low</p></span>
                    <h5 class="description-header"><p style="font-size: 11px !important;text-align: right">N/A</p></h5>
                    <span class="description-text"><p style="text-align: right !important">Color</p></span>
                    <h5 class="description-header"><p id="color_invoice_low" style="font-size: 11px !important;text-align: right !important">N/A</p></h5>
                    <span class="description-text"><p style="text-align: right !important">Fecha de Devolución</p></span>
                    <h5 class="description-header"><p id="finish_date_invoice_low" style="font-size: 11px !important;text-align: right">N/A</p></h5>
                     <span class="description-text"><p style="text-align: right !important">Fecha de Reserva</p></span>
                    <h5 class="description-header"><p id="reservation_date_lo_invoice" style="font-size: 11px !important;text-align: right">N/A</p></h5>
                  </div>
                  <!-- /.description-block -->
                </div>
                 
                <!-- /.col -->
              </td>
            <?php } if ($array[0]["arch"] == 2 && $array[1] == null) {
                # code...
                ?>
                <td>
           
                <div class="col-sm-6 ">
                  <div class="description-block">
                    <span class="description-text"><p >Tipo de Caso Upp</p></span>
        <h5 class="description-header"><p id="case_type_upp_invoice" style="font-size: 11px !important">N/A</p></h5>
                    <span class="description-text"><p>Color</p></span>
                    <h5 class="description-header"><p id="color_invoice_upp" style="font-size: 11px !important">N/A</p></h5>
                    <span class="description-text"><p>Fecha de Devolución</p></span>
                    <h5 class="description-header"><p id="finish_date_invoice_upp" style="font-size: 11px !important">N/A</p></h5>
                     <span class="description-text"><p>Fecha de Reserva</p></span>
                    <h5 class="description-header"><p id="reservation_date_up_invoice" style="font-size: 11px !important">N/A</p></h5>
                  </div>
                  <!-- /.description-block -->
                </div></td>
                <td></td>
                 <td>
                <!-- /.col -->
                <div class="col-sm-6">
                  <div class="description-block">
                  <span class="description-text"><p style="text-align: right !important">Tipo de Caso Low</p></span>
                    <h5 class="description-header"><p style="font-size: 11px !important;text-align: right"><?php echo $array[0]["es_material"]." ".$array[0]["en_proth_type"]."(".$array[0]["en_step"].")"; ?></p></h5>
                    <span class="description-text"><p style="text-align: right !important">Color</p></span>
                    <h5 class="description-header"><p id="color_invoice_low" style="font-size: 11px !important"></p></h5>
                    <span class="description-text"><p style="text-align: right !important">Fecha de Devolución</p></span>
                    <h5 class="description-header"><p id="finish_date_invoice_low" style="font-size: 11px !important;text-align: right"><?php echo $array[0]["delivery_date"];  ?></p></h5>
                     <span class="description-text"><p style="text-align: right !important">Fecha de Reserva</p></span>
                    <h5 class="description-header"><p id="reservation_date_lo_invoice" style="font-size: 11px !important;text-align: right"><?php echo $array[0]["lab_asign_date"];  ?></p></h5>
                  </div>
                  <!-- /.description-block -->
                </div>
                 
                <!-- /.col -->
              </td>
                <?php
            } ?>
                
                <?php
                if($array[1] != null){
                 ?>
                 <td>
           
                <div class="col-sm-6 ">
                  <div class="description-block">
                    <span class="description-text"><p >Tipo de Caso Upp</p></span>
        <h5 class="description-header"><p id="case_type_upp_invoice" style="font-size: 11px !important"><?php echo $array[0]["es_material"]." ".$array[0]["en_proth_type"]."(".$array[0]["en_step"].")"; ?></p></h5>
                    <span class="description-text"><p>Color</p></span>
                    <h5 class="description-header"><p id="color_invoice_upp" style="font-size: 11px !important"></p></h5>
                    <span class="description-text"><p>Fecha de Devolución</p></span>
                    <h5 class="description-header"><p id="finish_date_invoice_upp" style="font-size: 11px !important"><?php echo $array[0]["delivery_date"];  ?></p></h5>
                     <span class="description-text"><p>Fecha de Reserva</p></span>
                    <h5 class="description-header"><p id="reservation_date_up_invoice" style="font-size: 11px !important"><?php echo $array[0]["lab_asign_date"];  ?></p></h5>
                  </div>
                  <!-- /.description-block -->
                </div></td>
                <td></td>
              <td>
                <!-- /.col -->
                <div class="col-sm-6">
                  <div class="description-block">
                  <span class="description-text"><p style="text-align: right !important">Tipo de Caso Low</p></span>
                    <h5 class="description-header"><p style="font-size: 11px !important;text-align: right"><?php echo $array[1]["es_material"]." ".$array[1]["en_proth_type"]."(".$array[1]["en_step"].")"; ?></p></h5>
                    <span class="description-text"><p style="text-align: right !important">Color</p></span>
                    <h5 class="description-header"><p id="color_invoice_low" style="font-size: 11px !important"></p></h5>
                    <span class="description-text"><p style="text-align: right !important">Fecha de Devolución</p></span>
                    <h5 class="description-header"><p id="finish_date_invoice_low" style="font-size: 11px !important;text-align: right"><?php echo $array[0]["delivery_date"];  ?></p></h5>
                     <span class="description-text"><p style="text-align: right !important">Fecha de Reserva</p></span>
                    <h5 class="description-header"><p id="reservation_date_lo_invoice" style="font-size: 11px !important;text-align: right"><?php echo $array[0]["lab_asign_date"];  ?></p></h5>
                  </div>
                  <!-- /.description-block -->
                </div>
                 
                <!-- /.col -->
              </td>
          <?php } ?>
          </tr>
              <tr><td colspan="23">
              
                <div class="col-sm-12 ">
                  <div class="description-block">
                    <span class="description-text"><p>Observaciones</p></span>
                    <h5 class="description-header"><p id="note_invoice" style="font-size: 11px !important;text-align: left"><?php echo $array[0]["observations"];  ?></p></h5>
                    
                  </div>
                  <!-- /.description-block -->
                </div>
                
              </td></tr>
              <tr><td>
           
                <div class="col-sm-6 ">
                  <div class="description-block">
                    <h5 class="description-header"></h5>
                    <span class="description-text"><p style="text-align: left">Inspect. Laboratorio</p></span>
                  </div>
                  <!-- /.description-block -->
                </div></td><td>
                </td><td>
                <!-- /.col -->
                <div class="col-sm-6 ">
                  <div class="description-block">
                    <h5 class="description-header"></h5>
                    <span class="description-text"><p style="text-align: right">Inspect. Clinic</p></span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                
                <!-- /.col -->
              </td></tr>
              <tr><td>
              <div class="row">
              <div class="col-sm-8 ">
                <div id="barcode2" ></div>
              <!--img id="barcode2"/>
                  < /.description-block -->
                </div></td><td>
                </td><td>
                <!-- /.col -->
                <div class="col-sm-4 " align="left">
                
                <div id="qrcodeCanvas" align="right"></div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
              </div>
            </div></td></tr>
            </table>
          </div>
                
    
        </div>
        
                </div>
        </div>
    </body>
    <!-- jQuery 2.2.3 -->
<script src="../assets/plugins/jQuery/jquery-2.2.3.min.js"></script>

<script type="text/javascript" src="../assets/dist/js/jquery.qrcode.js"></script>
<script type="text/javascript" src="../assets/dist/js/qrcode.js"></script>

    <script type="text/javascript">
    function get_object(id) {
   var object = null;
   if (document.layers) {
    object = document.layers[id];
   } else if (document.all) {
    object = document.all[id];
   } else if (document.getElementById) {
    object = document.getElementById(id);
   }
   return object;
  }
       var code = document.getElementById("code").value;
        get_object("barcode2").innerHTML=DrawCode39Barcode(code,0);
                /*JsBarcode("#barcode2", document.getElementById("code").value, {
        format:"msi",
        displayValue:true,
        fontSize:24,
        
        lineColor: "#fdb813"
      });*/
      jQuery('#qrcodeCanvas').qrcode({
        width:100,
        height:100,
        text    : document.getElementById("code").value
    }); 
   </script>
</html>


