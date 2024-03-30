<?php
require_once "../config/dbconfig.php";
require_once "../models/user_model.php";

$userModel = new UserModel($conn);
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start();
    $email = $_POST['email'];
    $password = $_POST['password'];
    if($userModel->validateUserPassword($email, $password)){
        $_SESSION['email'] = $email;
        
        header("Location: dashboard.php");
    } elseif (!$userModel->checkExistingUser($email)) { 
        $error = "User does not exist!";
    } else {
        $error = "Invalid email or password";
    }
}
?>
