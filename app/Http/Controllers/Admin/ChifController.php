<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CreateRequest;
use App\Http\Requests\EditRequest;
use App\Http\Requests\ChifRequest;
use App\Models\Chif;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class ChifController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chifes = Chif::get();

        return view('admin/chif/index')->with('chifes', $chifes);

    }
    public function create()
    {
        $chifes = Chif::get();

        return view('admin.chif.create')->with('chifes', $chifes);

    }

    public function store(ChifRequest $request)
    {
        $request['active'] = $request['active'] ? 1 : 0;

        $imageName = basename($request->imageFile->store("public"));
        $request['image'] = $imageName;
        Chif::create($request->all());
        session()->flash('msg', "s: CHif create successfully");
        return redirect(route('chif.index'));
    }
    public function show($id)
    {
        $chifes = Chif::find($id);
        if(!$chifes){
            session()->flash("msg", "The Chif was not found");
            return redirect(route("chif.index"));
        }
        return view("admin.chif.show")->with('chifes',$chifes);
    }
    public function edit($id)
    {
        $chifes = Chif::find($id);


        if($chifes==null){
            session()->flash("msg", "The Chif was not found");
            return redirect(route("chif.index"));
        }

        return view("admin.chif.edit")->with('chifes',$chifes);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(ChifRequest $request, $id)
    {
        if(!$request->active){
            $request['active']=0;
        }
        if($request->imageFile){
            $imageName = basename($request->imageFile->store("public"));
            $request['image'] = $imageName;
        }
        Chif::find($id)->update($request->all());
        session()->flash("msg", "The Chif was updated");
        return redirect(route("chif.index"));
    }
    public function destroy($id)
    {
        $chifes = Chif::find($id);
        if(!$chifes){
            Session()->flash('msg','Chif not found');
            return redirect(route('chif.index'));
        }
        Chif::destroy($id);
        session()->flash("msg", " Chif Deleted Successfully");
        return redirect(route("chif.index"));
    }

}
