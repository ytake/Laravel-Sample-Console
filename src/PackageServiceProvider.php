<?php

namespace Ytake\Laravel\SampleConsole;

use Illuminate\Support\ServiceProvider;
use Ytake\Laravel\SampleConsole\Console\BookConsole;
use Ytake\Laravel\SampleConsole\Console\TwitterConsole;

/**
 * Class PackageServiceProvider
 */
class PackageServiceProvider extends ServiceProvider
{
    /** @var bool  */
    protected $defer = false;

    public function register()
    {
        $this->app->singleton('command.book.list', function () {
            return new BookConsole();
        });
        $this->app->singleton('command.twitter.client', function () {
            return new TwitterConsole();
        });
        $this->commands([
            'command.book.list',
            'command.twitter.client'
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function provides()
    {
        return [
            'command.book.list',
            'command.twitter.client'
        ];
    }
}
