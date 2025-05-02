# PHPAuthSystem

A simple PHP & MySQL-based login/register system with role-based access control (`admin` and `user`).

## 🔧 Features

- User registration & login
- Role-based redirection (admin & user dashboards)
- Secure session management
- Clean UI with CSS styling
- Easy to configure

## 🚀 How to Run

1. Open **phpMyAdmin** and import the `users_db.sql` file to create the database and table.
2. Edit the `config.php` file with your local database credentials:
   ```php
   $host = "localhost";
   $user = "root";
   $pass = "";
   $db   = "users_db";
## 📁 Folder Structure

PHPAuthSystem/
│
├── index.php
├── landr.php
├── logout.php
├── admin_page.php
├── user_page.php
├── config.php
├── users_db.sql
│
├── css/
│   └── style.css
├── js/
│   └── main.js
