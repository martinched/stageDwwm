
<?php 
$title = "liste des erreurs";

ob_start()
?>

<h1>Gestionnaire d'erreur</h1>
<p><?= $error ?></p>
    
<?php 
  
    $content = ob_get_clean();

        require('base.view.php');
?>