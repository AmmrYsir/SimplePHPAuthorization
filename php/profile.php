<?php
    include 'includes/autoload.inc.php';
    $style = '<link rel="stylesheet" href="../css/profile.css">';

?>

<?php ob_start() ?>

<?php $content = ob_get_clean(); ?>

<?php include '../template.php';