<?php
class DatabaseSchema {
    private $db;

    public function __construct() {
        $this->db = new SQLite3('users.db');
        $this->createTables();
    }

    private function createTables() {
        $query = "CREATE TABLE IF NOT EXISTS users (
            userid INTEGER PRIMARY KEY AUTOINCREMENT,
            firstname TEXT NOT NULL,
            lastname TEXT NOT NULL,
            age INTEGER NOT NULL,
            date_of_birth DATE NOT NULL,
            email TEXT NOT NULL UNIQUE,
            password TEXT NOT NULL,
            phone_number TEXT NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )";

        $this->db->exec($query);
    }

    public function getConnection() {
        return $this->db;
    }
}
?>