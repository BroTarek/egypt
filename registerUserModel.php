<?php
require_once 'databaseSchema.php';

class RegisterUserModel {
    private $db;

    public function __construct() {
        $database = new DatabaseSchema();
        $this->db = $database->getConnection();
    }

    public function registerUser($userData) {
        // Hash the password
        $hashedPassword = password_hash($userData['password'], PASSWORD_DEFAULT);

        $stmt = $this->db->prepare("
            INSERT INTO users
            (firstname, lastname, age, date_of_birth, email, password, phone_number)
            VALUES (:firstname, :lastname, :age, :dob, :email, :password, :phone)
        ");

        $stmt->bindValue(':firstname', $userData['firstname'], SQLITE3_TEXT);
        $stmt->bindValue(':lastname', $userData['lastname'], SQLITE3_TEXT);
        $stmt->bindValue(':age', $userData['age'], SQLITE3_INTEGER);
        $stmt->bindValue(':dob', $userData['date_of_birth'], SQLITE3_TEXT);
        $stmt->bindValue(':email', $userData['email'], SQLITE3_TEXT);
        $stmt->bindValue(':password', $hashedPassword, SQLITE3_TEXT);
        $stmt->bindValue(':phone', $userData['phone_number'], SQLITE3_TEXT);

        return $stmt->execute();
    }

    public function getUserIdByEmail($email) {
        $stmt = $this->db->prepare("SELECT userid FROM users WHERE email = :email");
        $stmt->bindValue(':email', $email, SQLITE3_TEXT);
        $result = $stmt->execute();
        return $result->fetchArray(SQLITE3_ASSOC)['userid'];
    }
}
?>