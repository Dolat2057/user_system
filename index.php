<?php
include("./config/conn.php");
$result = "";
if (isset($_GET['id']) && $_GET['id'] != '') {
    $id = $_GET['id'];

    $sql = "SELECT * from `user_detail` where id = '" . $id . "'";
    $data = mysqli_query($conn, $sql);
    $result = mysqli_fetch_assoc($data);
}
//print_r($result);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Form</title>
    <link rel="stylesheet" href="<?=URL?>bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= URL?>css/style.css">

</head>

<body class="main_body">

    <div class="container form_container">
        <div class="row justify-content-center mt-3">
            <div class="col-lg-8 col-md-6 col-sm-6">
                <div class="card shadow">
                    <div class="card-title text-center border-bottom">
                        <h2 class="p-2 main_heading">Student Information</h2>
                    </div>

                    <div class="card-body">
                        <div class="form-group" id="error" style="display: none;">
                            <div class="form-group">
                                <div class="alert alert-danger" id="error_message" role="alert">
                                </div>
                            </div>
                        </div>
                        <form action="" method="POST" id="my_form" enctype="multipart/form-data">
                            <div class="mb-2">

                                <input type="text" class="form-control" id="student_name" name="student_name" value="<?php echo isset($result['student_name']) ? $result['student_name'] : ""; ?>" placeholder="Name" required />
                            </div>
                            <div class="mb-2">

                                <input type="text" class="form-control" id="father_name" name="father_name" placeholder="Father Name" value="<?php echo isset($result['father_name']) ? $result['father_name'] : ""; ?>" required />
                            </div>
                            <div class="mb-2">

                                <input type="date" class="form-control" id="date" name="date" placeholder="Date of Birth" required value="<?php echo isset($result['dob']) ?  date("Y-m-d",$result['dob']) : ""; ?>" />
                               
                            </div>
                            <div class="mb-2">

                                <input type="text" class="form-control" id="address" name="address" placeholder="Address" required value="<?php echo isset($result['address']) ? $result['address'] : ""; ?>" />
                            </div>
                            <?php if (isset($_GET['id']) && $_GET['id'] != "") {
                            ?>

                                <input type="hidden" name="id" id="id" value="<?php echo $result['id'] ?>">
                            <?php
                            } ?>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-2">

                                        <input type="text" class="form-control" id="state" name="state" placeholder=" State" required value="<?php echo isset($result['state']) ? $result['state'] : "";  ?>" />
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="mb-2">

                                        <input type="text" class="form-control" id="city" name="city" placeholder="City" required value="<?php echo isset($result['city']) ? $result['city'] : ""; ?>" />

                                    </div>

                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-2">

                                        <input type="number" class="form-control" id="pincode" name="pincode" placeholder="Pincode" required value="<?php echo isset($result['pincode']) ? $result['pincode'] : "" ?>" />
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="mb-2">

                                        <input type="number" class="form-control" id="phone" name="phone" placeholder=" Phone" required value="<?php echo isset($result['phone']) ? $result['phone'] : "" ?>" />
                                    </div>

                                </div>

                            </div>
                            <div class="mb-2">

                                <input type="email" class="form-control" id="email" name="email" placeholder="Email" required value="<?php echo isset($result['email']) ? $result['email'] : "" ?>" />
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-2">



                                        <select id="class" class="form-control" name="standard">
                                            <option value="5" <?php if (isset($result['class']) && $result['class'] == 5) {
                                                                    echo "Selected";
                                                                } ?>>5th</option>
                                            <option value="6" <?php if (isset($result['class']) && $result['class'] == 6) {
                                                                    echo "Selected";
                                                                } ?>>6th</option>
                                            <option value="7" <?php if (isset($result['class']) && $result['class'] == 7) {
                                                                    echo "Selected";
                                                                } ?>>7th</option>
                                            <option value="8" <?php if (isset($result['class']) && $result['class'] == 8) {
                                                                    echo "Selected";
                                                                } ?>>8th</option>
                                            <option value="9" <?php if (isset($result['class']) && $result['class'] == 9) {
                                                                    echo "Selected";
                                                                } ?>>9th</option>
                                            <option value="10" <?php if (isset($result['class']) && $result['class'] == 10) {
                                                                    echo "Selected";
                                                                } ?>>10th</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-2">

                                        <input type="number" class="form-control" id="marks" name="marks" placeholder=" Marks in %" required value="<?php echo isset($result['marks']) ? $result['marks'] : "" ?>" />
                                    </div>
                                </div>
                            </div>

                            <div class="d-grid text-center pt-2">
                            <a href="<?=URL?>student_detail.php" class="btn btn-warning"><i class="fa fa-users"></i> Users</a>
                                <input type="button" onclick="submit_form();" name="submit" class="btn btn-danger" value="Submit">
                            </div>
                        </form>
                        <div id="error-message"> </div>
                        <div id="success-message"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="<?=URL?>bootstrap/js/bootstrap.min.js"></script>
    <script>
        function f1(email) {
            var regex = /^([0-9a-zA-Z]([-_\\.]*[0-9a-zA-Z]+)*)@([0-9a-zA-Z]([-_\\.]*[0-9a-zA-Z]+)*)[\\.]([a-zA-Z]{2,9})$/;
            if (!regex.test(email)) {

                return false;
            }
        }

        function submit_form() {

            var student_name = $("#student_name").val();
            var father_name = $("#father_name").val();

            var dob = $("#date").val();
            var address = $("#address").val();
            var state = $("#state").val();
            var city = $("#city").val();
            var pincode = $("#pincode").val();
            var phone = $("#phone").val();
            var email = $("#email").val();
            var standard = $("#class").val();
            var marks = $("#marks").val();
            var id = $("#id").val();

            var valid = true;

            if (f1(email) == false) {
                $("#error").show();
                $("#error_message").html("Please enter a valid email address");
                valid = false;
                return false;
            }

            if (student_name == "") {
                $("#error").show();
                $("#error_message").html("Please fill your Student Name");
                valid = false;
                return false;
            }
            if (father_name == "") {
                $("#error").show();
                $("#error_message").html("Please fill your father Name");
                valid = false;
                return false;

            }
            if (dob == "") {
                $("#error").show();
                $("#error_message").html("Please fill your Date of Birth");
                valid = false;
                return false;

            }
            if (address == "") {
                $("#error").show();
                $("#error_message").html("Please fill your Address");
                valid = false;
                return false;

            }
            if (state == "") {
                $("#error").show();
                $("#error_message").html("Please fill your State");
                valid = false;
                return false;
            }
            if (city == "") {
                $("#error").show();
                $("#error_message").html("Please fill your City");
                valid = false;
                return false;
            }
            if (pincode == "") {
                $("#error").show();
                $("#error_message").html("Please fill your Pincode");
                valid = false;
                return false;
            }
            if (phone == "") {
                $("#error").show();
                $("#error_message").html("Please fill your Phone");
                valid = false;
                return false;
            }
            if (phone < 6000000000) {

                $("#error").show();
                $("#error_message").html("Please enter valid mobile");
                valid = false;
                return false;

            }
            if (phone > 9999999999) {

                $("#error").show();
                $("#error_message").html("Please enter valid mobile");
                valid = false;
                return false;
            }
            if (email == "") {
                $("#error").show();
                $("#error_message").html("Please fill your Email");
                valid = false;
                return false;

            }


            if (standard == "") {
                $("#error").show();
                $("#error_message").html("Please fill your Standard");
                valid = false;
                return false;
            }
            if (state == "") {
                $("#error").show();
                $("#error_message").html("Please fill your State");
                valid = false;
                return false;
            }
            if (marks == "") {
                $("#error").show();
                $("#error_message").html("Please fill your marks in percentage");
                valid = false;
                return false;
            }

            //alert(student_name+father_name+date+address+state+city+pincode+phone+email+standard+marks);
            if (valid == true) {
                $("#error").hide();
                $.ajax({
                    url: '<?=URL?>form_insert.php',
                    type: 'POST',
                    data: {
                        student_name: student_name,
                        father_name: father_name,
                        dob: dob,
                        address: address,
                        state: state,
                        city: city,
                        pincode: pincode,
                        phone: phone,
                        email: email,
                        standard: standard,
                        marks: marks,
                        id: id,
                        action: 'submit_data'
                    },

                    success: function(html) {


                        if (html == "duplicate_mobile") {
                            $("#error-message").html("Mobile number already exists").slideDown();
                            $("#success-message").slideUp();
                        }
                        if (html == "duplicate_email") {
                            $("#error-message").html("Email-id already exists.").slideDown();
                            $("#success-message").slideUp();
                        }
                        if (html == "not_valid_dob") {
                            $("#error-message").html("Please enter a valid date of birth").slideDown();
                            $("#success-message").slideUp();
                        }
                        if (html == "Updated") {
                            $("#success-message").html("Data Updated Successfully").slideUp();
                            $("#error-message").slideDown();

                            function myFunction() {
                                setTimeout(function() {

                                    window.location.href = "<?=URL?>student_detail.php";

                                }, 1000);

                            }
                            myFunction();
                        }
                        if (html == "Not_updated") {
                            $("#error-message").html("Something went wrong! Please try again after sometime").slideDown();
                            $("#success-message").slideUp();

                            function myFunction() {
                                setTimeout(function() {

                                    window.location.href = "<?=URL?>index.php";

                                }, 1000);

                            }
                            myFunction();
                        }
                        if (html == "done") {
                            $("#success-message").html("Data Inserted Successfully").slideDown();
                            $("#error-message").slideUp();

                            function myFunction() {
                                setTimeout(function() {

                                    window.location.href = "<?=URL?>student_detail.php";

                                }, 1000);

                            }
                            myFunction();

                        }

                        if (html == "not_done") {
                            $("#error-message").html("Something went wrong! Please try again after sometime").slideDown();
                            $("#success-message").slideUp();

                            function myFunction() {
                                setTimeout(function() {

                                    window.location.href = "<?=URL?>index.php";

                                }, 1000);

                            }
                            myFunction();
                        }

                    }





                });
            }



        }
    </script>


</body>

</html>