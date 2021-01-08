<?php
include '../phpconfig.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rides - User Dashboard</title>
</head>

<body>
    <!-- header open-->
    <?php include '../header.php'; ?>
    <!-- header close -->


    <!-- section open -->
    <div class="container-fluid">
        <div class="row">
            <?php include 'uservnavs.php' ?>
            <div class="col-lg-10">
                <!-- heading rides -->
                <div style="border-bottom:1px solid grey;">
                    <h1 class="display-4">Rides</h1>
                    <h5>View all rides</h5>
                </div>
                <!-- tabs open-->
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#menu1" id="m1">Pending Rides</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#menu2" id="m2">Completed Rides</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#menu3" id="m3">All Rides</a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div id="menu1" class="container tab-pane active"><br>

                        <!-- add location -->
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-12 text-center">
                                    <div id="viewdata">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>From </th>
                                                    <th>To</th>
                                                    <th>Cab Type</th>
                                                    <th>Ride Date</th>
                                                    <th>Total Distance</th>
                                                    <th>Luggage</th>
                                                    <th>Total Fare</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody id="output1">
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="menu2" class="container tab-pane fade"><br>
                        <div class="row">
                            <div class="col-lg-12 text-center">
                                <div id="viewdata">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>From </th>
                                                <th>To</th>
                                                <th>Cab Type</th>
                                                <th>Ride Date</th>
                                                <th>Total Distance</th>
                                                <th>Luggage</th>
                                                <th>Total Fare</th>
                                            </tr>
                                        </thead>
                                        <tbody id="output2">
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="menu3" class="container tab-pane fade"><br>

                        <!-- add location -->
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-12 text-center">
                                    <div id="viewdata">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>From </th>
                                                    <th>To</th>
                                                    <th>Cab Type</th>
                                                    <th>Ride Date</th>
                                                    <th>Total Distance</th>
                                                    <th>Luggage</th>
                                                    <th>Total Fare</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody id="output3">
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- tabs close -->
            </div>
        </div>
    </div>
    <!-- section close -->


    <!-- footer open-->
    <?php include '../footer.php'; ?>
    <!-- footer close -->
</body>
<script>
    function a() {
        $.ajax({
            url: 'ridesuserback.php',
            type: 'POST',
            data: {
                'button': 1
            },
            success: function(data) {
                $("#output1").html(data);
            },
            errror: function() {
                console.log("Error Occured 1");
            }

        });
    }
    $(document).ready(function() {
        // onload
        a();

    // onclick m1
    $("#m1").click(a());

    // onclick m2
    $("#m2").click(function(){
        $.ajax({
            url: 'ridesuserback.php',
            type: 'POST',
            data: {
                'button': 2
            },
            success: function(data) {
                $("#output2").html(data);
            },
            errror: function() {
                console.log("Error Occured 2");
            }

        });
    });

    $("#m3").click(function(){
        $.ajax({
            url: 'ridesuserback.php',
            type: 'POST',
            data: {
                'button': 3
            },
            success: function(data) {
                $("#output3").html(data);
            },
            errror: function() {
                console.log("Error Occured 3");
            }

        });
    });
    });

    $(document).on('click','#cancel',function(){
        var glid = $(this).data("eid");
        $.ajax({
            url: 'ridesuserback.php',
            type: 'POST',
            data: {
                'id':glid,
                'button': 4
            },
            success: function(data) {
                $("#output1").html(data);
            },
            errror: function() {
                console.log("Error Occured 4");
            }

        });
    });
</script>

</html>