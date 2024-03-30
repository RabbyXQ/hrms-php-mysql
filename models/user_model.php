<?php
class UserModel {
    private $conn;
    public $user_id;
    public $first_name;
    public $last_name;
    public $profile_photo;
    public $email;
    public $phone_number1;
    public $phone_number2;
    public $date_of_birth;
    public $password;
    public $nid;
    public $date_of_registration;
    public $address;
    public $city;
    public $region;
    public $location_co_ordinate;
    public $occupation;
    public $role;

    
    public function __construct($conn) {
        $this->conn = $conn;
    }
    

    public function checkExistingUser($email) {
        $query = "SELECT email FROM user WHERE email = '$email'";
        $result = $this->conn->query($query);
        return $result->num_rows > 0 ? true:false;
    }
    public function validateUserPassword($email, $password) {
        $query = "SELECT email, password FROM user WHERE password = '$password' and email = '$email'";
        $result = $this->conn->query($query);
        return $result->num_rows > 0 ? true:false;
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
    public function getRole($email){
        $email = $this->conn->real_escape_string($email);
        $query = "SELECT role_name FROM user, role WHERE email = '$email' and role = role.role_id LIMIT 1; ";
        $result = $this->conn->query($query);
        $row = $result->fetch_assoc();
        return $row['role_name'];
    }
    
    public function getName($email) {
        $email = $this->conn->real_escape_string($email);
        $query = "SELECT first_name, last_name FROM user WHERE email = '$email' LIMIT 1; ";
        $result = $this->conn->query($query);
        $row = $result->fetch_assoc();
        return $row['first_name'] . " ". $row['last_name'];
    }
    
    public function getUserDetails($userEmail){
        $query = "SELECT * FROM user WHERE email='$userEmail'";
        $result = $this->conn->query($query);

        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
        } else {
            $row = array(); 
        }
        return $row;
    }
    

}
?>
