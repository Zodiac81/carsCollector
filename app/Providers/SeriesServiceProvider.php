<?php


namespace App\Providers;


use App\Repositories\Series\ISeries;
use App\Repositories\Series\SeriesRepository;
use Illuminate\Support\ServiceProvider;

class SeriesServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(ISeries::class, function () {
            return new SeriesRepository();
        });
    }
}
