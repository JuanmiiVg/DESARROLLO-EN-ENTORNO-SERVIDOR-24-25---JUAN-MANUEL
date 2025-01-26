<?php

class Image extends BaseModel {
    private $id;
    private $imagePath;
    private $postId;
    private $animalId;

    public function __construct($imagePath, $postId = null, $animalId = null) {
        $this->imagePath = $imagePath;
        $this->postId = $postId;
        $this->animalId = $animalId;
    }

    public function getId() {
        return $this->id;
    }

    public function getImagePath() {
        return $this->imagePath;
    }

    public function getPostId() {
        return $this->postId;
    }

    public function getAnimalId() {
        return $this->animalId;
    }

    public function save() {
        // Code to save the image to the database
        // This would typically involve a prepared statement to insert the image data
        $db = $this->getDBConnection();
        $stmt = $db->prepare("INSERT INTO images (image_path, post_id, animal_id) VALUES (?, ?, ?)");
        $stmt->bind_param("sii", $this->imagePath, $this->postId, $this->animalId);
        $stmt->execute();
        $this->id = $stmt->insert_id;
        $stmt->close();
    }

    public function delete() {
        // Code to delete the image from the database
        // This would typically involve a prepared statement to remove the image by ID
        $db = $this->getDBConnection();
        $stmt = $db->prepare("DELETE FROM images WHERE id = ?");
        $stmt->bind_param("i", $this->id);
        $stmt->execute();
        $stmt->close();
    }

    public static function getImagesByPostId($postId) {
        // Code to retrieve images associated with a specific post
        // This would typically involve a prepared statement to select images by post ID
        $db = self::getDBConnection();
        $stmt = $db->prepare("SELECT * FROM images WHERE post_id = ?");
        $stmt->bind_param("i", $postId);
        $stmt->execute();
        $result = $stmt->get_result();
        $images = [];
        while ($row = $result->fetch_assoc()) {
            $images[] = new self($row['image_path'], $row['post_id'], $row['animal_id']);
        }
        $stmt->close();
        return $images;
    }

    public static function getImagesByAnimalId($animalId) {
        // Code to retrieve images associated with a specific animal
        // This would typically involve a prepared statement to select images by animal ID
        $db = self::getDBConnection();
        $stmt = $db->prepare("SELECT * FROM images WHERE animal_id = ?");
        $stmt->bind_param("i", $animalId);
        $stmt->execute();
        $result = $stmt->get_result();
        $images = [];
        while ($row = $result->fetch_assoc()) {
            $images[] = new self($row['image_path'], $row['post_id'], $row['animal_id']);
        }
        $stmt->close();
        return $images;
    }

    private static function getDBConnection() {
        // Code to get a database connection
        // This would typically involve creating a new mysqli connection
        $db = new mysqli('localhost', 'username', 'password', 'database');
        if ($db->connect_error) {
            die("Connection failed: " . $db->connect_error);
        }
        return $db;
    }
}