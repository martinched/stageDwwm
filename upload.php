<?php

if (isset($_FILES['photo']['name'])) {
    $response = "Réessayer...";
    
    if (move_uploaded_file($_FILES['photo']['tmp_name'],
			  'upload/'.$_FILES['photo']['name'])) {
	$response = "Photo bien ajoutée!";
    }
    echo $response;
    exit;
}

?>
