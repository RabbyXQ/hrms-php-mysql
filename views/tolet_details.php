<?php
// Include database configuration
require_once("../config/dbconfig.php");

// CSS styles
echo "
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 20px;
    }
    .container {
        max-width: 800px;
        margin: 0 auto;
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }
    h2 {
        color: #333;
    }
    p {
        margin-bottom: 10px;
    }
    strong {
        font-weight: bold;
    }
</style>
";

if(isset($_POST['toletId'])) {
    // Sanitize the input to prevent SQL injection
    $toletId = $conn->real_escape_string($_POST['toletId']);
    
    // SQL query to fetch tolet details
    $sql = "SELECT * FROM tolet WHERE tolet_id = $toletId";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        $tolet_id = $row['tolet_id'];
        $location = $row['location'];
        $address = $row['address'];
        $city = $row['city'];
        $compartment = $row['compartment'];
        $rent_per_month = $row['rent_per_month'];
        $status = $row['status'];
        $date_of_registration = $row['date_of_registration'];
        $water_units = $row['water_units'];
        $status_toiletDoorLock = $row['status_toiletDoorLock'];
        $status_DoorLock = $row['status_DoorLock'];
        $status_washinkSink = $row['status_washinkSink'];
        $status_toiletSink = $row['status_toiletSink'];
        $status_windows = $row['status_windows'];
        $status_paint = $row['status_paint'];
        $status_electricity = $row['status_electricity'];
        $status_number_of_Bulbs = $row['status_number_of_Bulbs'];
        $status_keyHolder = $row['status_keyHolder'];
        $created_by = $row['created_by'];

        // Display tolet details within container
        echo "<div class='container'>";
        echo "<h2>Tolet Details</h2>";
        echo "<p><strong>ID:</strong> $tolet_id</p>";
        echo "<p><strong>Location:</strong> $location</p>";
        echo "<p><strong>Address:</strong> $address</p>";
        echo "<p><strong>City:</strong> $city</p>";
        echo "<p><strong>Compartment:</strong> $compartment</p>";
        echo "<p><strong>Rent Per Month:</strong> $rent_per_month</p>";
        echo "<p><strong>Status:</strong> $status</p>";
        echo "<p><strong>Date of Registration:</strong> $date_of_registration</p>";
        echo "<p><strong>Water Units:</strong> $water_units</p>";
        echo "<p><strong>Status Toilet Door Lock:</strong> $status_toiletDoorLock</p>";
        echo "<p><strong>Status Door Lock:</strong> $status_DoorLock</p>";
        echo "<p><strong>Status Washink Sink:</strong> $status_washinkSink</p>";
        echo "<p><strong>Status Toilet Sink:</strong> $status_toiletSink</p>";
        echo "<p><strong>Status Windows:</strong> $status_windows</p>";
        echo "<p><strong>Status Paint:</strong> $status_paint</p>";
        echo "<p><strong>Status Electricity:</strong> $status_electricity</p>";
        echo "<p><strong>Status Number of Bulbs:</strong> $status_number_of_Bulbs</p>";
        echo "<p><strong>Status Key Holder:</strong> $status_keyHolder</p>";
        echo "<p><strong>Created By:</strong> $created_by</p>";
        echo "</div>";
    } else {
        echo "No tolet found with the provided ID.";
    }

    // Free result set
    $result->free_result();
} else {
    echo "No tolet ID provided.";
}

// Close database connection
$conn->close();
?>
