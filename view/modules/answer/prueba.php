<?php include '../../inc/config.php'; ?>
<?php include '../../inc/template_start.php'; ?>
<?php include '../../inc/page_head.php'; ?>
<?php include '../../../services/QuestionService.php' ?>;
<!-- Page content -->
<div id="page-content" xmlns="http://www.w3.org/1999/html">
    <!-- Table Responsive Header -->
    <div class="content-header">
        <div class="header-section">
            <h1>
                <i class="fa fa-folder-open"></i>Banco de Preguntas<br><small>todas las preguntas que usted necesita!</small>
            </h1>
        </div>
    </div>
    <ul class="breadcrumb breadcrumb-top">
        <li>Tables</li>
        <li><a href="">Responsive</a></li>
    </ul>
    <!-- END Table Responsive Header -->
    <!-- Responsive Full Block -->
    <div class="block">
        <!-- Responsive Full Title -->
        <div class="block-title">
            <h2><strong>Banco</strong> de Preguntas</h2>
        </div>
        <!-- END Responsive Full Title -->

        <!-- Responsive Full Content -->
        <p>A continuación usted puede encontrar todas la pregunta por materia para poder construir su examen o para verificar que su pregunta ha sido agregada al banco.</p>
        <div class="table-responsive">
            <table class="table table-vcenter table-striped">
                <thead>
                <tr>
                    <th>Código</th>
                    <th>Enunciado</th>
                    <th style="width: 150px;" class="text-center">Acción</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $options = new questionService();
                echo $options->getQuestion();
                ?>
                </tbody>
            </table>
        </div>
        <!-- END Responsive Full Content -->
    </div>
    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Respuestas</h4>
                </div>
                <form role="form" action="" name="frmRespuesta" onsubmit="createAnswer(); return false">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="pregunta">Pregunta</label>
                            <input id="pregunta" name="pregunta" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="respuesta">Respuesta</label>
                            <input name="respuesta" id="respuesta" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="rEstado">estado</label>
                            <label class="radio-inline" for="example-inline-radio1">
                                <input type="radio" id="rEstado" name="rEstado1" value="true" required> Acertada
                            </label>
                            <label class="radio-inline" for="example-inline-radio2">
                                <input type="radio" id="rEstado" name="rEstado2" value="false" required> Errada
                            </label>
                        </div>

                    </div>

                </form>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-sm btn-primary " id="submit" name="submit" onsubmit="createAnswer(); return false"><i class="fa fa-arrow-right" aria-hidden="true"></i>   Agregar Respuesta</button>
                    <button type="button" class="btn btn-danger btn-circle" data-dismiss="modal"><i class="fa fa-close"></i></button>
                </div>

            </div>
        </div>
    </div>

</div>

<!-- END Page Content -->
<?php include '../../inc/page_footer.php'; ?>
<?php include '../../inc/template_scripts.php'; ?>
<!-- Load and execute javascript code used only in this page -->
<script src="../../js/ajaxUt.js"></script>
<script type="text/javascript">
    function Modal() {
        $('#modal').modal('show');
    }
</script>

<?php include '../../inc/template_end.php'; ?>
