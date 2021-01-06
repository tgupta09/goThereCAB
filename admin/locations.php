<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Locations - Admin Dashboard</title>
</head>

<body>
    <!-- header open-->
    <?php include 'header.php'; ?>
    <!-- header close -->


    <!-- section open -->
    <div class="container-fluid">
        <div class="row">
            <?php include 'adminvnavs.php' ?>
            <div class="col-lg-10">
                <!-- heading rides -->
                <div style="border-bottom:1px solid grey;">
                    <h1 class="display-4">Location</h1>
                    <h5>Add, View, Edit & Delete locations</h5>
                </div>
                    <!-- tabs open-->
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#menu1">Add Location</a>
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

                                        <!-- disatnce -->
                                        <div class="input-group" style="margin-bottom:5%">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Distance</span>
                                            </div>
                                            <input type="password" class="form-control" id="distid" name="dist">
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
                                                <th>Available</th>
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


    <!-- footer open-->
    <?php include 'footer.php'; ?>
    <!-- footer close -->
</body>
<script>
    var button ;
    $(document).ready(function(){
        $("#signupitem").hide();
        $("#loginitem").hide();

        $("#add").click(function(){
            var lo = $("#locationid").val();
            var dist = $("#distid").val();
            button = 1;
            $.ajax({
                url: 'locationback.php',
                type: 'POST',
                data: {'button':button,
                'location':lo,
            'dist':dist},
                success: function(data){
                    console.log("Add Location Successfully");
                },
                error: function(){
                    console.log("Error Occured Add");
                }
            });
        });

        $("#m2").click(function(){
            button = 2;
            $.ajax({
                url: 'locationback.php',
                type: 'POST',
                data: {'button':button},
                success: function(data){
                    $("#output1").html(data);
                    console.log("View Data Successfully");
                },
                error: function(){
                    console.log("Error Occured View");
                }
            });
        });
    });
</script>
</html>