<?php
require "../config/dbconfig.php";
require "../models/SignupModel.php"; // Include the SignupModel class

// Create an instance of the SignupModel with the database connection
$signupModel = new SignupModel($conn);

// Fetch roles from the 'role' table
$roles = $signupModel->getRoles();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
</head>
<body>
    <h2>Signup Form</h2>
    <form action="../controllers/signup_controller.php" method="POST">
        
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br><br>
        
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br><br>
        
        <label for="retype_password">Retype Password:</label><br>
        <input type="password" id="retype_password" name="retype_password" required><br><br>
        
        
        <label for="role">Role:</label><br>
        <select id="role" name="role">
            <?php
            // Populate the dropdown menu
            foreach ($roles as $row) {
                echo "<option value='" . $row['role_id'] . "'>" . $row['role_name'] . "</option>";
            }
            ?>
        </select><br><br>
        
        <button type="submit">Signup</button>
    </form>
</body>
</html>

<?php
// Close the database connection
$conn->close();
?>
