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

- **Language**: PHP (no database required)
- **Architecture**: OOP with MVC structure
- **Data Storage**: JSON files
- **Session Management**: PHP-based session handling

---

## ⚙️ Project Structure

```plaintext
project-root/
├── public/                     # Public directory for web server access
│   ├── index.php               # Main entry point
│   ├── login.php               # Login page
│   ├── register.php            # Registration page
│   └── assets/
│       ├── css/                # Styles
│       │   └── styles.css
│       └── js/                 # JavaScript files (if needed)
├── src/                        # Application core
│   ├── App/                    # Core application logic
│   │   ├── Controllers/        # Controllers
│   │   │   ├── AuthController.php      # Login and registration logic
│   │   │   └── NoteController.php      # Note management logic
│   │   ├── Models/             # Models (data handling)
│   │   │   ├── User.php                # User model
│   │   │   └── Note.php                # Note model
│   │   ├── Views/              # Views
│   │   │   ├── auth/                   # Authentication views
│   │   │   ├── notes/                  # Note views
│   │   │   └── partials/               # Partials (header, footer, etc.)
│   │   ├── Core/               # Core components
│   │   │   ├── Storage.php              # File storage handling
│   │   │   ├── Session.php              # User session handling
│   │   │   └── App.php                  # Application setup and routing
└── data/
    ├── users.json              # JSON file for storing user data
    └── notes.json              # JSON file for storing notes
