<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        \Form::component('textInput', 'components.form.text', ['name', 'label', 'value' => null]);
        \Form::component('textField', 'components.form.textarea', ['name', 'label', 'value' => null]);
        \Form::component(
            'selectField',
            'components.form.select',
            [
                'name',
                'label',
                'list' => [],
                'selected' => null,
                'attributes' => [],
            ]
        );
    }
}
