<?php

require_once ('../utils/DbConnection.php');
require_once ('IEvaluationDao.class.php');

class EvaluationDao implements IEvaluationDao
{

    private $conn = null;

    public function __construct()
    {
        $this->conn = DbConnection::connect();
    }

    public function getEvaluation(Evaluation $evaluation)
    {
        $sql = "SELECT eva_usuario, eva_password,eva_documento, eva_pnombre, eva_snombre, eva_papellido, eva_sapellido,
                 eva_idrolfk, eva_estado, eva_email FROM tbl_usuarios WHERE eva_usuario = '".$user->getUser()."'";
        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            if($stmt->rowCount() > 0){
                foreach ($stmt->fetchAll(PDO::FETCH_OBJ) as $row) {
                    $user = new User(
                        $row->eva_usuario,
                        $row->eva_password,
                        $row->eva_documento,
                        $row->eva_pnombre,
                        $row->eva_snombre,
                        $row->eva_papellido,
                        $row->eva_sapellido,
                        $row->eva_idrolfk,
                        $row->eva_estado,
                        $row->eva_email
                    );
                    break;
                }
            }else{
                $user = null;
            }
        }
        catch (PDOException $e) {
            $user = null;
        }
        finally{
            DbConnection::disconnect();
        }
        return $user;
    }

    public function getAll()
    {
        $result = array();
        $sql = 'SELECT eva_usuario, eva_password FROM tbl_usuarios';
        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            foreach ($stmt->fetchAll(PDO::FETCH_OBJ) as $row) {
                $newUser = new User($row->iduser, $row->nombres);
                $result[] = $newUser;
            }
        }
        catch (PDOException $e) {
            echo "Error SQL :" . $e->getMessage();
        }
        finally{
            DbConnection::disconnect();
        }
        return $result;
    }

    public function insertEvaluation(Evaluation $evaluation)
    {
        $result = false;
        $query = "INSERT INTO tbl_evaluaciones (eva_fecharegistro,eva_fechainicial,eva_fechafinal,eva_estado,eva_idusuariofk,eva_idmateriafk,eva_idcursofk) VALUES(?,?,?,?,?,?,?)";
        try {
            $this->conn->beginTransaction();
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, date("Y-m-d H:i:s"), PDO::PARAM_INT);
            $stmt->bindParam(2, $evaluation->getInitialDate(), PDO::PARAM_STR);
            $stmt->bindParam(3, $evaluation->getEndDate(), PDO::PARAM_STR);
            $stmt->bindParam(4, $evaluation->getState(), PDO::PARAM_STR);
            $stmt->bindParam(5, $evaluation->getIdUser(), PDO::PARAM_INT);
            $stmt->bindParam(6, $evaluation->getIdSubject(), PDO::PARAM_INT);
            $stmt->bindParam(7, $evaluation->getIdCourse(), PDO::PARAM_INT);
            $stmt->execute();
            $idEvaluation = $this->conn->lastInsertId('tbl_evaluaciones_eva_idevaluacionpk_seq');
            if ($stmt->rowCount() > 0) {
                foreach ($evaluation->getListQuestions() as $item) {
                    $query = 'INSERT INTO tbl_evaluacionpregunta (eva_idevaluacionfk, eva_idpreguntasfk) VALUES(?, ?)';
                    $stmt = $this->conn->prepare($query);
                    $stmt->bindParam(1, $idEvaluation, PDO::PARAM_INT);
                    $stmt->bindParam(2, $item->getIdQuestion(), PDO::PARAM_INT);
                    $stmt->execute();
                    if($stmt->rowCount() < 1){
                        $this->conn->rollBack();
                        return false;
                    }
                }
                $this->conn->commit();
                $result = true;
            } else {
                $this->conn->rollBack();
                $result = 'No se pudo guardar el registro. Consulte al administrador';
            }
        }
        catch (PDOException $e) {
            $this->conn->rollBack();
            $result = "Error SQL:" . $e->getMessage();
        }
        finally{
            DbConnection::disconnect();
        }
        return $result;
    }

    public function updateEvaluation(Evaluation $evaluation)
    {
        // TODO: Implement updateEvaluation() method.
    }

}

