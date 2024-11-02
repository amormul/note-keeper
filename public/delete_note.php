<?php
namespace App;

session_start();
include_once '../src/App/Models/Note.php';

use App\Models\Note;

if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['note_id'])) {
    $note = new Note();
    $note->deleteNote($_POST['note_id'], $_SESSION['user_id']);
    header('Location: index.php');
}