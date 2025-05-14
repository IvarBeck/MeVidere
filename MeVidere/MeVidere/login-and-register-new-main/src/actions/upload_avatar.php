<?php

require_once __DIR__ . '/../config.php'; // DB-Zugangsdaten
require_once __DIR__ . '/../helpers.php'; // z. B. getPDO()

$userId = $_SESSION['user']['id'] ?? null; // oder wie auch immer du den Nutzer speicherst
$avatar = $_FILES['avatar'] ?? null;



if (!empty($avatar)) {
    $types = ['image/jpeg', 'image/png'];

    if (!in_array($avatar['type'], $types)) {
        setValidationError('avatar', 'Wrong image type');
    }

    if (($avatar['size'] / 1000000) >= 1) {
        setValidationError('avatar', 'Wrong image size (>1mb)');
    }
}

//  Загружаем аватарку, если она была отправлена в форме

if (!empty($avatar)) {
    $avatarPath = uploadFile($avatar, 'avatar');
}

$pdo = getPDO();
$stmt = $pdo->prepare("UPDATE users SET avatar = ? WHERE id = ?");
$stmt->execute([$avatarPath, $userId]);

redirect('/home.php');