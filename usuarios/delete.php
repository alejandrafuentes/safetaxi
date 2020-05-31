<?php

require '../db.php';

$post = empty($_POST) ? json_decode(file_get_contents('php://input'), true) : $_POST;

$id = 0;
if( !empty($post['id']) ){
    $id = $post['id'];
}

$response = array('deleted' => false, 'message' => 'N/A');

if( !empty($id) ){
    
    $delete="update viajes set deleted= 1 where id= $id";
    
    $result= mysqli_query($db, $delete);
    
    if( $result ){
        $response['deleted'] = true;
        $response['message']= 'Se ha eliminado la información';
    }else{
        $response['message'] = 'Error en la bd: '. $delete;
    }
    
    
}

header('content-type: application/json');
echo json_encode( $response );

?>