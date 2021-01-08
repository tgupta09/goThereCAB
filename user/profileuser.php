<?php
include '../phpconfig.php';
$sql = "select email_id, name, mobile from tbl_user where email_id = '$_SESSION[suser]'";
$res = $conn->query($sql);
$row = $res->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile - User Dashborad</title>
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

                <!-- heading profile -->
                <div style="border-bottom:1px solid grey;margin:2%;">
                    <h1 class="display-4">Profile</h1>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-6 text-center">


                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#menu1">Profile Details</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#menu2">Change Password</a>
                            </li>
                        </ul>


                        <!-- Tab panes -->
                        <div class="tab-content">
                            <!-- menu 1 -->
                            <div id="menu1" class="container tab-pane active"><br>

                                <!-- form for deatils -->
                                <form class="form" style="margin:2%">

                                    <!-- username -->
                                    <div class="input-group" style="margin-bottom:5%">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">User Name</span>
                                        </div>
                                        <input type="text" class="form-control" id="uname" value="<?php echo $row['email_id']; ?>" disabled>
                                    </div>

                                    <!-- name -->
                                    <div class="input-group" style="margin-bottom:5%">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Name</span>
                                        </div>
                                        <input type="text" class="form-control" id="name" value="<?php echo $row['name']; ?>">
                                    </div>

                                    <!-- mobile -->
                                    <div class="input-group" style="margin-bottom:6%">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Mobile Number</span>
                                        </div>
                                        <input type="text" class="form-control" id="mob" value="<?php echo $row['mobile']; ?>">
                                    </div>

                                    <!-- save button -->
                                    <button type="button" class="btn btn-success" id="save">Save</button>
                                </form>
                            </div>

                            <!-- menu2 -->
                            <div id="menu2" class="container tab-pane fade"><br>
                                <form class="form" style="margin:2%">

                                    <!-- old password -->
                                    <div class="input-group" style="margin-bottom:5%">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Old Password</span>
                                        </div>
                                        <input type="password" class="form-control" id="oldpass">
                                    </div>

                                    <!-- new password -->
                                    <div class="input-group" style="margin-bottom:5%">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">New Password</span>
                                        </div>
                                        <input type="password" class="form-control" id="newpass">
                                    </div>

                                    <!-- confirm password -->
                                    <div class="input-group" style="margin-bottom:6%">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Confirm Password</span>
                                        </div>
                                        <input type="password" class="form-control" id="confirmpass">
                                    </div>

                                    <!-- change password button -->
                                    <button type="button" class="btn btn-success" id="changepass">Change Password</button>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <p id="demo"></p>
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
    var button;
    $(document).ready(function() {
        $("#save").click(function() {
            button = 1;
            var name = $("#name").val();
            var mob = $("#mob").val();
            $.ajax({
                url: 'profileuserback.php',
                type: 'POST',
                data: {
                    'button': button,
                    'name': name,
                    'mob': mob,
                },
                success: function(data) {
                    alert('Update Profile Details');
                    location.reload();
                },
                error: function() {
                    console.log('Error Occured 1');
                }
            });
        });

        $('#changepass').click(function() {
            button = 2;
            var oldpass = $("#oldpass").val();
            var newpass = $("#newpass").val();
            var confirmpass = $("#confirmpass").val();
            if (newpass == confirmpass) {
                $.ajax({
                    url: 'profileuserback.php',
                    type: 'POST',
                    data: {
                        'button': button,
                        'old': oldpass,
                        'new': newpass
                    },
                    success: function(data) {
                        alert('Password Changed');
                        $("#oldpass").val('');
                        $("#newpass").val('');
                        $("#confirmpass").val('');

                    },
                    error: function() {
                        console.log('Error Occured 2');
                    }
                });
            }
            else {alert('New Password and Confirm Password do not match');}
        });
    });
</script>

</html>