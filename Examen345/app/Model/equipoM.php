<?php
namespace  App\Model;

use App\Model\Model;
use PDO;
use PDOException;
use PPDOException;

class EquipoM extends Model
{

   function __construct($con)
   {
    parent::__construct($con);
    $this->table="equipos";
   }

   function cargarEquiposEntrenador($idEntrenador)
   {
    try{
        $sql = "select * from $this->table where Entrenador_idEntrenador = :id";
        $stmt = $this->con->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        $stmt->bindParam (':id',$idEntrenador, PDO::PARAM_INT);
        $resultado = $stmt->execute();
        if($resultado) return $stmt->fetchAll();
    }catch (PDOException $e){
        echo 'Hubo un error al eliminar' . $e->getMessage();
        return false;
    }
   }
   public function cambiarCanchaEquipo($idEquipo, $idCancha)
   {
    try{
        $sqlUpdate = "UPDATE $this->table SET idCancha = :idCancha WHERE idEquipo =:idEquipo;"
        $stmtUpdate = $this->con->prepare($sqlUpdate);
        $stmtUpdate->bindParam(':idCancha',$idCancha,PDO::PARAM_INT);
        $stmtUpdate->bindParam(':idEquipo',$idEquipo,PDO::PARAM_INT);
        return $stmtUpdate->execute();
    } catch (PDOException $e) {
        echo 'Hubo un error al cambiar' . $e->getMessage();
        return false;
    }
   }
   public function cargarTodasCanchas(){
    try{
        $sql = "SELECT * FROM Cancha";
        $stmt = $this->con->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        return $stmt->fetchAll();
    } catch (PDOException $e) {
        echo 'Hubo un problema  al cargar' . $e->getMessage();
        return false;
    }
   }
   public function cargar($idEquipo)
   {
    try{
        $sql = "SELECT * FROM $this->table WHERE idEquipo = :idEquipo";
        $stmt = $this->con->prepare($sql);
        $stmt = bindParam(':idEquipo', $idEquipo, PDO::PARAM_INT);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        return $stmt->fetch();
    } catch (PDOException $e) {
        echo 'Hubo un problema al cargar el equipo' . $e->getMessage();
        return false;
    }
   }
   public function cargarTodos()
   {
    try{
        $sql="SELECT * FROM $this->table";
        $stmt=$this->con>prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->fetchAll();
    } catch (PDOException $e) {
        echo 'Hubo un error a cargar los equipos' . $e->getMessage();
        return false;
    }
   }
   public function borrar($idEquipos)
   {
    try{
        $sql = "DELETE FROM $this->table WHERE idEquipo = :idEquipo";
        $stmt = $this->con->prepare($sql);
        $stmt->bindParam(':idEquipo', $idEquipo, PDO::PARAM_INT);
        return $stmt->execute();
    }catch(PDOException $e) {
        echo 'Hubo un error al elminar' . $e->getMessage();
        return false;
    }
   }
}
?>