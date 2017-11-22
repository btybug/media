<?php

namespace Btybug\Media\Providers;

use Illuminate\Support\ServiceProvider;

class ModuleServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the module services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadTranslationsFrom(__DIR__ . '/../Resources/Lang', 'media');
        $this->loadViewsFrom(__DIR__ . '/../Resources/Views', 'media');
        $tubs = [
            'module_settings' => [
                [
                    'title' => 'Media',
                    'url' => '/admin/media/settings',
                ]
            ]
        ];
        \Eventy::action('my.tab', $tubs);
        \Eventy::action('admin.menus', [
            "title" => "Media",
            "custom-link" => "",
            "icon" => "fa fa-film",
            "is_core" => "yes",
            "children" => [
                [
                    "title" => "Trash",
                    "custom-link" => "/admin/media/trash",
                    "icon" => "fa fa-trash",
                    "is_core" => "yes"
                ], [
                    "title" => "Settings",
                    "custom-link" => "/admin/media/settings",
                    "icon" => "fa fa-trash",
                    "is_core" => "yes"
                ]
            ]
        ]);

    }

    /**
     * Register the module services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);
    }
}
