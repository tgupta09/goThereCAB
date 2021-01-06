<?php
$conn = new mysqli("localhost", "root", "", "cedcab") or die("Connection Unsucessful");
extract($_POST);
if ($button == 1) {
    $sql_query = "select ride_id,ride_date, fromlocation, tolocation, total_distance, luggage, total_fare, cab_type from tbl_ride where status = 1";

    $result = $conn->query($sql_query);
    while ($row  = $result->fetch_assoc()) {
        echo "<tr><td>" . $row['from'] . "</td><td>" . $row['to'] . "</td>";
        echo "<td>" . $row['cab_type'] . "</td>";
        echo "<td>" . $row['ride_date'] . "</td>";
        echo "<td>" . $row['total_distance'] . "</td>";
        echo "<td>" . $row['luggage'] . "</td>";
        echo "<td>" . $row['total_fare'] . "</td>";
        echo "<td><button class = 'btn btn-primary' id='update' data-toggle='modal' data-target='#myModal' data-eid={$row['ride_id']} style = 'margin:2%;'>Accept</button><button class = 'btn btn-danger' id='del' data-eid={$row['ride_id']}>Reject</button></td></tr>";
    }
}

if ($button == 2) {
    $sql_query = "select ride_id, ride_date, fromlocation, tolocation, total_distance, luggage, total_fare, cab_type, status from tbl_ride where status = 2";

    $result = $conn->query($sql_query);
    while ($row  = $result->fetch_assoc()) {
        echo "<tr><td>" . $row['from'] . "</td><td>" . $row['to'] . "</td>";
        echo "<td>" . $row['cab_type'] . "</td>";
        echo "<td>" . $row['ride_date'] . "</td>";
        echo "<td>" . $row['total_distance'] . "</td>";
        echo "<td>" . $row['luggage'] . "</td>";
        echo "<td>" . $row['total_fare'] . "</td>";
        echo "<td><button class = 'btn btn-success' id='update' data-toggle='modal' data-target='#myModal' data-eid={$row['ride_id']} style = 'margin:2%;'>Invoice</button></td></tr>";
    }
}

if ($button == 3) {
    $sql_query = "select ride_id, ride_date, fromlocation, tolocation, total_distance, luggage, total_fare, cab_type, status from tbl_ride where status = 0";

    $result = $conn->query($sql_query);
    while ($row  = $result->fetch_assoc()) {
        echo "<tr><td>" . $row['from'] . "</td><td>" . $row['to'] . "</td>";
        echo "<td>" . $row['cab_type'] . "</td>";
        echo "<td>" . $row['ride_date'] . "</td>";
        echo "<td>" . $row['total_distance'] . "</td>";
        echo "<td>" . $row['luggage'] . "</td>";
        echo "<td>" . $row['total_fare'] . "</td></tr>";
    }
}

if ($button == 4) {
    $sql_query = "select ride_id, ride_date, fromlocation, tolocation, total_distance, luggage, total_fare, cab_type, status from tbl_ride";

    $result = $conn->query($sql_query);
    while ($row  = $result->fetch_assoc()) {
        echo "<tr><td>" . $row['from'] . "</td><td>" . $row['to'] . "</td>";
        echo "<td>" . $row['cab_type'] . "</td>";
        echo "<td>" . $row['ride_date'] . "</td>";
        echo "<td>" . $row['total_distance'] . "</td>";
        echo "<td>" . $row['luggage'] . "</td>";
        echo "<td>" . $row['total_fare'] . "</td>";
        echo "<td>" . $row['status'] . "</td></tr>";
    }
}
$conn->close();
?>