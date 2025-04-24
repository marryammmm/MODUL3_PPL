<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class MenampilkanNotesTest extends DuskTestCase
{
    /**
     * @group notes
     */
    public function testMelihatDetailNote()
{
    $this->browse(function (Browser $browser) {
        $browser
            ->visit('/login')
            ->type('email', 'maryam@gmail.com')
            ->type('password', '12345678')
            ->press('LOG IN')
            ->pause(1500)
            ->assertPathIs('/dashboard')
            ->clickLink('Notes')
            ->assertPathIs('/notes')
            ->pause(1000)
            ->screenshot('debug-notes-list')
            ->script("document.querySelector('[dusk^=\"detail-\"]').click()");

        $browser
            ->pause(1500)
            ->assertPathBeginsWith('/note/')
            ->assertSeeIn('.div-note', 'Author:')
            ->assertSeeIn('.div-note', 'Edit');
    });
}

}