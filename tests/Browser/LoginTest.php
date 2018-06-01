<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class LoginTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testLogin()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                    ->assertSee('Login');

            $browser
                ->type('email', $this->testUser->email)
                ->type('password', 'secret')
                ->press('Login')
                ->assertPathIs('/home');

            $browser->press('#navbarDropdown')
                ->assertSee('Logout')
                ->clickLink('Logout')
                ->assertPathIs('/')
                ->assertSee('Laravel');
        });
    }
}
