<?php
$conn = new mysqli("localhost", "root", "", "cedcab") or die("Connection Unsucessful");
extract($_POST);

if($button == 1){
    $sql_query1 = "insert into tbl_location(name, distance, is_available) values('$location','$dist','1')";
    $conn->query($sql_query1);
}

if ($button == 2) {
    $sql_query = "select * from tbl_location";

    $result = $conn->query($sql_query);
    while ($row  = $result->fetch_assoc()) {
        echo "<tr><td>" . $row['name'] . "</td><td>" . $row['distance'] . "</td>";
        echo "<td>" . $row['is_available'] . "</td>";
        echo "<td><button class = 'btn btn-primary' id='update' data-toggle='modal' data-target='#myModal' data-eid={$row['id']} style = 'margin:2%;'>Edit</button><button class = 'btn btn-danger' id='del' data-eid={$row['id']}>Delete</button></td></tr>";
    }
}
$conn->close();
?>