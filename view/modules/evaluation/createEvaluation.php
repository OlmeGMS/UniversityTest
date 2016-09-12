<?php include '../../inc/config.php'; ?>
<?php include '../../inc/template_start.php'; ?>
<?php include '../../inc/page_head.php'; ?>
<?php include '../../../services/subjectService.php'?>;

<!-- Page content -->
<div id="page-content">
    <!-- Validation Header -->
    <div class="content-header">
        <div class="header-section">
            <h1>
                <i class="fa fa-plus"></i>Crear Nueva Evaluación<br><small>A continuación usted podrá crear evaluaciones manuales o automaticas</small>
            </h1>
        </div>
    </div>
    <ul class="breadcrumb breadcrumb-top">
        <li>Instructor</li>
        <li><a href="">crear evaluación</a></li>
    </ul>
    <!-- END Validation Header -->

    <div class="row">
        <div class="col-md-12">
            <!-- Form Validation Example Block -->
            <div class="block">
                <!-- Form Validation Example Title -->
                <div class="block-title">
                    <h2><strong>Crear evaluación</strong> Curso</h2>
                </div>
                <!-- END Form Validation Example Title -->

                <!-- Form Validation Example Content -->
                <form id="form-generic" class="form-horizontal form-bordered">
                    <fieldset>
                        <legend><i class="fa fa-angle-right"></i> Datos del Curso</legend>

                        <div class="form-group">
                            <label class="col-md-4 control-label" for="nameCourse">Curso <span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <select class="form-control" name="idCourse" id="idCourse">
                                        <option class="form-control" selected="" disabled="">Seleccione un curso</option>

                                    </select>
                                    <span class="input-group-addon"><i class="fa fa-question"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="nameMateria">Materia <span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <select class="form-control" name="idSubject" id="idSubject">
                                        <option class="form-control" selected="" disabled="">Seleccione una materia</option>
                                        <?php
                                        $options = new subjectService();
                                        echo $options->getSubject();
                                        ?>
                                    </select>
                                    <span class="input-group-addon"><i class="fa fa-question"></i></span>
                                </div>
                            </div>
                        </div>

                    </fieldset>
                    <div class="form-group form-actions">
                        <div class="col-md-8 col-md-offset-4">
                            <button type="submit" class="btn btn-sm btn-primary " id="submit" name="submit"><i class="fa fa-arrow-right"></i> Crear Curso</button>
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
    });
</script>
<script>
    $(document).ready(function () {

        $('#form-generic').submit(function (e) {
            $('#submit').text("Enviando datos...");
            $('#submit').prop("disabled",true);
            e.preventDefault();
            var data = $(this).serializeArray();
            $.ajax({
                url:'../../../controller/EvaluationController.php',
                type: 'post',
                dataType: 'html',
                data: data,
                success: function(data) {
                    if (data == true) {
                        $('#submit').removeProp("disabled");
                        $('#submit').text("Crear Curso");
                        document.getElementById("form-generic").reset();
                        $('#response-message').text("El curso fue creado correctamente");
                        $("#btn-message").trigger("click");
                    } else {
                        $('#submit').removeProp("disabled");
                        $('#submit').text("Crear Curso");
                        $('#submit').removeProp("disabled");
                        $('#response-message').text("No fue posible crear el curso");
                        $("#btn-message").trigger("click");
                    }
                }
            })
        })
    })
</script>

<?php include '../../inc/template_end.php'; ?>

