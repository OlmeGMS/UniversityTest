<?php include '../../inc/config.php'; ?>
<?php include '../../inc/template_start.php'; ?>

<!-- Page content -->
                    <div id="page-content">
                        <!-- Dashboard 2 Header -->
                        <div class="content-header">
                            <ul class="nav-horizontal text-center">
                                <li class="active">
                                    <a href="javascript:void(0)"><i class="fa fa-university"></i> Inicio</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><i class="fa fa-pencil"></i> Examen</a>
                                </li>
                                <li>
                                    <a href="../course/createCourse.php"><i class="fa fa-graduation-cap"></i> Calificación</a>
                                </li
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
                                        <h2><strong>¡ Bienvenidos a  <i class="fa fa-university"></i>University Test!</strong></h2>
                                    </div>
                                    <!-- END Web Server Title -->

                                    <!-- Web Server Content -->
                                    <!-- Flot Charts (initialized in js/pages/index2.js), for more examples you can check out http://www.flotcharts.org/ -->
                                    <div id="dash-chart-live" class="chart">
                                        <center><img align="center" src="../../img/libros.jpeg"  class="chart" ></center>
                                    </div>
                                    <!-- END Web Server Content -->
                                </div>
                                <!-- END Web Server Block -->

                                <!-- Mini Sales Charts Block -->
                                <!-- Jquery Sparkline (initialized in js/pages/index2.js), for more examples you can check out http://omnipotent.net/jquery.sparkline/#s-about -->
                                <div class="block full">
                                    <!-- Mini Sales Charts Title -->
                                    <div class="block-title">
                                        
                                        <h2><strong><i class="fa fa-university"></i>University Test - </strong>Una nueva forma de Contestar Examenes </h2>
                                    </div>
                                    <!-- END Mini Sales Charts Title -->

                                    <!-- Mini Sales Charts Content -->
                                    <div class="row text-justify">
                                        <p>University Test te permite contestar tu prueba o examen donde quieras, atrás quedo la época que los exámenes solo se contestaban en el aula de clase.  Si el bosque te inspira y cuenta con conexión a internet allí puedes responder tu examen. No importa el lugar ni hora con University Test puedes responder tu prueba desde tu ordenador o teléfono móvil gracias al nuestro diseño Responsive.  </p>
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

                    <!-- Footer -->
                    <footer class="clearfix">
                        <div class="pull-right">
                            Creado </i> por <a href="#" target="_blank">Integer-Soft</a>
                        </div>
                        <div class="pull-left">
                            <span id="year-copy"></span> &copy; <a href="#" target="_blank">University Test 1.0</a>
                        </div>
                    </footer>
                    <!-- END Footer -->
                </div>
                <!-- END Main Container -->
            </div>
            <!-- END Page Container -->
            <!-- Page content -->

<?php include '../../inc/page_footer.php'; ?>
<?php include '../../inc/template_scripts.php'; ?>

<!-- Load and execute javascript code used only in this page -->
<script src="js/pages/formsValidation.js"></script>
<script>$(function() { FormsValidation.init(); });</script>


<?php include '../../inc/template_end.php'; ?>