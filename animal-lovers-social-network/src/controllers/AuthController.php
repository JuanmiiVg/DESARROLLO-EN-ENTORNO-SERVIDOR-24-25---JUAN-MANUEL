<?php

class AuthController {
    private $userModel;

    public function __construct() {
        $this->userModel = new User();
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            // Validate input
            if ($this->validateLogin($username, $password)) {
                $user = $this->userModel->getUserByUsername($username);
                if ($user && password_verify($password, $user['password'])) {
                    // Start session and set user data
                    session_start();
                    $_SESSION['user_id'] = $user['id'];
                    header('Location: /main/index.php');
                    exit();
                } else {
                    $error = "Invalid username or password.";
                }
            }
        }
        include '../views/auth/login.php';
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $confirmPassword = $_POST['confirm_password'];

            // Validate input
            if ($this->validateRegistration($username, $password, $confirmPassword)) {
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                $this->userModel->createUser($username, $hashedPassword);
                header('Location: /auth/login.php');
                exit();
            }
        }
        include '../views/auth/register.php';
    }

    private function validateLogin($username, $password) {
        return !empty($username) && !empty($password);
    }

    private function validateRegistration($username, $password, $confirmPassword) {
        return !empty($username) && 
               !empty($password) && 
               $password === $confirmPassword && 
               preg_match('/[A-Z]/', $password) && 
               preg_match('/[a-z]/', $password) && 
               preg_match('/[0-9]/', $password) && 
               strlen($password) > 8;
    }
}