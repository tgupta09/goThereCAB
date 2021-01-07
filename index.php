<?php
session_start();
$conn = new mysqli("localhost", "root", "", "cedcab") or die("Connection Unsucessful");
$sql = "select name from tbl_location";
$sql2 = "select name from tbl_location";
$result = $conn->query($sql);
$result2 = $conn->query($sql2);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CedCab</title>
    <style>
        select {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
        }

        input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            margin: 0;
        }
    </style>
</head>

<body oncopy="return false" oncut="return false" onpaste="return false">
    <!-- Navigation -->
    <header>
        <?php include "header.php"; ?>
    </header>

    <!-- Main Section -->
    <section>
        <div class="container-fluid" style="background-image:url('img.jpg');background-repeat: no-repeat;background-size:100% 120%;">
            <div class="row">
                <div class="col-sm-12 text-center" style="margin-top: 20px;">
                    <h1 class="display-5" style="color:whitesmoke;font-weight:bold;">Book a City Taxi to your Destination in Town</h1>
                    <h3 class="display-6" style="color:whitesmoke;font-weight:bold;">Choose from a range of categories and prices</h3>
                </div>
            </div>
            <div class="row" style="margin-top:50px;padding-bottom:50px;">
                <div class="col-lg-4 col-md-8 col-sm-12" style="padding:0% 4%;">
                    <!-- Form -->
                    <form class="form" style="padding:2% 2%;border-radius:5px;background-color: white;">
                    <h5 class="text-center"><span style="background-color: #00C851;border-radius:50px;padding:0px 10px;color:white;">CITY TAXI</span></h5>
                    <h6 class="text-center font-weight-bold">Your everyday travel partner</h6>
                    <h6 class="text-center">AC Cabs for point to point travel</h6>
                        <!-- pickup location box -->
                        <div class="input-group" style="margin-bottom:5%">
                            <div class="input-group-prepend">
                                <span class="input-group-text">PICKUP LOCATION</span>
                            </div>
                            <select class="form-control" id="pickup">
                                <option value="--">Choose Location</option>
                                <?php
                                if($result->num_rows>0){
                                    while($row = $result->fetch_assoc()){
                                        echo "<option value = '$row[name]'>$row[name]</option>";
                                    }
                                }
                                ?>
                                <!-- <option value="Charbagh">Charbagh</option>
                                <option value="Indira_Nagar">Indira Nagar</option>
                                <option value="BBD">BBD</option>
                                <option value="Barabanki">Barabanki</option>
                                <option value="Faizabad">Faizabad</option>
                                <option value="Basti">Basti</option>
                                <option value="Gorakhpur">Gorakhpur</option> -->
                            </select>
                        </div>
                        <!-- drop location box -->
                        <div class="input-group" style="margin-bottom:5%">
                            <div class="input-group-prepend">
                                <span class="input-group-text">DROP LOCATION</span>
                            </div>
                            <select class="form-control" id="drop">
                                <option value="--">Choose Location</option>
                                <?php
                                if($result2->num_rows>0){
                                    while($row2 = $result2->fetch_assoc()){
                                        echo "<option value = '$row2[name]'>$row2[name]</option>";
                                    }
                                }
                                ?>
                                <!-- <option value="Charbagh">Charbagh</option>
                                <option value="Indira_Nagar">Indira Nagar</option>
                                <option value="BBD">BBD</option>
                                <option value="Barabanki">Barabanki</option>
                                <option value="Faizabad">Faizabad</option>
                                <option value="Basti">Basti</option>
                                <option value="Gorakhpur">Gorakhpur</option> -->
                            </select>
                        </div>
                        <!-- cab type box -->
                        <div class="input-group" style="margin-bottom:5%">
                            <div class="input-group-prepend">
                                <span class="input-group-text">CAB TYPE</span>
                            </div>
                            <select class="form-control" id="ctype">
                                <option value="--">Choose Cab Type</option>
                                <option value="Ced Micro">Ced Micro</option>
                                <option value="Ced Mini">Ced Mini</option>
                                <option value="Ced Royal">Ced Royal</option>
                                <option value="Ced SUV">Ced SUV</option>
                            </select>
                        </div>
                        <!-- luggage box -->
                        <div class="input-group" style="margin-bottom:5%">
                            <div class="input-group-prepend">
                                <span class="input-group-text">LUGGAGE</span>
                            </div>
                            <input type="number" class="form-control" id="lugg">
                        </div>
                        <!--Calculate button -->
                        <input type="button" class="btn btn-success btn-lg btn-block" value='Calculate' id="btnca" data-toggle="modal" data-target="#calcmo">
                    </form>
                </div>
                <!-- Form Close -->
                <!-- Modal for Journey Info-->
                <div class="modal" id="calcmo">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title" id="mheader"></h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body" id="mbody">
                            </div>

                            <!-- Modal footer -->
                            <div class="modal-footer" id="mfooter">
                                <button type="button" class="btn btn-success" id="book">Book Cab</button>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- Modal Close -->

            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <?php include "footer.php"; ?>
    </footer>

