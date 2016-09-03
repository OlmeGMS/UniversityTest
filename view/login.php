<?php include 'inc/config.php'; ?>
<?php include 'inc/template_start_home.php'; ?>
<?php
session_start();
?>

<!-- Login Alternative Row -->
<div class="container">
    <div class="row">
        <div class="col-md-5 col-md-offset-1">
            <div id="login-alt-container">
                <!-- Title -->
                <h1 class="push-top-bottom">
                    <a href="home.php">
                    <i class="fa fa-university"></i> <strong><?php echo $template['name']; ?></strong><br></a>
                    <small>Bienvenidos a  <?php echo $template['name']; ?> </small>
                </h1>
                <!-- END Title -->

                <!-- Key Features -->
                <ul class="fa-ul text-muted">
                    <li><i class="fa fa-check fa-li text-success"></i> Fácil Creación  &amp; Calificación de examenes</li>
                    <li><i class="fa fa-check fa-li text-success"></i> Contesta la pruebas donde &amp; cuando quieras </li>
                    <li><i class="fa fa-check fa-li text-success"></i> 10 temas de colores </li>
                    <li><i class="fa fa-check fa-li text-success"></i> 100% Responsive &amp; Retina Ready</li>
                </ul>
                <!-- END Key Features -->

                <!-- Footer -->
                <footer class="text-muted push-top-bottom">
                    <small><span id="year-copy"></span> &copy; <a href="http://goo.gl/TDOSuC" target="_blank"><?php echo $template['name'] . ' ' . $template['version']; ?></a></small>
                </footer>
                <!-- END Footer -->
            </div>
        </div>
        <div class="col-md-5">
            <!-- Login Container -->
            <div id="login-container">
                <!-- Login Title -->
                <div class="login-title text-center">
                    <h1><strong>Login</strong> o <strong>Registro</strong></h1>
                </div>
                <!-- END Login Title -->

                <!-- Login Block -->
                <div class="block push-bit">
                    <!-- Login Form -->
                    <form action="../controller/loginController.php" method="post" id="form-login" class="form-horizontal">
                        <div class="form-group">
                            <div class="col-xs-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="gi gi-user"></i></span>
                                    <input type="text" id="user" name="user" class="form-control input-lg" placeholder="Usuario">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="gi gi-asterisk"></i></span>
                                    <input type="password" id="password" name="password" class="form-control input-lg" placeholder="Password">
                                </div>
                            </div>
                        </div>
                        <div class="form-group form-actions">
                            <div class="col-xs-4">
                                <label class="switch switch-primary" data-toggle="tooltip" title="Recordarme?">
                                    <input type="checkbox" id="login-remember-me" name="login-remember-me" checked>
                                    <span></span>
                                </label>
                            </div>
                            <div class="col-xs-8 text-right">
                                <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-angle-right"></i> Ingresar a University Test</button>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12 text-center">
                                <a href="javascript:void(0)" id="link-reminder-login"><small>¿Olvido su contraseña?</small></a> -
                                <a href="javascript:void(0)" id="link-register-login"><small>Crear una nueva cuenta</small></a>
                            </div>
                        </div>
                    </form>
                    <!-- END Login Form -->

                    <!-- Reminder Form -->
                    <form action="" method="" id="form-reminder" class="form-horizontal display-none">
                        <div class="form-group">
                            <div class="col-xs-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="gi gi-envelope"></i></span>
                                    <input type="text" id="reminder-email" name="reminder-email" class="form-control input-lg" placeholder="Email">
                                </div>
                            </div>
                        </div>
                        <div class="form-group form-actions">
                            <div class="col-xs-12 text-right">
                                <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-angle-right"></i> Restablecer Contraseña</button>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12 text-center">
                                <small>Si recordo su contraseña?</small> <a href="javascript:void(0)" id="link-reminder"><small>Login</small></a>
                            </div>
                        </div>
                    </form>
                    <!-- END Reminder Form -->

                    <!-- Register Form -->
                    <form action="../controller/loginController.php?register=true" method="post" id="form-register" class="form-horizontal display-none">
                        <div class="form-group">
                            <div class="col-xs-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-send-o"></i></span>
                                    <input type="text" id="registerDocument" name="registerDocument" class="form-control input-lg" placeholder="Documento" value="a">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-6">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="gi gi-user"></i></span>
                                    <input type="text" id="registerFirstName" name="registerFirstName" class="form-control input-lg" placeholder="Primer Nombre" value="a">
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <input type="text" id="registerSecondName" name="registerSecondName" class="form-control input-lg" placeholder="Segundo Nombre" value="a">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-6">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="gi gi-user"></i></span>
                                    <input type="text" id="registerFirstLastName" name="registerFirstLastName" class="form-control input-lg" placeholder="Primer Apellido" value="a">
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <input type="text" id="registerSecondLastName" name="registerSecondLastName" class="form-control input-lg" placeholder="Segundo Apellido" value="a">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="gi gi-user"></i></span>
                                    <input type="text" id="registerUser" name="registerUser" class="form-control input-lg" placeholder="Usuario" value="a">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="gi gi-asterisk"></i></span>
                                    <input type="password" id="registerPassword" name="registerPassword" class="form-control input-lg" placeholder="Password" value="12345">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="gi gi-asterisk"></i></span>
                                    <input type="password" id="registerPasswordVerify" name="registerPasswordVerify" class="form-control input-lg" placeholder="Verificar Password" value="12345">
                                </div>
                            </div>
                        </div>
                          <div class="form-group">
                            <div class="col-xs-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user-plus"></i></span>
                                    <select id="registerRol" name="registerRol" class="form-control" >
                                    <option check disabled="" selected="">Seleccione un rol</option>
                                    <option value="1">Instructor</option>
                                    <option value="2">Estudiante</option>
                                </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="gi gi-envelope"></i></span>
                                    <input type="text" id="registerEmail" name="registerEmail" class="form-control input-lg" placeholder="Email">
                                </div>
                            </div>
                        </div>
                        <div class="form-group form-actions">
                            <div class="col-xs-6">
                                <a href="#modal-terms" data-toggle="modal" class="register-terms">Terminos</a>
                                <label class="switch switch-primary" data-toggle="tooltip" title="aceptar los terminos">
                                    <input type="checkbox" id="register-terms" name="register-terms">
                                    <span></span>
                                </label>
                            </div>
                            <div class="col-xs-6 text-right">
                                <button type="submit" class="btn btn-sm btn-success" id="submitRegister" name="submitRegister"><i class="fa fa-plus"></i> Registrar Cuenta</button>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12 text-center">
                                <small>Ya tiene una cuenta con Nostros?</small> <a href="javascript:void(0)" id="link-register"><small>Login</small></a>
                            </div>
                        </div>
                    </form>
                    <!-- END Register Form -->
                </div>
                <!-- END Login Block -->
            </div>
            <!-- END Login Container -->
        </div>
    </div>
