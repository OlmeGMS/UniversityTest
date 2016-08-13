<?php include '../../inc/config.php'; ?>
<?php include '../../inc/template_start.php'; ?>
<?php include '../../inc/page_head.php'; ?>
<!-- Page content -->
<div id="page-content">
    <!-- Validation Header -->
    <div class="content-header">
        <div class="header-section">
            <h1>
                <i class="fa fa-plus"></i>Crear Nueva Pregunta<br><small>en este formulario usted puede crear una nueva pregunta al banco</small>
            </h1>
        </div>
    </div>
    <ul class="breadcrumb breadcrumb-top">
        <li>Instructor</li>
        <li><a href="">crear pregunta</a></li>
    </ul>
    <!-- END Validation Header -->

    <div class="row">
        <div class="col-md-12">
            <!-- Form Validation Example Block -->
            <div class="block">
                <!-- Form Validation Example Title -->
                <div class="block-title">
                    <h2><strong>Crear Nueva</strong> Pregunta</h2>
                </div>
                <!-- END Form Validation Example Title -->

                <!-- Form Validation Example Content -->
                <form id="form-generic" class="form-horizontal form-bordered">
                    <fieldset>
                        <legend><i class="fa fa-angle-right"></i> Datos de la Pregunta</legend>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="materia">Materia <span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <select class="form-control" name="nameMateria" id="idMateria">
                                        <option class="form-control" selected="" >Seleccione una materia</option>
                                        
                                    </select>
                                    <span class="input-group-addon"><i class="fa fa-question"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="pregunta">Pregunta <span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input type="text" id="pregunta" name="pregunta" class="form-control" placeholder="Digite su pregunta">
                                    <span class="input-group-addon"><i class="fa fa-question"></i></span>
                                </div>
                            </div>
                        </div>
                      
                    </fieldset>

                    <div class="form-group form-actions">
                        <div class="col-md-8 col-md-offset-4">
                            <button type="submit" class="btn btn-sm btn-primary " id="submit" name="submit"><i class="fa fa-arrow-right"></i> Agregar Pregunta</button>
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
                url: '../../../controller/courseController.php',
                type: 'post',
                dataType: 'html',
                data: data,
                success: function (data) {
                    if (data == true) {
                        $('#submit').removeProp("disabled");
                        $('#submit').text("Agregar Pregunta");
                        document.getElementById("form-generic").reset();
                        $('#response-message').text("La pregunta fue creada correctamente");
                        $("#btn-message").trigger("click");
                    } else {
                        $('#submit').removeProp("disabled");
                        $('#submit').text("Agregar Pregunta");
                        $('#submit').removeProp("disabled");
                        $('#response-message').text("No fue posible crear la pregunta");
                        $("#btn-message").trigger("click");
                    }
                }
            })
        })
    })
</script>

<?php include '../../inc/template_end.php'; ?>
