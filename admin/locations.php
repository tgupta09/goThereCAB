<?php
include '../phpconfig.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Locations - Admin Dashboard</title>
</head>

<body>
    <!-- header open-->
    <?php include '../header.php'; ?>
    <!-- header close -->


    <!-- section open -->
    <div class="container-fluid">
        <div class="row">
            <?php include 'adminvnavs.php' ?>
            <div class="col-lg-10">
                <!-- heading rides -->
                <div style="border-bottom:1px solid grey;">
                    <h1 class="display-4">Locations</h1>
                    <h5>Add, View, Edit & Delete locations</h5>
                </div>
                <!-- tabs open-->
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#menu1" id="m1">Add Location</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#menu2" id="m2">View Locations</a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div id="menu1" class="container tab-pane active"><br>

                        <!-- add location -->
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-6 text-center">
                                    <form class="form" method="POST" style="border:2px solid black;border-radius:5px;padding:2%;">

                                        <!-- form for add location -->
                                        <h3>Add Location</h3>
                                        <!-- location name -->
                                        <div class="input-group" style="margin-bottom:5%">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Location Name</span>
                                            </div>
                                            <input type="text" class="form-control" id="locationid" name="locationname">
                                        </div>

                                        <!-- distance -->
                                        <div class="input-group" style="margin-bottom:5%">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Distance</span>
                                            </div>
                                            <input type="text" class="form-control" id="distid" name="dist">
                                        </div>

                                        <!-- add button -->
                                        <button type="button" class="btn btn-success" id="add">Add</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="menu2" class="container tab-pane fade"><br>
                        <h3>View Locations</h3>
                        <div class="row" style="margin-top: 2%;">
                            <div class="col-lg-12 text-center">
                                <div id="viewdata">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Location Name</th>
                                                <th>Distance</th>
                                                <th>Is Available</th>
                                                <th>Operations</th>
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
                <!-- tabs close -->
            </div>
        </div>
    </div>
    <!-- section close -->

    <!-- modal for update -->
    <div class="modal fade" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Edit</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div id="modalbody"></div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-success mx-auto" id='update' data-dismiss="modal">Update</button>
                </div>

            </div>
        </div>
    </div>

    <!-- footer open-->
    <?php include '../footer.php'; ?>
    <!-- footer close -->
</body>
<script>
var button,gl_id;
function viewdata(){
    button = 2;
            $.ajax({
                url: 'locationback.php',
                type: 'POST',
                data: {
                    'button': button
                },
                success: function(data) {
                    $("#output1").html(data);
                    console.log("View Data Successfully");
                },
                error: function() {
                    console.log("Error Occured View");
                }
            });
}
    $(document).ready(function() {
        var hash = window.location.hash;
        if(hash == '#menu2'){
            $("#menu1").removeClass('active');
            $("#menu1").addClass('fade');
            $("#menu2").addClass("active");
            $("#menu2").removeClass('fade');
            $("#m1").removeClass('active');
            $("#m2").addClass('active');
            viewdata();
        }
        $("#signupitem").hide();
        $("#loginitem").hide();

        $("#add").click(function() {
            var lo = $("#locationid").val();
            var dist = $("#distid").val();
            button = 1;
            $.ajax({
                url: 'locationback.php',
                type: 'POST',
                data: {
                    'button': button,
                    'location': lo,
                    'dist': dist
                },
                success: function(data) {
                    alert("Add Location Successfully");
                },
                error: function() {
                    console.log("Error Occured Add");
                }
            });
        });

        $("#m2").click(viewdata());
    });

    $(document).on('click', '#available', function() {
        button = 3;
        gl_id = $(this).data("eid");
        $.ajax({
            url: 'locationback.php',
            type: 'POST',
            data: {
                'button': button,
                'id': gl_id
            },
            success: function(data) {
                $("#output1").html(data);
                console.log("Available");
            },
            error: function() {
                console.log("Error Occured View2");
            }
        });
    });

    $(document).on('click', '#unavailable', function() {
        button = 4;
        gl_id = $(this).data("eid");
        $.ajax({
            url: 'locationback.php',
            type: 'POST',
            data: {
                'button': button,
                'id': gl_id
            },
            success: function(data) {
                $("#output1").html(data);
                console.log("Unavailable");
            },
            error: function() {
                console.log("Error Occured View3");
            }
        });
    });

    $(document).on('click', '#delete', function() {
        button = 5;
        gl_id = $(this).data("eid");
        $.ajax({
            url: 'locationback.php',
            type: 'POST',
            data: {
                'button': button,
                'id': gl_id
            },
            success: function(data) {
                $("#output1").html(data);
                console.log("Delete");
            },
            error: function() {
                console.log("Error Occured View3");
            }
        });
    });


    $(document).on('click', '#edit', function() {
        button = 6;
        gl_id = $(this).data("eid");
        $.ajax({
            url: 'locationback.php',
            type: 'POST',
            data: {
                'button': button,
                'id': gl_id
            },
            success: function(data) {
                $("#modalbody").html(data);
                console.log("Delete");
            },
            error: function() {
                console.log("Error Occured View3");
            }
        });
    });

    $(document).on('click', '#update', function() {
        button = 7;
        var dista = $("#distidf").val();
        var loca = $("#locationidf").val();
        console.log(dista);
        console.log(loca);
        console.log(gl_id);
        $.ajax({
            url: 'locationback.php',
            type: 'POST',
            data: {
                'button': button,
                'id': gl_id,
                'location':loca,
                'distance':dista
            },
            success: function(data) {
                $("#output1").html(data);
            },
            error: function() {
                console.log("Error Occured View3");
            }
        });
    });
</script>

</html>