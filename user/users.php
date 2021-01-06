<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users - Admin Dashboard</title>
</head>

<body>
    <!-- header open-->
    <?php include 'header.php'; ?>
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
                    <!-- table -->
                    <div class="row" style="margin-top: 2%;">
                        <div class="col-lg-12 text-center">
                            <div id="viewdata">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Email Id</th>
                                            <th>Name</th>
                                            <th>Date of Signup</th>
                                            <th>Mobile Number</th>
                                            <th>Status</th>
                                            <th>Operations</th>
                                        </tr>
                                    </thead>
                                    <tbody id="output">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
            </div>
            <!-- content close -->

        </div>
    </div>
    <!-- section close -->


    <!-- footer open-->
    <?php include 'footer.php'; ?>
    <!-- footer  close -->
</body>
<script>
    $(document).ready(function(){
        $("#signupitem").hide();
    });
</script>
</html>