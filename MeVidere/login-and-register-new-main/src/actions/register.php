<?php

require_once __DIR__ . '/../helpers.php';

// Выносим данных из $_POST в отдельные переменные

$avatarPath = null;
$name = $_POST['name'] ?? null;
$email = $_POST['email'] ?? null;
$password = $_POST['password'] ?? null;
$passwordConfirmation = $_POST['password_confirmation'] ?? null;
$avatar = $_FILES['avatar'] ?? null;

// Выполняем валидацию полученных данных с формы

if (empty($name)) {
    setValidationError('name', 'Wrong username');
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    setValidationError('email', 'Wrong email');
}

if (empty($password)) {
    setValidationError('password', 'Password empty');
}

if ($password !== $passwordConfirmation) {
    setValidationError('password', 'Passwords do not match');
}

if (!empty($avatar)) {
    $types = ['image/jpeg', 'image/png'];

    if (!in_array($avatar['type'], $types)) {
        setValidationError('avatar', 'Wrong image type');
    }

    if (($avatar['size'] / 1000000) >= 1) {
        setValidationError('avatar', 'Wrong image size (>1mb)');
    }
}

// Если список с ошибками валидации не пустой, то производим редирект обратно на форму

if (!empty($_SESSION['validation'])) {
    setOldValue('name', $name);
    setOldValue('email', $email);
    redirect('/registration.php');
}

//  Загружаем аватарку, если она была отправлена в форме

if (!empty($avatar)) {
    $avatarPath = uploadFile($avatar, 'avatar');
}

$pdo = getPDO();

$query = "INSERT INTO users (name, email, avatar, password) VALUES (:name, :email, :avatar, :password)";

$params = [
    'name' => $name,
    'email' => $email,
    'avatar' => $avatarPath,
    'password' => password_hash($password, PASSWORD_DEFAULT)
];

$stmt = $pdo->prepare($query);

try {
    $stmt->execute($params);
} catch (\Exception $e) {
    die($e->getMessage());
}

redirect('/');
