<?php
include '../phpconfig.php';
extract($_POST);

function selectall($conn1){
    $sql_query = "select ride_id,ride_date, fromlocation, tolocation, total_distance, luggage, total_fare, cab_type from tbl_ride where status = 1";

    $result = $conn1->query($sql_query);
    while ($row  = $result->fetch_assoc()) {
        echo "<tr><td>" . $row['fromlocation'] . "</td><td>" . $row['tolocation'] . "</td>";
        echo "<td>" . $row['cab_type'] . "</td>";
        echo "<td>" . $row['ride_date'] . "</td>";
        echo "<td>" . $row['total_distance'] . "</td>";
        echo "<td>" . $row['luggage'] . "</td>";
        echo "<td>" . $row['total_fare'] . "</td>";
        echo "<td><button class = 'btn btn-primary' id='accept' data-eid={$row['ride_id']} style = 'margin:2%;'>Accept</button><button class = 'btn btn-danger' id='reject' data-eid={$row['ride_id']}>Reject</button></td></tr>";
    }
}

// pending rides
if ($button == 1) {
    selectall($conn);
}

// completed rides
if ($button == 2) {
    $sql_query = "select tbl_user.user_id, tbl_user.name, tbl_ride.ride_id, tbl_ride.ride_date, tbl_ride.fromlocation, tbl_ride.tolocation, tbl_ride.total_distance, tbl_ride.luggage, tbl_ride.total_fare, tbl_ride.cab_type from tbl_ride inner join tbl_user on tbl_ride.customer_user_id = tbl_user.user_id where tbl_ride.status = 2";

    $result = $conn->query($sql_query);
    while ($row  = $result->fetch_assoc()) {
        echo "<tr><td>" . $row['fromlocation'] . "</td><td>" . $row['tolocation'] . "</td>";
        echo "<td>" . $row['cab_type'] . "</td>";
        echo "<td>" . $row['ride_date'] . "</td>";
        echo "<td>" . $row['total_distance'] . "</td>";
        echo "<td>" . $row['luggage'] . "</td>";
        echo "<td>" . $row['total_fare'] . "</td>";
        echo "<td>" . $row['user_id'] . "</td>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td></tr>";
    }
}

// canceled rides
if ($button == 3) {
    $sql_query = "select ride_id, ride_date, fromlocation, tolocation, total_distance, luggage, total_fare, cab_type, status from tbl_ride where status = 0";

    $result = $conn->query($sql_query);
    while ($row  = $result->fetch_assoc()) {
        echo "<tr><td>" . $row['fromlocation'] . "</td><td>" . $row['tolocation'] . "</td>";
        echo "<td>" . $row['cab_type'] . "</td>";
        echo "<td>" . $row['ride_date'] . "</td>";
        echo "<td>" . $row['total_distance'] . "</td>";
        echo "<td>" . $row['luggage'] . "</td>";
        echo "<td>" . $row['total_fare'] . "</td></tr>";
    }
}

// all rides
if ($button == 4) {
    $sql_query = "select ride_id, ride_date, fromlocation, tolocation, total_distance, luggage, total_fare, cab_type, status from tbl_ride";

    $result = $conn->query($sql_query);
    while ($row  = $result->fetch_assoc()) {
        echo "<tr><td>" . $row['fromlocation'] . "</td><td>" . $row['tolocation'] . "</td>";
        echo "<td>" . $row['cab_type'] . "</td>";
        echo "<td>" . $row['ride_date'] . "</td>";
        echo "<td>" . $row['total_distance'] . "</td>";
        echo "<td>" . $row['luggage'] . "</td>";
        echo "<td>" . $row['total_fare'] . "</td>";
        if($row['status']==1){echo "<td class='bg-primary'>Pending Ride";}else if($row['status']==2){echo "<td class='bg-success'>Completed Ride";}
        else{echo "<td class='bg-danger'>Cancelled Ride";}
        echo "</td></tr>";
    }
}

// accept ride
if($button ==5){
    $sql_query = "update tbl_ride set status = 2 where ride_id = $id";
    $conn->query($sql_query);
    selectall($conn);
}

// reject ride
if($button ==6){
    $sql_query = "update tbl_ride set status = 0 where ride_id = $id";
    $conn->query($sql_query);
    selectall($conn);
}

$conn->close();
?>