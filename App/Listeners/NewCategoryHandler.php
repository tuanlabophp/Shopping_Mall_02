<?php

namespace App\Listeners;

use App\Events\NewCategory;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Category;

class NewCategoryHandler
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  NewCategory  $event
     * @return void
     */
    public function handle(NewCategory $event)
    {
        Category::create(['name' => 'anh thắng']);
    }
}
