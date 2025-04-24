<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LogoutTest extends DuskTestCase
{
    /**
     * @group auth
     */
    public function testLogout(): void
    {
        $this->browse(function (Browser $browser) {
           
            $browser->visit('/login') 
                    ->type('email', 'maryam@gmail.com') 
                    ->type('password', '12345678') 
                    ->press('LOG IN')
                    ->assertPathIs('/dashboard'); 
                    
            $browser->click('@dropdown-trigger') 
                    ->click('@click-logout')
                    ->pause(2000); 
        });
    }
}
