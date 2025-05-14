<?php
require_once __DIR__ . '/src/helpers.php';

checkGuest();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Form login and password</title>
    <link rel="stylesheet" href="assets/css/logpass.css">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
</head>

<body>         
    <div class="wrapper" >
        <form action="src/actions/login.php" method="post">
            <h1>Login</h1>

            <?php if(hasMessage('error')): ?>
            <div class="notice error"><?php echo getMessage('error') ?></div>
            <?php endif; ?>

        <div class="input-box">
            <input 
                type="text" 
                id="email"
                name="email"              
                placeholder="email" 
                value="<?php echo old('email') ?>"
                <?php echo validationErrorAttr('email'); ?>
            >
            <i class='bx bx-user'></i>

            <?php if(hasValidationError('email')): ?>
            <small><?php echo validationErrorMessage('email'); ?></small>
            <?php endif; ?>

        </div>

        <div class="input-box">
            <input 
            type="password" 
            id="password"
            name="password"
            placeholder="password"
            >
            <i class="bx bxs-lock-alt" ></i>
        </div>
            <div class="remember">
            <label> <input type="checkbox">Remember me</label>
                <a href="#">Forgot password?</a>
        </div>
        
        <button type="submit" class="btn" id="submit">Login</button>
        
        <div class="register-link">
            <p>Don't have an account? <a href="/registration.php">Register</a></p>
        </div>
            
        </form>  
        
    </div>

    <?php include_once __DIR__ . '/components/scripts.php' ?>
</body>

</html>
