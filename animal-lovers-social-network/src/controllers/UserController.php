<?php

class UserController {
    private $userModel;

    public function __construct() {
        $this->userModel = new User();
    }

    public function viewProfile($userId) {
        $user = $this->userModel->getUserById($userId);
        require_once '../views/main/detail.php';
    }

    public function editProfile($userId) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'username' => $_POST['username'],
                'email' => $_POST['email'],
                'bio' => $_POST['bio'],
                'userId' => $userId
            ];
            $this->userModel->updateUser($data);
            header("Location: /main/index.php");
        } else {
            $user = $this->userModel->getUserById($userId);
            require_once '../views/main/edit.php';
        }
    }

    public function deleteUser($userId) {
        $this->userModel->deleteUser($userId);
        header("Location: /main/index.php");
    }
}