<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link rel="stylesheet" href="styles/signup.css">
</head>
<body>
    <div class="signup-form">
        <h2>Signup Form</h2>
        <form action="" method="POST">
            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" required><br><br>
            
            <label for="password">Password:</label><br>
            <input type="password" id="password" name="password" required><br><br>
            
            <label for="retype_password">Retype Password:</label><br>
            <input type="password" id="retype_password" name="retype_password" required><br><br>
            
            <label for="role">Role:</label><br>
            <select id="role" name="role">
                <?php foreach ($roles as $row): ?>
                    <option value="<?php echo $row['role_id']; ?>"><?php echo $row['role_name']; ?></option>
                <?php endforeach; ?>
            </select><br><br>
            
            <?php if(isset($error)): ?>
                <div class="error-message"><?php echo $error; ?></div>
            <?php endif; ?>
            
            <button type="submit">Signup</button>
        </form>
    </div>
</body>
</html>
