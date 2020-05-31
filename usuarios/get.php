<?php

require '../db.php';

$id = '';
if( empty($_GET["id"]) ===false ){
    $id= $_GET["id"];
}

$viaje = array();
if( empty($id) === false ){
    $sql = "select * from viajes where id= $id";
    $result = mysqli_query($db, $sql);
    
    if( $result ){
        $row = mysqli_fetch_assoc( $result );
        
        $viaje['count'] = mysqli_num_rows($result);
        $viaje['titulo'] = $row['titulo'];
        $viaje['comentario'] = $row['comentario'];
        $viaje['rankin'] = $row['rankin'];
        $viaje['foto'] = $row['foto'];
        
    }   
}

header('content-type: application/json');

echo json_encode($viaje);


?>