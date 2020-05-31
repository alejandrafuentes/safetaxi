<?php

require '../db.php';

$id = '';
if( empty($_GET["id"]) ===false ){
    $id= $_GET["id"];
}

$viaje = array();
if( empty($id) === false ){
    $sql = "select id_usuario from viajes where id= $id";
    $result = mysqli_query($db, $sql);
    
    if( $result ){
        $row = mysqli_fetch_assoc( $result );
        
        $viaje['id_usuario'] = $row['id_usuario'];
        
    }   
}

header('content-type: application/json');

echo json_encode($viaje);


?>