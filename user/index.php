<?php
include '../phpconfig.php';
// extract user id
$sql4 ="select user_id from tbl_user where email_id='$_SESSION[suser]'";
    $res1 = $conn->query($sql4);
    $row = $res1->fetch_assoc();
    $customerid = $row['user_id'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard - CebCab</title>
</head>

<body>
    <!-- header open-->
    <header>
        <?php include '../header.php'; ?>
    </header>
    <!-- header close -->

    <!-- section open -->
    <section>
        <div class="container-fluid">
            <div class="row">
            <?php include 'uservnavs.php'?>
                <div class="col-lg-10" style="padding-bottom: 17%;">
                <div class="row">
                        <div class="col-lg-3" style="padding:2%">
                            <div class="card text-white bg-success text-center" style="max-width: 18rem;">
                                <div class="card-body">
                                    <h5 class="card-title">Pending Rides</h5>
                                    <p class="card-text">
                                    <?php 
                                    $sql = "select * from tbl_ride where status = 1 and customer_user_id = $customerid";
                                    //  and customer_user_id;
                                    $res = $conn->query($sql);
                                    echo $res->num_rows;
                                    ?></p>
                                    <button class="btn btn-outline-light" onclick="window.location.href='ridesuser.php';">View Details</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3" style="padding:2%">
                            <div class="card text-white bg-success text-center" style="max-width: 18rem;">
                                <div class="card-body">
                                    <h5 class="card-title">Completed Rides</h5>
                                    <p class="card-text"><?php 
                                    $sql = "select * from tbl_ride where status = 2 and customer_user_id = $customerid";
                                    //  and customer_user_id;
                                    $res = $conn->query($sql);
                                    echo $res->num_rows;
                                    ?></p>
                                    <button class="btn btn-outline-light"  onclick="window.location.href='ridesuser.php#menu2';">View Details</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3" style="padding:2%">
                            <div class="card text-white bg-success text-center" style="max-width: 18rem;">
                                <div class="card-body">
                                    <h5 class="card-title">All Rides</h5>
                                    <p class="card-text"><?php 
                                    $sql = "select * from tbl_ride where status = 0 and customer_user_id = $customerid";
                                    //  and customer_user_id;
                                    $res = $conn->query($sql);
                                    echo $res->num_rows;
                                    ?></p>
                                    <button class="btn btn-outline-light"  onclick="window.location.href='ridesuser.php#menu3';">View Details</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3" style="padding:2%">
                            <div class="card text-white bg-success text-center" style="max-width: 18rem;">
                                <div class="card-body">
                                    <h5 class="card-title">Total Expenses</h5>
                                    <p class="card-text" style="padding-top:18%;font-size:30px;">&#8377;<?php 
                                    $sql = "select sum(total_fare) from tbl_ride where status = 2 and customer_user_id = $customerid";
                                    //  and customer_user_id
                                    $res = $conn->query($sql);
                                    $row = $res->fetch_assoc();
                                    echo $row['sum(total_fare)'];
                                    ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- section close -->

        <!-- footer open -->
        <footer>
            <?php include '../footer.php'; ?>
        </footer>
        <!-- footer close -->
</body>
<script>$(document).ready(function(){
    $("#homeitem").hide();
});</script>
</html>
