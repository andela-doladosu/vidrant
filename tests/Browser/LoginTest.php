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
    public function testExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->assertSee('Laravel');

            $browser->clickLink('Register')
                ->assertSee('Register');

            $browser->type('email', 'dara@me.com')
                ->type('password', 'password22')
                ->type('password_confirmation', 'password22')
                ->type('name', 'the dara')
                ->press('Register')
                ->assertPathIs('/home')
                ->assertSee('Dashboard');

            $browser->press('#navbarDropdown')
                ->assertSee('Logout')
                ->clickLink('Logout')
                ->assertPathIs('/')
                ->assertSee('Laravel');
        });
    }
}
