<?php

require_once ('Question.class.php');
require_once ('IQuestionDao.class.php');
require_once ('../utils/DbConnection.php');

class QuestionDao implements IQuestionDao
{
    private $conn = null;
    
    function __construct() {
        $this->conn = DBConnection::connect();
    }
    
    public function getAll(){
        
        $result = array();
        $sql = 'SELECT eva_idpreguntaspk, eva_idmateriapk, eva_tipopreguntafk, eva_enunciado, eva_estado
	            FROM public.tbl_preguntas';
        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            
            foreach ($stmt->fetchAll(PDO::FETCH_OBJ)as$row){
                $newUser = new User($row->iduser, $row->nombre);
                $result[] = $newUser;
            }
        } catch (PDOException $e) {
            echo 'ERROR SQL :'. $e->getMessage();
        } finally {
            DbConnection::disconnect();
        }
        return $result;
    }
    
    public function insertQuestion (Question $question){
        
        $query = 'INSERT INTO public.tbl_preguntas(eva_idMateriaPk, eva_tipoPreguntaFk, eva_enunciado, eva_estado)
	          VALUES (?, ?, ?, ?)';
        try {
            $stm = $this->conn->prepare($query);
            $stm->bindParam(1, $question->getIdSubject(),  PDO::PARAM_INT);
            $stm->bindParam(2, $question->getTypeQuestionFk(), PDO::PARAM_INT);
            $stm->bindParam(3, $question->getSentence(),PDO::PARAM_STR);
            $stm->bindParam(4, $question->getState(),  PDO::PARAM_BOOL);
            
            $stm->execute();
            if ($stm->rowCount() != 0){
                return true;
            } else{
                return false;
            }
        } catch (PDOException $e) {
            return false;
        } finally {
             DbConnection::disconnect();
        }
    }
    
    public function getOne(Question $question){
        
        $sql ="SELECT eva_idPreguntasPk, eva_idCursoFk, eva_tipoPreguntaFk, eva_pregunta, eva_estado FROM public.tbl_preguntas WHERE eva_idPregunta='".$question->getIdQuestion()."'OR eva_pregunta ='".$question->getQuestion()."'";

        
        try {
            $stm = $this->conn->prepare($sql);
            $stm->execute();
            if ($stm->rowCount() > 0 ) {
                return false;
            }else{
                return true;
            }
        } catch (PDOException $e) {
            return true;
        }finally {
             DbConnection::disconnect();
        }
    }
}
?>