<?php
namespace App\Model;

use App\Model\Model;

class Usuario extends Model
{
    public static $ejemplo = "hola";

    function __construct($con)
    {
        parent::__construct($con);
        $this->table = "Usuario";
    }

    public function insertar($con, array $datos)
    {
        if (!isset($datos['nombre_usuario'], $datos['correo'], $datos['contrasenia'], $datos['fecha_registro'])) {
            throw new \InvalidArgumentException("Faltan datos obligatorios para insertar el usuario.");
        }

        $sql = "INSERT INTO Usuario (nombre_usuario, correo, contrasenia, fecha_registro) VALUES (?, ?, ?, ?)";
        $stmt = $con->prepare($sql);
        return $stmt->execute([
            $datos['nombre_usuario'], 
            $datos['correo'], 
            password_hash($datos['contrasenia'], PASSWORD_DEFAULT), 
            $datos['fecha_registro']
        ]);
    }

    public function borrar($con, $idUsuario)
    {
        $sql = "DELETE FROM Usuario WHERE id_usuario = ?";
        $stmt = $con->prepare($sql);
        return $stmt->execute([$idUsuario]);
    }

    public function modificarTodo($con, $usuario)
    {
        $sql = "UPDATE Usuario SET nombre_usuario = ?, correo = ?, contrasenia = ?, fecha_registro = ? WHERE id_usuario = ?";
        $stmt = $con->prepare($sql);
        return $stmt->execute([$usuario['nombre_usuario'], $usuario['correo'], password_hash($usuario['contrasenia'], PASSWORD_DEFAULT), $usuario['fecha_registro'], $usuario['id_usuario']]);
    }

    public function modificar($con, $usuario)
    {
        if (!isset($usuario['id_usuario'])) {
            throw new Exception("El ID del usuario es obligatorio para modificar");
        }
        
        $sql = "UPDATE Usuario SET ";
        $params = [];
        foreach ($usuario as $campo => $valor) {
            if ($campo !== 'id_usuario') {
                $sql .= "$campo = ?, ";
                $params[] = ($campo === 'contrasenia') ? password_hash($valor, PASSWORD_DEFAULT) : $valor;
            }
        }
        $sql = rtrim($sql, ', ') . " WHERE id_usuario = ?";
        $params[] = $usuario['id_usuario'];
        
        $stmt = $con->prepare($sql);
        return $stmt->execute($params);
    }

    public function cargarTodos($con)
    {
        $sql = "SELECT * FROM Usuario";
        return $con->query($sql)->fetchAll();
    }

    public function cargarTodosPaginado($con, $num_pag, $elem_pag)
    {
        $offset = ($num_pag - 1) * $elem_pag;
        $sql = "SELECT * FROM Usuario LIMIT ? OFFSET ?";
        $stmt = $con->prepare($sql);
        $stmt->execute([$elem_pag, $offset]);
        return $stmt->fetchAll();
    }

    public function cargarTodosFiltrado($con, $filtro, $orden)
    {
        $sql = "SELECT * FROM Usuario WHERE ";
        $params = [];
        foreach ($filtro as $campo => $valor) {
            $sql .= "$campo LIKE ? AND ";
            $params[] = "%$valor%";
        }
        $sql = rtrim($sql, ' AND ');
        $sql .= " ORDER BY $orden";
        
        $stmt = $con->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll();
    }

    public function cargarTodosFiltradoPaginado($con, $filtro, $orden, $num_pag, $elem_pag)
    {
        $offset = ($num_pag - 1) * $elem_pag;
        $sql = "SELECT * FROM Usuario WHERE ";
        $params = [];
        foreach ($filtro as $campo => $valor) {
            $sql .= "$campo LIKE ? AND ";
            $params[] = "%$valor%";
        }
        $sql = rtrim($sql, ' AND ');
        $sql .= " ORDER BY $orden LIMIT ? OFFSET ?";
        
        $params[] = $elem_pag;
        $params[] = $offset;
        
        $stmt = $con->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll();
    }
}
