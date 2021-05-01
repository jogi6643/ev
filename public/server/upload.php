<?php


$ds = DIRECTORY_SEPARATOR;  //1
$storeFolder = 'uploads';


extract($_POST);
$error=array();
$extension=array("jpeg","jpg","png","gif");

foreach($_FILES["files"]["tmp_name"] as $key=>$tmp_name) {
    $file_name=$_FILES["files"]["name"][$key];
    $file_tmp=$_FILES["files"]["tmp_name"][$key];
    $ext=pathinfo($file_name,PATHINFO_EXTENSION);

    if(in_array($ext,$extension)) {
        if(!file_exists($storeFolder."/".$file_name)) {
            move_uploaded_file($file_tmp,$storeFolder."/".$file_name);
            echo $file_name;
        }
        else {
            $filename=basename($file_name,$ext);
            $newFileName=$filename.time().".".$ext;
            move_uploaded_file($file_tmp,$storeFolder."/".$newFileName);
            echo $newFileName;
        }
    }else{
        echo 'FAILED';
        }
    }




// if (!empty($_FILES)) {

//     foreach($_FILES['files']['tmp_name'] as $key => $fileValue){

//             $tempFile = $_FILES['files']['tmp_name'][$key];
//             $file_name = $_FILES['files']['name'][$key];
//             $ext = pathinfo($file_name, PATHINFO_EXTENSION);

//             // if(filesize($tempFile) > 5000000){
//             //     echo 'FAILED';
//             //     die();
//             // }

//             if($ext == 'jpg' || $ext == 'png' || $ext == 'JPG' || $ext == 'PNG'){
//                 $new_file_name = time().'.'.$ext;
//                 $targetPath = 'uploads/';  //4
//                 $targetFile =  $targetPath. $new_file_name;  //5

//                 if ($img = @imagecreatefromstring(file_get_contents($tempFile))) {
//                     $upload_result = move_uploaded_file($tempFile,$targetFile); //6
//                     return  $new_file_name;
//                 }else{
//                     echo 'FAILED';
//                 }
//             }else{
//                 echo 'FAILED';
//             }


//     }

   

// }




