# Laravel Mismar Module

The **Mismar Module** is an unofficial Laravel module providing API endpoints for managing orders, designed for easy integration into any Laravel project. Features include CRUD operations, RESTful API, and custom request validation.

> **Note:** This is an unofficial module for [Mismar](https://mismarapp.com/) and is not affiliated with or endorsed by Mismar.

## Features

- **CRUD Operations**: Create, read, update, and delete orders.
- **RESTful API**: Provides a clean and consistent API for managing orders.
- **Self-contained**: Easy to integrate into existing Laravel projects.
- **Custom Request Validation**: Uses custom request classes for validation.

## Installation

### Prerequisites

- Laravel 10.x
- PHP 8.0 or higher
- Composer

### Steps

1. **Clone the Repository:**

   Clone the repository to your local machine:

   ```bash
   git clone git@github.com:haniusif/mismar.git


2. **Copy the Module:**

    Copy the Mismar module into your Laravel project's modules directory:

    ```bash
    cp -r mismar/Mismar /path/to/your/laravel/project/modules/

3. **Register the Service Provider:**

Add the service provider to the config/app.php file to ensure it gets loaded by Laravel:

  ```bash
'providers' => [
    // Other Service Providers
    Modules\Mismar\Providers\MismarServiceProvider::class,
],


4. **Run Migrations:**

Run the migrations to create the necessary database tables:

  ```bash
php artisan migrate
