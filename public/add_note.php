<?php
namespace App;

session_start();
include_once '../src/App/Models/Note.php';

use App\Models\Note;

if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $note = new Note();
    $note->addNote($_SESSION['user_id'], $_POST['note_text']);
    header('Location: index.php');
}