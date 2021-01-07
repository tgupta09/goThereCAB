<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
</head>

<body>
    <!-- Navigation -->
    <header>
        <?php include "header.php"; ?>
    </header>
    <!-- Content -->
    <section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-12 col-md-12 col-lg-6 text-center" style="padding:3% 3%;">



                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#menu2">LOG IN</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#menu1">SIGN UP</a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div id="menu1" class="container tab-pane fade"><br>
                            <form method="POST" style="border:2px solid black; border-radius:10px;padding:5% 5%;margin :auto;">
                                <h3>SignUp Form</h3>

                                <!-- Email Address -->
                                <div class="input-group" style="margin-bottom:5%">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Email Address</span>
                                    </div>
                                    <input type="email" class="form-control" name="elmail" id="emailid">
                                    <div id="divverifyemail" style="display:none;" class="mx-auto">
                                        <h6>Enter appropriate Email Address before verifying it</h6>
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#verifyemail" id="verifydialogboxemail">Verify Email Address</button>
                                    </div>
                                </div>

                                <!-- Mobile Number -->
                                <div class="input-group" style="margin-bottom:5%">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Mobile Number</span>
                                    </div>
                                    <input type="text" class="form-control" name="mobi" id="mobile" disabled>
                                    <div id="divverifymobile" style="display:none;" class="mx-auto">
                                        <h6>Enter appropriate Mobile Number before verifying it</h6>
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#verifymobile" id="verifydialogboxmobile">Verify Mobile Number</button>
                                    </div>
                                </div>

                                <!-- Name -->
                                <div class="input-group" style="margin-bottom:5%">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Name</span>
                                    </div>
                                    <input type="text" class="form-control" name="uname" id="uname" disabled>
                                </div>

                                <!-- Password -->
                                <div class="input-group" style="margin-bottom:5%">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Password</span>
                                    </div>
                                    <input type="password" class="form-control" name="pass" id="passw" disabled>
                                </div>


                                <button class="btn btn-success" name="signupbutton">Sign Up</button>
                            </form>
                        </div>
                        <div id="menu2" class="container tab-pane active"><br>
                            <form class="form" method="POST" style="border:2px solid black; border-radius:10px;padding:5% 5%;margin :auto;">
                                <!-- user box -->
                                <div class="input-group" style="margin-bottom:5%">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Email Address</span>
                                    </div>
                                    <input type="text" class="form-control" id="email" name="uemail">
                                </div>
                                <!-- password box -->
                                <div class="input-group" style="margin-bottom:5%">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Password</span>
                                    </div>
                                    <input type="password" class="form-control" id="pass" name="upass">
                                </div>

                                <!-- button -->
                                <button class="btn btn-success" id="loginbtn" name="loginbutton">LOG IN</button>
                            </form>
                        </div>
                    </div>




                </div>
            </div>
        </div>


        <!-- modal1foremail -->
        <div class="modal fade" id="verifyemail">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title" id="mt">Verify Email Address</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <h6>The OTP is sent to registered <span id="mdh1">Email Address</span>.</h6>
                        <h6 id="mbh2">The OTP is valid for 1 minute.</h6>
                        <h6>Enter OTP to verify <span id="mdh2">Email Address</span>.</h6>
                        <div class="input-group" style="margin-bottom:5%">
                            <div class="input-group-prepend">
                                <span class="input-group-text">OTP</span>
                            </div>
                            <input type="text" class="form-control" id="otpide">
                        </div>
                        <button type="button" class="btn btn-success mx-auto" id="verifyotpemail">Verify OTP</button>
                        <p id="demo1"></p>
                    </div>

                </div>
            </div>
        </div>

        <!-- modal2formobile -->
        <div class="modal fade" id="verifymobile">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title" id="mt">Verify Mobile number</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <h6>The OTP is sent to registered Mobile Number.</h6>
                        <h6>Enter OTP to verify <span id="mdh2">Email Address</span>.</h6>
                        <p id="aa"></p>
                        <div class="input-group" style="margin-bottom:5%">
                            <div class="input-group-prepend">
                                <span class="input-group-text">OTP</span>
                            </div>
                            <input type="text" class="form-control" id="otpidm">
                        </div>
                        <button type="button" class="btn btn-success mx-auto" id="verifyotpmobile">Verify OTP</button>
                        <p id="demo2"></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer -->
    <footer>
        <?php include "footer.php"; ?>
    </footer>
</body>

