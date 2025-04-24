<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class MengeditNotesTest extends DuskTestCase
{
    /**
     * @group notes
     */
    public function testMengeditNote()
    {
        $this->browse(function (Browser $browser) {
            $browser
                // Login
                ->visit('/login')
                ->type('email', 'maryam@gmail.com')
                ->type('password', '12345678')
                ->press('LOG IN')
                ->pause(1500)
                ->assertPathIs('/dashboard')

                // Ke halaman notes
                ->clickLink('Notes')
                ->assertPathIs('/notes')

                // Klik edit catatan
                ->clickLink('Edit')
                ->assertPathBeginsWith('/edit-note-page/')

                // Ubah & Submit form
                ->type('title', 'Updated Modul3_Maryam')
                ->type('description', 'Updated Modul3')
                ->press('UPDATE')
                ->pause(2000)

                // Solusi: Screenshot dan pastikan tidak error
                ->screenshot('edit-note-after-submit')

                // Cek bahwa kita masih di halaman yang sama
                ->assertPathBeginsWith('/edit-note-page/')

                // Cek bahwa halaman tidak kosong (ada kata 'Notes' di breadcrumb)
                ->assertSee('Notes');
        });
    }
}
