<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class NotesTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group notes
     */

    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser
            ->visit('/login')
            ->type(field:'email', value: __('maryam@gmail.com'))
            ->type(field:'password', value: __('12345678'))
            ->press(button:'LOG IN')
            ->pause(2000)
            ->assertPathIs(path:'/dashboard')
            ->clickLink('Notes')
            ->assertPathIs(path:'/notes')
            ->clickLink('Create Note')
            ->type('title','Modul3_Maryam')
            ->type('description', 'Modul3')
            ->press(button:'CREATE')
            ->assertPathIs(path:'/notes');
        });
    }
}
