<?php

namespace App\Providers;

use App\Models\Board;
use App\Models\Task;
use App\Models\Label;
use App\Observers\BoardObserver;
use App\Observers\LabelObserver;
use App\Observers\TaskObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Board::observe(BoardObserver::class);
        Task::observe(TaskObserver::class);
        Label::observe(LabelObserver::class);
    }
}
