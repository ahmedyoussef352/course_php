<?php
include "../connect.php";
$username  =filterRequset("username");
$email  = filterRequset("email");
$password  =filterRequset("password");
$stmt = $con->prepare("INSERT INTO `users`( `username`, `email`, `password`) VALUES (?,?,?)");
$stmt->execute(array($username,$email,$password));
$count = $stmt->rowCount();
if($count>0){
    echo json_encode (array("status"=>"success"));
}else{
    echo json_encode(array("status"=>"failed"));
}

// include "../connect.php";
// $username = filterRequset("username");
// $email = filterRequset("email");
// $password= filterRequset("password");
// // $phone = filterRequest("phone");
// // $verifycode = "0";
// $stmt = $con->prepare("INSERT INTO `users`( `username`, `email`, `password`) VALUES (?,?,?)");

// $stmt->execute(array($username,$email,$password));
// $count = $stmt->rowCount();
// if($count >0){
//     printFailer("PHONE OR EMAIL");
// }
// else{
//     $data = array(
//         "users_name" => $username,
//         "users_password" => $password,
//         "users_email" => $email,
//         "users_phone" => $phone,
//         "users_verifycode" => "0",
//     );
//     insertData("users",$data);
// }
?>