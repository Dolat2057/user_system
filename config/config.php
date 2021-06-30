<?php   


function sanitize($data){
    global $conn;
    $data = trim($data);
    $data = htmlspecialchars($data);
    $data = mysqli_real_escape_string($conn,$data);
    return $data;
}
function getUniqueMobile($data){
    global $conn;
    $sql = "SELECT count(*) as count from `user_detail` where `phone` ='".$data."' ";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
    return $row['count'];

}

function getUniqueEmail($data){
    global $conn;
    $sql = "SELECT count(*) as count from `user_detail` where `email` ='".$data."' ";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
    return $row['count'];

    
}

?>