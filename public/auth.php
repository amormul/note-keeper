<?php
namespace App;

session_start();
include_once '../src/App/Models/User.php';

use App\Models\User;

$user = new User();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if ($userData = $user->authenticate($username, $password)) {
        $_SESSION['user_id'] = $userData['id'];
        $_SESSION['username'] = $userData['username'];
        header('Location: index.php');
    } else {
        header('Location: index.php?error=invalid_credentials');
    }
}