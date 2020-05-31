<?php

require '../db.php';

$post = empty($_POST) ? json_decode(file_get_contents('php://input'), true) : $_POST;

$email      = $post['email'];
$pass       = $post['pass'];
$id         = $post['idFB'];

$response = array('saved' => false, 'message' => 'N/A');

if( ! empty($id) ){
    $insert="insert into usuarios (id,email,pass,nombre) values ( '$id','$email','$pass','PRUEBA') ";
    
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