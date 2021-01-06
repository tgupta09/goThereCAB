<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rides - User Dashboard</title>
</head>

<body>
    <!-- header open-->
    <?php include 'header.php'; ?>
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
                        <a class="nav-link active" data-toggle="tab" href="#menu1">Pending Rides</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#menu2">Completed Rides</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#menu3">Cancelled Rides</a>
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

                    <div id="menu2" class="container tab-pane fade"><br>
                        <div class="row">
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

                    <div id="menu3" class="container tab-pane fade"><br>

                        <!-- add location -->
                        <div class="container">
                            <div class="row justify-content-center">
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
</html>

    