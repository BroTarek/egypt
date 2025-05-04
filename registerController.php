<?php
require_once 'registerView.php';
require_once 'registerUserModel.php';

class RegisterController {
    private $view;
    private $model;

    public function __construct() {
        $this->view = new RegisterView();
        $this->model = new RegisterUserModel();
    }

    public function showRegistrationForm() {
        $this->view->registerForm();
    }

    public function registerFormController() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST)) {
            $userData = [
                'firstname' => $_POST['firstname'],
                'lastname' => $_POST['lastname'],
                'age' => $_POST['age'],
                'date_of_birth' => $_POST['date_of_birth'],
                'email' => $_POST['email'],
                'password' => $_POST['password'],
                'phone_number' => $_POST['phone_number']
            ];

            if ($this->model->registerUser($userData)) {
                $userId = $this->model->getUserIdByEmail($userData['email']);
                $this->createUserSession($userId);
                $this->redirectToHome($userId);
            } else {
                echo "Registration failed. Please try again.";
                $this->view->registerForm();
            }
        } else {
            $this->view->registerForm();
        }
    }

    public function redirectToHome($userId) {
        header("Location: home.php?user_id=" . $userId);
        exit();
    }

    private function createUserSession($userId) {
        $_SESSION['user_id'] = $userId;
        $_SESSION['expiry'] = time() + (90 * 24 * 60 * 60); // 3 months
    }
}
?>