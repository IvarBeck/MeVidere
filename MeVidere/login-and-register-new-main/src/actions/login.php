<?php

require_once __DIR__ . '/../helpers.php';

$email = $_POST['email'] ?? null;
$password = $_POST['password'] ?? null;

if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    setOldValue('email', $email);
    setValidationError('email', 'Wrong email format');
    setMessage('error', 'Validation error');
    redirect('/');
}

$user = findUser($email);

if (!$user) {
    setMessage('error', "User $email not found");
    redirect('/');
}

if (!password_verify($password, $user['password'])) {
    setMessage('error', 'Wrong passsword');
    redirect('/');
}

$_SESSION['user']['id'] = $user['id'];

redirect('/home.php');