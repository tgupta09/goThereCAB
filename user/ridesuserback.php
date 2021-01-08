<?php
include '../phpconfig.php';

extract($_POST);
$sql1="select user_id from tbl_user where email_id= '$_SESSION[suser]'";
$result=$conn->query($sql1);
$row = $result->fetch_assoc();
$customerid = $row['user_id'];

function selectall($conn1,$customerid1){
    $sql2 = "select ride_id,ride_date, fromlocation, tolocation, total_distance, luggage, total_fare, cab_type from tbl_ride where customer_user_id = $customerid1 and status = 1";
    $res = $conn1->query($sql2);
    while($row  = $res->fetch_assoc()){
        echo "<tr>";
        echo "<td>$row[fromlocation]</td>";
        echo "<td>$row[tolocation]</td>";
        echo "<td>$row[cab_type]</td>";
        echo "<td>$row[ride_date]</td>";
        echo "<td>$row[total_distance]</td>";
        echo "<td>$row[luggage]</td>";
        echo "<td>$row[total_fare]</td>";
        echo "<td><button class = 'btn btn-danger' data-eid='$row[ride_id]' id='cancel'>Cancel</button></td>";
        echo "</tr>";
    }
}


if($button == 1){
    selectall($conn,$customerid);
}

if($button == 2){  
    $sql2 = "select ride_date, fromlocation, tolocation, total_distance, luggage, total_fare, cab_type from tbl_ride where customer_user_id = $customerid and status = 2";
    $res = $conn->query($sql2);
    while($row  = $res->fetch_assoc()){
        echo "<tr>";
        echo "<td>$row[fromlocation]</td>";
        echo "<td>$row[tolocation]</td>";
        echo "<td>$row[cab_type]</td>";
        echo "<td>$row[ride_date]</td>";
        echo "<td>$row[total_distance]</td>";
        echo "<td>$row[luggage]</td>";
        echo "<td>$row[total_fare]</td>";
        echo "</tr>";
    }
}

if($button == 3){  
    $sql2 = "select ride_date, fromlocation, tolocation, total_distance, luggage, total_fare, cab_type, status from tbl_ride where customer_user_id = $customerid";
    $res = $conn->query($sql2);
    while($row  = $res->fetch_assoc()){
        echo "<tr>";
        echo "<td>$row[fromlocation]</td>";
        echo "<td>$row[tolocation]</td>";
        echo "<td>$row[cab_type]</td>";
        echo "<td>$row[ride_date]</td>";
        echo "<td>$row[total_distance]</td>";
        echo "<td>$row[luggage]</td>";
        echo "<td>$row[total_fare]</td>";
        if($row['status']== 0)
        {echo "<td class='bg-danger'>Canceled</td>";}
        else if($row['status']== 1)
        {echo "<td class='bg-primary'>Pending</td>";}
        else if($row['status']==2)
        {echo "<td class='bg-success'>Completed</td>";};
        echo "</tr>";
    }
}

if($button == 4){
    $sql2 = "update tbl_ride set status = 0 where customer_user_id = $customerid and ride_id=$id";
    $res = $conn->query($sql2);
    selectall($conn,$customerid);
}
?>