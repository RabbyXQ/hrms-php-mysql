<?php
require_once("../config/dbconfig.php");

// Default sorting column and order
$sortColumn = isset($_GET['sort']) ? $_GET['sort'] : 'tolet_id';
$sortOrder = isset($_GET['order']) ? $_GET['order'] : 'ASC';

// Validate sorting column to prevent SQL injection
$validColumns = array('tolet_id', 'location', 'address', 'city', 'compartment', 'rent_per_month', 'status', 'date_of_registration');
$sortColumn = in_array($sortColumn, $validColumns) ? $sortColumn : 'tolet_id';

// SQL query to select data from the table with sorting
$sql = "SELECT tolet_id, location, address, city, compartment, rent_per_month, status, date_of_registration FROM tolet ORDER BY $sortColumn $sortOrder";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tolet Data</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
            cursor: pointer;
        }
        tr.clickable {
            cursor: pointer;
        }
        tr.clickable:hover {
            background-color: #f5f5f5;
        }
    </style>
</head>
<body>

<h2>Tolet Data</h2>

<table>
    <tr>
        <th><a href="?sort=tolet_id&order=<?php echo $sortColumn == 'tolet_id' && $sortOrder == 'ASC' ? 'DESC' : 'ASC'; ?>">ID</a></th>
        <th><a href="?sort=address&order=<?php echo $sortColumn == 'address' && $sortOrder == 'ASC' ? 'DESC' : 'ASC'; ?>">Address</a></th>
        <th><a href="?sort=city&order=<?php echo $sortColumn == 'city' && $sortOrder == 'ASC' ? 'DESC' : 'ASC'; ?>">City</a></th>
        <th><a href="?sort=compartment&order=<?php echo $sortColumn == 'compartment' && $sortOrder == 'ASC' ? 'DESC' : 'ASC'; ?>">Compartment</a></th>
        <th><a href="?sort=rent_per_month&order=<?php echo $sortColumn == 'rent_per_month' && $sortOrder == 'ASC' ? 'DESC' : 'ASC'; ?>">Rent Per Month</a></th>
        <th><a href="?sort=date_of_registration&order=<?php echo $sortColumn == 'date_of_registration' && $sortOrder == 'ASC' ? 'DESC' : 'ASC'; ?>">Date of Registration</a></th>
        <th><a href="?sort=status&order=<?php echo $sortColumn == 'status' && $sortOrder == 'ASC' ? 'DESC' : 'ASC'; ?>">Status</a></th>
        <th><a href="?sort=location&order=<?php echo $sortColumn == 'location' && $sortOrder == 'ASC' ? 'DESC' : 'ASC'; ?>">Location</a></th>
    </tr>
    <?php
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr class='clickable' onclick='submitForm(\"tolet_details.php\", {$row["tolet_id"]});'>";
        echo "<td>" . $row["tolet_id"] . "</td>";
        echo "<td>" . $row["address"] . "</td>";
        echo "<td>" . $row["city"] . "</td>";
        echo "<td>" . $row["compartment"] . "</td>";
        echo "<td>" . $row["rent_per_month"] . "</td>";
        echo "<td>" . $row["date_of_registration"] . "</td>";
        echo "<td>" . $row["status"] . "</td>";
        echo "<td>" . $row["location"] . "</td>";
        echo "</tr>";
    }
    ?>
</table>

<form id="detailsForm" action="tolet_details.php" method="post">
    <input type="hidden" id="toletId" name="toletId">
</form>

<script>
    function submitForm(url, toletId) {
        document.getElementById("toletId").value = toletId;
        document.getElementById("detailsForm").submit();
    }
</script>

</body>
</html>
