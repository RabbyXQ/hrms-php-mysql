<?php
require_once "../controllers/login_controller.php";

if (!isset($_SESSION["email"])) {
    header("Location: login.php");
    exit();
}

$userModel = new UserModel($conn);

$userEmail = $_SESSION['email'];

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["logout"])) {
    session_unset();
    session_destroy();
    header("Location: login.php");
    exit();
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>
    <h1>Welcome to the Dashboard!</h1>
    <p>Welcome, <?php echo $userModel->getRole($userEmail); ?>!</p>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <input type="submit" name="logout" value="Logout">
    </form>
</body>
</html>
