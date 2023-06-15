<?php
include "../connect.php";
$userid  = filterRequset("id");
$stmt = $con->prepare(" SELECT * FROM `notes` WHERE `notes_users` = ? ");
$stmt->execute(array($userid));
$data  = $stmt->fetchAll(PDO::FETCH_ASSOC);
$count = $stmt->rowCount();
if($count>0){
    echo json_encode(array("status"=>"success" , "data" => $data));
}else{
    echo json_encode(array("status"=>"failed"));
}
?>