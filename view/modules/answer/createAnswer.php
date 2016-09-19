<?php
/**
 * Created by PhpStorm.
 * User: olmemarin
 * Date: 7/09/16
 * Time: 4:13 PM
 */

      include '../../inc/config.php'; ?>
<?php include '../../inc/template_start.php'; ?>
<?php include '../../inc/page_head.php'; ?>
<?php include '../../../services/QuestionService.php' ?>
<?php  $options = new questionService(); ?>

<!-- Page content -->
<div id="page-content">
    <!-- Validation Header -->
    <div class="content-header">
        <div class="header-section">
            <h1>
                <i class="fa fa-check-square-o"></i>Agregar Respuesta <br><small>en este formulario usted puede agregar la respuestas a una pregunta</small>
            </h1>
        </div>
    </div>
    <ul class="breadcrumb breadcrumb-top">
        <li>Instructor</li>
        <li><a href="../instructor/instructor.php">crear Respuesta</a></li>
    </ul>
    <!-- END Validation Header -->

    <div class="row">
        <div class="col-md-12">
            <!-- Form Validation Example Block -->
            <div class="block">
                <!-- Form Validation Example Title -->
                <div class="block-title">
                    <h2><strong>Crear Respuesta</strong></h2>
                </div>
                <!-- END Form Validation Example Title -->

                <!-- Form Validation Example Content -->
                <form id="form-generic" class="form-horizontal form-bordered">
                    <fieldset>
                        <legend><i class="fa fa-angle-right"></i> Datos de la Respuesta</legend>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="sentence">Pregunta <span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input type="text"  name="sentence" class="form-control" id=" <?php $options->getId(); ?>" placeholder="<?php $options->getPregunta() ?>" disabled>
                                    <span class="input-group-addon"><i class="fa fa-question"></i></span>
                                </div>
                            </div>
                        </div>
                        <!-- Pregunta estado -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="respuesta">Respuesta <span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input type="text" id="respuesta" name="respuesta" class="form-control" >
                                    <span class="input-group-addon"><i class="fa fa-question"></i></span>
                                </div>
                            </div>
                        </div>
                        <!-- Pregunta estado -->
                        <div class="form-group">
                            <label class="col-md-4 control-label">Estado<span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <label class="radio-inline" for="example-inline-radio1">
                                    <input type="radio" id="state" name="state" value="true"> activo
                                </label>
                                <label class="radio-inline" for="example-inline-radio2">
                                    <input type="radio" id="estadoCurso" name="estadoCurso" value="false"> inactivo
                                </label>
                            </div>
                        </div>

                    </fieldset>

                    <div class="form-group form-actions">
                        <div class="col-md-8 col-md-offset-4">
                            <button type="submit" class="btn btn-sm btn-primary " id="submit" name="submit"><i class="fa fa-arrow-right"></i> Agregar Respuesta</button>
                            <button type="reset" class="btn btn-sm btn-warning"><i class="fa fa-repeat"></i> Limpiar</button>
                        </div>
                    </div>
                </form>
                <!-- END Form Validation Example Content -->


                <!-- END Masked Inputs Content -->
            </div>
            <!-- END Masked Inputs Block -->

        </div>
    </div>
</div>
<!-- END Page Content -->
<?php include '../../inc/page_footer.php'; ?>
<?php include '../../inc/template_scripts.php'; ?>
<?php include '../../inc/message.php'; ?>

<!-- Load and execute javascript code used only in this page -->
<script src="../../js/pages/formsValidation.js"></script>

<script>$(function () {
        FormsValidation.init();
    });</script>
<script>
    $(document).ready(function () {

        $('#form-generic').submit(function (e) {
            $('#submit').text("Enviando datos...");
            $('#submit').prop("disabled", true);
            e.preventDefault();
            var data = $(this).serializeArray();
            $.ajax({
                url: '../../../controller/answerController.php',
                type: 'post',
                dataType: 'html',
                data: data,
                success: function (data) {
                    if (data == true) {
                        $('#submit').removeProp("disabled");
                        $('#submit').text("Agregar Respuesta");
                        document.getElementById("form-generic").reset();
                        $('#response-message').text("La pregunta fue creada la respuesta");
                        $("#btn-message").trigger("click");
                    } else {
                        $('#submit').removeProp("disabled");
                        $('#submit').text("Agregar Respuesta");
                        $('#submit').removeProp("disabled");
                        $('#response-message').text("No fue posible crear la respuesta");
                        $("#btn-message").trigger("click");
                    }
                }
            })
        })
    })
</script>

<?php include '../../inc/template_end.php'; ?>
