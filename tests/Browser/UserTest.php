<?php

namespace Tests\Browser;

use Tests\Browser\Pages\User;
use Tests\DuskTestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class UserTest extends DuskTestCase
{
    use DatabaseMigrations;

    public function setUp()
    {
        parent::setup();
        static::closeAll();
    }

    /** @test */
    public function user_list()
    {
        $user = factory(\App\User::class)->create();
        $this->browse(function ($browser) use ($user) {
            $browser->loginUser($user)
                ->visit(new User())
                ->pause(300)
                ->assertSee('Create User')
                ->assertSee('Action')
                ->assertSee('Email')
                ->assertSee('Name')
                ->assertSee($user->email)
                ->assertSee($user->name)
                ->screenshot('asd');
        });
    }

    /** @test */
    public function user_create()
    {
        $user = factory(\App\User::class)->create();
        $this->browse(function ($browser) use ($user) {
            $browser->loginUser($user)
                ->visit(new User())
                ->visitUserCreate()
                ->createNewUser()
                ->assertSee('User was succesfully created!');
        });
    }

    /** @test */
    public function user_update()
    {
        $user = factory(\App\User::class)->create();
        $this->browse(function ($browser) use ($user) {
            $browser->loginUser($user)
                ->visit(new User())
                ->visitUserCreate()
                ->createNewUser()
                ->type('#user-name', 'bar')
                ->click('#user-submit')
                ->pause(300)
                ->assertSee('User was succesfully updated!');
        });
    }

}
