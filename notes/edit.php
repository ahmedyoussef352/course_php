<?php
include "../connect.php";

$noteid  = filterRequset("id");
$title  = filterRequset("title");
$content  = filterRequset("content");
$imagename  = filterRequset("imagename");
if(isset($_FILES['file'])){
    deleteFile("../upload" ,$imagename);
    $imagename = imageUpload("file");
    
}




$stmt = $con->prepare("UPDATE `notes` SET
 `notes_title`=?,`notes_content`=? , notes_image = ? WHERE `notes_id` =? ");
$stmt->execute(array( $title , $content , $imagename , $noteid ));
$count = $stmt->rowCount();
if($count>0){
    echo json_encode(array("status"=>"success"));
}else{
    echo json_encode(array("status"=>"failed"));
}
?>