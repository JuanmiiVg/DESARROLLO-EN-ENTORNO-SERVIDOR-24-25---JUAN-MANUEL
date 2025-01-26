<?php

class Comment extends BaseModel {
    private $id;
    private $postId;
    private $userId;
    private $content;
    private $createdAt;

    public function __construct($postId, $userId, $content) {
        $this->postId = $postId;
        $this->userId = $userId;
        $this->content = $content;
        $this->createdAt = date('Y-m-d H:i:s');
    }

    public function getId() {
        return $this->id;
    }

    public function getPostId() {
        return $this->postId;
    }

    public function getUserId() {
        return $this->userId;
    }

    public function getContent() {
        return $this->content;
    }

    public function getCreatedAt() {
        return $this->createdAt;
    }

    public function save() {
        $query = "INSERT INTO comments (post_id, user_id, content, created_at) VALUES (:post_id, :user_id, :content, :created_at)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':post_id', $this->postId);
        $stmt->bindParam(':user_id', $this->userId);
        $stmt->bindParam(':content', $this->content);
        $stmt->bindParam(':created_at', $this->createdAt);
        return $stmt->execute();
    }

    public function delete($id) {
        $query = "DELETE FROM comments WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function getCommentsByPostId($postId) {
        $query = "SELECT * FROM comments WHERE post_id = :post_id ORDER BY created_at DESC";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':post_id', $postId);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}