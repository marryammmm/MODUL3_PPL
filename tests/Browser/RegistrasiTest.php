<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class RegistrasiTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testregistrasi(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(url:'/register')
                    ->type(field:'name', value: __('maryam'))
                    ->type(field:'email', value: __('maryam@gmail.com'))
                    ->type(field:'password', value: __('12345678'))
                    ->type(field:'password_confirmation', value:__('12345678'))
                    ->press(button:'REGISTER')
                    ->assertPathIs(path:'/register');
        });
    }
}

