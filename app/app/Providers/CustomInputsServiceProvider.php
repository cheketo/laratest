<?php

namespace App\Providers;

use Form;

use Illuminate\Support\ServiceProvider;

class CustomInputsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {

				Form::component( 'chosen', 'components.chosen', [ 'name' => null, 'options' => array(), 'value' => null, 'params' => array() ] );

				Form::component( 'multiple', 'components.multiple', [ 'name' => null, 'options' => array(), 'values' => array(), 'params' => array() ] );

				Form::component( 'autocomplete', 'components.autocomplete',[ 'name' => null, 'values' => array(), 'params' => array() ] );

				Form::component( 'datepicker', 'components.datepicker',[ 'name' => null, 'value' => null, 'params' => array() ] );

				Form::component( 'hint', 'components.hint',[ 'text', 'position' => 'bottom-right', 'icon' => 'question-circle', 'icon' => 'fa fa-question-circle' , 'color' => 'blue', 'background' => 'info', 'effect' => 'bounce' ] );

				Form::component( 'icheckbox', 'components.icheckbox',[ 'name', 'value' => null, 'checked' => false, 'params' => array() ] );

				Form::component( 'iradio', 'components.iradio',[ 'name', 'value' => null, 'checked' => false, 'params' => array() ] );

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
