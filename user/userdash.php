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
        <?php include 'header.php'; ?>
    </header>
    <!-- header close -->

    <!-- section open -->
    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-2 bg-dark">
                    <nav class="nav flex-column">
                        <a class="nav-link active" href="#" style="color: white;font-size:25px;">Ride Requests</a>
                        <a class="nav-link" href="#" style="color: white;font-size:25px;">Rides History</a>
                    </nav>
                </div>
                <div class="col-lg-10">
                <div class="row">
                        <div class="col-lg-3" style="padding:2%">
                            <div class="card text-white bg-success text-center" style="max-width: 18rem;">
                                <div class="card-body">
                                    <h5 class="card-title">Ride Requests</h5>
                                    <p class="card-text">%num%</p>
                                    <button class="btn btn-outline-light">View Details</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3" style="padding:2%">
                            <div class="card text-white bg-success text-center" style="max-width: 18rem;">
                                <div class="card-body">
                                    <h5 class="card-title">Completed Rides</h5>
                                    <p class="card-text">%num%</p>
                                    <button class="btn btn-outline-light">View Details</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3" style="padding:2%">
                            <div class="card text-white bg-success text-center" style="max-width: 18rem;">
                                <div class="card-body">
                                    <h5 class="card-title">Canceled Rides</h5>
                                    <p class="card-text">%num%</p>
                                    <button class="btn btn-outline-light">View Details</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3" style="padding:2%">
                            <div class="card text-white bg-success text-center" style="max-width: 18rem;">
                                <div class="card-body">
                                    <h5 class="card-title">All Rides</h5>
                                    <p class="card-text">%num%</p>
                                    <button class="btn btn-outline-light">View Details</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <form method="POST">
            <h1 class="display-1">hi! <?= $_SESSION['suser']; ?></h1>
            <button type="submit" class="btn btn-danger d-inline" name="logout">Logout</button>
        </form>
        <!-- section close -->

        <!-- footer open -->
        <footer>
            <?php include 'footer.php'; ?>
        </footer>
        <!-- footer close -->
</body>

</html>