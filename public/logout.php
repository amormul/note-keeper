<?php
namespace App;

session_start();
session_destroy();
header('Location: index.php');