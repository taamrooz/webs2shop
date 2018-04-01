<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Product;
use App\Category;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        // Get all categories with at least one product
        $products = Product::all();
        $category_ids = array();

        foreach($products as $product){

            if (!in_array($product->category_id.'', $category_ids)){

                $category_ids[] = $product->category_id;
            }

        }

        $categories = \DB::table('categories')->whereNull('parent_id')->get();

        foreach($categories as $category) {
            $subCategories[$category->id] = \DB::table('categories')->where('parent_id', '=', $category->id)->get();
        }

        // Check if filter exists
        if (session()->has('filter')) {

            $products = Product::whereIn('category_id', session()->get('filter'))->get();

        }else {

            $products = Product::all();

        }

        // Pass data to view
        return view('products.index', compact('products', 'categories', 'subCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::whereNotNull('parent_id')->pluck('categorie', 'id');
        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\ProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $product = new Product();
        $product->titel = $request->titel;
        $product->beschrijving = $request->beschrijving;
        $product->prijs = $request->prijs;
        $product->category_id = $request->category_id;
        $product->imageurl = Storage::putFile('products', new File($request->image));
        $product->save();
        Session::flash('msg', 'Product aangemaakt!');
        return Redirect::to('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('products.show')->with('product', $product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('admin.products.edit')->with('product', $product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\ProductRequest  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product)
    {
        $product->titel = $request->titel;
        $product->beschrijving = $request->beschrijving;
        $product->prijs = $request->prijs;
        $product->category_id = $request->category_id;
        $product->imageurl = Storage::putFile('products', new File($request->image));
        $product->save();
        Session::flash('msg', 'Product geüpdatet!');
        return Redirect::to('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //TODO Check if person is allowed to delete the module

        // Set module 'deleted'
        $product->delete();
        
        // Return to the page with a message
        Session::flash('msg', 'Product verwijderd');
        return Redirect::to('/');
    }

    public function filter() {

        //Fill session with filters
        if(!empty(request()->category)){

            session()->put('filter', $_POST['category']);

        }else {

            session()->put('filter');

        }

        return Redirect::to('/producten');

    }
}
