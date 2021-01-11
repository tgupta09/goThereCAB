<?php
include '../phpconfig.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users - Admin Dashboard</title>
</head>

<body>
    <!-- header open-->
    <?php include '../header.php'; ?>
    <!-- header  close -->


    <!-- section open -->
    <div class="container-fluid">
        <div class="row">


            <!-- vertical navigation open-->
            <?php include 'adminvnavs.php'; ?>
            <!-- vertical navigation clsose -->


            <!-- content open -->
            <div class="col-lg-10">
                <div style="border-bottom:1px solid grey;">
                    <h1 class="display-4">Users</h1>
                    <h5>View list of Users and perform operations</h5>
                </div>
                <!-- tabs open-->
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#menu1" id="m1">Pending Requests</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#menu2" id="m2">Approved Requests</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#menu3" id="m3">All Users</a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div id="menu1" class="container tab-pane active"><br>

                        <!-- add location -->
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12 text-center">
                                    <div id="viewdata1">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>User Name</th>
                                                    <th>Name</th>
                                                    <th>Date of Signup</th>
                                                    <th>Mobile</th>
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
                                <div id="viewdata2">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>User Name</th>
                                                <th>Name</th>
                                                <th>Date of Signup</th>
                                                <th>Mobile</th>
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
                                    <div id="viewdata3">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>User Name</th>
                                                    <th>Name</th>
                                                    <th>Date of Signup</th>
                                                    <th>Mobile</th>
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
                <!-- content close -->

            </div>
        </div>
    </div>
    <!-- section close -->


    <!-- footer open-->
    <?php include '../footer.php'; ?>
    <!-- footer  close -->
</body>
<script>
    var button;
    var hash = window.location.hash;
        console.log(hash);
        if(hash == '#menu2'){
            $("#menu1").removeClass('active');
            $("#menu1").addClass('fade');
            $("#menu2").addClass("active");
            $("#menu2").removeClass('fade');
            $("#m1").removeClass('active');
            $("#m2").addClass('active');
            approved();
        }
        else if(hash == '#menu3'){
            $("#menu1").removeClass('active');
            $("#menu1").addClass('fade');
            $("#menu3").addClass("active");
            $("#menu3").removeClass('fade');
            $("#m1").removeClass('active');
            $("#m3").addClass('active');
            all();
        }

    // pending users
    function pending(){
        button = 1;
            $.ajax({
                url: 'userback.php',
                type: 'POST',
                data: {
                    'button': button
                },
                success: function(data) {
                    $("#output1").html(data);
                },
                error: function() {
                    console.log("Error Occured1");
                }
            });
    }

    // approved users
    function approved(){
        button = 2;
            $.ajax({
                url: 'userback.php',
                type: 'POST',
                data: {
                    'button': button
                },
                success: function(data) {
                    $("#output2").html(data);
                },
                error: function() {
                    console.log("Error Occured2");
                }
            });
    }

    // all users
    function all(){
        button = 3;
            $.ajax({
                url: 'userback.php',
                type: 'POST',
                data: {
                    'button': button
                },
                success: function(data) {
                    $("#output3").html(data);
                },
                error: function() {
                    console.log("Error Occured3");
                }
            });
    }
    $(document).ready(function() {
        pending();
        $("#m1").click(pending());
        $("#m2").click(approved());
        $("#m3").click(all());
    });

    $(document).on('click', '#accept', function() {
        button = 4;
        var gl_id = $(this).data("eid");
        console.log(gl_id);
        $.ajax({
            url: 'userback.php',
            type: 'POST',
            data: {
                'button': button,
                'id': gl_id
            },
            success: function(data) {
                $("#output1").html(data);
                alert('User Request Accepted');
            },
            error: function() {
                console.log("Error Occured4");
            }
        });
    });


    $(document).on('click', '#reject', function() {
        button = 5;
        var gl_id = $(this).data("eid");
        console.log(gl_id);
        $.ajax({
            url: 'userback.php',
            type: 'POST',
            data: {
                'button': button,
                'id': gl_id
            },
            success: function(data) {
                $("#output1").html(data);
                alert('User Request Declined');
            },
            error: function() {
                console.log("Error Occured5");
            }
        });
    });

    $(document).on('click', '#status', function() {
        button = 6;
        var gl_id = $(this).data("eid");
        console.log(gl_id);
        $.ajax({
            url: 'userback.php',
            type: 'POST',
            data: {
                'button': button,
                'id': gl_id
            },
            success: function(data) {
                $("#output3").html(data);
            },
            error: function() {
                console.log("Error Occured6");
            }
        });
    });
</script>

</html>