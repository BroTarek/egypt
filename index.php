<?php
require_once 'registerController.php';
require_once 'registerView.php';

session_start();

// Instantiate the controller
$controller = new RegisterController();
$view = new RegisterView();

// Determine the route based on session and request
if (isset($_SESSION['user_id']) && isset($_SESSION['expiry']) && time() < $_SESSION['expiry']) {
    // User is logged in - redirect to home
    $controller->redirectToHome($_SESSION['user_id']);
} else {
    // Check the route parameter
    $route = $_GET['route'] ?? '';

    switch ($route) {
        case 'registerController':
            // Process registration form submission
            $controller->registerFormController();
            break;
        default:
            // Show registration form
            $view->registerForm();
    }
}
?>