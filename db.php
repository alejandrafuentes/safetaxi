<?php

$db = mysqli_connect( 'localhost', 'root', '', 'safetaxi');

if( !$db ){
    echo mysqli_connect_error();
    exit;
}


mysqli_set_charset($db, 'UTF8');
?>