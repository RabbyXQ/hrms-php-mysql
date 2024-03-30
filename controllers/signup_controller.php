<?php
require_once "../config/dbconfig.php";
require_once "../models/SignupModel.php";
$signupModel = new SignupModel($conn);
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $email = $_POST['email'];
    $password = $_POST['password'];
    $retypePassword = $_POST['retype_password'];
    $roleId = $_POST['role'];
    $emailExist = true;
    $existingUser = mysqli_query($conn, "SELECT email FROM user WHERE email = '$email'");

    if ($existingUser->num_rows > 0) {
            $emailExist = false;
        }
        if (!$emailExist) {
            echo "User Already Exist!";
        }

    $query = "INSERT INTO `user` (email, password, role) VALUES ('$email', '$password', '$roleId')";
    $result = mysqli_query($conn, $query);
    
    if ($result) {
        echo "User inserted successfully.";
    } else if ($result != 1){
        echo "Error: " . mysqli_error($conn);
    }

    
} else {
    // If the form is not submitted, redirect back to the signup form
    header("Location: ../views/signup.php");
    exit();
}
?>
