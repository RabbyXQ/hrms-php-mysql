<?php
require_once "../config/dbconfig.php";

// Default sorting column and order
$sortColumn = isset($_GET['sort']) ? $_GET['sort'] : 'user_id';
$sortOrder = isset($_GET['order']) ? $_GET['order'] : 'ASC';

// Validate sorting column to prevent SQL injection
$validColumns = array('user_id', 'first_name', 'last_name', 'city', 'role_name');
$sortColumn = in_array($sortColumn, $validColumns) ? $sortColumn : 'user_id';

// Initialize search variables
$searchQuery = "";
$searchParams = array();

// Check if search query is provided
if(isset($_GET['search'])) {
    // Sanitize the search query to prevent SQL injection
    $searchQuery = $conn->real_escape_string($_GET['search']);
    // Prepare the search parameters for the SQL query
    $searchParams = array("%$searchQuery%", "%$searchQuery%", "%$searchQuery%", "%$searchQuery%");
    // SQL query to select data from the table with sorting and searching
    $sql = "SELECT user_id, first_name, last_name, city, role_name 
            FROM user join role on user.role = role.role_id 
            WHERE first_name LIKE ? OR last_name LIKE ? OR city LIKE ? OR role_name LIKE ?
            ORDER BY $sortColumn $sortOrder";
    $stmt = $conn->prepare($sql);
    // Bind parameters for search query
    $stmt->bind_param("ssss", $searchParams[0], $searchParams[1], $searchParams[2], $searchParams[3]);
} else {
    // SQL query to select data from the table with sorting only
    $sql = "SELECT user_id, first_name, last_name, city, role_name 
            FROM  user join role on user.role = role.role_id  
            ORDER BY $sortColumn $sortOrder";
    $stmt = $conn->prepare($sql);
}

$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }

        h2 {
            text-align: center;
            margin-top: 20px;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px auto;
            background-color: #fff;
            border: 1px solid #ddd;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
            cursor: pointer;
        }

        th a {
            text-decoration: none;
            color: #333;
        }

        th a:hover {
            color: #000;
        }

        input[type="text"] {
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        button[type="submit"] {
            padding: 8px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        tr.clickable {
            cursor: pointer;
        }
        tr.clickable:hover {
            background-color: #f5f5f5;
        }
        button[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<h2>User List</h2>

<!-- Search form -->
<form method="GET" style="text-align: center;">
    <input type="text" name="search" placeholder="Search..." value="<?php echo htmlspecialchars($searchQuery); ?>">
    <button type="submit">Search</button>
</form>

<table>
    <tr>
        <th><a href="?sort=user_id&order=<?php echo $sortColumn == 'user_id' && $sortOrder == 'ASC' ? 'DESC' : 'ASC'; ?>">User ID</a></th>
        <th><a href="?sort=first_name&order=<?php echo $sortColumn == 'first_name' && $sortOrder == 'ASC' ? 'DESC' : 'ASC'; ?>">First Name</a></th>
        <th><a href="?sort=last_name&order=<?php echo $sortColumn == 'last_name' && $sortOrder == 'ASC' ? 'DESC' : 'ASC'; ?>">Last Name</a></th>
        <th><a href="?sort=city&order=<?php echo $sortColumn == 'city' && $sortOrder == 'ASC' ? 'DESC' : 'ASC'; ?>">City</a></th>
        <th><a href="?sort=role_name&order=<?php echo $sortColumn == 'role_name' && $sortOrder == 'ASC' ? 'DESC' : 'ASC'; ?>">Role</a></th>
    </tr>
    <?php
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr class='clickable' onclick='submitForm(\"user_details.php\", {$row["user_id"]});'>";
        echo "<td>" . $row["user_id"] . "</td>";
        echo "<td>" . $row["first_name"] . "</td>";
        echo "<td>" . $row["last_name"] . "</td>";
        echo "<td>" . $row["city"] . "</td>";
        echo "<td>" . $row["role_name"] . "</td>";
        echo "</tr>";
    }
    ?>
</table>

<form id="detailsForm" action="user_details.php" method="post">
    <input type="hidden" id="userId" name="userId">
</form>

<script>
    function submitForm(url, userId) {
        document.getElementById("userId").value = userId;
        document.getElementById("detailsForm").submit();
    }
</script>
</body>
</html>
