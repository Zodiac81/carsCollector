<?php


namespace App\Providers;


use App\Repositories\Category\CategoryRepository;
use App\Repositories\Category\ICategory;
use Illuminate\Support\ServiceProvider;

class CategoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(ICategory::class, function () {
            return new CategoryRepository();
        });
    }
}
