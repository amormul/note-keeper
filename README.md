# 📝 NoteKeeper

**NoteKeeper** is a simple, web-based note-keeping system that provides user authentication, JSON-based data storage, and an intuitive interface. This project is built in PHP with Object-Oriented Programming (OOP) principles and an MVC (Model-View-Controller) architecture.

---

## 📋 Features

- **User Authentication**: Login and registration functionality with secure password hashing.
- **Note Management**: Users can create, view, and delete their notes.
- **JSON Data Storage**: Data is stored in JSON files instead of a traditional database.
- **Security Measures**: CSRF tokens, input validation, and XSS attack prevention.

---

## 🛠 Technologies

- **Language**: PHP
- **Architecture**: OOP with MVC structure
- **Data Storage**: JSON files
- **Session Management**: PHP-based session handling

---

## 📋 Screenshots

![image](https://github.com/user-attachments/assets/ddf518eb-7b2c-4922-90a5-73f4673af476)
![image](https://github.com/user-attachments/assets/e48b5ecf-0c44-445f-ad9e-4461c9d4462b)

---

## ⚙️ Project Structure

```plaintext
note-keeper/
├── public/                                    # Public directory for web server access
│   ├── add_note.php
│   ├── auth.php
│   ├── delete_note.php
│   ├── index.php 
│   ├── logout.php
│   └── register.php
│ 
├── src/                                       # Application core
│   ├── App/                                   # Core application logic
│   │   ├── Models/
│   │   │   ├── User.php
│   │   │   └── Note.php
│   │   ├── Views/
│   │   │   ├── auth/
│   │   │   │   ├── login.php
│   │   │   │   └── register.php
│   │   │   ├── notes/
│   │   │   │   └── dashboard.php
│   │   │   └── templates/
│   │   │   │   ├── header.php
│   │   │   │   └── footer.php
│   │   ├── Core/                              # Core components
│   │   │   └── App.php
└── data/
    ├── users.json                             # JSON file for storing user data
    └── notes.json                             # JSON file for storing notes
```

### Installation

1. Clone the repository:
   ```bash
   git clone https://github.com/amormul/magic-ball-interactive.git](https://github.com/amormul/note-keeper.git
   ```
---
