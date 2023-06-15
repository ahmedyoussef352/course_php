<?php


$requestname = "";

function filterRequset($requestname){
  
   return  htmlspecialchars(strip_tags($_POST[$requestname]));
}

define('MB' , 1048576);


function imageUpload($imageRequest)
{
  global $msgError;
  $imagename  = rand(1000, 10000) . $_FILES[$imageRequest]['name'];
  $imagetmp   = $_FILES[$imageRequest]['tmp_name'];
  $imagesize  = $_FILES[$imageRequest]['size'];
  $allowExt   = array("jpg", "png", "gif", "mp3", "pdf");
  $strToArray = explode(".", $imagename);
  $ext        = end($strToArray);
  $ext        = strtolower($ext);

  if (!empty($imagename) && !in_array($ext, $allowExt)) {
    $msgError = "EXT";
  }
  if ($imagesize > 2 * MB) {
    $msgError = "size";
  }
  if (empty($msgError)) {
    move_uploaded_file($imagetmp,  "../upload/" . $imagename);
    return $imagename;
  } else {
    return "fail";
  }
}
function deleteFile($dir, $imagename)
{
    if (file_exists($dir . "/" . $imagename)) {
        unlink($dir . "/" . $imagename);
    }
}

function checkAuthenticate(){
  if (isset($_SERVER['PHP_AUTH_USER'])  && isset($_SERVER['PHP_AUTH_PW'])) {
      if ($_SERVER['PHP_AUTH_USER'] != "ahmed" ||  $_SERVER['PHP_AUTH_PW'] != "ahmed1357911"){
          header('WWW-Authenticate: Basic realm="My Realm"');
          header('HTTP/1.0 401 Unauthorized');
          echo 'Page Not Found';
          exit;
      }
  } else {
      exit;
  }
}

// function imageUpload($imageRequest)
// {
//     global $msgError;
//     $imagename = $_FILES[$imageRequest]["name"];
//     $imagetmp = $_FILES[$imageRequest]["temp"];
//     $imagesize = $_FILES[$imageRequest]["size"];
//     $allowExt = array("jpg" , "png" , "gif" , "mp3" , "mp4" , "pdf");
//     $strToArray = explode("." , $imagename);
//     $ext = end($strToArray);
//     $ext = strtolower($ext);
//     if (!empty($imagename) && !in_array($ext , $allowExt)){
//         $msgError[] = "Ext";

//     }
//     if($imagesize > 2 * MB){
//         $msgError[] = "size"; 
//     }
//     if(empty($msgError)){
//     move_uploaded_file( $imagetmp , "upload/". $imagename);
//     } else {
//         echo "<pre>";
//         print_r($msgError);
//         echo "</pre>";
//     }

// }
//    function insertData($table, $data, $json = true)
// {
//     global $con;
//     foreach ($data as $field => $v)
//         $ins[] = ':' . $field;
//     $ins = implode(',', $ins);
//     $fields = implode(',', array_keys($data));
//     $sql = "INSERT INTO $table ($fields) VALUES ($ins)";

//     $stmt = $con->prepare($sql);
//     foreach ($data as $f => $v) {
//         $stmt->bindValue(':' . $f, $v);
//     }
//     $stmt->execute();
//     $count = $stmt->rowCount();
//     if ($json == true) {
//     if ($count > 0) {
//         echo json_encode(array("status" => "success"));
//     } else {
//         echo json_encode(array("status" => "failure"));
//     }
//   }
//     return $count;
// }
    





?>