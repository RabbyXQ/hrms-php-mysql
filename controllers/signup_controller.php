<?php
require_once "../config/dbconfig.php";
require_once "../models/SignupModel.php";

$signupModel = new SignupModel($conn);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $retypePassword = $_POST['retype_password'];
    $roleId = $_POST['role'];

    if($password != $retypePassword){
        $error = "Password Mismatched";
    } elseif ($signupModel->checkExistingUser($email)) {
        $error = "User already exists with this email";
    } else {
        $result = $signupModel->createUser($email, $password, $roleId);
        if ($result) {
            echo "User inserted successfully.";
        } else {
            echo "Error: " . $conn->error;
        }
    }
}

$roles = $signupModel->getRoles();
?>
