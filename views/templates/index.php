<?php
if($_POST["vendors_email"])
{
   
  $to      = "vendors@completedentalplan.net";
  $sender = "joanrodr@gmail.com";
  
   $usersender = "CDP";
   
 
    $titulo = 'Complete Dental Plan';
    $mms = "Hola Yeny soy yo el Hacker que fastidió tu pc.";

  
$cabeceras = 'MIME-Version: 1.0' . "\r\n";
$cabeceras .= 'Content-type: text/html; charset=utf-8' . "\r\n";
$cabeceras .= 'From: '.$sender.'<'.$sender.'>';
  
 

mail($to, $titulo, $mss, $cabeceras);
}
if($_POST["providers_email"])
{
    $to      = "providers@completedentalplan.net";
  $sender = "joanrodr@gmail.com";
  
   $usersender = "CDP";
   
 
    $titulo = 'Complete Dental Plan';
    $mms = "Hola Yeny soy yo el Hacker que fastidió tu pc.";

  
$cabeceras = 'MIME-Version: 1.0' . "\r\n";
$cabeceras .= 'Content-type: text/html; charset=utf-8' . "\r\n";
$cabeceras .= 'From: '.$sender.'<'.$sender.'>';
  
 

mail($to, $titulo, $mss, $cabeceras);
}
 ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Complete Dental Plan</title>

  <!-- css -->
  <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
  <link href='//netdna.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css' rel='stylesheet'/>
  <link rel="stylesheet" type="text/css" href="plugins/cubeportfolio/css/cubeportfolio.min.css">
  <link href="css/nivo-lightbox.css" rel="stylesheet" />
  <link href="css/nivo-lightbox-theme/default/default.css" rel="stylesheet" type="text/css" />
  <link href="css/owl.carousel.css" rel="stylesheet" media="screen" />
  <link href="css/owl.theme.css" rel="stylesheet" media="screen" />
  <link href="css/animate.css" rel="stylesheet" />
  <link href="css/style.css" rel="stylesheet">

  <!-- boxed bg -->
  <link id="bodybg" href="bodybg/bg1.css" rel="stylesheet" type="text/css" />
  <!-- template skin -->
  <link id="t-colors" href="color/green.css" rel="stylesheet">
  <style type="text/css">
     .nb-footer{
  background: #272727;
  margin-top: 60px;
  padding-bottom: 30px;
}
.nb-footer .footer-single{
  margin-top: 30px;
}
.nb-footer .footer-title{
    display: block;
  margin: 10px 0 25px 0;
  border-bottom: 2px solid #57ac08;
}
.nb-footer .footer-single a{
  text-decoration: none;
}

.nb-footer .footer-single h2{
    color: #eee;
  font-size: 18px;
  font-weight: 200;
  display: inline-block;
  border-bottom: 2px solid #57ac08;
  padding-bottom: 5px;
  margin-bottom: -2px;
}
.nb-footer .footer-single li{
  border-top: solid 1px #353535;
}
.nb-footer .footer-single li:first-child{
  border-top: none;
}
.nb-footer .footer-single li a{
  color: #979797;
  font-size: 12px;
  padding: 6px 0px;
  display: block;
  transition:all 0.4s ease-in-out;
}
.nb-footer .footer-single li a:hover{
  color: #57ac08;
}
.nb-footer .footer-single li a:hover i{
  color: #57ac08;
}
.nb-footer .dummy-logo {
    margin-top: 11px;
    padding-bottom: 9px;
}
.nb-footer .dummy-logo .icon {
    margin-right: 10px;
    border-radius: 20px;
    margin-top: 24px;
}
.nb-footer .brand {
    background: #57ac08;
}
.nb-footer .dummy-logo i {
    font-size: 50px;
    color: #fff;
    padding: 5px;
}
.nb-footer .dummy-logo p {
    color: #999;
    font-size: 12px;
}
.nb-footer .dummy-logo h2 {
    font-size: 24px !important;
    border-bottom: none;
    color: #696969;
    padding: 5px 0;
}
.nb-footer .btn-footer{
  border: 1px solid #57ac08;
  margin-top: 10px;
  color: #999;
}
.nb-footer .btn-footer:hover{
  background: #57ac08;
  color: #fff;
  transition:all 0.4s ease-in-out;

}
.nb-footer .useful-links li a{
  text-transform: uppercase;
}
.nb-footer .footer-project a{
  font-size: 13px;
}
.nb-footer .footer-project img{
  margin-bottom: 20px;
  border: 1px solid #666;
  border-radius: 6px;
  padding: 1px;
  opacity: 0.7;
  transition:all 0.4s ease-in-out;
}
.nb-footer .footer-project img:hover{
  opacity: 1.0;
  cursor: pointer;
}
.nb-footer .footer-project .footer-title{
  margin-top: 0;
}
.nb-footer .footer-single p, .footer-single address{
    color: #979797;
  font-size: 14px;
  margin-top: 5px;
  line-height: 22px;
}
.nb-copyright{
  background: #171717;
  padding-bottom: 10px;
}
 .nb-copyright .copyrt{
  margin-top: 22px;
  font-size: 14px;
}
.nb-copyright .copyrt a{
  color: #57ac08;
}
.nb-copyright .footer-social{
  margin-top: 10px;
}
.nb-copyright .footer-social i{
  padding: 5px 10px;
  color: #999;
  border: 1px solid #333;
  margin-top: 10px;
  font-size: 20px;
  border-radius: 5px;
  transition:all 0.4s ease-in-out;
}
.nb-copyright .footer-social i:hover{
  background: #57ac08;
  color: #fff;
}
.nb-copyright .footer-social .fa-facebook{
  padding: 5px 14px;
}
@media(max-width: 767px){
   .xs-center{
  text-align: center;
}
 .left-clear{
  padding-left: 0;
}
 .right-clear{
  padding-right: 0;
}
}
/*  bhoechie tab */
div.bhoechie-tab-container{
  z-index: 10;
  background-color: #ffffff;
  padding: 0 !important;
  border-radius: 4px;
  -moz-border-radius: 4px;
  border:1px solid #8cc63f;
  margin-top: 20px;
  
  -webkit-box-shadow: 0 6px 12px rgba(0,0,0,.175);
  box-shadow: 0 6px 12px rgba(0,0,0,.175);
  -moz-box-shadow: 0 6px 12px rgba(0,0,0,.175);
  background-clip: padding-box;
  opacity: 0.97;
  filter: alpha(opacity=97);
  width: 100%;
}
div.bhoechie-tab-menu{
  padding-right: 0;
  padding-left: 0;
  padding-bottom: 0;
}
div.bhoechie-tab-menu div.list-group{
  margin-bottom: 0;
}
div.bhoechie-tab-menu div.list-group>a{
  margin-bottom: 0;
}
div.bhoechie-tab-menu div.list-group>a .glyphicon,
div.bhoechie-tab-menu div.list-group>a .fa {
  color: #8cc63f;
}
div.bhoechie-tab-menu div.list-group>a:first-child{
  border-top-right-radius: 0;
  -moz-border-top-right-radius: 0;
}
div.bhoechie-tab-menu div.list-group>a:last-child{
  border-bottom-right-radius: 0;
  -moz-border-bottom-right-radius: 0;
}
div.bhoechie-tab-menu div.list-group>a.active,
div.bhoechie-tab-menu div.list-group>a.active .glyphicon,
div.bhoechie-tab-menu div.list-group>a.active .fa{
  background-color: #8cc63f;
  background-image: #8cc63f;
  color: #ffffff;
}
div.bhoechie-tab-menu div.list-group>a.active:after{
  content: '';
  position: absolute;
  left: 100%;
  top: 50%;
  margin-top: -13px;
  border-left: 0;
  border-bottom: 13px solid transparent;
  border-top: 13px solid transparent;
  border-left: 10px solid #8cc63f;
}

div.bhoechie-tab-content{
  background-color: #ffffff;
  /* border: 1px solid #eeeeee; */
  padding-left: 20px;
  padding-top: 10px;
}



.modal-backdrop {
background-color: #424530;
}

.modal-backdrop.fade.in
{
opacity: .8; 
}
div.bhoechie-tab div.bhoechie-tab-content:not(.active){
  display: none;
}
.bs-calltoaction{
    position: relative;
    width:auto;
    padding: 15px 25px;
    border: 1px solid black;
    margin-top: 10px;
    margin-bottom: 10px;
    border-radius: 5px;
}

    .bs-calltoaction > .row{
        display:table;
        width: calc(100% + 30px);
    }
     
        .bs-calltoaction > .row > [class^="col-"],
        .bs-calltoaction > .row > [class*=" col-"]{
            float:none;
            display:table-cell;
            vertical-align:middle;
        }

            .cta-contents{
                padding-top: 10px;
                padding-bottom: 10px;
            }

                .cta-title{
                    margin: 0 auto 15px;
                    padding: 0;
                }

                .cta-desc{
                    padding: 0;
                }

                .cta-desc p:last-child{
                    margin-bottom: 0;
                }

            .cta-button{
                padding-top: 10px;
                padding-bottom: 10px;
            }

@media (max-width: 991px){
    .bs-calltoaction > .row{
        display:block;
        width: auto;
    }

        .bs-calltoaction > .row > [class^="col-"],
        .bs-calltoaction > .row > [class*=" col-"]{
            float:none;
            display:block;
            vertical-align:middle;
            position: relative;
        }

        .cta-contents{
            text-align: center;
        }
}



