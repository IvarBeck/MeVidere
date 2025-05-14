<?php
require_once __DIR__ . '/src/helpers.php';

checkGuest();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Form Registration</title>
    <link rel="stylesheet" href="assets/css/logpass.css">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
</head>


<body>  
    <form class="card" action="src/actions/register.php" method="post" enctype="multipart/form-data">      

    <div class="wrapper" >

            <h1>Registration</h1>

        <div class="input-box">
            <input 
                type="text" 
                id="name"
                name="name"              
                placeholder="Username" 
                value="<?php echo old('name') ?>"
                <?php echo validationErrorAttr('name'); ?>
            >
            <i class='bx bx-user'></i>

            <?php if(hasValidationError('name')): ?>
            <small><?php echo validationErrorMessage('name'); ?></small>
            <?php endif; ?>

        </div>

        <div class="input-box">
            <input 
                type="text" 
                id="email"
                name="email"              
                placeholder="christian.eats@men.butts" 
                value="<?php echo old('email') ?>"
                <?php echo validationErrorAttr('email'); ?>
            >
            <i class='bx bx-user'></i>

            <?php if(hasValidationError('email')): ?>
                <small><?php echo validationErrorMessage('email'); ?></small>
            <?php endif; ?>

        </div>

        <!-- <label for="avatar">Изображение профиля
        <input
            type="file"
            id="avatar"
            name="avatar"
            <?php echo validationErrorAttr('avatar'); ?>
        >
        <?php if(hasValidationError('avatar')): ?>
            <small><?php echo validationErrorMessage('avatar'); ?></small>
        <?php endif; ?>
    </label> -->

        <div class="input-box">
            <input 
            type="password" 
            id="password"
            name="password"
            placeholder="password"
            <?php echo validationErrorAttr('password'); ?>
            >
            <?php if(hasValidationError('password')): ?>
                <small><?php echo validationErrorMessage('password'); ?></small>
            <?php endif; ?>
            <i class="bx bxs-lock-alt" ></i>
        </div>


        <div class="input-box">
            <input 
            type="password" 
            id="password_confirmation"
            name="password_confirmation"
            placeholder="repeat password"
            >
            <i class="bx bxs-lock-alt" ></i>
        </div>


        <div class="remember">
            <label> <input type="checkbox">Remember me</label>
            <a href="#">Forgot password?</a>
        </div>
        
        <div class="remember">
            <label> <input type="checkbox"
            id="terms"
            name="terms">I accept the terms of agreement</label>
        </div>



        <button type="submit" class="btn" id="submit" disabled>Register</button>
        
        <div class="register-link">
            <p>Already have an account? <a href="/index.php">Log in</a></p>
        </div>
            
 
    </div>
</body>
<?php include_once __DIR__ . '/components/scripts.php' ?>
</html>
