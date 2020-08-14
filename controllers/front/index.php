<?php
include("../../models/admin.php");
//include("../models/conexion.php");
$obj = new Admin();

$m = $_GET["month"];
$y = $_GET["y"];

    

if(isset($_POST['action']) or isset($_GET['view'])) //show all events

{

    if(isset($_GET['view']))

    {

        header('Content-Type: application/json');

        $start = $_GET["start"];
        $end = date('Y-m-j');
        $m = date('m');
        $y = date('y');
       // $end = "2018-06-25";
        //$end = "2018-06-29";
        $events= $obj->return_lab_reservation_by_date($end);
        
      //  $result = mysqli_query($connection,"SELECT id, start ,end ,title FROM  events where (date(start) >= ‘$start’ AND date(start) <= ‘$end’)");
          
          $i=0;
         foreach ($events as $key => $value) {
         	# code...
         	$render_events[$i]["backgroundColor"] = "#868686";
         	$render_events[$i]["id"] = $value["id_procedure_step"];
         	$render_events[$i]["start"] = "2018-08-".$value["reservation_day"];
         	$render_events[$i]["end"] = "2018-08-".$value["reservation_day"];
         	$render_events[$i]["title"] = $value["ps_name_en"]."-".$value["reservations_by_day"];$i= $i+1;
         }
      

        echo json_encode($render_events); 

        exit;

    }

    elseif($_POST['action'] == "add") // add new event section

    {   

        mysqli_query($connection,"INSERT INTO events (

                    title ,

                    start ,

                    end 

                    )

                    VALUES (

                    '".mysqli_real_escape_string($connection,$_POST["title"])."',

                    '".mysqli_real_escape_string($connection,date('Y-m-d H:i:s',strtotime($_POST["start"])))."‘,

                    '".mysqli_real_escape_string($connection,date('Y-m-d H:i:s',strtotime($_POST["end"])))."‘

                    )");

        header('Content-Type: application/json');

        echo '{"id":"'.mysqli_insert_id($connection).'"}';

        exit;

    }

    elseif($_POST['action'] == "update")  // update event

    {

        mysqli_query($connection,"UPDATE events set 

            start = '".mysqli_real_escape_string($connection,date('Y-m-d H:i:s',strtotime($_POST["start"])))."', 

            end = '".mysqli_real_escape_string($connection,date('Y-m-d H:i:s',strtotime($_POST["end"])))."' 

            where id = '".mysqli_real_escape_string($connection,$_POST["id"])."'");

        exit;

    }

    elseif($_POST['action'] == "delete")  // remove event

    {

        mysqli_query($connection,"DELETE from events where id = '".mysqli_real_escape_string($connection,$_POST["id"])."'");

        if (mysqli_affected_rows($connection) > 0) {

            echo "1";

        }

        exit;

    }

}


 ?>