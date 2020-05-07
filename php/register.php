<?php
    include 'includes/autoload.inc.php';

    static $red = 'color: rgb(255, 97, 97);';
    $title = 'Register Form';
    $style = '<link rel="stylesheet" href="../css/register.css">';


    if (isset($_POST['RegisterButton'])) {
        $display = 'flex';
        $username = htmlspecialchars(strip_tags($_POST['username']));
        $password = htmlspecialchars(strip_tags($_POST['password']));
        $repassword = htmlspecialchars(strip_tags($_POST['repassword']));
        $email = htmlspecialchars(strip_tags($_POST['email']));

        $user = new UserController();
        if ($user->Register($username, $password, $repassword, $email) == 1) {
            $color = $red;
            $warning = 'Please enter requirement information below!';
        } 
        else if ($user->Register($username, $password, $repassword, $email) == 2) {
            $color = $red;
            $warning = 'The username already taken';
        } 
        else if ($user->Register($username, $password, $repassword, $email) == 3) {
            $color = $red;
            $warning = 'Both password is different';
        } 
        else if ($user->Register($username, $password, $repassword, $email) == 4) {
            $color = $red;
            $warning = 'Email already been registered or your email was not valid';
        }
        else {
            $color = 'background-color: rgb(15, 167, 15);';
            $warning = 'You have register successfully';
        }
    }
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