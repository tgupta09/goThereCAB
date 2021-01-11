<?php
include '../phpconfig.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - CebCab</title>
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
                <?php include 'adminvnavs.php'; ?>
                <div class="col-lg-10">
                    <div class="row">
                        <div class="col-lg-3" style="padding:2%">
                            <div class="card text-white bg-success text-center" style="max-width: 18rem;">
                                <div class="card-body">
                                    <h5 class="card-title">Pending Rides</h5>
                                    <p class="card-text">
                                    <?php 
                                    $sql = "select * from tbl_ride where status = 1";
                                    $res = $conn->query($sql);
                                    echo $res->num_rows;
                                    ?>
                                    </p>
                                    <button class="btn btn-outline-light" onclick="window.location.href='rides.php';">View Details</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3" style="padding:2%">
                            <div class="card text-white bg-success text-center" style="max-width: 18rem;">
                                <div class="card-body">
                                    <h5 class="card-title">Completed Rides</h5>
                                    <p class="card-text"><?php 
                                    $sql = "select * from tbl_ride where status = 2";
                                    $res = $conn->query($sql);
                                    echo $res->num_rows;
                                    ?></p>
                                    <button class="btn btn-outline-light" onclick="window.location.href='rides.php#menu2';">View Details</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3" style="padding:2%">
                            <div class="card text-white bg-success text-center" style="max-width: 18rem;">
                                <div class="card-body">
                                    <h5 class="card-title">Canceled Rides</h5>
                                    <p class="card-text"><?php 
                                    $sql = "select * from tbl_ride where status = 0";
                                    $res = $conn->query($sql);
                                    echo $res->num_rows;
                                    ?></p>
                                    <button class="btn btn-outline-light" onclick="window.location.href='rides.php#menu3';">View Details</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3" style="padding:2%">
                            <div class="card text-white bg-success text-center" style="max-width: 18rem;">
                                <div class="card-body">
                                    <h5 class="card-title">All Rides</h5>
                                    <p class="card-text"><?php 
                                    $sql = "select * from tbl_ride";
                                    $res = $conn->query($sql);
                                    echo $res->num_rows;
                                    ?></p>
                                    <button class="btn btn-outline-light" onclick="window.location.href='rides.php#menu4';">View Details</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-3" style="padding:2%">
                            <div class="card text-white bg-success text-center" style="max-width: 18rem;">
                                <div class="card-body">
                                    <h5 class="card-title">Pending User Requests</h5>
                                    <p class="card-text"><?php 
                                    $sql = "select * from tbl_user where status = 0";
                                    $res = $conn->query($sql);
                                    echo $res->num_rows;
                                    ?></p>
                                    <button class="btn btn-outline-light" onclick="window.location.href='users.php#menu1';">View Details</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3" style="padding:2%">
                            <div class="card text-white bg-success text-center" style="max-width: 18rem;">
                                <div class="card-body">
                                    <h5 class="card-title">Approved User Requests</h5>
                                    <p class="card-text"><?php 
                                    $sql = "select * from tbl_user where status = 1 and is_admin = 0";
                                    $res = $conn->query($sql);
                                    echo $res->num_rows;
                                    ?></p>
                                    <button class="btn btn-outline-light" onclick="window.location.href='users.php#menu2';">View Details</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3" style="padding:2%">
                            <div class="card text-white bg-success text-center" style="max-width: 18rem;">
                                <div class="card-body">
                                    <h5 class="card-title">All Users</h5>
                                    <p class="card-text" style="padding-bottom:11%;"><?php 
                                    $sql = "select * from tbl_user where is_admin = 0";
                                    $res = $conn->query($sql);
                                    echo $res->num_rows;
                                    ?></p>
                                    <button class="btn btn-outline-light" onclick="window.location.href='users.php#menu3';">View Details</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3" style="padding:2%">
                            <div class="card text-white bg-success text-center" style="max-width: 18rem;">
                                <div class="card-body">
                                    <h5 class="card-title">Serviceable Locations</h5>
                                    <p class="card-text" style="padding-bottom:11%;"><?php 
                                    $sql = "select * from tbl_location where is_available = 1";
                                    $res = $conn->query($sql);
                                    echo $res->num_rows;
                                    ?></p>
                                    <button class="btn btn-outline-light" onclick="window.location.href='locations.php#menu2';">View Details</button>
                                </div>
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
<script>
    $(document).ready(function() {
        $("#loginitem").hide();
        $("#signupitem").hide();
        $("#iconitem").removeAttr('href');
    });
</script>
</html>

<?php
$conn->close();
?>