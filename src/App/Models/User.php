<?php
namespace App\Models;

class User {
    private string $storage_file;
    private string $data_dir;

    /**
     * constructor for User
     * @return void
     */
    public function __construct() {
        $this->data_dir = dirname(__DIR__, 3) . '/data';
        $this->storage_file = $this->data_dir . '/users.json';
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

        // Create users.json if it doesn't exist
        if (!file_exists($this->storage_file)) {
            file_put_contents($this->storage_file, json_encode([]));
            chmod($this->storage_file, 0666);
        }
    }

    /**
     * function to register user
     * @param string $username
     * @param string $password
     * @return bool
     */
    public function register(string $username, string $password): bool {
        $users = $this->readStorage();

        if ($this->usernameExists($username, $users)) {
            return false;
        }

        $users[] = [
            'id' => uniqid(),
            'username' => $username,
            'password' => password_hash($password, PASSWORD_DEFAULT)
        ];

        return $this->writeStorage($users);
    }

    /**
     * function to authenticate user
     * @param string $username
     * @param string $password
     * @return array{id: string, username: string}|false
     */
    public function authenticate(string $username, string $password) {
        $users = $this->readStorage();

        foreach ($users as $user) {
            if ($user['username'] === $username && password_verify($password, $user['password'])) {
                return [
                    'id' => $user['id'],
                    'username' => $user['username']
                ];
            }
        }

        return false;
    }

    /**
     * function to check if username exists
     * @param string $username
     * @param array<int, array{id: string, username: string, password: string}> $users
     * @return bool
     */
    private function usernameExists(string $username, array $users): bool {
        foreach ($users as $user) {
            if ($user['username'] === $username) {
                return true;
            }
        }
        return false;
    }

    /**
     * function to read storage
     * @return array<int, array{id: string, username: string, password: string}>
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
     * @param array<int, array{id: string, username: string, password: string}> $data
     * @return bool
     */
    private function writeStorage(array $data): bool {
        return file_put_contents($this->storage_file, json_encode($data)) !== false;
    }
}