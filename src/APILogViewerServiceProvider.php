<?php
namespace DucLA\Admin\APILogViewer;

use Illuminate\Support\ServiceProvider;

class APILogViewerServiceProvider extends ServiceProvider
{
    /**
     * {@inheritdoc}
     */
    public static function boot()
    {
        static::registerRoutes();

        Admin::extend('api-log-viewer', __CLASS__);
    }

    /**
     * Register routes for laravel-admin.
     *
     * @return void
     */
    protected static function registerRoutes()
    {
        parent::routes(function ($router) {
            /* @var \Illuminate\Routing\Router $router */
            $router->get('api-logs', 'DucLA\Admin\APILogViewer\APILogViewer@index')->name('api-log-viewer-index');
        });
    }

    /**
     * {@inheritdoc}
     */
    public static function import()
    {
        parent::createMenu('API Log viewer', 'logs', 'fa-database');

        parent::createPermission('API Logs', 'ext.api-log-viewer', 'api-logs*');
    }
}