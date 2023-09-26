# Project Setup

## Prerequisites
- The project is built using PHP 8.1 and the latest Laravel framework (as of September 2023).
- Ensure you have a MySQL Database up and running.
- On macOS, [Laravel Herd](https://herd.laravel.com/) is recommended for a one-click PHP development environment.

## Setup Instructions

1. **Environment Configuration**:
   - Copy `.env.sample` to `.env`.
   - Update the `.env` file with your database connection settings.

2. **Install Laravel Dependencies**:
   ```bash
   composer install
   ```

3. **Database Setup**:
   - Run migrations:
     ```bash
     php artisan migrate
     ```
   - Seed the database with a default user:
     ```bash
     php artisan db:seed
     ```
     Default User Credentials:
     - Email: `test@example.com`
     - Password: `password`

4. **Install NPM Dependencies**:
   ```bash
   npm install
   ```
   This will install necessary dependencies like TailwindCSS, Alpine, Axios, etc.

5. **Start the Frontend**:
   ```bash
   npm run dev
   ```
   This command starts the frontend starter kit ([Breeze with blade](https://laravel.com/docs/10.x/starter-kits)).

6. **Start the Laravel App**:
   ```bash
   php artisan serve
   ```

---

You can now access the application in your browser. Enjoy developing!

---

Feel free to further customize this README as per your project's requirements.