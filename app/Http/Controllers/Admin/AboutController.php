<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CreateRequest;
use App\Http\Requests\EditRequest;
use App\Models\about;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AboutController extends Controller
{
    public function index()
    {
        $abouts = about::get();

        return view('admin/About/index')->with('abouts', $abouts);

    }
    public function create()
    {
        $abouts = about::get();

        return view('admin.About.create')->with('abouts', $abouts);

    }

    public function store(CreateRequest $request)
    {
        $request['active'] = $request['active'] ? 1 : 0;

        $imageName = basename($request->imageFile->store("public"));
        $request['image'] = $imageName;
        //dd( $request['image'] );
        about::create($request->all());
        session()->flash('msg', "s: product create successfully");
        return redirect(route('about.index'));
    }
    public function show($id)
    {
        $abouts = about::find($id);
        if(!$abouts){
            session()->flash("msg", "The product was not found");
            return redirect(route("about.index"));
        }
        return view("admin.About.show")->with('abouts',$abouts);
    }
    public function edit($id)
    {
        $abouts = about::find($id);


        if($abouts==null){
            session()->flash("msg", "The Product was not found");
            return redirect(route("about.index"));
        }

        return view("admin.About.edit")->with('abouts',$abouts);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(EditRequest $request, $id)
    {
        if(!$request->active){
            $request['active']=0;
        }
        if($request->imageFile){
            $imageName = basename($request->imageFile->store("public"));
            $request['image'] = $imageName;
        }
        about::find($id)->update($request->all());
        session()->flash("msg", "The Product was updated");
        return redirect(route("about.index"));
    }
    public function destroy($id)
    {
        $abouts = about::find($id);
        if(!$abouts){
            Session()->flash('msg','Product not found');
            return redirect(route('about.index'));
        }
        about::destroy($id);
        session()->flash("msg", " Product Deleted Successfully");
        return redirect(route("about.index"));
    }
}
