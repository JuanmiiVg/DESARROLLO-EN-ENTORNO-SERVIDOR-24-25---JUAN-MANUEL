    <?php

    namespace App\Model;

    use App\Model\Model;
    use PDO;
    use PDOException;

    class partidoM extends Model
    {
        protected $table = 'Partido';

        public function  __construct($con)
        {
            parent::__construct($con);
        }
        public function cargarPartidosEquipo($idEquipo)

        try {
        $sql = "SELECT * FROM $this->table WHERE idEquipo_local = :idEquipo or idEquipo_visitante = idEQuipo";
        $stmt = $this->con->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->bindParam(':idEquipo',$idEquipo,PDO::PARAM_INT);
        $resultado = $stmt->execute();

        if ($resultado)  {
            $partidos = $stmt->fetchALL();
            return !empty($partidos) ? $partidos  : -1;
        } else {
            return -1;
        }
        } catch (PDOException $e) {
            echo 'Hubo un error:' . $e get-> getMessage;
            return -1;
        }
    }
}
?>s

