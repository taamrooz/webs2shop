<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Product;
use App\Category;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Contracts\Filesystem\Filesystem;

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
        $image = $request->file('image');
        $imageFileName = $product->titel. '.' .$image->getClientOriginalExtension();
        
        $filePath = '/products/' . $imageFileName;
        $s3 = Storage::disk('s3');
        $s3->putObject(array('Bucket' => 'webs2shop',
                             'Key' => $imageFileName,
                             'SourceFile' => $image,
                             'ACL' => 'public-read',
                             'StorageClass' => 'REDUCED_REDUNDANCY'));
        $product->imageurl = 'https://webs2shop.s3-eu-west-3.amazonaws.com/' . $filePath;
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
        $categories = Category::whereNotNull('parent_id')->pluck('categorie', 'id');
        return view('admin.products.edit', compact('categories'))->with('product', $product);
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
        $image = $request->file('image');
        $imageFileName = $product->titel. '.' .$image->getClientOriginalExtension();
        $s3 = Storage::disk('s3');
        $filePath = '/products/' . $imageFileName;
        $s3->put($filePath, file_get_contents($image), 'public');
        $product->imageurl = 'https://webs2shop.s3-eu-west-3.amazonaws.com/' . $filePath;
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
    public function destroy()
    {
        if(!auth()->user()->isAdmin()){
            return Redirect('/');
        }

        // Get product
        $product = Product::find(request()->id);

        // Set product 'deleted'
        $product->delete();
        
        // Return to the page with a message
        Session::flash('msg', 'Product verwijderd');
        return back();
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
