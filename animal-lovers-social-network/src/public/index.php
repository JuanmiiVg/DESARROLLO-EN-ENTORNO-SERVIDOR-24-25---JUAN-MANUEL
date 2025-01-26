<?php
require_once '../config/database.php';
require_once '../lib/Database.php';
require_once '../lib/Validator.php';
require_once '../controllers/AuthController.php';
require_once '../controllers/MainController.php';
require_once '../controllers/UserController.php';

// Start session
session_start();

// Define the base URL
define('BASE_URL', '/animal-lovers-social-network/src/public/');

// Routing logic
$requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if ($requestUri === BASE_URL || $requestUri === BASE_URL . 'index.php') {
    $controller = new MainController();
    $controller->index();
} elseif (strpos($requestUri, BASE_URL . 'login.php') !== false) {
    $authController = new AuthController();
    $authController->login();
} elseif (strpos($requestUri, BASE_URL . 'register.php') !== false) {
    $authController = new AuthController();
    $authController->register();
} else {
    // Handle 404
    http_response_code(404);
    echo '404 Not Found';
}
?>