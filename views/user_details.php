<?php
require_once "../config/dbconfig.php";
require_once "../others/auth_session.php";

$userID = $conn->real_escape_string($_POST['userId']);

$query = "SELECT * FROM user join role on user.role = role_id WHERE user_id='$userID'";
$result = $conn->query($query);

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    $row = array(); 
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            color: #333;
            margin: 0;
            padding: 20px;
        }

        h2 {
            margin-bottom: 20px;
            color: #007bff;
        }

        .profile-details {
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .profile-details p {
            margin: 10px 0;
        }

        .profile-details strong {
            font-weight: bold;
        }

        .no-user {
            font-style: italic;
            color: #777;
        }

        .profile-photo {
            max-width: 200px;
            height: auto;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

<div class="profile-details">
    <h2>User Profile Details</h2>

    <?php if (!empty($row)): ?>
        <img src="<?php echo $row['profile_photo']; ?>" alt="Profile Photo" class="profile-photo">
        <p><strong>User ID:</strong> <?php echo $row['user_id']; ?></p>
        <p><strong>First Name:</strong> <?php echo $row['first_name']; ?></p>
        <p><strong>Last Name:</strong> <?php echo $row['last_name']; ?></p>
        <p><strong>Email:</strong> <?php echo $row['email']; ?></p>
        <p><strong>Phone Number 1:</strong> <?php echo $row['phone_number1']; ?></p>
        <p><strong>Phone Number 2:</strong> <?php echo $row['phone_number2']; ?></p>
        <p><strong>Date of Birth:</strong> <?php echo $row['date_of_birth']; ?></p>
        <p><strong>Password:</strong> <?php echo $row['password']; ?></p>
        <p><strong>NID:</strong> <?php echo $row['nid']; ?></p>
        <p><strong>Date of Registration:</strong> <?php echo $row['date_of_registration']; ?></p>
        <p><strong>Address:</strong> <?php echo $row['address']; ?></p>
        <p><strong>City:</strong> <?php echo $row['city']; ?></p>
        <p><strong>Region:</strong> <?php echo $row['region']; ?></p>
        <p><strong>Location Coordinate:</strong> <?php echo $row['location_co_ordinate']; ?></p>
        <p><strong>Occupation:</strong> <?php echo $row['occupation']; ?></p>
        <p><strong>Role:</strong> <?php echo $row['role_name']; ?></p>
    <?php else: ?>
        <p class="no-user">No user found.</p>
    <?php endif; ?>
</div>

</body>
</html>
