<?php
include '../phpconfig.php';
extract($_POST);

function selectall($conn1){
    $sql_query = "select * from tbl_location";

    $result = $conn1->query($sql_query);
    while ($row  = $result->fetch_assoc()) {
        echo "<tr><td>" . $row['name'] . "</td><td>" . $row['distance'] . "</td>";
        if($row['is_available'] == 1){echo "<td><button class = 'btn btn-success' id='available' data-eid={$row['id']}>Available</button></td>";}
        else{echo "<td><button class = 'btn btn-primary' id='unavailable' data-eid={$row['id']}>Unavailable</button></td>";}
        echo "<td><button class = 'btn btn-info' id='edit' data-toggle='modal' data-target='#myModal' data-eid={$row['id']} style ='margin-right:1%;'>Edit</button><button class = 'btn btn-danger' id='delete' data-eid={$row['id']}>Delete</button></td></tr>";
    }
}

// Add new location
if($button == 1){
    $sql_query1 = "insert into tbl_location(name, distance, is_available) values('$location','$dist','1')";
    $conn->query($sql_query1);
}

// All locations
if ($button == 2) {
    selectall($conn);
}

// available
if($button == 3){
    $sql_query = "update tbl_location set is_available = 0 where id=$id";
    $conn->query($sql_query);
    selectall($conn);
}

// unavailable
if($button == 4){
    $sql_query = "update tbl_location set is_available = 1 where id=$id";
    $conn->query($sql_query);
    selectall($conn);
}

// delete
if($button == 5){
    $sql_query = "delete from tbl_location where id=$id";
    $conn->query($sql_query);
    selectall($conn);
}

// edit
if($button == 6){
    $sql_query = "select name, distance from tbl_location where id=$id";
    $result=$conn->query($sql_query);
    $row  = $result->fetch_assoc();

    echo "<form class='form' style='border:2px solid black;border-radius:5px;padding:2%;'>";
    echo "<div class='input-group' style='margin-bottom:5%'>
                                            <div class='input-group-prepend'>
                                                <span class='input-group-text'>Location Name</span>
                                            </div>
                                            <input type='text' class='form-control' id='locationidf' value = '$row[name]'>";
    echo "</div>
                                        <div class='input-group' style='margin-bottom:5%'>
                                            <div class='input-group-prepend'>
                                                <span class='input-group-text'>Distance</span>
                                            </div>";
    echo "<input type='text' class='form-control' id='distidf'value ='$row[distance]'>
                                        </div>
                                    </form>";
}


// update new information
if($button == 7){
    $sql_query = "update tbl_location set name = '$location', distance = '$distance' where id=$id";
    $conn->query($sql_query);
    selectall($conn);
}
$conn->close();
