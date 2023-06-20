<?php

namespace Src\Shared\Infrastructure\Services;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

abstract class RouterServiceProvider extends ServiceProvider
{
    private mixed $prefix;
    private mixed $namespaceName;
    private mixed $group;
    private ?bool $exception;

    /**
     * @param mixed $prefix
     * @param mixed $namespaceName
     * @param mixed $group
     * @param bool|null $exception
     * @return void
     */
    public function setDependency(mixed $prefix, mixed $namespaceName, mixed $group, ?bool $exception = null ): void
    {
        $this->prefix = $prefix;
        $this->namespaceName = $namespaceName;
        $this->group = $group;
        $this->exception = $exception;
    }

    /**
     * @return void
     */
    public function boot(): void{
        parent::boot();
    }

    /**
     * @return void
     */
    public function map(): void{
        $this->mapRoutes();
    }

    /**
     * @return void
     */
    public function mapRoutes(): void{
        if ($this->exception){
            Route::middleware('api')
                ->prefix($this->prefix)
                ->namespace($this->namespaceName)
                ->group(base_path($this->group));
        } else {
            Route::middleware(['api', 'jwt'])
                ->prefix($this->prefix)
                ->namespace($this->namespaceName)
                ->group(base_path($this->group));
        }
    }
}