</body>
<script>
    // script for luggage input box so that it can enter correct value with 3 decimal places
    // var l = document.getElementById('lugg');
    // var tf = 0,
    //     pr = 0;
    // l.onkeydown = function(e) {
    //     if ((e.keyCode > 47 && e.keyCode < 58) || (e.keyCode > 95 && e.keyCode < 106) || (e.keyCode == 8)) {
    //         if(tf==0){
    //             console.log("##rtr#");
    //             return true;
    //         }else
    //         if (tf == 1) {
    //             if(pr!=3){
    //                 ++pr;
    //             console.log("pr = "+pr);
    //             return true;
    //             }
    //             else{
    //                 return false;
    //             }

    //         } else {
    //             console.log("____");
    //             return false;
    //         }
    //     } else
    //     if (e.keyCode == 190) {
    //         if (tf == 0) {
    //             tf = 1;
    //             return true;
    //         } else {
    //             return false;
    //         }
    //     } else {

    //         return false;
    //     }
    // }

    // script for luggage input box so that it can enter correct value with 3 decimal places
    var invalidChars = ["-", "e", "+", "E"];
    var pi = '', dr = '', ct = '',mess='',pickup,drop,ctype,lugg;
    $("input[type='number']").on("keydown", function(e) {
        if (invalidChars.includes(e.key)) {
            e.preventDefault();
        }
    });
    // script for ajax and select menu using jquery
    $(document).ready(function() {
        $('#lugg').prop('disabled', true);
        $('#lugg').attr('placeholder', 'Don\'t have option for luggage in this cab type');
        $('#ctype').change(function() {
            if ($('#ctype').val() == "Ced Micro" || $('#ctype').val() == "--") {
                $('#lugg').val('');
                $('#lugg').attr('placeholder', 'Don\'t have option for luggage in this cab type');
                $('#lugg').prop('disabled', true);
            } else {
                $('#lugg').prop('disabled', false);
                $('#lugg').attr('placeholder', 'Enter Weight in Kg');
            }
        });

        $('#pickup').change(function() {
            $("#drop option").show();
            $('#drop option[value=' + $(this).val() + ']').hide();
        });

        $('#drop').change(function() {
            $("#pickup option").show();
            $('#pickup option[value=' + $(this).val() + ']').hide();
        });

        $("#btnca").click(function() {
            pickup = $("#pickup").val().replace('_', ' ');
            drop = $("#drop").val().replace('_', ' ');
            ctype = $("#ctype").val();
            lugg = Math.abs($("#lugg").val());
            var button = 1
            if (pickup != '--' && drop != '--' && ctype != '--') {
                if (lugg == '') {
                    lugg = 0;
                }
                $.ajax({
                    url: 'indexback3.php',
                    type: 'POST',
                    data: {
                        'button':button,
                        'pickup': pickup,
                        'drop': drop,
                        'ctype': ctype,
                        'lugg': lugg
                    },
                    success: function(data) {
                        // on success show info in modal box
                        document.getElementById('mheader').innerHTML = "INFORMATION";
                        document.getElementById("mbody").innerHTML = data;
                        document.getElementById('mfooter').style.display = "block";
                    },
                    error: function() {
                        document.getElementById("mbody").innerHTML = "Error Occured";
                    }
                });
            } else {
                // on failure show alert in modal box
                if(pickup == '--'){pi="Pickup Location";}
                if(drop == '--'){dr="Drop Location";}
                if(ctype == '--'){ct="Cab Type";}

                if(pickup=='--' && drop =='--' && ctype =='--'){
                    mess = "Please select "+pi+", "+dr+" & "+ct;
                }
                else if((pickup!='--' && drop =='--' && ctype =='--')||(pickup=='--' && drop !='--' && ctype =='--')){
                    mess = "Please select "+pi+dr+" & "+ct;
                }
                else if(pickup=='--' && drop =='--' && ctype !='--'){
                    mess = "Please select "+pi+" & "+dr;
                }
                else if((pickup!='--' && drop !='--' && ctype =='--')||(pickup=='--' && drop !='--' && ctype !='--')||(pickup!='--' && drop =='--' && ctype !='--')){
                    mess = "Please select "+pi+dr+ct;
                }
                document.getElementById('mheader').innerHTML = "ALERT";
                document.getElementById('mbody').innerHTML = mess;
                mess='';pi = ''; dr = ''; ct = '';
                document.getElementById('mfooter').style.display = "none";
            }
        });

        $("#book").click(function(){
            var button = 2;
            $.ajax({
                urL:'indexback3.php',
                type:'POST',
                data:{
                    'button':button 
                },
                success: function(data){
                    console.log("successful");
                },
                error: function(){
                    console.log("Error Occured");
                }
            })
        });
    });
</script>
</html>
