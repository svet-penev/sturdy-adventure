<?php

namespace Tests;

use Laravel\Dusk\TestCase as BaseTestCase;
use Facebook\WebDriver\Chrome\ChromeOptions;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use Laravel\Dusk\Page;
use Laravel\Dusk\Browser;
use Tests\Browser\Pages\Login;

abstract class DuskTestCase extends BaseTestCase
{
    use CreatesApplication;

    /**
     * Prepare for Dusk test execution.
     *
     * @beforeClass
     * @return void
     */
    public static function prepare()
    {
        static::startChromeDriver();
    }

    /**
     * Create the RemoteWebDriver instance.
     *
     * @return \Facebook\WebDriver\Remote\RemoteWebDriver
     */
    protected function driver()
    {
        $options = (new ChromeOptions)->addArguments([
            '--window-size=1440,900',
            '--disable-gpu',
            '--headless'
        ]);

        return RemoteWebDriver::create(
            'http://localhost:9515', DesiredCapabilities::chrome()->setCapability(
                ChromeOptions::CAPABILITY, $options
            )
        );
    }
}

Browser::macro('assertPageIs', function ($page) {
    if (! $page instanceof Page) {
        $page = new $page;
    }
    return $this->assertPathIs($page->url());
});

Browser::macro('loginUser', function ($user) {
    return $this->visit(new Login())
        ->type('#email', $user->email)
        ->type('#password', 'secret')
        ->press('LOGIN')
        ->pause(350);
});
