<?php

namespace Tests\Browser;

use App\User;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class UserTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testList()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->waitFor('#email')
                ->value('#email', 'a@a.a')
                ->value('#password', '123')
                ->press('LOGIN')
                ->waitForText('Home Page')
                ->assertSee('Laravel');
        });
    }
}
