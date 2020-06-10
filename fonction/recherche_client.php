<?php 

include 'connect.php';

$id_client = $_GET['id_client'];

$select_client = "select fidelise from client where id = $id_client";
    
    $result = executeSQL($select_client);
    
    if($result) {
            while ($row = mysqli_fetch_array($result)) {
                if($row['fidelise'] == 1){
                    true;
                } else {
                    false;
                }
            }
    }

?>