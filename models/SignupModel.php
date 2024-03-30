<?php
class SignupModel {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function getRoles() {
        // Fetch roles from the database
        $query = "SELECT * FROM role";
        $result = $this->conn->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function createUser($email, $password, $roleId) {
        // Insert user into the database
        $query = "INSERT INTO `user` (email, password, role) VALUES ('$email', '$password', '$roleId')";
        return $this->conn->query($query);
    }

    public function checkExistingUser($email) {
        // Check if the user already exists in the database
        $query = "SELECT email FROM user WHERE email = '$email'";
        $result = $this->conn->query($query);
        return $result->num_rows > 0;
    }
}
?>
