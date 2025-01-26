<?php

class Post extends BaseModel {
    private $id;
    private $userId;
    private $content;
    private $createdAt;
    private $updatedAt;

    public function __construct($userId, $content) {
        $this->userId = $userId;
        $this->content = $content;
        $this->createdAt = date('Y-m-d H:i:s');
        $this->updatedAt = date('Y-m-d H:i:s');
    }

    public function create() {
        $query = "INSERT INTO posts (user_id, content, created_at, updated_at) VALUES (:userId, :content, :createdAt, :updatedAt)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':userId', $this->userId);
        $stmt->bindParam(':content', $this->content);
        $stmt->bindParam(':createdAt', $this->createdAt);
        $stmt->bindParam(':updatedAt', $this->updatedAt);
        return $stmt->execute();
    }

    public function update($id, $content) {
        $this->content = $content;
        $this->updatedAt = date('Y-m-d H:i:s');
        $query = "UPDATE posts SET content = :content, updated_at = :updatedAt WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':content', $this->content);
        $stmt->bindParam(':updatedAt', $this->updatedAt);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function delete($id) {
        $query = "DELETE FROM posts WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function getAll() {
        $query = "SELECT * FROM posts ORDER BY created_at DESC";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $query = "SELECT * FROM posts WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}