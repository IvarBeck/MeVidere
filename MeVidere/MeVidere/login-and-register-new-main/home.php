<?php
require_once __DIR__ . '/src/helpers.php';

checkAuth();

$user = currentUser();
?>

<!DOCTYPE html>
<html lang="ru" data-theme="light">
<?php include_once __DIR__ . '/components/head.php'?>
<body>







<div class="card home">
    <img
        class="avatar"
        src="<?php echo $user['avatar'] ?>"
        alt="<?php echo $user['name'] ?>"
    >
    <h1>Hello there, <?php echo $user['name'] ?>!</h1>
    <form action="src/actions/logout.php" method="post">
        <button role="button">Выйти из аккаунта</button>
    </form>
</div>


    <form class="card" action="src/actions/upload_avatar.php" method="post" enctype="multipart/form-data">
        <label for="avatar">Изображение профиля
            <input
                type="file"
                id="avatar"
                name="avatar"
                <?php echo validationErrorAttr('avatar'); ?>
            >
            <?php if(hasValidationError('avatar')): ?>
                <small><?php echo validationErrorMessage('avatar'); ?></small>
            <?php endif; ?>
        </label> 




        <button type="submit">Hochladen</button>

</form>

<form action="src/actions/upload_avatar.php" method="POST" enctype="multipart/form-data">
    <label for="avatar">Profilbild auswählen:</label>
    <input type="file" name="avatar" accept="image/*" required>
    <button type="submit">Hochladen</button>
</form>





<?php include_once __DIR__ . '/components/scripts.php' ?>
</body>
</html>