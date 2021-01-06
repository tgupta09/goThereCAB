<?php
if (!isset($_SESSION)) {
    session_start();
        if (isset($_POST['logout'])) {
            session_unset();
            session_destroy();
            ?><script>location.replace('signup.php')</script><?php
            // header("Location:signup.php");
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title></title>
</head>

<body>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <a class="navbar-brand " href="index.php" id="iconitem"><i class="fa fa-taxi fa-2x" aria-hidden="true" style="color: #00C851 ;"></i><span style="color: white;font-size:40px;"> CedCab</span></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav ml-auto align-items-baseline">
                <li class="nav-item" id="signupitem">
                    <a class="nav-link" href="signup.php" style="color:white;font-size:20px;margin-right:15px;">SIGN UP</a>
                </li>
                <li class="nav-item dropdown" id="userid">
                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                        <?php if (isset($_SESSION['sadmin'])) {
                            echo $_SESSION['sadmin'];
                        } else {
                            echo $_SESSION['suser'];
                        } ?>
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">Profile</a>
                        <form method="POST">
                            <a class="dropdown-item"><button type="submit" class="btn btn-danger" name="logout">Logout</button></a>
                        </form>
                    </div>
                </li>

            </ul>
        </div>
    </nav>
</body>
<script>
</script>

</html>


<?php
if (isset($_SESSION['suser']) || isset($_SESSION['sadmin'])) {
?>
    <script>
        $(document).ready(function() {
            $("#signupitem").hide();
        });
    </script>
<?php
} else {
?><script>
        $(document).ready(function() {
            $("#userid").hide();
        });
    </script><?php
            }
                        ?>