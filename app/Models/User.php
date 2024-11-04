<?php
class User {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Authenticate user credentials
    public function authenticate($username, $password) {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->execute(['username' => $username]);
        $user = $stmt->fetch();

        // Verify password (passwords are stored as hashes)
        if ($user && hash_equals($user['password'], hash('sha256', $password))) {
            return true;
        }
        return false;
    }
}
