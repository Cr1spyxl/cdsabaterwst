# Daymark — Task Management System

A small CodeIgniter 4 task app with a Today page, complete task list, demo profile, and developer About page.

## Run locally with XAMPP

1. Start Apache and MySQL.
2. In phpMyAdmin or the MySQL console, create the configured database:

   ```sql
   CREATE DATABASE ci4task CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
   ```

   The default local connection is `localhost`, user `root`, with a blank password. Update `app/Config/Database.php` if your MySQL credentials differ.
3. From this project directory, create the tables and demo data:

   ```sh
   php spark migrate
   php spark db:seed DemoSeeder
   ```

   The migration creates the `tasks` and `users` tables. The seeder adds eight tasks across four dates (including today in Asia/Manila) and one demo user when the tables are empty.
4. Point your web server document root to `public/`, or run the built-in server:

   ```sh
   php spark serve
   ```

## Pages

- `/` — today’s tasks only
- `/tasks` — all tasks, ordered by date
- `/profile` — the demo user’s profile
- `/about` — developer and project information

On the Today and All tasks pages, you can add a task, mark it complete or reopen it, and delete it. The All tasks form also lets you choose its date. The task and user table definitions are maintained in `app/Database/Migrations`; their models are in `app/Models`.
