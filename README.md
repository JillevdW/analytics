## Basic installation

`composer require jvdw/app-analytics`

Add the following line to the `providers` array in your `config/app.php`: `Jvdw\Analytics\AnalyticsServiceProvider::class`



Run the following command to add a metric you want to start tracking:

`php artisan app-analytics:metric <name>`

