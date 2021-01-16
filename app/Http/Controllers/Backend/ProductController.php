<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $products = Product::paginate(10);
        return view('admins.products.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $categories = Category::with('childrenRecursive')->where('parent_id', null)->get();
        $brands = Brand::all();
        return view('admins.products.create', compact(['categories', 'brands']));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function generateSKU()
    {
        $number = mt_rand(1000, 99999);
        if ($this->checkSKU($number)) {
            return $this->generateSKU();
        } else {
            return (string)$number;
        }
    }

    public function checkSKU($number)
    {
        return Product::where('sku', $number)->exists();
    }

    function makeSlug($string)
    {
        $string = strtolower($string);
        $string =str_replace(['?'],'',$string);
        return preg_replace('/\s+/u','-',trim($string));
    }

    public function store(Request $request)
    {
        // return $request->all();
        $newProduct = new Product();
        $newProduct->title = $request->title;
        $newProduct->sku = $this->generateSKU();
        $newProduct->slug = $this->makeSlug($request->slug);
        $newProduct->status = $request->status;
        $newProduct->price = $request->price;
        $newProduct->discount_price = $request->discount_price;
        $newProduct->description = $request->description;
        $newProduct->brand_id = $request->brand_id;
        $newProduct->user_id = 1;
        $newProduct->save();

        $photos = explode(',', $request->input('photo_id')[0]);
        $newProduct->categories()->sync($request->categories);
        $newProduct->photos()->sync($photos);

        Session::flash('success', 'محصول با موفقیت اضافه شد.');
        return redirect('admins/products');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {

        $product=Product::with(['categories','brand','photos'])->whereId($id)->first();
        $brands=Brand::all();
        $categories=Category::all();
        return view('admins.products.edit',compact(['brands','categories',['product']]));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return array
     */
    public function update(Request $request, $id)
    {
        return $request->all();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
