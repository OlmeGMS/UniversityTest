<?php include '../../inc/config.php'; ?>
<?php include '../../inc/template_start.php'; ?>
<?php include '../../inc/page_head.php'; ?>
<?php include '../../../services/questionService.php' ?>;
<!-- Page content -->
<div id="page-content">
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
</div>
<!-- END Page Content -->
<?php include '../../inc/page_footer.php'; ?>
<?php include '../../inc/template_scripts.php'; ?>
<?php include '../../inc/message.php'; ?>

<!-- Load and execute javascript code used only in this page -->
<script src="../../js/pages/formsValidation.js"></script>
<?php include '../../inc/template_end.php'; ?>
