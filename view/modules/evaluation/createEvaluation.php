<?php
/**
 * Include generales del proyecto, son requeridos.
 */
    include __DIR__.'/../../inc/config.php';
    include __DIR__.'/../../inc/template_start.php';
    include __DIR__.'/../../inc/page_head.php';
?>
<?php
    require_once __DIR__.'/../../../services/subjectService.php';
    require_once __DIR__.'/../../../services/QuestionService.php';
    require_once __DIR__.'/../../../services/CourseService.php';
    require_once __DIR__.'/../../../model/question/Question.class.php'
?>

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
                    <h2><strong>Crear evaluación</strong> Evaluación</h2>
                </div>
                <!-- END Form Validation Example Title -->

                <!-- Form manual -->
                <form id="form-generic" class="form-horizontal form-bordered">
                    <fieldset>
                        <legend><i class="fa fa-angle-right"></i> Datos de la Evaluación</legend>

                        <div class="form-group">
                            <label class="col-md-4 control-label" for="nameCourse">Curso <span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <select class="form-control" name="idCourse" id="idCourse">
                                        <option class="form-control" selected="" disabled="">Seleccione un curso</option>
                                        <?php
                                            $courses = new CourseService();
                                            echo $courses->getCourses();
                                        ?>
                                    </select>
                                    <span class="input-group-addon"><i class="fa fa-question"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="nameSubject">Materia <span class="text-danger">*</span></label>
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
                        <!-- Fecha evaluación -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="example-daterange1">Seleccione la fecha</label>
                            <div class="col-md-6">
                                <div class="input-group input-daterange" data-date-format="dd/mm/yyyy">
                                    <input type="text" id="initialDate" name="initialDate" class="form-control text-center" placeholder="Inicio" required>
                                    <span class="input-group-addon"><i class="fa fa-angle-right"></i></span>
                                    <input type="text" id="endDate" name="endDate" class="form-control text-center" placeholder="Final" required>
                                </div>
                            </div>
                        </div>
                        <!-- Hora evaluación -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="example-daterange1">Seleccione la hora</label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <div class=" bootstrap-timepicker">
                                        <input type="text" id="initialHora" name="initialHora" class="form-control text-center input-timepicker">
                                    </div>
                                    <span class="input-group-addon"><i class="fa fa-angle-right"></i></span>
                                    <div class=" bootstrap-timepicker">
                                        <input type="text" id="endHora" name="endHora" class="form-control text-center input-timepicker">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Tipo evaluación -->
                        <div class="form-group">
                            <label class="col-md-4 control-label">Tipo de evaluación</label>
                            <div class="col-md-6">
                                <label class="radio-inline" for="example-inline-radio1">
                                    <input type="radio" id="manual" name="typeEvaluation" value="manual"> Manual
                                </label>
                                <label class="radio-inline" for="example-inline-radio2">
                                    <input type="radio" id="automatic" name="typeEvaluation" value="automatic"> Automático
                                </label>
                            </div>
                        </div>
                        <!-- Tipo Automatico -->
                        <div class="form-group automatic hidden">
                            <label class="col-md-4 control-label h3"><strong>Automático</strong></label>
                            <div class="col-md-6">
                                <label class="col-md-4 control-label">Cantidad de preguntas</label>
                                <div class="input-group col-md-3">
                                    <span class="input-group-addon"><i class="gi gi-calculator"></i></span>
                                    <input type="number" id="quantityQuestions" name="quantityQuestions" class="form-control input-sm text-right" placeholder="0" required>
                                </div>
                            </div>
                        </div>
                        <!-- Tipo Manual -->
                        <div class="form-group manual hidden">
                            <label class="col-md-4 control-label h3"><strong>Manual</strong></label>
                            <div class="col-md-6">
                                <span class="label label-success animation-pulse">Preguntas seleccionadas</span>
                                <span class="label label-success animation-pulse" id="alertQuestions">0</span>
                                <div class="table-responsive">
                                    <table name="answers" id="answers" class="table table-vcenter table-striped">
                                        <thead>
                                        <tr>
                                            <th>Código</th>
                                            <th>Enunciado</th>
                                            <th>Seleccione</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            $questions = new questionService();
                                            $listQuestions = $questions->getAllQuestions();
                                            foreach ($listQuestions as $item){
                                                echo '<tr>';
                                                echo '<td>'.$item->getIdQuestion().'</td>';
                                                echo '<td>'.$item->getSentence().'</td>';
                                                echo '<td class="text-center"><input class="checkboxQuestions" type="checkbox" id='.$item->getIdQuestion().' name="checkboxQuestions[]" value='.$item->getIdQuestion().'></td>';
                                                echo '</tr>';
                                            }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <div class="form-group form-actions">
                        <div class="col-md-8 col-md-offset-4">
                            <button type="submit" class="btn btn-sm btn-primary " id="submit" name="submit" disabled="true"><i class="fa fa-arrow-right"></i> Crear evaluación</button>
                            <button type="reset" class="btn btn-sm btn-warning" id="reset"><i class="fa fa-repeat"></i> Limpiar</button>
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
    $(document).ready(function (){
        $('#form-generic input').on('change', function() {
            $('#submit').removeProp("disabled");
            if ($("#manual").is(":checked") ) {
                $('.manual').removeClass('hidden');
                $('.automatic').addClass('hidden');
                $('#quantityQuestions').removeProp('required');
            }
            if($("#automatic").is(":checked")){
                $('.automatic').removeClass('hidden');
                $('.manual').addClass('hidden');
            }
        });
        $('#reset').on('click',function (){
            $('#submit').prop("disabled",true);
            $('.manual').addClass('hidden');
            $('.automatic').addClass('hidden'); 
        });
        $("input[type='checkbox']").change(function() {
            $('#alertQuestions').text($('input[name="checkboxQuestions[]"]:checked').length);
        });
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
                dataType: 'json',
                data: data,
                success: function(data) {
                    $('#submit').removeProp("disabled");
                    $('#response-message').text(data.message);
                    $("#btn-message").trigger("click");
                    if(data.response === true) {
                        document.getElementById("form-generic").reset();
                        $('#submit').text("Registrar Cuenta");
                    }
                }
            })
        })
    })
</script>

<?php include '../../inc/template_end.php'; ?>

