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
            $browser->visit('/login')
                ->assertDontSee('Add Question');

            $browser->loginAs(\App\User::find(1))
                    ->visit('/home')
                    ->assertPathIs('/home')
                    ->assertSee('Add Question')
                    ->click('#add-question')
                    ->assertPathIs('/questions/create')
                    ->assertSee('What would you like to know?')
                    ->type('description', 'this is a test description')
                    ->click('#submit')
                    ->assertDontSee('Your question was added!')
                    ->assertSee('The title field is required.');

            $browser->loginAs(\App\User::find(1))
                    ->visit('/home')
                    ->assertPathIs('/home')
                    ->assertSee('Add Question')
                    ->click('#add-question')
                    ->assertPathIs('/questions/create')
                    ->assertSee('What would you like to know?')
                    ->type('title', 'this is a test title')
                    ->click('#submit')
                    ->assertDontSee('Your question was added!')
                    ->assertSee('The description field is required.');

            $browser->loginAs(\App\User::find(1))
                    ->visit('/home')
                    ->assertPathIs('/home')
                    ->assertSee('Add Question')
                    ->click('#add-question')
                    ->assertPathIs('/questions/create')
                    ->assertSee('What would you like to know?')
                    ->click('#submit')
                    ->assertDontSee('Your question was added!')
                    ->assertSee('The title field is required.')
                    ->assertSee('The description field is required.');

            $browser->loginAs(\App\User::find(1))
                    ->visit('/home')
                    ->assertPathIs('/home')
                    ->assertSee('Add Question')
                    ->click('#add-question')
                    ->assertPathIs('/questions/create')
                    ->assertSee('What would you like to know?')
                    ->type('title', 'this is a test title')
                    ->type('description', 'this is a test description')
                    ->click('#submit')
                    ->assertSee('Your question was added!');
        });
    }
}
