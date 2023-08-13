<?php

namespace App\Providers;
use App\Repositories\Interfaces\DataProviderXRepositoryInterface;
use App\Repositories\Json\DataProviderXRepository;
use App\Repositories\Interfaces\DataProviderYRepositoryInterface;
use App\Repositories\Json\DataProviderYRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(DataProviderXRepositoryInterface::class, DataProviderXRepository::class);
        $this->app->bind(DataProviderYRepositoryInterface::class, DataProviderYRepository::class);
    }

}
