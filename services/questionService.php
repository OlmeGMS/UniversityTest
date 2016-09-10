<?php
require_once ('../../../model/subject/Subject.class.php');
require_once ('../../../model/question/Question.class.php');
require_once ('../../../utils/DbConnection.php');

class questionService {

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
            $questionArray = array();
            $toString = "";
            $sql = 'SELECT eva_idpreguntaspk, eva_idmateriapk, eva_tipopreguntafk, eva_enunciado, eva_estado
	            FROM public.tbl_preguntas';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();

            foreach ($stmt->fetchAll(PDO::FETCH_OBJ)as$row){
                $newQuestion = new Question($row->eva_idpreguntaspk, $row->eva_idmateriapk, $row->eva_tipopreguntafk, $row->eva_enunciado, $row->eva_estado);
                $result[] = $newQuestion;
                array_push($questionArray,$newQuestion);
            }
            foreach ($result as $item=>$value){
               
                $toString .= '<tr>
                             <td class="text-left" id="idPregutna"><a href="javascript:void(0)" class="label label-info">'.$value->getIdQuestion().'</a></td>
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

}

?>