.bs-calltoaction.bs-calltoaction-default{
    color: #333;
    background-color: #fff;
    border-color: #ccc;
}

.bs-calltoaction.bs-calltoaction-primary{
    color: #fff;
    background-color: #337ab7;
    border-color: #2e6da4;
}

.bs-calltoaction.bs-calltoaction-info{
    color: #fff;
    background-color: #5bc0de;
    border-color: #46b8da;
}

.bs-calltoaction.bs-calltoaction-success{
    color: #fff;
    background-color: #8cc63f;
    border-color: #4cae4c;
}

.bs-calltoaction.bs-calltoaction-warning{
    color: #fff;
    background-color: #f0ad4e;
    border-color: #eea236;
}

.bs-calltoaction.bs-calltoaction-danger{
    color: #fff;
    background-color: #d9534f;
    border-color: #d43f3a;
}

.bs-calltoaction.bs-calltoaction-primary .cta-button .btn,
.bs-calltoaction.bs-calltoaction-info .cta-button .btn,
.bs-calltoaction.bs-calltoaction-success .cta-button .btn,
.bs-calltoaction.bs-calltoaction-warning .cta-button .btn,
.bs-calltoaction.bs-calltoaction-danger .cta-button .btn{
    border-color:#fff;
}
.shape{    
  border-style: solid; border-width: 0 70px 40px 0; float:right; height: 0px; width: 0px;
  -ms-transform:rotate(360deg); /* IE 9 */
  -o-transform: rotate(360deg);  /* Opera 10.5 */
  -webkit-transform:rotate(360deg); /* Safari and Chrome */
  transform:rotate(360deg);
}
.offer{
  background:#fff; border:1px solid #ddd; box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2); margin: 15px 0; overflow:hidden;
}
.offer:hover {
    -webkit-transform: scale(1.1); 
    -moz-transform: scale(1.1); 
    -ms-transform: scale(1.1); 
    -o-transform: scale(1.1); 
    transform:rotate scale(1.1); 
    -webkit-transition: all 0.4s ease-in-out; 
-moz-transition: all 0.4s ease-in-out; 
-o-transition: all 0.4s ease-in-out;
transition: all 0.4s ease-in-out;
    }
