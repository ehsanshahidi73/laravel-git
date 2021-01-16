<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::paginate(10);
        return view('admins.brands.index', ['brands' => $brands]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('admins.brands.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {

        $brand = new Brand();
        $brand->title = $request->input('title');
        $brand->description = $request->input('description');
        $brand->photo_id = $request->input('photo_id');
        $brand->save();
        Session::flash('success', 'برند با موفقیت ذخیره شد.');
        return redirect('/admins/brands');
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brand = Brand::with('photo')->where('id', $id)->first();
        return view('admins.brands.edit', ['brand' => $brand]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|unique:brands,title,' . $id,
            'description' => 'required'
        ], [
            'title.required' => 'عنوان برند شما باید درج شود.',
            'title.unique' => 'این برند قبلا ثبت شده است.',
            'description.required' => 'توضیحات خود را وارد کنید.'
        ]);
        if ($validator->fails()) {
            return redirect('/admins/brands')->withErrors($validator)->withInput();
        } else {
            $brand = Brand::findOrFail($id);
            $brand->title = $request->input('title');
            $brand->description = $request->input('description');
            $brand->photo_id = $request->input('photo_id');
            $brand->save();
            Session::flash('success', 'برند باموفقیت ویرایش شد.');
            return redirect('/admins/brands');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brand = Brand::findOrFail($id);
        $brand->delete();
        Session::flash('delete', 'برند باموفقیت حذف شد.');
        return redirect('/admins/brands');

    }
}
