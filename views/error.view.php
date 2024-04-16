
<?php 
$title = "liste des erreurs";

ob_start()
?>

<h1>Gestionnaire d'erreur</h1>
<p><?= $error ?></p>
<span><a href="mailto:/martin.dwwm@gmail.com">envoyer un message au developpeur</a></span>

<?php 
  
    $content = ob_get_clean();

        require('base.view.php');
?>