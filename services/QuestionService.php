<?php
require_once __DIR__.'/../model/subject/Subject.class.php';
require_once __DIR__.'/../model/question/Question.class.php';
require_once __DIR__.'/../utils/DbConnection.php';

class QuestionService {

    private $conn = null;

    function __construct() {
        $this->conn = DBConnection::connect();
    }

    /**
     * @return string
     */
    public function getQuestion() {
        try
        {
            $result = array();
            $toString = "";
            $sql = 'SELECT eva_idpreguntaspk, eva_idmateriapk, eva_tipopreguntafk, eva_enunciado, eva_estado
	            FROM tbl_preguntas';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();

            foreach ($stmt->fetchAll(PDO::FETCH_OBJ)as$row){
                $question = new Question();
                $question->setIdQuestion($row->eva_idpreguntaspk);
                $question->setIdSubject($row->eva_idmateriapk);
                $question->setTypeQuestionFk($row->eva_tipopreguntafk);
                $question->setSentence($row->eva_enunciado);
                $question->setState($row->eva_estado);
                $result[] = $question;
            }
            foreach ($result as $item=>$value){
               
                $toString .= '<tr idQuestion="'.$value->getIdQuestion().'">
                             <td class="text-left" ><a href="javascript:void(0)" class="label label-info">'.$value->getIdQuestion().'</a></td>
                             <td>'.$value->getSentence().'</td>
                             <td class="text-center">
                             <div class="btn-group btn-group-xs">
                                <a href="../answer/createAnswer.php?id='.$value->getIdQuestion().'" data-toggle="tooltip" title="Editar" class="btn btn-default"><i class="fa fa-pencil"></i></a>
                                <a href="javascript:void(0)" data-toggle="tooltip" title="Respuestas" class="btn btn-info" onclick="Modal();"><i class="fa fa-check-square-o"></i></a>
                                <a id="agregarRespuesta" href="javascript:void(0)" data-toggle="tooltip" title="Eliminar" class="btn btn-danger" ><i class="fa fa-times"></i></a>
                             </div>
                             </td>
                             </tr>';
            }
            return $toString;
        }
        catch (PDOException $e)
        {
            return 'Error al ejecutar la consulta. '.$e->getMessage();
        }
        finally {
            DbConnection::disconnect();
        }
    }

    public function getPregunta(){
        try
        {
            $result = array();
            $toString = "";
            $sql = 'SELECT eva_idpreguntaspk, eva_idmateriapk, eva_tipopreguntafk, eva_enunciado, eva_estado
	            FROM public.tbl_preguntas';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();

            foreach ($stmt->fetchAll(PDO::FETCH_OBJ)as$row){
                $newQuestion = new Question($row->eva_idpreguntaspk, $row->eva_idmateriapk, $row->eva_tipopreguntafk, $row->eva_enunciado, $row->eva_estado);
                $result[] = $newQuestion;
            }

             $toString.= print $newQuestion->getSentence();
                

            return $toString;
        }
        catch (PDOException $e)
        {
            return 'Error al ejecutar la consulta. '.$e->getMessage();
        }
        finally {
            DbConnection::disconnect();
        }
    }

    public function getId(){
        try
        {
            $result = array();
            $toString = "";
            $sql = 'SELECT eva_idpreguntaspk, eva_idmateriapk, eva_tipopreguntafk, eva_enunciado, eva_estado
	            FROM public.tbl_preguntas';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();

            foreach ($stmt->fetchAll(PDO::FETCH_OBJ)as$row){
                $newQuestion = new Question($row->eva_idpreguntaspk, $row->eva_idmateriapk, $row->eva_tipopreguntafk, $row->eva_enunciado, $row->eva_estado);
                $result[] = $newQuestion;
            }
            $toString.= print $newQuestion->getIdQuestion();
            return $toString;
        }
        catch (PDOException $e)
        {
            return 'Error al ejecutar la consulta. '.$e->getMessage();
        }
        finally {
            DbConnection::disconnect();
        }
    }

    public function getQuestions($subject, $quantity){
        try
        {
            $result = array();
            $sql = "SELECT eva_idpreguntaspk, eva_tipopreguntafk, eva_estado, eva_idMateriaFk FROM tbl_preguntas WHERE eva_idMateriaFk = '".$subject."' AND eva_estado = 'true'";
            try {
                $stmt = $this->conn->prepare($sql);
                $stmt->execute();
                foreach ($stmt->fetchAll(PDO::FETCH_OBJ) as $row){
                    $question = new Question();
                    $question->setIdQuestion($row->eva_idpreguntaspk);
                    $question->setIdSubject($subject);
                    $result[] = $question;
                }
                if(count($result) >= $quantity){
                    $result = $this->chooseQuestionsRandom($result, $quantity);
                }else{
                    return null;
                }
            } catch (PDOException $e) {
                echo 'ERROR SQL :'. $e->getMessage();
            } finally {
                DbConnection::disconnect();
            }
            return $result;
        }
        catch (PDOException $e)
        {
            return 'Error al ejecutar la consulta. '.$e->getMessage();
        }
        finally {
            DbConnection::disconnect();
        }
    }

    private static function chooseQuestionsRandom($result, $quantity){
        $newArray = array();
        $selected = array();
        //Agrega numeros aleatorios a un arreglo
        while(count($selected) < $quantity) {
            $num = rand(1, $quantity);
            if(!in_array($num, $selected)){
                $selected[] = $num;
            }
        }
        //Carga el array a devolver con valores aleatorios
        foreach ($selected as $value) {
            //$position = $selected[i];
            $newArray[] = $result[$value];
        }
        return $newArray;
    }

}

?>