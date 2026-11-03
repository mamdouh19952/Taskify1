# Taskify — To-Do App (PHP & MySQL)

A multi-user task manager built with plain PHP and MySQL. Each user registers, logs in, and manages a private list of tasks.

## Features

- **Authentication:** register, log in, log out, with passwords hashed using `password_hash` / `password_verify`
- **Private task lists:** every query is scoped to the logged-in user (`user_id`)
- **Full CRUD:** add, edit, and delete tasks
- **Status toggle:** mark a task as `pending` or `done`
- **Validation and feedback:** input trimming and escaping, plus error and success pages
- **404 page** for unknown routes

## Tech Stack

| Area | Tools |
|---|---|
| Language | PHP (procedural) |
| Database | MySQL via MySQLi |
| Auth | PHP sessions |
| Frontend | HTML, CSS |

## Project Structure

```
auth/     register, login, logout handlers
tasks/    list, store, edit, update, toggle, delete
inc/      DB connection, auth guard, helper functions, header/footer
db/       SQL schema (users, tasks)
errors/   error, success, and 404 pages
front/    static HTML design templates
assets/   styles
```

## Getting Started

Requirements: PHP 8+, MySQL, and a local server such as XAMPP or MAMP.

1. Copy the project into your server folder (for example `htdocs/taskify`).
2. Import `db/queries.sql` into MySQL. It creates the `taskify` database with the `users` and `tasks` tables.
3. Check the credentials in `inc/conn.php` (defaults: host `localhost`, user `root`, empty password).
4. Open `http://localhost/taskify/auth/register.php`, create an account, and start adding tasks.

## Notes

This is a learning project. Queries are written with plain MySQLi and input sanitizing. Moving to prepared statements and a CSRF token is the next improvement.

## Author

**Mamdouh Mahmoud** — Full Stack Developer (Laravel · Vue)
[LinkedIn](https://linkedin.com/in/mamdouh-mahmoud) · [Portfolio](https://mamdouh19952.github.io/portfolio/)
