<?php

require_once __DIR__ . '/../path/to/Database.php';

class Animal extends BaseModel {
    private $id;
    private $name;
    private $species;
    private $age;
    private $description;
    private $image;

    public function __construct($name, $species, $age, $description, $image) {
        $this->name = $name;
        $this->species = $species;
        $this->age = $age;
        $this->description = $description;
        $this->image = $image;
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getSpecies() {
        return $this->species;
    }

    public function getAge() {
        return $this->age;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getImage() {
        return $this->image;
    }

    public function save() {
        // Code to save the animal to the database
        $db = Database::getInstance();
        $stmt = $db->prepare("INSERT INTO animals (name, species, age, description, image) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("ssiss", $this->name, $this->species, $this->age, $this->description, $this->image);
        $stmt->execute();
        $this->id = $stmt->insert_id;
        $stmt->close();
    }

    public function update() {
        // Code to update the animal in the database
        $db = Database::getInstance();
        $stmt = $db->prepare("UPDATE animals SET name = ?, species = ?, age = ?, description = ?, image = ? WHERE id = ?");
        $stmt->bind_param("ssissi", $this->name, $this->species, $this->age, $this->description, $this->image, $this->id);
        $stmt->execute();
        $stmt->close();
    }

    public function delete() {
        // Code to delete the animal from the database
        $db = Database::getInstance();
        $stmt = $db->prepare("DELETE FROM animals WHERE id = ?");
        $stmt->bind_param("i", $this->id);
        $stmt->execute();
        $stmt->close();
    }

    public static function findAll() {
        // Code to retrieve all animals from the database
        $db = Database::getInstance();
        $result = $db->query("SELECT * FROM animals");
        $animals = [];
        while ($row = $result->fetch_assoc()) {
            $animal = new Animal($row['name'], $row['species'], $row['age'], $row['description'], $row['image']);
            $animal->id = $row['id'];
            $animals[] = $animal;
        }
        return $animals;
    }

    public static function findById($id) {
        // Code to retrieve an animal by its ID from the database
        $db = Database::getInstance();
        $stmt = $db->prepare("SELECT * FROM animals WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $animal = new Animal($row['name'], $row['species'], $row['age'], $row['description'], $row['image']);
        $animal->id = $row['id'];
        $stmt->close();
        return $animal;
    }
}