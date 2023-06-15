<?php
include "connect.php";
// $stmt = $con->prepare("INSERT INTO `users`(`username`, `email`)
//  VALUES (?,?)");
// $stmt->execute(array('yasser','yasser@yahoo'));
//  $name = 'oyoyo';
//  $email = 'yoyoy@yahoo.com';
// $users = $stmt->fetchAll(PDO:: FETCH_ASSOC);
// $count  = $stmt->rowCount();

// if($count >0){
//     echo 'sucess';
// }
// else{
//     echo'failed';
// }



// echo json_encode($users);
// echo "<pre>";
// print_r($users);
// echo "</pre>";

$stmt  = $con->prepare("DELETE FROM `users` WHERE ?");
$stmt->execute(array(14));
$count  = $stmt->rowCount();

if($count >0){
    echo 'sucess';
}
else{
    echo'failed';
}



?>