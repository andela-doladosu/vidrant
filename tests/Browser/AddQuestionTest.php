<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class AddQuestionTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testAUserCanSeeFormForAddingQuesions()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(\App\User::find(1))
                    ->visit('/home')
                    ->assertPathIs('/home')
                    ->assertSee('Add Question')
                    ->click('#add-question')
                    ->assertPathIs('/questions/create')
                    ->assertSee('What would you like to know?');
        });
    }
}
