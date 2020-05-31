<?php

require '../db.php';

$post = empty($_POST) ? json_decode(file_get_contents('php://input'), true) : $_POST;

$id = 0;
if( !empty($post['id']) ){
    $id = $post['id'];
}

$titulo     = $post['titulo'];
$comentario = $post['comentario'];
$rankin     = $post['rankin'];
$foto       = $post['foto'];
$idFB       = $post['idFB'];
$taxi       = $post['taxi'];


$response = array('saved' => false, 'message' => 'N/A');

if( !empty($id) ){
    
    $update="update viajes set 
            taxi= '$taxi',
            titulo= '$titulo', 
            comentario= '$comentario', 
            rankin= $rankin, 
            foto= '$foto',
            updated= NOW()
            where id= $id";
    
    $result= mysqli_query($db, $update);
    
    if( $result ){
        $response['saved'] = true;
        $response['message']= 'Se ha guardado la información';
    }else{
        $response['message'] = 'Error en la bd: '. $update;
    }
    
    
}else{
    /*AQUI VA EL INSERT, EL ID NO VIENE POR LO QUE ES UN NUEVO REGISTRO*/
    
    $insert="insert into viajes (taxi, id_usuario, titulo,comentario,rankin,foto,created) values ('$taxi','$idFB','$titulo','$comentario',$rankin,'$foto', NOW()) ";
    
    $result= mysqli_query($db, $insert);
    
    if( $result ){
        $response['saved'] = true;
        $response['message']= 'Se ha guardado la información';
    }else{
        $response['message'] = 'Error en la bd: '. $insert;
    }
}

header('content-type: application/json');
echo json_encode( $response );

?>