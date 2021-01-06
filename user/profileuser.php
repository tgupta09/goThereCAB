<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile - User Dashboard</title>
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
                    <h1 class="display-4">Profile</h1>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-6 text-center">

                        <!-- form for profile -->
                        <form class="form" method="POST" style="border:2px solid black;border-radius:5px;padding:2%;margin:12%">

                            <!-- username -->
                            <div class="input-group" style="margin-bottom:5%">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">User Name</span>
                                </div>
                                <input type="text" class="form-control" id="uname">
                            </div>

                            <!-- name -->
                            <div class="input-group" style="margin-bottom:5%">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Name</span>
                                </div>
                                <input type="text" class="form-control" id="name">
                            </div>

                            <!-- mobile -->
                            <div class="input-group" style="margin-bottom:7%">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Mobile Number</span>
                                </div>
                                <input type="password" class="form-control" id="mob">
                            </div>

                            <!-- change password button -->
                            <button type="button" class="btn btn-primary" id="changepassbox">Change Password</button>

                            <!-- div for password -->
                            <div style="border:2px dotted black; border-radius:5px; display:none;margin:1%;padding:1%;" id="passbox">

                                <!-- old password -->
                                <div class="input-group" style="margin-bottom:5%">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Old Password</span>
                                    </div>
                                    <input type="text" class="form-control" id="oldpass">
                                </div>

                                <!-- new password -->
                                <div class="input-group" style="margin-bottom:5%">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">New Password</span>
                                    </div>
                                    <input type="password" class="form-control" id="newpass">
                                </div>

                                <!-- confirm password -->
                                <div class="input-group" style="margin-bottom:5%">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Confirm Password</span>
                                    </div>
                                    <input type="password" class="form-control" id="confirmpass">
                                </div>

                                <!-- change password button -->
                                <button type="button" class="btn btn-primary" id="changepass">Change Password</button>
                            </div>


                            <!-- save button -->
                            <button type="button" class="btn btn-success">Save</button>
                        </form>
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
    $(document).ready(function() {
        $("#changepassbox").click(function() {
            $("#passbox").show();
            $("#changepassbox").hide();
        });
    });
</script>

</html>