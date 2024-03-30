<?php
require_once "../config/dbconfig.php";
require_once "../models/user_model.php";

$userModel = new UserModel($conn);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $retypePassword = $_POST['retype_password'];
    $roleId = $_POST['role'];

    if($password != $retypePassword){
        $error = "Password Mismatched";
    } elseif ($userModel->checkExistingUser($email)) {
        $error = "User already exists with this email";
    } else {
        $result = $userModel->createUser($email, $password, $roleId);
        if ($result) {
            header("Location: login.php");
            exit();
        } else {
            echo "Error: " . $conn->error;
        }
    }
}

$roles = $userModel->getRoles();
?>
