<?php
namespace App;

session_start();
include_once '../src/App/Models/User.php';

use App\Models\User;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';

    // Validate input
    if (empty($username) || empty($password)) {
        header('Location: register.php?error=empty_fields');
        exit;
    }

    if ($password !== $confirm_password) {
        header('Location: register.php?error=password_mismatch');
        exit;
    }

    $user = new User();
    if ($user->register($username, $password)) {
        header('Location: index.php?success=registered');
    } else {
        header('Location: register.php?error=username_exists');
    }
    exit;
} else {
    include_once '../src/App/Views/auth/register.php';
}