<?php
class SignupModel {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getRoles() {
        $sql = "SELECT * FROM role";
        $result = $this->conn->query($sql);
        $roles = array();

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $roles[] = $row;
            }
        }

        return $roles;
    }

    public function createUser($email, $password, $role_id) {
        // Check if the email already exists
        $existingUserQuery = "SELECT email FROM user WHERE email = '$email'";
        $result = $this->conn->query($existingUserQuery);
        // If the email already exists, return false
        if ($result->num_rows > 0) {
            return false;
        }
    
        // Prepare the SQL statement for user creation
        $query = "INSERT INTO `user` (email, password, role) VALUES ('$email', '$password', '$role_id')";
    
        // Execute the statement
        $result = $this->conn->query($query);
    
        // Check if the execution was successful
        if ($result) {
            // Return true if the user was created successfully
            return true;
        } else {
            // Return false if there was an error
            return false;
        }
    }
    
        
}
?>
