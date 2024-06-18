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

1. **Copy the Module:**

   Go to module directory into your Laravel project's :

   ```bash
   cd  /path/to/your/laravel/modules/

   ```

2. **Clone the Repository:**

   Clone the repository to your local machine at (/path/to/your/laravel/modules/):

   ```bash
   git clone git@github.com:haniusif/mismar.git Mismar

   ```

3. **Ensure Composer Autoloading:**

   Edit the composer.json file to include the Modules namespace:

   ```bash
   "autoload": {
       "psr-4": {

           "Modules\\Mismar\\": "modules/Mismar/src/"
       }
    },

   ```

4. **Run composer dump-autoload:**

   ```bash
   composer dump-autoload

   ```

5. **Register the Service Provider:**

   Add the service provider to the config/app.php file to ensure it gets loaded by Laravel:

   ```bash
    'providers' => [
     // Other Service Providers
     Modules\Mismar\Providers\MismarServiceProvider::class,
    ],
   ```

4.**Run Migrations:**

Run the migrations to create the necessary database tables:

```bash
php artisan migrate
```



4.**Update .env file:**

Set live & staging token:

```bash
MISMAR_DEFAULT_STATUS=pending
MISMAR_LIVE_TOKEN=your_live_token_here
MISMAR_STAGING_TOKEN=your_staging_token_here
```





