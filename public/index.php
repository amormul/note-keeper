<?php
namespace App;

session_start();
include_once '../src/App/Core/App.php';

use App\Core\App;

$app = new App();
$app->run();