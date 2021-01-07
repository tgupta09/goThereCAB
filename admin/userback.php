<?php
include '../phpconfig.php';
extract($_POST);

function selectall($conn1)
{
    $sql_query = "select user_id, email_id, name, dateofsignup, mobile from tbl_user where status = 0 and is_admin = 0";

    $result = $conn1->query($sql_query);
    while ($row  = $result->fetch_assoc()) {
        echo "<tr><td>" . $row['email_id'] . "</td><td>" . $row['name'] . "</td>";
        echo "<td>" . $row['dateofsignup'] . "</td>";
        echo "<td>" . $row['mobile'] . "</td>";
        echo "<td><button class = 'btn btn-primary' id='accept' data-eid={$row['user_id']} style = 'margin:2%;'>Accept</button><button class = 'btn btn-danger' id='reject' data-eid={$row['user_id']}>Reject</button></td></tr>";
    }
}

function selectall2($conn1){
    $sql_query = "select user_id, email_id, name, dateofsignup, mobile, status from tbl_user where is_admin = 0";

    $result = $conn1->query($sql_query);
    while ($row  = $result->fetch_assoc()) {
        echo "<tr><td>" . $row['email_id'] . "</td><td>" . $row['name'] . "</td>";
        echo "<td>" . $row['dateofsignup'] . "</td>";
        echo "<td>" . $row['mobile'] . "</td>";
        echo "<td><button class = 'btn btn-primary' id='status' data-eid={$row['user_id']} style = 'margin:2%;'>";
        if($row['status']==1){echo "Unblocked User";}else{echo "Blocked User";}
        echo "</button></td></tr>";
    }
}

// Pending Requests
if ($button == 1) {
    selectall($conn);
}


// Approved Requests
if ($button == 2) {
    $sql_query = "select user_id, email_id, name, dateofsignup, mobile from tbl_user where status = 1 and is_admin = 0";

    $result = $conn->query($sql_query);
    while ($row  = $result->fetch_assoc()) {
        echo "<tr><td>" . $row['email_id'] . "</td><td>" . $row['name'] . "</td>";
        echo "<td>" . $row['dateofsignup'] . "</td>";
        echo "<td>" . $row['mobile'] . "</td></tr>";
    }
}

// All Users
if ($button == 3) {
    selectall2($conn);
}

// accept
if($button ==4){
    $sql_query = "update tbl_user set status = 1 where user_id = $id";
    $conn->query($sql_query);
    selectall($conn);
}

// reject
if($button ==5){
    $sql_query = "delete from tbl_user where user_id = $id";
    $conn->query($sql_query);
    selectall($conn);
}

// status
if($button ==6){
    $sql_query1 = "select status from tbl_user where user_id = $id";
    $result = $conn->query($sql_query1);
    $row  = $result->fetch_assoc();
    if($row['status'] == 1){$nstat = 0;}else{$nstat = 1;}
    $sql_query = "update tbl_user set status = $nstat where user_id = $id";
    $conn->query($sql_query);
    selectall2($conn);
}
$conn->close();
?>
