# Laravel Dashboard with Metronic 6 Template.
This package is currently on development and It is now an offline package. To use this package we need to keep this package anywhere in the laravel root directory. I prefer it to keep it in a directory named `packages`.

`NB:` I have used Demo 12 of the Metronic 6 Template.

Now we need to make changes in our `composer.json`	
```json
"autoload-dev": {
    "psr-4": {
        "Tests\\": "tests/",
        "Anam\\Dashboard\\": "packages/dashboard/src/"
    }
},
```
We need to add the Service Provider in `config/app.php`

```php
'providers' => [
	...
	Anam\Dashboard\DashboardServiceProvider::class,
	...
],
```

After that we need to run the command:

``php artisan vendor:publish --tag=dashboard``

As this package has some dependencies we need to install them via Composer.

``composer require gajus/dindent yajra/laravel-datatables``

Everything is done!

We have used `yajra/laravel-datatables`so that we can publish the vendor of the datatables and customize the datatables.

``php artisan vendor:publish --tag=datatables``