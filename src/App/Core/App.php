<?php
namespace App\Core;

include_once dirname(__DIR__) . '/Models/Note.php';

use App\Models\Note;

class App {
    private bool $isAuthenticated;

    public function __construct() {
        $this->isAuthenticated = isset($_SESSION['user_id']);
    }

    public function run(): void {
        if ($this->isAuthenticated) {
            $note = new Note();
            $notes = $note->getAllNotes($_SESSION['user_id']);
            include_once '../src/App/Views/notes/dashboard.php';
        } else {
            include_once '../src/App/Views/auth/login.php';
        }
    }
}