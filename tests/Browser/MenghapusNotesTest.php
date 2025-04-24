<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class MenghapusNotesTest extends DuskTestCase
{
    /**
     * @group notes
     */
    public function testMenghapusNote()
    {
        $this->browse(function (Browser $browser) {
            $browser
                ->visit('/login')
                ->type('email', 'maryam@gmail.com')
                ->type('password', '12345678')
                ->press('LOG IN')
                ->pause(1500)
                ->assertPathIs('/dashboard')

                // Masuk ke halaman notes
                ->clickLink('Notes')
                ->assertPathIs('/notes')
                ->pause(1000)

                // Ambil ID tombol delete pertama, lalu klik via JS (karena form delete)
                ->script("document.querySelector('button[id^=\"delete-\"]').click()");

            $browser
                ->pause(2000)
                ->assertPathIs('/notes')
                ->assertPresent('#success-notif');
        });
    }
}
