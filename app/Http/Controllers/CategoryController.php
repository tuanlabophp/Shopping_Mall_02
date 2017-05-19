<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Admin\CategoryRequest;
use App\Models\Category;
use App\Models\Product;
use Session;
use App\Helpers\Helpers;

class CategoryController extends Controller
{
    public function __construct(Category $category)
    {
        $this->category = $category;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = $this->category->all()->toArray();
        $categories  = Helpers::categoriesToArray($category, null, '');

        return view('admin.category.index')->with('categories', $categories);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Helpers::categoriesToArray($this->category->all()->toArray(), 0, '');
        $categoriesArray = array();
        foreach ($categories as $value) {
            $categoriesArray[$value['id']] = $value['name'];
        }

        return view('admin.category.add')->with('categories', $categoriesArray);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $category = $request->only(['name', 'parent_id']);
        if ($this->category->create($category)) {
            session()->flash('success', trans('view.add_category_success'));
        } else {
            session()->flash('fail', trans('view.add_category_fail'));
        }
        return redirect('admin/category');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.category.edit')->with(['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, Category $category)
    {
        if ($category->update(['name' => $request->name])) {
            session()->flash('success', trans('view.delete_category_seccess'));
        } else {
            session()->flash('fail', trans('view.sorry_something_went_wrong'));
        }
        
        return redirect('admin/category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $this->category->destroy($id);
            session()->flash('success', trans('view.delete_category_seccess'));
        } catch (\Exception $e) {
            session()->flash('fail', trans('view.sorry_something_went_wrong'));
        }
        
        return redirect('admin/category');
    }
}
