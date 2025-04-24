<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testLogin(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(url:'/login')
                    ->type(field:'email', value: __('maryam@gmail.com'))
                    ->type(field:'password', value: __('12345678'))
                    ->press(button:'LOG IN')
                    ->assertPathIs(path:'/dashboard');
        });
    
    }
}
