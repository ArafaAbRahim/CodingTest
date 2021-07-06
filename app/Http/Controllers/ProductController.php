<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductVariant;
use App\Models\ProductVariantPrice;
use App\Models\Variant;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $products = Product::paginate(3);
        $variants = Variant::all(); 
        return view('products.index', compact('products', 'variants'));        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create()
    {
        $variants = Variant::all();                
        return view('products.create', compact('variants'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(ProductRequest $request)
    {
        $product = new Product();
        $product->fill($request->all());
        $product->save();

        $image = new ProductImage(); 
        $image->product_id = $product->id;       
        $image->fill($request->all());
        $image->save();

        $product_variant = new ProductVariant();
        //$product_variant->variant_id = $variant->id;
        $product_variant->product_id = $product->id;          
        $product_variant->fill($request->all());
        $product_variant->save();

        return redirect()->back()->with('success', 'product Saved');


    }


    /**
     * Display the specified resource.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function show($product)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $product = Product::findOrFail($id);         
        $image = ProductImage::findOrFail($id);
        return view('products.edit', compact('product', 'image'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->fill($request->all());
        $product->save();

        $image = ProductImage::findOrFail($id); 
        $image->product_id = $product->id;       
        $image->fill($request->all());
        $image->save();

        $product_variant = ProductVariant::findOrFail($id);
        //$product_variant->variant_id = $variant->id;
        $product_variant->product_id = $product->id;          
        $product_variant->fill($request->all());
        $product_variant->save();

        return redirect()->back()->with('success', 'product Saved');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }

    public function search()
    {
        $search_title = $_GET['query'];
        $products = Product::where('title', 'LIKE', '%'.$search_title.'%')->get();        
        return view('products.search', compact('products'));
    }
}
