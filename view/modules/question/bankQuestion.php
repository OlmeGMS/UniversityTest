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
            <table name="answers" id="answers" class="table table-vcenter table-striped">
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
                <form role="form" name="form-answers" id="form-answers" method="post">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="answers">Respuesta Correcta</label>
                            <textarea name="r1" id="1" class="form-control" true="true" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="answers">Respuestas incorrectas</label>
                            <textarea name="r2" id="2" class="form-control" required></textarea>
                            <textarea name="r3" id="3" class="form-control" required></textarea>
                            <textarea name="r4" id="4" class="form-control" required></textarea>
                            <textarea name="r5" id="5" class="form-control" required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-sm btn-primary" id="clearAnswers" name="clearAnswers" onclick="clearFormAnswer()" ><i class="" aria-hidden="true"></i>Limpiar formulario</button>
                        <button type="submit" class="btn btn-sm btn-primary" id="submitAnswers" name="submitAnswers" ><i class="fa fa-arrow-right" aria-hidden="true"></i>Agregar Respuestas</button>
                        <button type="button" class="btn btn-danger btn-circle" data-dismiss="modal"><i class="fa fa-close"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>

<!-- END Page Content -->
<?php include '../../inc/page_footer.php'; ?>
<?php include '../../inc/template_scripts.php'; ?>
<?php include '../../inc/message.php'; ?>

<!-- Load and execute javascript code used only in this page -->

<script type="text/javascript">
    function Modal() {
        $('#modal').modal('show');
    }
</script>
<script type="text/javascript">
    $(document).ready(function () {
        $("#answers tr").click(function () {
            $('#answers').find('tr').each(function(){
                $(this).removeClass("selected");
            });
            $(this).addClass('selected');
        });
    })
</script>
<script type="text/javascript">
    function clearFormAnswer() {
        document.getElementById("form-answers").reset();
    }
</script>

<script>
    $(document).ready(function () {
        $('#form-answers').submit(function (e) {
            $('#submitAnswers').text("Enviando respuestas...");
            $('#submitAnswers').prop("disabled",true);
            e.preventDefault();
            var data = $(this).serializeArray();
            var $idQuestion = $('.selected').attr('idQuestion');
            $.ajax({
                url:'../../../controller/answerController.php?idQuestion='+$idQuestion,
                type: 'post',
                dataType: 'json',
                data: data,
                success: function(data) {
                    if(data.response != true) {
                        $('#modal').modal('hide');
                        $('#submitAnswers').removeProp("disabled");
                        $('#response-message').text(data.message);
                        $("#btn-message").trigger("click");
                    }else{
                        $('#modal').modal('hide');
                        $('#submitAnswers').removeProp("disabled");
                        $('#response-message').text(data.message);
                        $("#btn-message").trigger("click");
                        document.getElementById("form-answers").reset();
                        $('#submitAnswers').text("Agregar Respuestas");
                    }
                }
            })
        })
    })
</script>

<?php include '../../inc/template_end.php'; ?>
