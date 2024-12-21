<?php

namespace Cws\Payments\Providers;

use Illuminate\Support\ServiceProvider;

class PaymentsProvider extends ServiceProvider
{
    /**
     * @return void
     */
    public function boot(): void
    {
        $packagePath = realpath(__DIR__.'/../../');

        $this->mergeConfigFrom("{$packagePath}/config/payments.php", 'payments');
        $this->publishes(["{$packagePath}/config/" => config_path()], ['config']);
        $this->loadMigrationsFrom("{$packagePath}/database/migrations");
        $this->loadRoutesFrom("$packagePath/routes/web.php");
    }
}