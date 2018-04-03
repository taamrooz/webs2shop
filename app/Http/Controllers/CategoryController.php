<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\CategoryRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::whereNull('parent_id')->get();
        return view('admin.categories.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        //Check if category already exists
        if(Category::where('categorie', '=', request()->categorie)->first() !== null){
            Session::flash('warning', 'Categorie bestaat al!');
            return back();
        }

        // make new category
        $category = new Category();
        $category->categorie = request()->categorie;
        if(isset(request()->parent_id)){
            $category->parent_id = request()->parent_id;
        }

        $category->save();
        Session::flash('msg', 'Categorie aangemaakt!');
        return Redirect::to('/admin/categorieen');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('admin.categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $categories = Category::whereNull('parent_id')->get();
        return view('admin.categories.edit', compact('categories'))->with('category', $category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
        $category = Category::find(request()->id);
        $category->categorie = request()->categorie;
        $category->parent_id = request()->parent_id;
        $category->save();
        Session::flash('msg', 'Categorie geüpdatet!');
        return Redirect::to('/admin/categorieen');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy() {

        // Check if user is admin
        if(!auth()->user()->isAdmin()){
            return Redirect('/');
        }

        // Get category
        $category = Category::find(request()->id);

        //Get and delete all subcategories
        $subs = Category::where('parent_id', '=', $category->id)->get();
        foreach($subs as $sub){
            $sub->delete();
        }

        // Set category 'deleted'
        $category->delete();

        // Return to the page with a message
        Session::flash('msg', 'Categorie verwijderd');
        return Redirect::to('/admin/categorieen');
    }
}
