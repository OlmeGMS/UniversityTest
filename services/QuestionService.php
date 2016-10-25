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
     * @return Array() listQuestions
     */
    public function getAllQuestions() {
        try
        {
            $listQuestions = array();
            $query = 'SELECT eva_idpreguntaspk, eva_idmateriafk, eva_tipopreguntafk, eva_enunciado, eva_estado FROM tbl_preguntas';
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            foreach ($stmt->fetchAll(PDO::FETCH_OBJ) as $row){
                $question = new Question();
                $question->setIdQuestion($row->eva_idpreguntaspk);
                $question->setIdSubject($row->eva_idmateriafk);
                $question->setTypeQuestionFk($row->eva_tipopreguntafk);
                $question->setSentence($row->eva_enunciado);
                $question->setState($row->eva_estado);
                $listQuestions[] = $question;
            }
            return $listQuestions;
        }
        catch (PDOException $e)
        {
            return 'Error al ejecutar la consulta. '.$e->getMessage();
        }
        finally {
            DbConnection::disconnect();
        }
    }

    /**
     * @param idQuestion
     * @return Question question
     */
    public function getQuestion($id){
        try
        {
            $sql = 'SELECT eva_idpreguntaspk, eva_idmateriafk, eva_tipopreguntafk, eva_enunciado, eva_estado
	            FROM public.tbl_preguntas WHERE eva_idpreguntaspk = '.$id;
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();

            foreach ($stmt->fetchAll(PDO::FETCH_OBJ)as$row){
                $question = new Question();
                $question->setIdQuestion($row->eva_idpreguntaspk);
                $question->setIdSubject($row->eva_idmateriafk);
                $question->setTypeQuestionFk($row->eva_tipopreguntafk);
                $question->setSentence($row->eva_enunciado);
                $question->setState($row->eva_estado);
            }
            return $question;
        }
        catch (PDOException $e)
        {
            return 'Error al ejecutar la consulta. '.$e->getMessage();
        }
        finally {
            DbConnection::disconnect();
        }
    }

    /**
     * @param subject
     * @param quantity
     * @return Question listQuestions
     */
    public function getQuestionsRandom($subject, $quantity){
        try
        {
            $listQuestions = array();
            $sql = "SELECT eva_idpreguntaspk, eva_tipopreguntafk, eva_estado, eva_idMateriaFk FROM tbl_preguntas WHERE eva_idMateriaFk = '".$subject."' AND eva_estado = 'true'";
            try {
                $stmt = $this->conn->prepare($sql);
                $stmt->execute();
                foreach ($stmt->fetchAll(PDO::FETCH_OBJ) as $row){
                    $question = new Question();
                    $question->setIdQuestion($row->eva_idpreguntaspk);
                    $question->setIdSubject($subject);
                    $listQuestions[] = $question;
                }
                if(count($listQuestions) > $quantity) {
                    $listQuestions = $this->chooseQuestionsRandom($listQuestions, $quantity);
                }
                elseif (count($listQuestions) == $quantity){
                    return $listQuestions;
                }
                else{
                    return null;
                }
            } catch (PDOException $e) {
                echo 'ERROR SQL :'. $e->getMessage();
            } finally {
                DbConnection::disconnect();
            }
            return $listQuestions;
        }
        catch (PDOException $e)
        {
            return 'Error al ejecutar la consulta. '.$e->getMessage();
        }
        finally {
            DbConnection::disconnect();
        }   
    }

    /**
     * @param array: Array()
     * @param quantity
     * @internal The array should have index in position 1
     * @see The quantity should have less o equals at number the elements
     * @return list: Array()
     */
    private static function chooseQuestionsRandom($result, $quantity){
        $list = array();
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
            $list[] = $result[$value];
        }
        return $list;
    }

}

?>