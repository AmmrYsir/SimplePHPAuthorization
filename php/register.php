<?php
    include 'includes/autoload.inc.php';

    $title = 'Register Form';
    $style = '<link rel="stylesheet" href="../css/register.css">';

    // !preg_match("/^[a-zA-Z0-9]*$/", $username)
?>


<?php ob_start() ?>
    <div class="container">
        <div class="container-head">
            <h1>Create Your Account</h1>
            <div class="container-warning" style="display:<?php echo $display ?>;<?= $color ?>">
                <p style="text-align: center;"><?= $warning ?></p>
            </div>
        </div>
        <form action="" method="POST" class="container-input">
            <div class="input">
                <label>Username <span style="color: rgb(255, 97, 97);">*</span></label>
                <input type="text" name="username" autocomplete="off">
            </div>
            <div class="input">
                <label>Password <span style="color: rgb(255, 97, 97);">*</span></label>
                <input type="password" name="password" autocomplete="off">
            </div>
            <div class="input">
                <label>Retype Password <span style="color: rgb(255, 97, 97);">*</span></label>
                <input type="password" name="repassword" autocomplete="off">
            </div>
            <div class="input">
                <label>Email <span style="color: rgb(255, 97, 97);">*</span></label>
                <input type="text" name="email" autocomplete="off">
            </div>
            <button type="Submit" name="RegisterButton">Register</button>
        </form>
    </div>
<?php $content = ob_get_clean() ?>

<?php include '../template.php';  ?>