<?php
namespace App\Model;

use App\Model\Model;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PDO;
use PDOException;

class Usuario extends Model
{

function __construct($con)
{
    parent::__construct($con);
    $this->table="usuario";

}
function enviarEmail($email, $verificationCode) {
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.mailjet.com';
        $mail->SMTPAuth = true;
        $mail->Username = '7013daffa21100a688a81ad99931ee26';
        $mail->Password = 'fd66ef6ce29afb8a3ab0a77738d2c2ad';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Recipients
        $mail->setFrom('juanmavegacarrillo2@gmail.com', 'Your Website');
        $mail->addAddress($email);

        // Content
        $mail->isHTML(false);
        $mail->Subject = 'Email De Verificacion';
        $mail->Body    = "Por favor haga click en el siguiente enlace para verificar su cuenta (No te voy a robar nada jaja, por ahora): \n http://localhost:8000/verify?code=$verificationCode";

        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }
}
    public function correoRepetido ($correo)
    {
        try {
            //query que muestra de forma paginada los datos
            $sql = "select * from usuario where correo = :correo";

            //Utilizamos la conexion activa de nuestro objeto
            //Para crear la sentencia sql
            $stmt = $this->con->prepare($sql);

            //Asignamos la forma de devolver los datos
            $stmt->bindParam(':correo', $correo);

            //Ejecutamos la sentencia substituyendo las interrogaciones por los valores
            $stmt->execute();
            $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($resultado) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            //Hubo un problema al eliminar el registro
            echo 'Hubo un problema al eliminar el registro: ' . $e->getMessage();
            return false;
        }
    } 
    public function codigoRepetido ($codigo)
    {
        try {
            //query que muestra de forma paginada los datos
            $sql = "select * from usuario where codigo_verificacion = :codigo AND verificado = 0";

            //Utilizamos la conexion activa de nuestro objeto
            //Para crear la sentencia sql
            $stmt = $this->con->prepare($sql);

            //Asignamos la forma de devolver los datos
            $stmt->bindParam(':codigo', $codigo);

            //Ejecutamos la sentencia substituyendo las interrogaciones por los valores
            $stmt->execute();
            $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($resultado) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            //Hubo un problema al eliminar el registro
            echo 'Hubo un problema al eliminar el registro: ' . $e->getMessage();
            return false;
        }
    }
}