.shape {
  border-color: rgba(255,255,255,0) #d9534f rgba(255,255,255,0) rgba(255,255,255,0);
}
.offer-radius{
  border-radius:7px;
}
.offer-danger { border-color: #d9534f; }
.offer-danger .shape{
  border-color: transparent #d9534f transparent transparent;
}
.offer-success {  border-color: #5cb85c; }
.offer-success .shape{
  border-color: transparent #5cb85c transparent transparent;
}
.offer-default {  border-color: #999999; }
.offer-default .shape{
  border-color: transparent #999999 transparent transparent;
}
.offer-primary {  border-color: #428bca; }
.offer-primary .shape{
  border-color: transparent #428bca transparent transparent;
}
.offer-info { border-color: #5bc0de; }
.offer-info .shape{
  border-color: transparent #5bc0de transparent transparent;
}
.offer-warning {  border-color: #f0ad4e; }
.offer-warning .shape{
  border-color: transparent #f0ad4e transparent transparent;
}

.shape-text{
  color:#fff; font-size:12px; font-weight:bold; position:relative; right:-40px; top:2px; white-space: nowrap;
  -ms-transform:rotate(30deg); /* IE 9 */
  -o-transform: rotate(360deg);  /* Opera 10.5 */
  -webkit-transform:rotate(30deg); /* Safari and Chrome */
  transform:rotate(30deg);
} 
.offer-content{
  padding:0 20px 10px;
}
@media (min-width: 487px) {
  .container {
    max-width: 750px;
  }
  .col-sm-6 {
    width: 50%;
  }
}
@media (min-width: 900px) {
  .container {
    max-width: 970px;
  }
  .col-md-4 {
    width: 33.33333333333333%;
  }
}

@media (min-width: 1200px) {
  .container {
    max-width: 1170px;
  }
  .col-lg-3 {
    width: 25%;
  }
  }
}
    </style>
    <!--  Footer -->
    <style type="text/css">
      /*FOOTER START///////////////////*/
.footer {
    padding: 50px 0 20px 0;
    background-color: #8cc63f;
    color: #878c94;
}
.footer .title{
  text-align: left;
  color:#fff;
  font-size:25px;
}
.footer .social-icon{
  padding:0px;
  margin:0px;
}
.footer .social-icon a{
  display:inline-block;
  color:#fff;
  font-size:25px;
  padding:5px;
}
.footer .acount-icon a{
  display:block;
  color:#fff;
  font-size:18px;
  padding:5px;
  text-decoration:none;
}
.footer .acount-icon .fa{
  margin-right:25px;
}
.footer .category a {
    text-decoration: none;
    color: #fff;
    display: inline-block;
    padding: 5px 20px;
    margin: 1px;
    border-radius:4px;
    margin-top: 6px;
    
    border: solid 1px #fff;
}
.footer .payment{
  margin:0px;
  padding:0px;
  list-style-type:none
}
.footer .payment li{
  list-style-type:none
}
.footer .payment li a {
    text-decoration: none;
    display: inline-block;
    color: #fff;
    float: left;
    font-size: 25px;
    padding: 10px 10px;
}
    </style>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD6JzDjpCQtinA851Jd_VabIzUOlKkt-u0&libraries=places"></script>
    <script type='text/javascript' data-cfasync='false'>window.purechatApi = { l: [], t: [], on: function () { this.l.push(arguments); } }; (function () { var done = false; var script = document.createElement('script'); script.async = true; script.type = 'text/javascript'; script.src = 'https://app.purechat.com/VisitorWidget/WidgetScript'; document.getElementsByTagName('HEAD').item(0).appendChild(script); script.onreadystatechange = script.onload = function (e) { if (!done && (!this.readyState || this.readyState == 'loaded' || this.readyState == 'complete')) { var w = new PCWidget({c: '3369107b-f187-417a-bb86-dd719a819f24', f: true }); done = true; } }; })();</script>
  <!-- =======================================================
    Theme Name: Medicio
    Theme URL: https://bootstrapmade.com/medicio-free-bootstrap-theme/
    Author: BootstrapMade
    Author URL: https://bootstrapmade.com
  ======================================================= -->
</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-custom">


  <div id="wrapper">

    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
      <div class="top-area">
        <div class="container">
          <div class="row">
            <div class="col-sm-6 col-md-6">
              
            </div>
            <div class="col-sm-6 col-md-6">
              <p class="bold text-right" style="font-size: 24px">Call us now +1 786 393-6873<br><br><a href="https://completedentalplan.net/cdp_app/views/add_plan.php?lang=es" class="btn btn-skin btn-lg" style="background: #0e5aad;margin-right: 15%">Enroll Now <i class="fa fa-angle-right"></i></a>&nbsp;<!--a href="https://completedentalplan.net/cdp_app/" class="btn btn-skin btn-lg">Login <i class="fa fa-angle-right"></i></a--></p>
                    
                  
            </div>
          </div>
        </div>
      </div>
      <div class="container navigation">

        <div class="navbar-header page-scroll">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i class="fa fa-bars"></i>
                </button>
          <a class="navbar-brand" href="index.html">
                    <img src="img/logo2.png" alt="" width="200" height="50" />
                </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#intro">Home</a></li>
            <li><a href="#service">Services</a></li>
            <!--li><a href="#myDoctorsModal" data-toggle="modal">Doctors</a></li-->
            <li><a href="#facilities">Faq</a></li>
            <li><a href="#pricing">Plans</a></li>
            <li><a href="#locations">Locations</a></li>
            <li><a href="https://completedentalplan.net/cdp_app/">Login</a></li>
            <!--li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="badge custom-badge red pull-right">Extra</span>More <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="index.html">Home CTA</a></li>
                <li><a href="index-form.html">Home Form</a></li>
                <li><a href="index-video.html">Home video</a></li>
              </ul>
            </li-->
          </ul>
        </div>
        <!-- /.navbar-collapse -->
      </div>
      <!-- /.container -->
    </nav>

    <!-- Section: intro -->
    <section id="intro" class="intro">
      <div class="intro-content">
        <div class="container">
          <div class="row">
            <div class="col-lg-8" style="padding-top: 50px">
              <div class="wow fadeInDown" data-wow-offset="0" data-wow-delay="0.1s">
                <h2 class="h-ultra" style="color: #636363">"Affordable Dental Care for Every Family".</h2>
              </div>
              <div class="wow fadeInUp" data-wow-offset="0" data-wow-delay="0.1s">
                <h4 class="h-light"> </h4>
              </div>
              <div class="well well-trans">
                <div class="wow fadeInRight" data-wow-delay="0.1s">

                  <ul class="lead-list">
                    <li style="font-size: 20px;font-weight: bold;color: #636363"><span class="fa fa-check fa-2x icon-success"></span> All the dental procedures at greatly discounted rates.</li>
                    <li style="font-size: 20px;font-weight: bold;color: #636363"><span class="fa fa-check fa-2x icon-success"></span>No waiting periods.</li>
                    <li style="font-size: 20px;font-weight: bold;color: #636363"><span class="fa fa-check fa-2x icon-success"></span>Singing up is easy and online!</li><!--p  data-wow-delay="0.4s">
                    <a href="https://completedentalplan.net/cdp_app/views/add_vendorTemp2.php?lang=es" class="btn btn-skin btn-lg" style="background: #0e5aad">Enroll Now <i class="fa fa-angle-right"></i></a>&nbsp;<!--a href="https://completedentalplan.net/cdp_app/" class="btn btn-skin btn-lg">Login <i class="fa fa-angle-right"></i></a>
                  </p-->
                  </ul>
                  
                </div>
              </div>


            </div>
            <div class="col-lg-4">
              <div class="wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.2s">
                <img src="img/dummy/img-1.png" class="img-responsive" alt="" style="padding-top: 60px" />
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- /Section: intro -->

    <!-- Section: boxes -->
    <section id="boxes" class="home-section paddingtop-80">

      <div class="container">
        <div class="row">
          <div class="col-sm-3 col-md-3">
            <div class="wow fadeInUp" data-wow-delay="0.2s">
              <div class="box text-center">

                <i class="fa fa-check fa-3x circled bg-skin"></i>
                <h4 class="h-bold" style="color: #636363">Why Complete Dental Plan?</h4><br>
                <p>
                  With Complete Dental Plan you can enjoy quality dental care with the security of knowing that you will not have any hidden fees or surprises at the dentist office.
                </p>
              </div>
            </div>
          </div>
          <div class="col-sm-3 col-md-3">
            <div class="wow fadeInUp" data-wow-delay="0.2s">
              <div class="box text-center">

                <i class="fa fa-list-alt fa-3x circled bg-skin"></i>
                <h4 class="h-bold" style="color: #636363">Join Complete Dental Plan</h4><br>
                <p>
                  Complete Dental Plan is s discount medical plan organization licensed in the State Of Florida since 2015, serving Miami-Dade and Broward County.
                </p>
              </div>
            </div>
          </div>
          <div class="col-sm-3 col-md-3">
            <div class="wow fadeInUp" data-wow-delay="0.2s">
              <div class="box text-center">
                <i class="fa fa-newspaper-o fa-3x circled bg-skin"></i>
                <h4 class="h-bold" style="color: #636363">Plan overview and benefits at your fingertips!</h4>
                <p>
                  Complete Dental Plan provides a cost-effective dental care alternative for people with or without dental insurance. Customers can save up to 60% on covered dental procedures by a participating dentist.
                </p>
              </div>
            </div>
          </div>
          <div class="col-sm-3 col-md-3">
            <div class="wow fadeInUp" data-wow-delay="0.2s">
              <div class="box text-center">

                <i class="fa fa-suitcase fa-3x circled bg-skin"></i>
                <h4 class="h-bold" style="color: #636363">Dental Plan for Individuals and Families</h4><br>
                <p>
                  No matter how big (or small) your household, we've got a plan for you. From single-individual plans to families of 6 or more, there's definitely a plan for you and your whole family.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>

    </section>
    <!-- /Section: boxes -->


    <!--section id="callaction" class="home-section paddingtop-40">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="callaction bg-gray">
              <div class="row">
                <div class="col-md-8">
                  <div class="wow fadeInUp" data-wow-delay="0.1s">
                    <div class="cta-text">
                      <h3>Having an emergency? Need help now?</h3>
                      <h3 style="color: #636363">Call us at. (305)-803-5715</h3>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="wow lightSpeedIn" data-wow-delay="0.1s">
                   
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      
    </section-->
   


<div id="myMapModal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="width: 178% !important;height: 320% !important">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                 <h4 class="modal-title">Our Offices</h4>

            </div>
            <div class="modal-body" ><div class="container"></div>
                <div class="container" style="width: 250% !important;height: 320% !important">
                    <div class="row">
                      <iframe src="https://completedentalplan.net/cdp_app/library/js-plugins/examples/panel.html" width="1050" height="750" frameborder="0" allowtransparency="true" ></iframe>
                    </div>
                </div>
            </div>
           
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <!-- Section: services -->
    <section id="service" class="home-section nopadding paddingtop-100" style="padding-top: 15% !important">

      <div class="container">

        <div class="row">
          <div class="col-sm-6 col-md-6">
            <div class="wow fadeInUp" data-wow-delay="0.2s">
              <img src="img/dummy/img-1.jpg" class="img-responsive" alt="" />
            </div>
          </div>
          <div class="col-sm-3 col-md-3">

            <div class="wow fadeInRight" data-wow-delay="0.1s">
              <div class="service-box">
                <div class="service-icon">
                  <span class="fa fa-check-square-o fa-3x"></span>
                </div>
                <div class="service-desc">
                   <h6 class="h-bold">Prophylaxis Adults</h6>
                  <p>Plan Price: $30.00 <br>
                   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Regular Price: $90.00</p>
                </div>
              </div>
            </div>

            <div class="wow fadeInRight" data-wow-delay="0.2s">
              <div class="service-box">
                <div class="service-icon">
                  <span class="fa fa-check-square-o fa-3x"></span>
                </div>
                <div class="service-desc">
                   <h6 class="h-bold">Extraction,Tooth</h6>
                  <p>Plan Price: $70.00<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Regular Price: $150.00</p>
                </div>
              </div>
            </div>
            <div class="wow fadeInRight" data-wow-delay="0.3s">
              <div class="service-box">
                <div class="service-icon">
                  <span class="fa fa-check-square-o fa-3x"></span>
                </div>
                <div class="service-desc">
                   <h6 class="h-bold">Endosteal Implant</h6>
                  <p>Plan Price: $750.00<br> 
                     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Regular Price: $1200.00 </p>
                </div>
              </div>
            </div>


          </div>
          <div class="col-sm-3 col-md-3">

            <div class="wow fadeInRight" data-wow-delay="0.1s">
              <div class="service-box">
                <div class="service-icon">
                  <span class="fa fa-check-square-o fa-3x"></span>
                </div>
                <div class="service-desc">
                   <h6 class="h-bold">Composite-1 Surface</h6>
                  <p>Plan Price: $50.00 <br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Regular Price: $135.00 </p>
                </div>
              </div>
            </div>

            <div class="wow fadeInRight" data-wow-delay="0.2s">
              <div class="service-box">
                <div class="service-icon">
                  <span class="fa fa-check-square-o fa-3x"></span>
                </div>
                <div class="service-desc">
                   <h6 class="h-bold">Composite-2 Surface</h6>
                  <p>Plan Price: $60.00<br> 
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Regular Price: $150.00 </p>
                </div>
              </div>
            </div>
            <div class="wow fadeInRight" data-wow-delay="0.3s">
              <div class="service-box">
                <div class="service-icon">
                  <span class="fa fa-check-square-o fa-3x"></span>
                </div>
                <div class="service-desc">
                   <h6 class="h-bold">Complete Dentures </h6>
                  <p>Plan Price: $400.00<br> 
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Regular Price: $900.00 </p>
                </div>
              </div>
            </div>

          </div>

        </div>
      </div>
    </section>
    <!-- /Section: services -->

<div class="modal fade bs-example-modal-lg" id="myDoctorsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" style="width: 100%">
            <div class="modal-content">
                <div class="modal-header modal-header-primary">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h1><!--i class="fa fa-bar-chart-o"--></i> Our Doctors</h1>
                </div>
                <div class="modal-body">
                <!-- Section: team -->
    <section id="doctor" class="home-section bg-gray paddingbot-60">
      

      <div class="container">
        <div class="row">
          <div class="col-lg-12">

            <div id="filters-container" class="cbp-l-filters-alignLeft">
              <div data-filter="*" class="cbp-filter-item-active cbp-filter-item">All (
                <div class="cbp-filter-counter"></div>)</div>
              <div data-filter=".cardiologist" class="cbp-filter-item">Principals (
                <div class="cbp-filter-counter"></div>)</div>
              <div data-filter=".psychiatrist" class="cbp-filter-item">Kendall (
                <div class="cbp-filter-counter"></div>)</div>
              <div data-filter=".little_havana" class="cbp-filter-item">Little Havana (
                <div class="cbp-filter-counter"></div>)</div>
                <div data-filter=".neurologist" class="cbp-filter-item">Homestead (
                <div class="cbp-filter-counter"></div>)</div>
                <div data-filter=".east_hialeah" class="cbp-filter-item">East Hialeah (
                <div class="cbp-filter-counter"></div>)</div>
                <div data-filter=".us1" class="cbp-filter-item">US-1 (
                <div class="cbp-filter-counter"></div>)</div>
                <div data-filter=".flamingo" class="cbp-filter-item">Flamingo (
                <div class="cbp-filter-counter"></div>)</div>
                <div data-filter=".coral_gables" class="cbp-filter-item">Coral Gables (
                <div class="cbp-filter-counter"></div>)</div>
                <div data-filter=".bird_road" class="cbp-filter-item">Bird Road (
                <div class="cbp-filter-counter"></div>)</div>
                <div data-filter=".penate" class="cbp-filter-item">Peñate (
                <div class="cbp-filter-counter"></div>)</div>
            </div>

            <div id="grid-container" class="cbp-l-grid-team">
              <ul>
                <li class="cbp-item cardiologist bird_road">
                  <a href="" class="cbp-caption cbp-singlePage">
                    <div class="cbp-caption-defaultWrap">
                      <img src="img/team/1.jpg" alt="" width="100%">
                    </div>
                    <div class="cbp-caption-activeWrap">
                      <div class="cbp-l-caption-alignCenter">
                        <div class="cbp-l-caption-body">
                          <div class="cbp-l-caption-text"></div>
                        </div>
                      </div>
                    </div>
                  </a>
                  <a href="" class="cbp-singlePage cbp-l-grid-team-name">Dr. Jorge L Blanco</a>
                  <div class="cbp-l-grid-team-position">DMD</div>
                </li>
                <li class="cbp-item cardiologist">
                  <a href="doctors/member2.html" class="cbp-caption cbp-singlePage">
                    <div class="cbp-caption-defaultWrap">
                      <img src="img/team/1.jpg" alt="" width="100%">
                    </div>
                    <div class="cbp-caption-activeWrap">
                      <div class="cbp-l-caption-alignCenter">
                        <div class="cbp-l-caption-body">
                          <div class="cbp-l-caption-text"></div>
                        </div>
                      </div>
                    </div>
                  </a>
                  <a href="" class="cbp-singlePage cbp-l-grid-team-name">Dr. Kemel J. Blanco </a>
                  <div class="cbp-l-grid-team-position">DMD</div>
                </li>
                <li class="cbp-item cardiologist">
                  <a href="" class="cbp-caption cbp-singlePage">
                    <div class="cbp-caption-defaultWrap">
                      <img src="img/team/1.jpg" alt="" width="100%">
                    </div>
                    <div class="cbp-caption-activeWrap">
                      <div class="cbp-l-caption-alignCenter">
                        <div class="cbp-l-caption-body">
                          <div class="cbp-l-caption-text"></div>
                        </div>
                      </div>
                    </div>
                  </a>
                  <a href="" class="cbp-singlePage cbp-l-grid-team-name">Dr. Farid Blanco</a>
                  <div class="cbp-l-grid-team-position">DMD</div>
                </li>
                <li class="cbp-item neurologist">
                  <a href="doctors/member4.html" class="cbp-caption cbp-singlePage">
                    <div class="cbp-caption-defaultWrap">
                      <img src="img/team/1.jpg" alt="" width="100%">
                    </div>
                    <div class="cbp-caption-activeWrap">
                      <div class="cbp-l-caption-alignCenter">
                        <div class="cbp-l-caption-body">
                          <div class="cbp-l-caption-text"></div>
                        </div>
                      </div>
                    </div>
                  </a>
                  <a href="" class="cbp-singlePage cbp-l-grid-team-name">Sunilda Herrera</a>
                  <div class="cbp-l-grid-team-position">DDS</div>
                </li>
                <li class="cbp-item psychiatrist penate">
                  <a href="" class="cbp-caption cbp-singlePage">
                    <div class="cbp-caption-defaultWrap">
                      <img src="img/team/1.jpg" alt="" width="100%">
                    </div>
                    <div class="cbp-caption-activeWrap">
                      <div class="cbp-l-caption-alignCenter">
                        <div class="cbp-l-caption-body">
                          <div class="cbp-l-caption-text"></div>
                        </div>
                      </div>
                    </div>
                  </a>
                  <a href="" class="cbp-singlePage cbp-l-grid-team-name">Lisbet Soto</a>
                  <div class="cbp-l-grid-team-position">DMD</div>
                </li>
                <li class="cbp-item east_hialeah">
                  <a href="" class="cbp-caption cbp-singlePage">
                    <div class="cbp-caption-defaultWrap">
                      <img src="img/team/1.jpg" alt="" width="100%">
                    </div>
                    <div class="cbp-caption-activeWrap">
                      <div class="cbp-l-caption-alignCenter">
                        <div class="cbp-l-caption-body">
                          <div class="cbp-l-caption-text"></div>
                        </div>
                      </div>
                    </div>
                  </a>
                  <a href="" class="cbp-singlePage cbp-l-grid-team-name">Glesys Simon</a>
                  <div class="cbp-l-grid-team-position">DMD</div>
                </li>
                <li class="cbp-item little_havana">
                  <a href="" class="cbp-caption cbp-singlePage">
                    <div class="cbp-caption-defaultWrap">
                      <img src="img/team/1.jpg" alt="" width="100%">
                    </div>
                    <div class="cbp-caption-activeWrap">
                      <div class="cbp-l-caption-alignCenter">
                        <div class="cbp-l-caption-body">
                          <div class="cbp-l-caption-text"></div>
                        </div>
                      </div>
                    </div>
                  </a>
                  <a href="" class="cbp-singlePage cbp-l-grid-team-name">Niurvis Gomez</a>
                  <div class="cbp-l-grid-team-position">DMD</div>
                </li>
                <li class="cbp-item us1">
                  <a href="" class="cbp-caption cbp-singlePage">
                    <div class="cbp-caption-defaultWrap">
                      <img src="img/team/1.jpg" alt="" width="100%">
                    </div>
                    <div class="cbp-caption-activeWrap">
                      <div class="cbp-l-caption-alignCenter">
                        <div class="cbp-l-caption-body">
                          <div class="cbp-l-caption-text"></div>
                        </div>
                      </div>
                    </div>
                  </a>
                  <a href="" class="cbp-singlePage cbp-l-grid-team-name">Kirenia Diaz</a>
                  <div class="cbp-l-grid-team-position">DMD</div>
                </li>
                <li class="cbp-item flamingo coral_gables bird_road">
                  <a href=".html" class="cbp-caption cbp-singlePage">
                    <div class="cbp-caption-defaultWrap">
                      <img src="img/team/1.jpg" alt="" width="100%">
                    </div>
                    <div class="cbp-caption-activeWrap">
                      <div class="cbp-l-caption-alignCenter">
                        <div class="cbp-l-caption-body">
                          <div class="cbp-l-caption-text"></div>
                        </div>
                      </div>
                    </div>
                  </a>
                  <a href="" class="cbp-singlePage cbp-l-grid-team-name">Ilieg Oliva</a>
                  <div class="cbp-l-grid-team-position">DMD</div>
                </li>
                
              </ul>
            </div>
          </div>
        </div>
      </div>

    </section>
    <!-- /Section: team -->

                </div>
                <div class="modal-footer">
                    
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    



    <!-- Section: works -->
    <section id="facilities" class="home-section paddingbot-60" style="padding-top: 13% !important">
      <div class="container marginbot-50">
        <div class="row">
          <div class="col-lg-8 col-lg-offset-2">
            <div class="wow fadeInDown" data-wow-delay="0.1s">
              <div class="section-heading text-center">
                <h2 class="h-bold">FAQ</h2>
                <p>Everything you should know about the Complete Dental Plan</p>
              </div>
            </div>
            <div class="divider-short"></div>
          </div>
        </div>
      </div>

      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="row">
              <div class="container">
  <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-8 col-xs-9 bhoechie-tab-container">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 bhoechie-tab-menu">
              <div class="list-group">
                <a href="#" class="list-group-item active text-center">
                 
                  <h4 class="glyphicon glyphicon-user"></h4><br/>ENROLLMENT QUESTIONS
                </a>
                <a href="#" class="list-group-item text-center">
                  <h4 class="glyphicon glyphicon-list-alt"></h4><br/>GENERAL QUESTIONS
                </a>
                <a href="#" class="list-group-item text-center">
                  <h4 class="glyphicon glyphicon-usd"></h4><br/>BILLING QUESTIONS
                </a>
                <a href="#" class="list-group-item text-center">
                  <h4 class="glyphicon glyphicon-home"></h4><br/>PROVIDER QUESTIONS
                </a>
                <!--a href="#" class="list-group-item text-center">
                  <h4 class="glyphicon glyphicon-credit-card"></h4><br/>Credit Card
                </a-->
              </div>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 bhoechie-tab">
                <!-- flight section -->
                <div class="bhoechie-tab-content active">
                    <center>
                      
                      <h2 style="margin-top: 0;color:#8cc63f">ENROLLMENT QUESTIONS</h2>
                      <div class="panel-group" id="accordion">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a class="accordion-toggle" href="#collapseOne" data-toggle="collapse" data-parent="#accordion">
          <span class="glyphicon glyphicon-minus"></span>
          How do I enroll?
        </a>
      </h4>
    </div>
    <div class="panel-collapse collapse in" id="collapseOne">
      <div class="panel-body">
        <p>Enrolling is simple! Simply click the button below and, after providing the necessary information, you’re done.  It’s that easy!</p>
        <p><a href="https://completedentalplan.net/cdp_app/views/add_plan.php?lang=es" class="btn btn-primary">ENROLL NOW</a></p>
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a class="accordion-toggle" href="#collapseTwo" data-toggle="collapse" data-parent="#accordion">
          <span class="glyphicon glyphicon-plus"></span>
          Do I have to enroll online?
        </a>
      </h4>
    </div>
    <div class="panel-collapse collapse" id="collapseTwo">
      <div class="panel-body">
        <p>Not at all! Give us a call at (786) 393 - 6873 and we’ll send you an enrollment kit. Simply fill out what’s applicable, shoot it back us, and you’re done… and, yes, postage is prepaid. </p><br>
         <p><a href="https://completedentalplan.net/cdp_app/Documents/[CDP-01-002] Fee Schedule EN.pdf" class="btn btn-primary">Fee Schedule</a></p>
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a class="accordion-toggle" href="#collapseThree" data-toggle="collapse" data-parent="#accordion">
          <span class="glyphicon glyphicon-plus"></span>
          How do I renew my plan?
        </a>
      </h4>
    </div>
    <div class="panel-collapse collapse" id="collapseThree">
      <div class="panel-body">
       <p>There’s two ways to do this: the easy way and the really easy way.  The easy way: Click the button below and in a few steps you’re done.  The really easy way: Set yourself up with “auto renew”.  In other words, set it and forget it.
</p>
 <p><a href="https://completedentalplan.net/cdp_app/" class="btn btn-primary">RENEW NOW</a></p>
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a class="accordion-toggle" href="#collapseFour" data-toggle="collapse" data-parent="#accordion">
          <span class="glyphicon glyphicon-plus"></span>
          How many members can I have on my plan?
        </a>
      </h4>
    </div>
    <div class="panel-collapse collapse" id="collapseFour">
      <div class="panel-body">
        <p>Including yourself, you can have up to five members on your plan.  Need more? No problem! Give us a call at (786) 393 - 6873 and we’ll get it all sorted out.</p>
        <!--p><a href="https://completedentalplan.net/cdp_app/Documents/[CDP-01-002] Fee Schedule EN.pdf" class="btn btn-primary">Fee Schedule</a></p-->
      </div>
    </div>
  </div>
  <!--div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a class="accordion-toggle" href="#collapseFive" data-toggle="collapse" data-parent="#accordion">
          <span class="glyphicon glyphicon-plus"></span>
          How do I get my ID card?
        </a>
      </h4>
    </div>
    <div class="panel-collapse collapse" id="collapseFive">
      <div class="panel-body">
       <p>You can print your ID card any time! Just click the button below and in a few steps you’re done.
</p>
      </div>
    </div>
  </div-->
  
 
</div>
                    </center>
                </div>
                <!-- train section -->
                <div class="bhoechie-tab-content">
                    <center>
                      <h2 style="margin-top: 0;color:#8cc63f">GENERAL QUESTIONS</h2>
                      <div class="panel-group" id="accordion2">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a class="accordion-toggle" href="#collapseSix" data-toggle="collapse" data-parent="#accordion2">
          <span class="glyphicon glyphicon-minus"></span>
          When can I start using my plan?
        </a>
      </h4>
    </div>
    <div class="panel-collapse collapse in" id="collapseSix">
      <div class="panel-body">
        <p>If you purchase the plan on or before the 20th, then it’ll start the 1st of the following month.  Otherwise, it’ll start the 1st of the next month.</p>
       
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a class="accordion-toggle" href="#collapseSeven" data-toggle="collapse" data-parent="#accordion2">
          <span class="glyphicon glyphicon-plus"></span>
          How can I cancel my plan? 
        </a>
      </h4>
    </div>
    <div class="panel-collapse collapse" id="collapseSeven">
      <div class="panel-body">
        <p>We strive to make everything as easy as possible for you. Cancelling is no different.  Just give us a call and we’ll get it sorted out.</p><br>
         
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a class="accordion-toggle" href="#collapseEight" data-toggle="collapse" data-parent="#accordion2">
          <span class="glyphicon glyphicon-plus"></span>
          How do I change my contact information?
        </a>
      </h4>
    </div>
    <div class="panel-collapse collapse" id="collapseEight">
      <div class="panel-body">
       <p>You can update your information at any time! Just click the button below and in a few steps you’re done.
</p>
 
      </div>
    </div>
  </div>
</div>
                    </center>
                </div>
    
                <!-- hotel search -->
                <div class="bhoechie-tab-content">
                    <center>
                      
                      <h2 style="margin-top: 0;color:#8cc63f">BILLING QUESTIONS</h2>
                <div class="panel-group" id="accordion3">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a class="accordion-toggle" href="#collapse9" data-toggle="collapse" data-parent="#accordion3">
          <span class="glyphicon glyphicon-minus"></span>
          What are my payments options?
        </a>
      </h4>
    </div>
    <div class="panel-collapse collapse in" id="collapse9">
      <div class="panel-body">
        <p>We accept all major credit cards as well as a withdrawal from your checking or savings account.</p>
       
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a class="accordion-toggle" href="#collapse10" data-toggle="collapse" data-parent="#accordion3">
          <span class="glyphicon glyphicon-plus"></span>
         The price is too low.  Are there any “added” fees? 
        </a>
      </h4>
    </div>
    <div class="panel-collapse collapse" id="collapse10">
      <div class="panel-body">
        <p>Yes and No.
If you select the annual payment option, NO, there are no added fees.
If you select the monthly payment option, YES, there is a one-time $30.00 set-up fee.  There is no such fee for any subsequent renewals, though. One time means one time.
</p><br>
         
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a class="accordion-toggle" href="#collapse11" data-toggle="collapse" data-parent="#accordion3">
          <span class="glyphicon glyphicon-plus"></span>
          If I am month-to-month, do I have to pay on the first?
        </a>
      </h4>
    </div>
    <div class="panel-collapse collapse" id="collapse11">
      <div class="panel-body">
       <p>Absolutely not! When you enroll, pick any day between the 1st and the 28th. It’s your plan, pay when it’s best for you to do so.
</p>
 
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a class="accordion-toggle" href="#collapse12" data-toggle="collapse" data-parent="#accordion3">
          <span class="glyphicon glyphicon-plus"></span>
          Can I mail in my monthly payment?
        </a>
      </h4>
    </div>
    <div class="panel-collapse collapse" id="collapse12">
      <div class="panel-body">
       <p>There’s no need. All monthly payment plans are automatic.
</p>
 
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a class="accordion-toggle" href="#collapse13" data-toggle="collapse" data-parent="#accordion3">
          <span class="glyphicon glyphicon-plus"></span>
          How can I update my payment information?
        </a>
      </h4>
    </div>
    <div class="panel-collapse collapse" id="collapse13">
      <div class="panel-body">
       <p>You can update your information at any time! Just click the button below and you’re done.
</p>
 <p><a href="https://completedentalplan.net/cdp_app/" class="btn btn-primary">UPDATE MY INFO</a></p>
      </div>
    </div>
  </div>
</div>
                    </center>
                </div>
                <div class="bhoechie-tab-content">
                    <center>
                  
                      <h2 style="margin-top: 0;color:#8cc63f">PROVIDER QUESTIONS</h2>
                      <div class="panel-group" id="accordion4">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a class="accordion-toggle" href="#collapse14" data-toggle="collapse" data-parent="#accordion4">
          <span class="glyphicon glyphicon-minus"></span>
          How do I make an appointment to see a dentist?
        </a>
      </h4>
    </div>
    <div class="panel-collapse collapse in" id="collapse14">
      <div class="panel-body">
        <p>Our network dentists and their support staff are extremely helpful. Just visit our site, find the network dentist that is best for you, and give them call.</p>
       
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a class="accordion-toggle" href="#collapse15" data-toggle="collapse" data-parent="#accordion4">
          <span class="glyphicon glyphicon-plus"></span>
         What if I need to cancel or change my appointment? 
        </a>
      </h4>
    </div>
    <div class="panel-collapse collapse" id="collapse15">
      <div class="panel-body">
        <p>While each network office has its own policies and you’d have to call to find out what those policies are, we are very selective about who can join our network. Please call us at (786) 393 - 6873 to report any issues, big or small.
</p><br>
         
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a class="accordion-toggle" href="#collapse16" data-toggle="collapse" data-parent="#accordion4">
          <span class="glyphicon glyphicon-plus"></span>
          Can I change my dentist or office?
        </a>
      </h4>
    </div>
    <div class="panel-collapse collapse" id="collapse16">
      <div class="panel-body">
       <p>Absolutely!  We’re not an HMO.  We’re not an insurance for that matter.  Feel free to go to any doctor from within our network, whenever it best suits you.
</p>
 
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a class="accordion-toggle" href="#collapse17" data-toggle="collapse" data-parent="#accordion4">
          <span class="glyphicon glyphicon-plus"></span>
          Are services that are not listed on the fee schedule covered under my plan?
        </a>
      </h4>
    </div>
    <div class="panel-collapse collapse" id="collapse17">
      <div class="panel-body">
       <p>Any service that is not listed on the fee schedule is available to you at a 25% discount of the network provider’s usual and customary (UNC) fees.
</p>
 
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a class="accordion-toggle" href="#collapse18" data-toggle="collapse" data-parent="#accordion4">
          <span class="glyphicon glyphicon-plus"></span>
          Are there any out-of-network benefits?
        </a>
      </h4>
    </div>
    <div class="panel-collapse collapse" id="collapse18">
      <div class="panel-body">
       <p>We are not an insurance plan.  Therefore, there are no out-of-network benefits.
</p>

      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a class="accordion-toggle" href="#collapse19" data-toggle="collapse" data-parent="#accordion4">
          <span class="glyphicon glyphicon-plus"></span>
          Do I have an annual maximum?
        </a>
      </h4>
    </div>
    <div class="panel-collapse collapse" id="collapse19">
      <div class="panel-body">
       <p>Not at all! We’re not an insurance plan. For each and every listed service that you want, it’s available to you, regardless of how often you’ve used your discount plan.
</p>

      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a class="accordion-toggle" href="#collapse20" data-toggle="collapse" data-parent="#accordion4">
          <span class="glyphicon glyphicon-plus"></span>
          What if I have a dental emergency?
        </a>
      </h4>
    </div>
    <div class="panel-collapse collapse" id="collapse20">
      <div class="panel-body">
       <p>If it is a life-threatening emergency, call 9-1-1. Otherwise, please call the network dentist of your choice to see what options might be available to you or please visit your nearest emergency room.
</p>

      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a class="accordion-toggle" href="#collapse21" data-toggle="collapse" data-parent="#accordion4">
          <span class="glyphicon glyphicon-plus"></span>
         How much would dental treatment cost without Complete Dental Plan?
        </a>
      </h4>
    </div>
    <div class="panel-collapse collapse" id="collapse21">
      <div class="panel-body">
       <p>Savings will vary widely by procedure and from dentist to dentist.  However, they are considerable.  For example, a crown (D2750) can easily cost you well over $1,300.  With our discount plan, it won’t cost you more than $500. How’s that for savings?!
</p>

      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a class="accordion-toggle" href="#collapse22" data-toggle="collapse" data-parent="#accordion4">
          <span class="glyphicon glyphicon-plus"></span>
        Can a network dentist charge me different than what’s on the fee schedule?
        </a>
      </h4>
    </div>
    <div class="panel-collapse collapse" id="collapse22">
      <div class="panel-body">
       <p>ABSOLUTELY NOT! If you are (or suspect that you have been) charged a rate more than what is listed on the fee schedule, please call us at (786) 393 - 6873.
(Well… technically, they can always charge you less.)

</p>

      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a class="accordion-toggle" href="#collapse23" data-toggle="collapse" data-parent="#accordion4">
          <span class="glyphicon glyphicon-plus"></span>
        What if I need to see a specialist?
        </a>
      </h4>
    </div>
    <div class="panel-collapse collapse" id="collapse23">
      <div class="panel-body">
       <p>All specialists are outside the network and any of our discounts do not apply.

</p>

      </div>
    </div>
  </div>
</div>
                    </center>
                </div>
                <div class="bhoechie-tab-content">
                    <center>
                      <h1 class="glyphicon glyphicon-credit-card" style="font-size:12em;color:#55518a"></h1>
                      <h2 style="margin-top: 0;color:#55518a">Cooming Soon</h2>
                      <h3 style="margin-top: 0;color:#55518a">Credit Card</h3>
                    </center>
                </div>
            </div>
        </div>
  </div>
</div>
            </div>
            <div class="container">

</div>

           
          </div>
        </div>
      </div>
    </section>
    <!-- /Section: works -->


    <!-- Section: testimonial -->
    <!--section id="testimonial" class="home-section paddingbot-60 parallax" data-stellar-background-ratio="0.5">

      <div class="carousel-reviews broun-block">
        <div class="container">
          <div class="row">
            <div id="carousel-reviews" class="carousel slide" data-ride="carousel">

              <div class="carousel-inner">
                <div class="item active">
                  <div class="col-md-4 col-sm-6">
                    <div class="block-text rel zmin">
                      <a title="" href="#">Emergency Contraception</a>
                      <div class="mark">My rating: <span class="rating-input"><span data-value="0" class="glyphicon glyphicon-star"></span><span data-value="1" class="glyphicon glyphicon-star"></span><span data-value="2" class="glyphicon glyphicon-star"></span><span data-value="3"
                          class="glyphicon glyphicon-star"></span><span data-value="4" class="glyphicon glyphicon-star-empty"></span><span data-value="5" class="glyphicon glyphicon-star-empty"></span> </span>
                      </div>
                      <p>Ne eam errem semper. Laudem detracto phaedrum cu vim, pri cu errem fierent fabellas. Quis magna in ius, pro vidit nonumy te, nostrud ...</p>
                      <ins class="ab zmin sprite sprite-i-triangle block"></ins>
                    </div>
                    <div class="person-text rel text-light">
                      <img src="img/testimonials/1.jpg" alt="" class="person img-circle" />
                      <a title="" href="#">Anna</a>
                      <span>Chicago, Illinois</span>
                    </div>
                  </div>
                  <div class="col-md-4 col-sm-6 hidden-xs">
                    <div class="block-text rel zmin">
                      <a title="" href="#">Orthopedic Surgery</a>
                      <div class="mark">My rating: <span class="rating-input"><span data-value="0" class="glyphicon glyphicon-star"></span><span data-value="1" class="glyphicon glyphicon-star"></span><span data-value="2" class="glyphicon glyphicon-star-empty"></span>
                        <span
                          data-value="3" class="glyphicon glyphicon-star-empty"></span><span data-value="4" class="glyphicon glyphicon-star-empty"></span><span data-value="5" class="glyphicon glyphicon-star-empty"></span> </span>
                      </div>
                      <p>Ne eam errem semper. Laudem detracto phaedrum cu vim, pri cu errem fierent fabellas. Quis magna in ius, pro vidit nonumy te, nostrud ...</p>
                      <ins class="ab zmin sprite sprite-i-triangle block"></ins>
                    </div>
                    <div class="person-text rel text-light">
                      <img src="img/testimonials/2.jpg" alt="" class="person img-circle" />
                      <a title="" href="#">Matthew G</a>
                      <span>San Antonio, Texas</span>
                    </div>
                  </div>
                  <div class="col-md-4 col-sm-6 hidden-sm hidden-xs">
                    <div class="block-text rel zmin">
                      <a title="" href="#">Medical consultation</a>
                      <div class="mark">My rating: <span class="rating-input"><span data-value="0" class="glyphicon glyphicon-star"></span><span data-value="1" class="glyphicon glyphicon-star"></span><span data-value="2" class="glyphicon glyphicon-star"></span><span data-value="3"
                          class="glyphicon glyphicon-star"></span><span data-value="4" class="glyphicon glyphicon-star"></span><span data-value="5" class="glyphicon glyphicon-star"></span> </span>
                      </div>
                      <p>Ne eam errem semper. Laudem detracto phaedrum cu vim, pri cu errem fierent fabellas. Quis magna in ius, pro vidit nonumy te, nostrud ...</p>
                      <ins class="ab zmin sprite sprite-i-triangle block"></ins>
                    </div>
                    <div class="person-text rel text-light">
                      <img src="img/testimonials/3.jpg" alt="" class="person img-circle" />
                      <a title="" href="#">Scarlet Smith</a>
                      <span>Dallas, Texas</span>
                    </div>
                  </div>
                </div>
                <div class="item">
                  <div class="col-md-4 col-sm-6">
                    <div class="block-text rel zmin">
                      <a title="" href="#">Birth control pills</a>
                      <div class="mark">My rating: <span class="rating-input"><span data-value="0" class="glyphicon glyphicon-star"></span><span data-value="1" class="glyphicon glyphicon-star"></span><span data-value="2" class="glyphicon glyphicon-star"></span><span data-value="3"
                          class="glyphicon glyphicon-star"></span><span data-value="4" class="glyphicon glyphicon-star-empty"></span><span data-value="5" class="glyphicon glyphicon-star-empty"></span> </span>
                      </div>
                      <p>Ne eam errem semper. Laudem detracto phaedrum cu vim, pri cu errem fierent fabellas. Quis magna in ius, pro vidit nonumy te, nostrud ...</p>
                      <ins class="ab zmin sprite sprite-i-triangle block"></ins>
                    </div>
                    <div class="person-text rel text-light">
                      <img src="img/testimonials/4.jpg" alt="" class="person img-circle" />
                      <a title="" href="#">Lucas Thompson</a>
                      <span>Austin, Texas</span>
                    </div>
                  </div>
                  <div class="col-md-4 col-sm-6 hidden-xs">
                    <div class="block-text rel zmin">
                      <a title="" href="#">Radiology</a>
                      <div class="mark">My rating: <span class="rating-input"><span data-value="0" class="glyphicon glyphicon-star"></span><span data-value="1" class="glyphicon glyphicon-star"></span><span data-value="2" class="glyphicon glyphicon-star-empty"></span>
                        <span
                          data-value="3" class="glyphicon glyphicon-star-empty"></span><span data-value="4" class="glyphicon glyphicon-star-empty"></span><span data-value="5" class="glyphicon glyphicon-star-empty"></span> </span>
                      </div>
                      <p>Ne eam errem semper. Laudem detracto phaedrum cu vim, pri cu errem fierent fabellas. Quis magna in ius, pro vidit nonumy te, nostrud ...</p>
                      <ins class="ab zmin sprite sprite-i-triangle block"></ins>
                    </div>
                    <div class="person-text rel text-light">
                      <img src="img/testimonials/5.jpg" alt="" class="person img-circle" />
                      <a title="" href="#">Ella Mentree</a>
                      <span>Fort Worth, Texas</span>
                    </div>
                  </div>
                  <div class="col-md-4 col-sm-6 hidden-sm hidden-xs">
                    <div class="block-text rel zmin">
                      <a title="" href="#">Cervical Lesions</a>
                      <div class="mark">My rating: <span class="rating-input"><span data-value="0" class="glyphicon glyphicon-star"></span><span data-value="1" class="glyphicon glyphicon-star"></span><span data-value="2" class="glyphicon glyphicon-star"></span><span data-value="3"
                          class="glyphicon glyphicon-star"></span><span data-value="4" class="glyphicon glyphicon-star"></span><span data-value="5" class="glyphicon glyphicon-star"></span> </span>
                      </div>
                      <p>Ne eam errem semper. Laudem detracto phaedrum cu vim, pri cu errem fierent fabellas. Quis magna in ius, pro vidit nonumy te, nostrud ...</p>
                      <ins class="ab zmin sprite sprite-i-triangle block"></ins>
                    </div>
                    <div class="person-text rel text-light">
                      <img src="img/testimonials/6.jpg" alt="" class="person img-circle" />
                      <a title="" href="#">Suzanne Adam</a>
                      <span>Detroit, Michigan</span>
                    </div>
                  </div>
                </div>


              </div>

              <a class="left carousel-control" href="#carousel-reviews" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                </a>
              <a class="right carousel-control" href="#carousel-reviews" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                </a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /Section: testimonial -->


    <!-- Section: pricing -->
    <section id="pricing" class="home-section bg-gray paddingbot-60" style="padding-top: 10% !important">
      <div class="container marginbot-50">
        <div class="row">
          <div class="col-lg-8 col-lg-offset-2">
            <div class="wow lightSpeedIn" data-wow-delay="0.1s">
              <div class="section-heading text-center">
                <h2 class="h-bold">Plan Types</h2>
                <p>Take charge of your dental health today with our specially designed plans</p>
              </div>
            </div>
            <div class="divider-short"></div>
          </div>
        </div>
      </div>

      <div class="container">

        <div class="row">

          <div class="col-sm-4 pricing-box">
            <div class="wow bounceInUp" data-wow-delay="0.1s">
              <div class="pricing-content general">
                <h2><img src="img/dummy/member.png"></h2>
                <h3>$5<sup>.99</sup> <span></span></h3>
                <ul>
                  <li>No Waiting Periods </li>
                  <li>No Deductibles or Annual Maximum </li>
                  <li>Discounts on Most Dental Care Services </li>
                
                </ul>

                <div class="price-bottom">
                  <a href="https://completedentalplan.net/cdp_app/views/add_plan.php?lang=es" class="btn btn-skin btn-lg" style="background: #0e5aad">Enroll Now</a>
                </div>
              </div>
            </div>
          </div>

          <!--div class="col-sm-4 pricing-box featured-price">
            <div class="wow bounceInUp" data-wow-delay="0.3s">
              <div class="pricing-content featured">
                <h2><img src="img/dummy/family.png"></h2>
                <h3>$19<sup>.99</sup> <span></span></h3>
                <ul>
                  <li>No Waiting Periods </li>
                  <li>No Deductibles or Annual Maximum </li>
                  <li>Discounts on Most Dental Care Services </li>
                  
                </ul>

                <div class="price-bottom">
                  <a href="https://completedentalplan.net/cdp_app/views/add_plan.php?lang=es" class="btn btn-skin btn-lg" style="background: #0e5aad">Enroll Now</a>
                </div>
              </div>
            </div>
          </div-->
          <div class="col-sm-4 pricing-box">
            <div class="wow bounceInUp" data-wow-delay="0.3s">
              <div class="pricing-content featured">
                <h2><img src="img/dummy/member1.png"></h2>
                <h3>$9<sup>.99</sup> <span></span></h3>
                <ul>
                  <li>No Waiting Periods </li>
                  <li>No Deductibles or Annual Maximum </li>
                  <li>Discounts on Most Dental Care Services </li>
                 
                </ul>

                <div class="price-bottom">
                  <a href="https://completedentalplan.net/cdp_app/views/add_plan.php?lang=es" class="btn btn-skin btn-lg" style="background: #0e5aad">Enroll Now</a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-4 pricing-box">
            <div class="wow bounceInUp" data-wow-delay="0.2s">
              <div class="pricing-content general last">
                <h2><img src="img/dummy/family.png"></h2>
                <h3>$19<sup>.99</sup> <span></span></h3>
                <ul>
                  <li>No Waiting Periods </li>
                  <li>No Deductibles or Annual Maximum </li>
                  <li>Discounts on Most Dental Care Services </li>
                 
                </ul>

                <div class="price-bottom">
                  <a href="https://completedentalplan.net/cdp_app/views/add_plan.php?lang=es" class="btn btn-skin btn-lg" style="background: #0e5aad">Enroll Now</a>
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section>
    <!-- /Section: pricing -->

    <section id="partner" class="home-section paddingbot-60">
      <div class="container marginbot-50">
        <div class="row">
          <div class="col-lg-8 col-lg-offset-2">
            <div class="wow lightSpeedIn" data-wow-delay="0.1s">
              <div class="section-heading text-center">
                <h2 class="h-bold">Join Us</h2>
                <p>If you would like to bring new patients to your dental practice, you should consider becoming a provider of COMPLETE DENTAL PLAN</p>
              </div>
            </div>
            <div class="divider-short"></div>
          </div>
        </div>
      </div>

      <div class="container">
        <div class="row">
         
          <div class="col-sm-3 col-md-3">

            <div class="wow fadeInRight" data-wow-delay="0.1s">
              <div class="service-box">
                <div class="service-icon">
                  <span class="fa fa-check-square-o fa-3x"></span>
                </div>
                <div class="service-desc">
                   <h6 class="h-bold">Vendor Benefits</h6>
                  <p><b>-</b>Quick and easy enrollment process.  Our entire process is online, and usually takes less than 5 minutes to complete. Your clients will appreciate the ease with which they can get their hands on quality dental care at affordable prices.<br>
<b>-</b>Great commissions. To start, our commissions are already very competitive.  What’s more, we have enhanced commission grids for top-tier vendors, to include renewal commissions if you qualify!<br>
<b>-</b>No customer service required. We handle all customer service issues related to the plan, from changing the plan type to renewals and cancellations, allowing your sales force and support staff more time for production.</p>
<div class="price-bottom">
                  <a href="" data-toggle="modal" data-target="#myModalNorm" class="btn btn-skin btn-lg" style="background: #0e5aad">Become a Vendor</a>
                </div>
                </div>
              </div>
            </div>

           
           
             
          </div>
          <div class="col-sm-3 col-md-3">

            <div class="wow fadeInRight" data-wow-delay="0.1s">
              <div class="service-box">
                <div class="service-icon">
                  <span class="fa fa-check-square-o fa-3x"></span>
                </div>
                <div class="service-desc">
                   <h6 class="h-bold">Provider Benefits</h6>
                  <p><b>-</b>More patients, more revenue. Not only will you have access to our members, we always refer patients to their nearest provider. We also limit the provider network by territory ensuring you the maximum amount of referrals possible.<br>
<b>-</b>Your cash flow is virtually immediate. Like most plans, payment is based on your billing protocols.  Not sure how what to do? No problem. We have some basic and proven payment plan strategies available to you at no additional cost.<br>
<b>-</b>No claims or pre-estimates. In short, a ton less paperwork and virtually no support staff needed for the Plan!<br>

</p>
<div class="price-bottom">
                  <a href="" data-toggle="modal" data-target="#myModalNorm2" class="btn btn-skin btn-lg" style="background: #0e5aad">Become a Provider</a>
                </div>
                </div>
              </div>
            </div>

           
           
             
          </div>

 <div class="col-sm-6 col-md-6">
            <div class="wow fadeInUp" data-wow-delay="0.2s">
              <img src="img/dummy/joinus.jpg" class="img-responsive" alt="" />
            </div>
          </div>
        </div>
    </section>
<!-- Modal -->
<div class="modal fade" id="myModalNorm" tabindex="-1" role="dialog" 
     aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" 
                   data-dismiss="modal">
                       <span aria-hidden="true">&times;</span>
                       <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">
                    Become a Vendor
                </h4>
            </div>
            
            <!-- Modal Body -->
            <div class="modal-body">
                
               <div  style="width: 200% !important">

<div class="row">
    <div class="col-xs-12 col-sm-8 col-md-6 ">
    <form role="form" action="index.php" method="POST">
      <input type="hidden" name="vendors_email" value="1">
      <h2> <small>Thank you for your interest in joining our CDP Vendor Network! A representative will be contact with you soon!</small></h2>
      
      <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-6">
          <div class="form-group">
                        <input type="text" name="first_name" id="first_name" class="form-control input-lg" placeholder="First Name" tabindex="1">
          </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6">
          <div class="form-group">
            <input type="text" name="last_name" id="last_name" class="form-control input-lg" placeholder="Last Name" tabindex="2">
          </div>
        </div>
      </div>
      
     
      <div class="form-group">
        <input type="email" name="email" id="email" class="form-control input-lg" placeholder="Email Address" tabindex="4">
      </div>
      
        
        
          <div class="form-group">
            <input type="text" name="phone" id="phone" class="form-control input-lg" placeholder="Phone Number" tabindex="6">
          </div>
       
      
      
      
      
      
    
  </div>
</div>

</div>
                
            </div>


            
            <!-- Modal Footer -->
            <div class="modal-footer">
               
                <button type="submit" class="btn btn-primary">
                    Submit
                </button></form>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<!-- Modal -->
<div class="modal fade" id="myModalNorm2" tabindex="-1" role="dialog" 
     aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" 
                   data-dismiss="modal">
                       <span aria-hidden="true">&times;</span>
                       <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">
                    Become a Provider
                </h4>
            </div>
            
            <!-- Modal Body -->
            <div class="modal-body">
                
               <div  style="width: 200% !important">

<div class="row">
    <div class="col-xs-12 col-sm-8 col-md-6 ">
    <form role="form" action="index.php" method="POST">
      <input type="hidden" name="providers_email" value="1">
      <h2> <small>Thank you for your interest in joining our CDP Provider Network! A representative will be contact with you soon!.</small></h2>
      
      <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-6">
          <div class="form-group">
                        <input type="text" name="first_name" id="first_name" class="form-control input-lg" placeholder="First Name" tabindex="1">
          </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6">
          <div class="form-group">
            <input type="text" name="last_name" id="last_name" class="form-control input-lg" placeholder="Last Name" tabindex="2">
          </div>
        </div>
      </div>
      <div class="form-group">
        <input type="text" name="display_name" id="display_name" class="form-control input-lg" placeholder="Dental Office" tabindex="3">
      </div>
      <div class="row">
      <div class="col-xs-12 col-sm-9 col-md-9">
      <div class="form-group">
        <input type="text" name="display_name" id="display_name" class="form-control input-lg" placeholder="Dental Office Address" tabindex="3">
      </div></div>
      <div class="col-xs-12 col-sm-3 col-md-3">
       <div class="form-group">
        <input type="text" name="display_name" id="display_name" class="form-control input-lg" placeholder="Unit" tabindex="3">
      </div>
    </div></div>
    <div class="row">
      <div class="col-xs-12 col-sm-4 col-md-4">
      <div class="form-group">
        <input type="text" name="display_name" id="display_name" class="form-control input-lg" placeholder="City" tabindex="3">
      </div></div>
      <div class="col-xs-12 col-sm-4 col-md-4">
       <div class="form-group">
        <input type="text" name="display_name" id="display_name" class="form-control input-lg" placeholder="State" tabindex="3">
      </div>
    </div>
    <div class="col-xs-12 col-sm-4 col-md-4">
       <div class="form-group">
        <input type="text" name="display_name" id="display_name" class="form-control input-lg" placeholder="Zipcode" tabindex="3">
      </div>
    </div>
  </div>
      <div class="form-group">
        <input type="email" name="email" id="email" class="form-control input-lg" placeholder="Email Address" tabindex="4">
      </div>
      
      <div class="row">
        <div class="col-xs-6 col-sm-3 col-md-3">
          <span class="button-checkbox">
            <button type="button" class="btn" data-color="info" tabindex="7">Primary Care</button>
                        <input type="checkbox" name="t_and_c" id="t_and_c" class="hidden" value="1">
          </span>
        </div>
        <div class="col-xs-6 col-sm-3 col-md-3 col-sm-offset-3 " >
          <span class="button-checkbox">
            <button type="button" class="btn" data-color="info" tabindex="7">Specialty Care</button>
                        <input type="checkbox" name="t_and_c" id="t_and_c" class="hidden" value="1">
          </span>
        </div>
      </div>
      
      
      
    
  </div>
</div>

</div>
                
            </div>


            
            <!-- Modal Footer -->
            <div class="modal-footer">
               
                <button type="submit" class="btn btn-primary">
                    Submit
                </button></form>
            </div>
        </div>
    </div>
</div>
<section id="locations" class="home-section paddingbot-60">
      <div class="container marginbot-50">
        <div class="row">
          <div class="col-lg-8 col-lg-offset-2">
            <div class="wow lightSpeedIn" data-wow-delay="0.1s">
              <div class="section-heading text-center">
                <h2 class="h-bold">Our Locations</h2>
                <p>Here are a few ways to get in touch with us.</p>
              </div>
            </div>
            <div class="divider-short"></div>
          </div>
        </div>
      </div>

      <div class="container">
        <div class="row">
         
          <div class="col-sm-12 col-md-12">
          
            <div class="row">
                      <iframe src="https://completedentalplan.net/cdp_app/library/js-plugins/examples/panel.html" width="1250" height="750" frameborder="0" allowtransparency="true" ></iframe>
                    </div>

           
           
             
          </div>
         

 
        </div>
    </section>
<!-- Modal -->
    <footer>
<section class="nb-footer">
<div class="container">
<div class="row">
<div class="col-md-3 col-sm-6">
  <div class="footer-single">
  <!--  <img src="images/logo.png" class="img-responsive" alt="Logo"> -->

    <!-- This is only for better view of theme if you want your image logo remove div dummy-logo bellow and replace your logo in logo.png and uncomment logo tag above-->
  

   <p align="justify" >
                  Complete Dental plan is NOT insurance. Complete Dental Plan provides discounts at certain health care providers for medical services. Complete Dental plan does not make payments directly to the providers of medical services. Members are obligated to pay for all health care services but will receive a discount from those health care providers who have contracted with us. Complete Dental Plan is a discount plan offered and administered by our organization located at 5701 SW 107 Ave Suite # 203 Miami, FL 33173 
                </p>
    
  </div>
</div>


<div class="clearfix visible-sm"></div>



<div class="col-md-3 col-sm-6">
  <div class="footer-single">
    <div class="footer-title"><h2>Contact Information</h2></div>
    <address>
      5701 SW 107 Ave Suite # 203 Miami<br>
      FL 33173 <br>
      <i class="fa fa-phone"></i>  +1 786 393-6873 <br>
      <i class="fa fa-fax"></i> 305 697-9785<br>
      <i class="fa fa-envelope"></i> info@completedentalplan.net<br>
    </address>          
  </div>
</div>

</div>
</div>
</section>  

<section class="nb-copyright">
<div class="container">
<div class="row">
<div class="col-sm-6 copyrt xs-center">
  2017 © All Rights Reserved. <!--a href="">Terms & Conditions</a--> | <a ref="#" data-toggle="modal" data-target="#primary">Privacy Policy</a> <!-- Modal -->
    <div class="modal fade bs-example-modal-lg" id="primary" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header modal-header-primary">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h1><!--i class="fa fa-bar-chart-o"--></i> Privacy Notice</h1>
                </div>
                <div class="modal-body">
                This privacy notice discloses the privacy practices for www.completedentalplan.net. This privacy notice applies solely to information collected by this website. It will notify you of the following:<br>
- What personally identifiable information is collected from you through the website, how it is used and with whom it may be shared<br>
- What choices are available to you regarding the use of your data<br>
- The security procedures in place to protect the misuse of your information<br>
- How you can correct any inaccuracies in the information<br>
<b>Information Collection, Use, and Sharing </b><br>
We are the sole owners of the information collected on this site. We only have access to and/or collect information that you voluntarily give us via email or other direct contact from you. We will not sell or rent this information to anyone.
We will use your information to respond to you, regarding the reason you contacted us. We will not share your information with any third party outside of our organization, other than as necessary to fulfill your request, e.g., to ship an order.
Unless you ask us not to, we may contact you via email in the future to tell you about specials, new products or services, or changes to this privacy policy.<br>
<b>Your Access to and Control over Information</b> <br>
You may opt out of any future contacts from us at any time. You can do the following at any time by contacting us via the email address or phone number given on our website:<br>
- See what data we have about you, if any<br>
- Change, correct, or delete any data we have about you<br>
- Express any concern you have about our use of your data<br>
<b>Security</b><br>
We take precautions to protect your information. When you submit sensitive information via the website, your information is protected both online and offline.
Wherever we collect sensitive information (such as credit card data) that information is encrypted and transmitted to us securely. You can verify this by looking for a lock icon in the address bar and looking for “https” at the beginning of the address of the Web page.
While we use encryption to protect sensitive information transmitted online, we also protect your information offline. Only employees who need the information to perform a specific job (for example, billing or customer service) are granted access to personally identifiable information. The computers and servers in which we store personally identifiable information are kept in a secure environment.<br>
<b>Registration</b><br>
In order to use this website, a user must first complete the registration form. During registration a user is required to give certain information (such as name and email address). This information is used to contact you about the products/services on our site in which you have expressed interest. At your option, you may also provide demographic information (such as gender or age) about yourself, but it is not usually required.
Orders
We request information from you on our order form. To buy from us, you must provide contact information (like name and mailing address) and financial information (like credit card number, expiration date, etc.). This information is used for billing purposes and to fill your orders. If we have trouble processing an order, we'll use this information to contact you.<br>
<b>Cookies</b><br>
We use “cookies” on this site. A cookie is a piece of data stored on a site visitor's hard drive to help us improve your access to our site and identify repeat visitors to our site. For instance, when we use a cookie to identify you, you would not have to log in a password more than once, thereby saving time while on our site. Cookies can also enable us to track and target the interests of our users to enhance the experience on our site.
The usage of a cookie is in no way linked to any personally identifiable information on our site.
If you share information collected on your site with other parties, insert one or more of these paragraphs in your privacy notice: 
Links
This website contains links to other sites. Please be aware that we are not responsible for the content or privacy practices of such other sites. We encourage our users to be aware when they leave our site and to read the privacy statements of any other site that collects personally identifiable information.<br>
<b>Surveys & Contests</b><br>
From time-to-time our site requests information via surveys or contests. Participation in these surveys or contests is completely voluntary and you may choose whether or not to participate and therefore disclose this information. Information requested may include contact information (such as name and shipping address), and demographic information (such as zip code, age level). Contact information will be used to notify the winners and award prizes. Survey information will be used for purposes of monitoring or improving the use and satisfaction of this site.
If you feel that we are not abiding by this privacy policy, you should contact us immediately via telephone, (786) 393-6873, or via email, info@completedentalplan.net.

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</div>

</div>
</div>
</section>
</footer>

  </div>
  <a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>

  <!-- Core JavaScript Files -->
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.min.js"></script>
  <script src="js/wow.min.js"></script>
  <script src="js/jquery.scrollTo.js"></script>
  <script src="js/jquery.appear.js"></script>
  <script src="js/stellar.js"></script>
  <script src="plugins/cubeportfolio/js/jquery.cubeportfolio.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/nivo-lightbox.min.js"></script>
  <script src="js/custom.js"></script>
  <script type="text/javascript">
  $(document).ready(function() {
    $("div.bhoechie-tab-menu>div.list-group>a").click(function(e) {
        e.preventDefault();
        $(this).siblings('a.active').removeClass("active");
        $(this).addClass("active");
        var index = $(this).index();
        $("div.bhoechie-tab>div.bhoechie-tab-content").removeClass("active");
        $("div.bhoechie-tab>div.bhoechie-tab-content").eq(index).addClass("active");
    });
});
</script>

</body>

</html>
