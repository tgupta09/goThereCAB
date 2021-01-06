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
                        <a class="nav-link" data-toggle="tab" href="#menu2">View Locations</a>
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
                                            <input type="password" class="form-control" id="pass" name="upass">
                                        </div>

                                        <!-- add button -->
                                        <button type="button" class="btn btn-success">Add</button>
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
                                                <th>Location Names</th>
                                                <th>Distance</th>
                                                <th>Operations</th>
                                                <th>Available</th>
                                            </tr>
                                        </thead>
                                        <tbody id="output">
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
    $(document).ready(function(){
        $("#signupitem").hide();
        $("#loginitem").hide();
    });
</script>
</html>