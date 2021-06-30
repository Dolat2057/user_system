<?php
include("./config/conn.php");
include("./config/config.php");
if (isset($_POST['action']) && $_POST['action'] == 'submit_data') {

    //exit;
    $student_name = sanitize($_POST['student_name']);
    $father_name = sanitize($_POST['father_name']);
    $dob = (strtotime($_POST['dob']));
    $time_diff = time() - 315360000;
    if ($dob >= $time_diff) {
        echo "not_valid_dob";
        return false;
    }
    $address = sanitize($_POST['address']);
    $city = sanitize($_POST['city']);
    $state = sanitize($_POST['state']);
    $pincode = sanitize($_POST['pincode']);
    $phone = sanitize($_POST['phone']);
    if (getUniqueMobile($phone) >= 1) {
        echo "duplicate_mobile";
        return false;
    }
    $email = sanitize($_POST['email']);
    if (getUniqueEmail($email) >= 1) {
        echo "duplicate_email";
        return false;
    }
    $standard = ($_POST['standard']);
    $marks = sanitize($_POST['marks']);
    $date = time();


    if (isset($_POST['id']) && $_POST['id'] != '') {
        $id = $_POST['id'];


        $sql = "UPDATE  `user_detail` SET `student_name` = '$student_name',`father_name` = '$father_name', `dob` = '$dob',`address`='$address' , `city`='$city',`state` = '$state',`pincode` = '$pincode',`phone` = '$phone',`email`= '$email',`class` = '$standard',`marks` = '$marks', `date` = '$date'  where `id` = '" . $id . "'";

        if (mysqli_query($conn, $sql)) {
            echo "Updated";
        } else {
            echo "Not_updated";
        }
    } else {
        $sql = "INSERT INTO `user_detail`(`student_name`,`father_name`,`dob`,`address`,`city`,`state`,`pincode`,`phone`,`email`,`class`,`marks`,`date`) VALUES ('$student_name','$father_name','$dob','$address','$state','$city','$pincode','$phone','$email','$standard','$marks','$date')";

        if (mysqli_query($conn, $sql)) {
            echo "done";
        } else {
            echo "not_done";
        }
    }
}
?>
