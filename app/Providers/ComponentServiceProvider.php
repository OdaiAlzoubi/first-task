<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class ComponentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Input Components
        Blade::component('components.input.form', 'form');
        Blade::component('components.input.input', 'input');
        Blade::component('components.input.select', 'select');
        Blade::component('components.input.textarea', 'textarea');
        Blade::component('components.action-button.edit', 'action-edit');

        // Table Components
        Blade::component('components.table.table', 'table');
        Blade::component('components.table.partials.tr', 'table-tr');
        Blade::component('components.table.partials.td', 'table-td');
        Blade::component('components.table.partials.th', 'table-th');
        Blade::component('components.table.partials.thead', 'table-thead');
        Blade::component('components.table.partials.tbody', 'table-tbody');
        Blade::component('components.table.partials.action', 'table-action');

        // Page Components
        Blade::component('components.pages.index.index', 'page-index');
        Blade::component('components.pages.edit.edit', 'page-edit');
        Blade::component('components.pages.create.create', 'page-create');
        Blade::component('components.pages.show.show', 'page-show');

        // Page Index Components
        Blade::component('components.pages.index.header', 'page-index-header');
        Blade::component('components.pages.index.body', 'page-index-body');

        // Page Create Components
        Blade::component('components.pages.create.header', 'page-create-header');
        Blade::component('components.pages.create.body', 'page-create-body');

        // Page Edit Components
        Blade::component('components.pages.edit.header', 'page-edit-header');
        Blade::component('components.pages.edit.body', 'page-edit-body');
    }
}
