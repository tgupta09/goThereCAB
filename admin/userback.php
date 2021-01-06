<?php
$conn = new mysqli("localhost", "root", "", "cedcab") or die("Connection Unsucessful");
extract($_POST);
if ($button == 1) {
    $sql_query = "select user_id,email_id, name, dateofsignup, mobile from tbl_user where status = 0";

    $result = $conn->query($sql_query);
    while ($row  = $result->fetch_assoc()) {
        echo "<tr><td>" . $row['email_id'] . "</td><td>" . $row['name'] . "</td>";
        echo "<td>" . $row['dateofsignup'] . "</td>";
        echo "<td>" . $row['mobile'] . "</td>";
        echo "<td><button class = 'btn btn-primary' id='update' data-toggle='modal' data-target='#myModal' data-eid={$row['ride_id']} style = 'margin:2%;'>Accept</button><button class = 'btn btn-danger' id='del' data-eid={$row['ride_id']}>Reject</button></td></tr>";
    }
}

if ($button == 2) {
    $sql_query = "select email_id, name, dateofsignup, mobile from tbl_user where status = 1";

    $result = $conn->query($sql_query);
    while ($row  = $result->fetch_assoc()) {
        echo "<tr><td>" . $row['email_id'] . "</td><td>" . $row['name'] . "</td>";
        echo "<td>" . $row['dateofsignup'] . "</td>";
        echo "<td>" . $row['mobile'] . "</td>";
        echo "<td><button class = 'btn btn-success' id='update' data-toggle='modal' data-target='#myModal' data-eid={$row['ride_id']} style = 'margin:2%;'>Invoice</button></td></tr>";
    }
}

if ($button == 3) {
    $sql_query = "select email_id, name, dateofsignup, mobile, status from tbl_user";

    $result = $conn->query($sql_query);
    while ($row  = $result->fetch_assoc()) {
        echo "<tr><td>" . $row['email_id'] . "</td><td>" . $row['name'] . "</td>";
        echo "<td>" . $row['dateofsignup'] . "</td>";
        echo "<td>" . $row['mobile'] . "</td>";
    }
}

$conn->close();
?>
