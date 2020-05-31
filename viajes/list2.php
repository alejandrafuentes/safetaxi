<?php  

require '../db.php';

$id = '';
if( empty($_GET["id"]) ===false ){
    $id= $_GET["id"];
}

$sql = "select * from viajes where deleted=0 and id_usuario= '$id'";

$result = mysqli_query($db, $sql);

$viajes = array();
if( $result ){
    while( $row= mysqli_fetch_assoc($result) ){
        
        $id = (int) $row['id'];
        
        $viajes[] = array (
            'id' => $id, 
            'titulo' => $row['titulo'] 
        );
    }
    
}

header('content-type: application/json');
echo json_encode( $viajes );

?>