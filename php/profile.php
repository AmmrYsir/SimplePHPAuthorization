<?php
    include 'includes/autoload.inc.php';
    $style = '<link rel="stylesheet" href="../css/profile.css">';
    $title = 'Your name | Profile'

?>

<?php ob_start() ?>
    
<?php $content = ob_get_clean(); ?>

<?php include '../template.php';