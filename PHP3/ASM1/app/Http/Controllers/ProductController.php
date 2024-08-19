<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\products;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $model;
    public function __construct(products $model)
    {
        $this->model = $model;
    }
    public function product(Request $request)
    {

        if ($request->has('category_id') && $request->category_id) {
            $products = products::where('category_id', $request->category_id)->paginate(8);
        } else {
            $products = products::orderBy('id', 'desc')->paginate(8);
        }
    
        $categories = Category::all();
    
        if ($request->has('category_id') && $request->category_id) {
            $products->appends(['category_id' => $request->category_id]);
        }
    
        return view('product', compact('categories', 'products'));
    }

    function detail(Request $request) {

        $product_id= $request->product_id;
        $product= products::find($product_id);
        $splq=products::where('category_id',$product->category_id)->where('id','<>','$product->id')->limit(4)->get();
        return view('detail',compact('product','splq'));
    }
    public function getLatestProducts()
    {
        $latestProducts = products::getLatestProducts();
        return response()->json($latestProducts);
    }

}