<script>
    var button;
    $(document).ready(function() {
        $("#signuplink").hide();

        $("#emailid").click(function() {
            console.log("emailtext");
            $("#divverifyemail").show();
        });

        $("#mobile").click(function() {
            console.log("mobiletext");
            $("#divverifymobile").show();
        });

        $("#verifydialogboxemail").click(function() {
            console.log("Sentotpbuttonemail");
            var text = $("#emailid").val();
            button = 1;
            console.log(text);
            console.log(button);
            $.ajax({
                url: 'signupback.php',
                type: 'POST',
                data: {
                    'email': text,
                    'button': button
                },
                success: function(data) {},
                error: function() {
                    alert("Error Occured");
                }
            });
        });

        $("#verifydialogboxmobile").click(function() {
            $("#otpid").val('');
            console.log("Sentotpbuttonmobile");
            var text = $("#mobile").val();
            button = 2;
            console.log(text);
            console.log(button);
            $.ajax({
                url: 'signupback.php',
                type: 'POST',
                data: {
                    'email': text,
                    'button': button
                },
                success: function(data) {
                    $("#aa").html(data);
                },
                error: function() {
                    alert("Error Occured");
                }
            });

        });

        $("#verifyotpemail").click(function() {
            console.log("Verifyotpbuttonclicked");
            var otptext = $("#otpide").val();
            button = 3;
            console.log(otptext);
            console.log(button);
            $.ajax({
                url: 'signupback.php',
                type: 'POST',
                data: {
                    'otpc': otptext,
                    'button': button
                },
                success: function(data) {
                    $("#demo1").html(data);
                    var a = $("#demo1").html();
                    console.log(a)
                    if (a == "OTP Verified") {
                        $("#mobile").prop('disabled', false);
                        $("#emailid").prop('readonly', true);
                        $("#divverifyemail").hide();
                    }
                },
                error: function() {
                    alert("Error Occured");
                }
            });
        });


        $("#verifyotpmobile").click(function() {
            console.log("Verifyotpbuttonclicked");
            var otptext = $("#otpidm").val();
            button = 3;
            console.log(otptext);
            console.log(button);
            $.ajax({
                url: 'signupback.php',
                type: 'POST',
                data: {
                    'otpc': otptext,
                    'button': button
                },
                success: function(data) {
                    $("#demo2").html(data);
                    var a = $("#demo2").html();
                    console.log(a)
                    if (a == "OTP Verified") {
                        $("#mobile").prop('readonly', true);
                        $('#uname').prop('disabled', false);
                        $('#passw').prop('disabled', false);
                        $("#divverifymobile").hide();
                    }
                },
                error: function() {
                    alert("Error Occured");
                }
            });
        });

    });
</script>

</html>


<?php
if (isset($_POST['signupbutton'])) {
    $name = $_POST['uname'];
    $email = $_POST['elmail'];
    $mob = $_POST['mobi'];
    $pass = md5($_POST['pass']);
    $dateofsignup = date("Y-m-d H:i:s");
    // if ($name != '' && $email != '' && $mob != '' && $pass != '') {
    $conn = new mysqli("localhost", "root", "", "cedcab") or die("Connection Unsucessful");

    $sql_query = "insert into tbl_user(email_id,name,dateofsignup,mobile,status,password,is_admin) values('$email','$name','$dateofsignup','$mob','1','$pass','0')";

    $result = $conn->query($sql_query);
    $_SESSION['suser'] = $email;

    if ($result == TRUE) {
?> <script>
            location.replace("userdash.php");
        </script><?php
                    // header("location:welcomeuser.php");
                } else {
                    echo "<script>alert('Data Not Inserted');</script>";
                }
                $conn->close();
                // }
            }



    
            if (isset($_POST['loginbutton'])) {

                $name = $_POST['uemail'];
                $pass = $_POST['upass'];
                // echo "<script>alert('".$name."')</script>";
                // echo "<script>alert('".$pass."')</script>";
                // if($name != '' && $pass!=''){
                $conn = new mysqli("localhost", "root", "", "cedcab") or die("Connection Unsucessful");

                $sql_query = "select status,is_admin from tbl_user where email_id='$name' and password = '$pass'";

                $result = $conn->query($sql_query);
                $row = $result->num_rows;

                $row2 = $result->fetch_assoc();
                // echo "<script>alert('".$row2['status']."')</script>";
                // echo "<script>alert('".$row2['is_admin']."')</script>";
                if ($row == 1) {
                    if ($row2['status'] == 1 && $row2['is_admin'] == 0) {

                        $_SESSION['suser'] = $name;
                        // header("location:welcomeuser.php");
                ?> <script>
                location.replace("user/index.php");
            </script><?php
                    } else if ($row2['status'] == 1 && $row2['is_admin'] == 1) {
                        $_SESSION['sadmin'] = $name;
                        // header("location:welcomeuser.php");
                        ?> <script>
                location.replace("admin/index.php");
            </script><?php
                    } else if ($row2['status'] == 0) {
                        ?> <script>
                alert('You are blocked by admin. You cannot access webiste');
            </script><?php
                    }
                } else {
                    echo "<script>alert('Wrong Username or Password');</script>";
                }
                $conn->close();
                // }
            }
                    ?>