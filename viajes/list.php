<?php  

require '../db.php';

$sql = 'select * from viajes where deleted=0';

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