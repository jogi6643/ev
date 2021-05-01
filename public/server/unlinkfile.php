<?php

$storeFolder = 'uploads';   //2

if (isset($_POST['status']) == '1') {

    $fileValue =$_REQUEST['fileValue'];

    unlink($storeFolder.'/'.$fileValue);

    echo "success";
   
}




