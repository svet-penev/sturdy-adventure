<?php

namespace Tests\Browser\Pages;

class User extends Page
{
    /**
     * Get the URL for the page.
     *
     * @return string
     */
    public function url()
    {
        return '/users';
    }

    /**
     * Submit the form with the given credentials.
     *
     * @param  \Laravel\Dusk\Browser $browser
     * @param  string $email
     * @param  string $password
     * @return void
     */
    public function visitUserCreate($browser)
    {
        $url = sprintf('%s/%s', $this->url(), 'create');
        $browser->visit($url)->pause(300);
    }

    public function visitUserUpdate($browser, $user)
    {
        $url = sprintf('%s/%s/%s', $this->url(), 'update', $user->id);
        $browser->visit($url)->pause(300);
    }

    public function createNewUser($browser)
    {
        $browser->type('#user-name', 'foo')
             ->type('#user-email', 'foo@foo.bar')
             ->type('#user-password', '123456')
             ->click('#user-submit')
             ->pause(300);
    }
}