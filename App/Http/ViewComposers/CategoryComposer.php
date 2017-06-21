<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Models\Category;

class CategoryComposer
{
    public function compose(View $view)
    {
        $categories;
        $categories = Category::where('parent_id', null)->with(['subCategories'])->get();
        $view->with(['categories' => $categories]);
    }
}
