<?php
session_start();
?>
<?php include 'inc/config.php'; ?>
<?php include 'inc/template_start_home.php'; ?>

<!-- Page content -->
                    <div id="page-content">
                        <!-- Dashboard 2 Header -->
                        <div class="content-header">
                            <ul class="nav-horizontal text-center">
                                <li class="active">
                                    <a href="index.php"><i class="fa fa-university"></i> Inicio</a>
                                </li>
                                <li>
                                    <a href="login.php"><i class="fa fa-user"></i> Iniciar Sesión</a>
                                </li>
                            </ul>
                        </div>
                        <!-- END Dashboard 2 Header -->

                        <!-- Dashboard 2 Content -->
                        <div class="row">
                            <div class="col-md-12">
                                <!-- Web Server Block -->
                                <div class="block full">
                                    <!-- Web Server Title -->
                                    <div class="block-title">
                                        <div class="block-options pull-right">
                                            <span id="dash-chart-live-info" class="label label-primary"><script>
                                  var meses = new Array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
                                  var f=new Date();
                                  document.write(f.getDate() + " de " + meses[f.getMonth()] + " de " + f.getFullYear());
                                </script></span>
                                            <span class="label label-success animation-pulse">Activo</span>
                                        </div>
                                        <h2><strong>¡ <i class="fa fa-university"></i>University Test Te da la Bienvenida!</strong></h2>
                                    </div>
                                    <!-- END Web Server Title -->

                                    <!-- Web Server Content -->
                                    <!-- Flot Charts (initialized in js/pages/index2.js), for more examples you can check out http://www.flotcharts.org/ -->
                                    <div id="dash-chart-live" class="chart">
                                        <center><img align="center" src="img/libros.jpeg"  class="chart" ></center>
                                    </div>
                                    <!-- END Web Server Content -->
                                </div>
                                <!-- END Web Server Block -->

                                <!-- Mini Sales Charts Block -->
                                <!-- Jquery Sparkline (initialized in js/pages/index2.js), for more examples you can check out http://omnipotent.net/jquery.sparkline/#s-about -->
                                <div class="block full">
                                    <!-- Mini Sales Charts Title -->
                                    <div class="block-title">
                                        
                                        <h2><strong><i class="fa fa-university"></i>University Test - </strong>Una nueva forma de hacer Examenes </h2>
                                    </div>
                                    <!-- END Mini Sales Charts Title -->

                                    <!-- Mini Sales Charts Content -->
                                    <div class="row text-justify">
                                        <p>University test es el aplicativo que permite crear un examen en cuestión de segundos para que los estudiantes lo respondan en el lugar y a la hora que ellos quieran siempre y cuando este en la fecha planteada por el docente. Con calificación en tiempo real University Test es la nueva forma de hacer pruebas académicas. </p>
                                    </div>
                                    <!-- END Mini Sales Charts Content -->
                                </div>
                                <!-- END Mini Sales Charts Block -->

                               
                                    <!-- END Mini Earnings Charts Content -->
                                </div>
                                <!-- END Mini Earnings Charts Block -->

                                
                            
                        </div>
                        <!-- END Dashboard 2 Content -->
                    </div>
                    <!-- END Page Content -->

<?php include 'inc/page_footer.php'; ?>

<!-- Remember to include excanvas for IE8 chart support -->
<!--[if IE 8]><script src="js/helpers/excanvas.min.js"></script><![endif]-->

<?php include 'inc/template_scripts_home.php'; ?>

<!-- Google Maps API + Gmaps Plugin, must be loaded in the page you would like to use maps -->
<script src="//maps.google.com/maps/api/js?sensor=true"></script>
<script src="js/helpers/gmaps.min.js"></script>

<!-- Load and execute javascript code used only in this page -->
<script src="js/pages/index.js"></script>
<script>$(function(){ Index.init(); });</script>

