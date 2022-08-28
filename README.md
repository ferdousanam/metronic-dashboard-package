# Laravel Dashboard with Metronic 6 Template.
This package is currently on development and It is now an offline package. To use this package we need to keep this package anywhere in the laravel root directory. I prefer it to keep it in a directory named `packages`.

`NB:` I have used Demo 12 of the Metronic 6 Template.

Now we need to make changes in our `composer.json`	
```json
{
    "repositories": [
        {
            "type": "vcs",
            "url": "git@github.com:ferdousanam/metronic-dashboard-package.git"
        }
    ]
}
```

### Install via composer
```bash
composer require ferdousanam/dashboard
```

We need to add the Service Provider in `config/app.php` for laravel `version < 6`

```php
'providers' => [
	...
	Anam\Dashboard\DashboardServiceProvider::class,
	...
],
```

We have to add `admin` guard in `config/auth.php`

```php
'guards' => [
    ...
    'admin' => [
        'driver' => 'session',
        'provider' => 'admins',
    ],
    ...
],
```

```php
'providers' => [
    ...
    'admins' => [
        'driver' => 'eloquent',
        'model' => App\Models\Admin\User::class,
    ],
    ...
],
```

```php
'passwords' => [
    ...
    'admins' => [
        'provider' => 'admins',
        'table' => 'password_resets',
        'expire' => 60,
        'throttle' => 60,
    ],
    ...
],
```

- After that we need to run these command:
    ```bash
    composer dump-autoload
    ```
    ```bash
    php artisan vendor:publish --tag=dashboard
    ```
  Or, Using Flags:
    ```bash
    php artisan vendor:publish --tag=dashboard:config
    ```
    ```bash
    php artisan vendor:publish --tag=dashboard:starter
    ```
    ```bash
    php artisan vendor:publish --tag=dashboard:models
    ```
    ```bash
    php artisan vendor:publish --tag=dashboard:assets
    ```
- As this package has some dependencies we need to install them via Composer.
    ```bash
    composer require gajus/dindent yajra/laravel-datatables
    ```
- Make sure you have installed the `laravel/ui` package. You can install it by running the command below.
    ```bash
    composer require laravel/ui
    ```
- We need to migrate and run Seeder now.
    ```bash
    php artisan migrate --seed
    ```
    ```bash
    php artisan seed:dash
    ```
## Everything is complete!
We have used `yajra/laravel-datatables`so that we can publish the vendor of the datatables and customize the datatables.
```bash
php artisan vendor:publish --tag=datatables
```
