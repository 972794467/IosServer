<?php
    if(false == isset($_REQUEST['postId']))
    {
        exit;
    }
    require('verify.php');
    
    $fileName = dirname(__FILE__).'/src/image/'.$_REQUEST['postId'];
    echo file_get_contents($fileName, 'r');
    exit;
?>