<?php

namespace Peaches\Lumineer;

/**
 * This file is part of Lumineer,
 * a role & permission management solution for Lumen.
 *
 * @license MIT
 * @package 19peaches\lumineer
 */

use Illuminate\Support\ServiceProvider;

class LumineerServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        // Publish config files
        $this->publishes([
            __DIR__.'/../config/config.php' => config_path('lumineer.php'),
        ]);

        // Register commands
        $this->commands('command.lumineer.migration');
        
        // Register blade directives
        $this->bladeDirectives();
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerLumineer();

        $this->registerCommands();

        $this->mergeConfig();
    }

    /**
     * Register the blade directives
     *
     * @return void
     */
    private function bladeDirectives()
    {
        // Call to Lumineer::hasRole
        \Blade::directive('role', function ($expression) {
            return "<?php if (\\Lumineer::hasRole{$expression}) : ?>";
        });

        \Blade::directive('endrole', function ($expression) {
            return "<?php endif; // Lumineer::hasRole ?>";
        });

        // Call to Lumineer::can
        \Blade::directive('permission', function ($expression) {
            return "<?php if (\\Lumineer::can{$expression}) : ?>";
        });

        \Blade::directive('endpermission', function ($expression) {
            return "<?php endif; // Lumineer::can ?>";
        });

        // Call to Lumineer::ability
        \Blade::directive('ability', function ($expression) {
            return "<?php if (\\Lumineer::ability{$expression}) : ?>";
        });

        \Blade::directive('endability', function ($expression) {
            return "<?php endif; // Lumineer::ability ?>";
        });
    }

    /**
     * Register the application bindings.
     *
     * @return void
     */
    private function registerLumineer()
    {
        $this->app->bind('Lumineer', function ($app) {
            return new Lumineer($app);
        });
        
        $this->app->alias('Lumineer', 'Peaches\Lumineer\Lumineer');
    }

    /**
     * Register the artisan commands.
     *
     * @return void
     */
    private function registerCommands()
    {
        $this->app->singleton('command.lumineer.migration', function ($app) {
            return new MigrationCommand();
        });
    }

    /**
     * Merges user's and Lumineer's configs.
     *
     * @return void
     */
    private function mergeConfig()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/config.php',
            'Lumineer'
        );
    }

    /**
     * Get the services provided.
     *
     * @return array
     */
    public function provides()
    {
        return [
            'command.lumineer.migration'
        ];
    }
}
