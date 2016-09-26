<?php
/**
 * Created by PhpStorm.
 * User: olmemarin
 * Date: 19/09/16
 * Time: 9:38 PM
 */

/**
 * Include generales del proyecto, son requeridos.
 */
    include __DIR__.'/../../inc/config.php';
    include __DIR__.'/../../inc/template_start.php';
    include __DIR__.'/../../inc/page_head.php';
?>
<?php
    include __DIR__.'/../../../services/EvaluationService.php';

?>;
<!-- Page content -->
<div id="page-content" xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
    <!-- Table Responsive Header -->
    <div class="content-header">
        <div class="header-section">
            <h1>
                <i class="fa fa-folder-open"></i>Consulta de evaluaciones<br><small>aca usted podra ver los examenes que se han creado!</small>
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
            <h2><strong>Examenes</strong> creados</h2>
        </div>
        <!-- END Responsive Full Title -->

        <!-- Responsive Full Content -->
        <p>A continuación usted puede encontrar todos los examenes creados por  los diferentes docentes.</p>
        <div class="table-responsive">
            <table name="answers" id="answers" class="table table-vcenter">
                <thead>
                <tr>
                    <th>Código</th>
                    <th>Fecha de registro</th>
                    <th>Fecha inicial</th>
                    <th>Fecha final</th>
                    <th>Preguntas</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    $evaluationService = new EvaluationService();
                    $listEvaluations = $evaluationService->getAllEvaluations();
                    foreach ($listEvaluations as $item){
                        echo "<tr class='evaluation ".$item->getId()."'>";
                            echo '<td>'.$item->getId().'</td>';
                            echo '<td>'.$item->getRegisterDate().'</td>';
                            echo '<td>'.$item->getInitialDate().'</td>';
                            echo '<td>'.$item->getEndDate().'</td>';
                            echo '<td class="text-center"><div class="btn-group btn-group-xs">';
                                echo  '<input id='.$item->getId().' type="button" class="fa fa-question btn btn-info text-left"  onclick="detail(this.id);" value="Detalle ?" ></button>';
                                echo '</div>';
                                foreach ($item->getListQuestions() as $question){
                                    echo "<tr class='question".$item->getId()."'";
                                    echo "hidden='true'><td/><td/><td/><td><i class='fa fa-check-square-o'></i></td>";
                                    echo '<td>'.$question->getSentence().'</td></tr>';
                                }
                            echo '</td>';
                        echo '</tr>';
                    }
                ?>
                </tbody>	
            </table>
        </div>
        <!-- END Responsive Full Content -->
    </div>
</div>

<!-- END Page Content -->
<?php include '../../inc/page_footer.php'; ?>
<?php include '../../inc/template_scripts.php'; ?>
<?php include '../../inc/message.php'; ?>

<!-- Load and execute javascript code used only in this page -->

<script type="text/javascript">
function detail(id) {
    var trQuestion = $('.question'+id);
    if(trQuestion.hasClass('detail') ){
        trQuestion.prop('hidden','true');
        trQuestion.removeClass('detail');
    }else{
        trQuestion.addClass('detail');
        trQuestion.removeProp('hidden');
    }
}
</script>

<?php include '../../inc/template_end.php'; ?>
