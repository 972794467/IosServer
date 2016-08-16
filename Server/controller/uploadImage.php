<?php
    if(false == isset($_REQUEST['postId']))
    {
        exit;
    }
    require('verify.php');

    $fileName = dirname(__FILE__).'/src/image/'.$_REQUEST['postId'];
    $data = file_get_contents('php://input', 'r');
    $fp = fopen($fileName,'w');
    if ($fp)
    {
        fwrite($fp, $data);
        fclose($fp);
    }
?>