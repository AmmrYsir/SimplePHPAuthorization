<?php 
    include 'includes/autoload.inc.php';

    $title = 'Login Home';
    $style = '<link rel="stylesheet" href="../css/login.css">';
    $warning = '';
    

?>

<?php ob_start() ?>
<div class="container">
    <div class="container-head">
        <h1>Login Form</h1>
        <div class="container-warning" style="<?= $display ?>;<?= $color ?>"> <?= $warning ?> </div>
    </div>
    <form class="container-body" action="" method="POST">
        <div class="container-input">
            <label for="username">Username <span style="color:red;">*</span></label>
            <input type="text" name="username">
        </div>
        <div class="container-input">
            <label for="password">Password <span style="color:red;">*</span></label>
            <input type="password" name="password">
        </div>
        <div class="container-a">
            <a href="login.php">I forgot my password</a>
        </div>
        <div class="container-button">
            <button type="Submit" name="LoginButton">Login</button>
        </div>
    </form>
</div>
<?php $content = ob_get_clean(); ?>

<?php include '../template.php';