</div>
<!-- END Login Alternative Row -->

<!-- Modal Terms -->
<div id="modal-terms" class="modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Terms &amp; Conditions</h4>
            </div>
            <div class="modal-body">
                <h4>Title</h4>
                <p>Donec lacinia venenatis metus at bibendum? In hac habitasse platea dictumst. Proin ac nibh rutrum lectus rhoncus eleifend. Sed porttitor pretium venenatis. Suspendisse potenti. Aliquam quis ligula elit. Aliquam at orci ac neque semper dictum. Sed tincidunt scelerisque ligula, et facilisis nulla hendrerit non. Suspendisse potenti. Pellentesque non accumsan orci. Praesent at lacinia dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                <p>Donec lacinia venenatis metus at bibendum? In hac habitasse platea dictumst. Proin ac nibh rutrum lectus rhoncus eleifend. Sed porttitor pretium venenatis. Suspendisse potenti. Aliquam quis ligula elit. Aliquam at orci ac neque semper dictum. Sed tincidunt scelerisque ligula, et facilisis nulla hendrerit non. Suspendisse potenti. Pellentesque non accumsan orci. Praesent at lacinia dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                <h4>Title</h4>
                <p>Donec lacinia venenatis metus at bibendum? In hac habitasse platea dictumst. Proin ac nibh rutrum lectus rhoncus eleifend. Sed porttitor pretium venenatis. Suspendisse potenti. Aliquam quis ligula elit. Aliquam at orci ac neque semper dictum. Sed tincidunt scelerisque ligula, et facilisis nulla hendrerit non. Suspendisse potenti. Pellentesque non accumsan orci. Praesent at lacinia dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                <p>Donec lacinia venenatis metus at bibendum? In hac habitasse platea dictumst. Proin ac nibh rutrum lectus rhoncus eleifend. Sed porttitor pretium venenatis. Suspendisse potenti. Aliquam quis ligula elit. Aliquam at orci ac neque semper dictum. Sed tincidunt scelerisque ligula, et facilisis nulla hendrerit non. Suspendisse potenti. Pellentesque non accumsan orci. Praesent at lacinia dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                <h4>Title</h4>
                <p>Donec lacinia venenatis metus at bibendum? In hac habitasse platea dictumst. Proin ac nibh rutrum lectus rhoncus eleifend. Sed porttitor pretium venenatis. Suspendisse potenti. Aliquam quis ligula elit. Aliquam at orci ac neque semper dictum. Sed tincidunt scelerisque ligula, et facilisis nulla hendrerit non. Suspendisse potenti. Pellentesque non accumsan orci. Praesent at lacinia dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                <p>Donec lacinia venenatis metus at bibendum? In hac habitasse platea dictumst. Proin ac nibh rutrum lectus rhoncus eleifend. Sed porttitor pretium venenatis. Suspendisse potenti. Aliquam quis ligula elit. Aliquam at orci ac neque semper dictum. Sed tincidunt scelerisque ligula, et facilisis nulla hendrerit non. Suspendisse potenti. Pellentesque non accumsan orci. Praesent at lacinia dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            </div>
        </div>
    </div>
</div>
<!-- END Modal Terms -->

<?php include 'inc/template_scripts_home.php'; ?>
<?php include '/inc/message.php'; ?>

<!-- Load and execute javascript code used only in this page -->
<script src="js/pages/login.js"></script>
<script>$(function(){ Login.init(); });</script>
    <script>
        $(document).ready(function () {

            $('#form-register').submit(function (e) {
                $('#submitRegister').text("Enviando registro...");
                $('#submitRegister').prop("disabled",true);
                e.preventDefault();
                var data = $(this).serializeArray();
                $.ajax({
                    url:'../controller/loginController.php?register=true',
                    type: 'post',
                    dataType: 'json',
                    data: data,
                    success: function(data) {
                        if(data.response != "true") {
                            $('#submitRegister').removeProp("disabled");
                            $('#response-message').text(data.message);
                            $("#btn-message").trigger("click");

                        }else{
                            $('#submitRegister').removeProp("disabled");
                            $('#response-message').text(data.message);
                            document.getElementById("form-register").reset();
                            $("#btn-message").trigger("click");

                        }
                    }
                })
            })
        })
    </script>

<?php include 'inc/template_end_home.php'; ?>