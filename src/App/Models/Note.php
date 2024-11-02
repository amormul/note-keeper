<?php
namespace App\Models;

class Note {
    private string $storage_file;
    private string $data_dir;

    /**
     * constructor for Note
     */
    public function __construct() {
        $this->data_dir = dirname(__DIR__, 3) . '/data';
        $this->storage_file = $this->data_dir . '/notes.json';
        $this->initializeStorage();
    }

    /**
     * function to initialize storage
     * @return void
     */
    private function initializeStorage(): void {
        // Create data directory if it doesn't exist
        if (!file_exists($this->data_dir)) {
            mkdir($this->data_dir, 0777, true);
        }

        // Create notes.json if it doesn't exist
        if (!file_exists($this->storage_file)) {
            file_put_contents($this->storage_file, json_encode([]));
            chmod($this->storage_file, 0666);
        }
    }

    /**
     * function to get all notes
     * @param string $user_id
     * @return array<int, array{id: string, user_id: string, text: string, created_at: string}>
     */
    public function getAllNotes(string $user_id): array {
        $notes = $this->readStorage();
        return array_values(array_filter($notes, fn($note) => $note['user_id'] === $user_id));
    }

    /**
     * function to add note
     * @param string $user_id
     * @param string $text
     * @return bool
     */
    public function addNote(string $user_id, string $text): bool {
        $notes = $this->readStorage();
        $notes[] = [
            'id' => uniqid(),
            'user_id' => $user_id,
            'text' => $text,
            'created_at' => date('Y-m-d H:i:s')
        ];
        return $this->writeStorage($notes);
    }

    /**
     * function to delete note
     * @param string $note_id
     * @param string $user_id
     * @return bool
     */
    public function deleteNote(string $note_id, string $user_id): bool {
        $notes = $this->readStorage();
        $notes = array_filter($notes, fn($note) => !($note['id'] === $note_id && $note['user_id'] === $user_id));
        return $this->writeStorage(array_values($notes));
    }

    /**
     * function to read storage
     * @return array
     */
    private function readStorage(): array {
        $content = file_get_contents($this->storage_file);
        if ($content === false) {
            return [];
        }
        return json_decode($content, true) ?? [];
    }

    /**
     * function to write storage
     * @param array $data
     * @return bool
     */
    private function writeStorage(array $data): bool {
        return file_put_contents($this->storage_file, json_encode($data)) !== false;
    }
}