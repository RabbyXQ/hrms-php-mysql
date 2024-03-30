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
    <ol><h3>Report Links</h3>
        <li>
            <a href="profile.php">Profile</a>
        </li>
        <li>
            <a href="user_list.php">User List</a>
        </li>
        <li>
            <a href="contact_list.php">Contact List</a>
        </li>
        <li>
        <a href="tolet_list.php">Tolet List</a>
        </li>
        <li>
        <a href="landlord_list.php">Landlort List</a>
        </li>

        <li>
        <a href="tenant_list.php">Tenant List</a>
        </li>

        <li>
        <a href="contract_list.php">Contract List</a>
        </li>

        <li>
            <a href="payment_list.php">Payment List</a>
        </li>
        <li>
            <a href="comment_list.php">Comment List</a>
        </li>
    </ol>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <input type="submit" name="logout" value="Logout">
    </form>
</body>
</html>
