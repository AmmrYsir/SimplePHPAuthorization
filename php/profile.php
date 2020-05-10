<?php
    include 'includes/autoload.inc.php';
    $style = '<link rel="stylesheet" href="../css/profile.css">';
    $title = 'Your name | Profile'

?>

<?php ob_start() ?>
    <header>
        <nav class="navbar">
            <h1 class="navbar-brand">PHP Authorization</h1>
            <ul>
                <li>Log Out</li>
            </ul>
        </nav>
    </header>
    <main>
        
    </main>
<?php $content = ob_get_clean(); ?>

<?php include '../template.php';