<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\AttributeGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AttributeGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $attributesGroup=AttributeGroup::paginate(10);
        return view('admins.attributes.index',['attributesGroup'=>$attributesGroup]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('admins.attributes.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $attributeGroup=new AttributeGroup();
        $attributeGroup->title=$request->input('title');
        $attributeGroup->type=$request->input('type');
        $attributeGroup->save();
        Session::flash('addattribute','ویژگی جدید با موفقیت اضافه شد.');
        return redirect('admins/attributes-group');
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        $attributeGroup=AttributeGroup::findOrFail($id);
        return view('admins.attributes.edit',['attributeGroup'=>$attributeGroup]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $attributeGroup=AttributeGroup::findOrFail($id);
        $attributeGroup->title=$request->input('title');
        $attributeGroup->type=$request->input('type');
        $attributeGroup->save();
        Session::flash('update-attribute','ویژگی '.$attributeGroup->title.' با موفقیت بروزرسانی شد.');
        return redirect('admins/attributes-group');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $attributeGroup=AttributeGroup::findOrFail($id);
        Session::flash('delete-attribute','ویژگی '.$attributeGroup->title.'  حذف شد.');
        $attributeGroup->delete();
        return redirect('admins/attributes-group');
    }
}
