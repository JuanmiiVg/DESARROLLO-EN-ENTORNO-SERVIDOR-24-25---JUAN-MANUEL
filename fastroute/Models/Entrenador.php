<?php

namespace Models;

class Entrenador
{
    private $db;

    public function __construct()
    {
        $this->db = new \PDO('mysql:host=localhost;dbname=mi_base_de_datos', 'root', '');
    }

    public function listarPaginados($limite, $offset)
    {
        $stmt = $this->db->prepare("SELECT * FROM entrenadores LIMIT :limite OFFSET :offset");
        $stmt->bindValue(':limite', $limite, \PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function contarTotal()
    {
        $stmt = $this->db->query("SELECT COUNT(*) FROM entrenadores");
        return $stmt->fetchColumn();
    }

    public function crear($nombre, $experiencia)
    {
        $stmt = $this->db->prepare("INSERT INTO entrenadores (nombre, experiencia) VALUES (:nombre, :experiencia)");
        $stmt->execute(compact('nombre', 'experiencia'));
    }

    public function obtenerPorId($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM entrenadores WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function actualizar($id, $nombre, $experiencia)
    {
        $stmt = $this->db->prepare("UPDATE entrenadores SET nombre = :nombre, experiencia = :experiencia WHERE id = :id");
        $stmt->execute(compact('id', 'nombre', 'experiencia'));
    }

    public function eliminar($id)
    {
        $stmt = $this->db->prepare("DELETE FROM entrenadores WHERE id = :id");
        $stmt->execute(['id' => $id]);
    }
}
