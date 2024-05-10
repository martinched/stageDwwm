
<?php 
$title = "liste des erreurs";

ob_start()
?>

<h2>Gestionnaire d'erreur</h2>
<p><?= $error ?></p>
<span><a href="mailto:/martin.dwwm@gmail.com">envoyer un message au developpeur</a></span>

<?php 
  
    $content = ob_get_clean();

        require('base.view.php');
?>
