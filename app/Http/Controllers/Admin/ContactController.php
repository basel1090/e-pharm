<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\User\UserRequest;
use App\Models\Contact;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $contacts=Contact::get();
        return view('admin.ContactUs.index')->with('contacts',$contacts);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create(){
        $contacts=Contact::get();
        return view("admin.ContactUs.index")->with('contacts',$contacts);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request['active'] = $request['active'] ? 1 : 0;

        $imageName = basename($request->imageFile->store("public"));
        $request['image'] = $imageName;
        Contact::create($request->all());
        session()->flash('msg', "s: Contact create successfully");
        return redirect(route('contact'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $contacts = Contact::find($id);
        if(!$contacts){
            session()->flash("msg", "e: Contact was not found");
            return redirect(route("contact"));
        }

        return view("admin.ContactUs.show")->withContacts($contacts);
    }


    public function edit($id)
    {

        $contacts = Contact::find($id);
        if($contacts==null){
            session()->flash("msg", "e: Contact was not found");
            return redirect(route("contact"));
        }

        return view("admin.ContactUs.index")->withContacts($contacts);
    }


    public function update(request $request, $id)
    {
        $request['password'] = bcrypt($request['password']);
        Contact::find($id)->update($request->all());
        session()->flash("msg", "i:Contact Updated Successfully");
        return redirect(route("contact"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contacts = Contact::find($id);
        if(!$contacts){
            session()->flash("msg", "e: Contact was not found");
            return redirect(route("contacts.index"));
        }

        $contacts->delete();
        session()->flash("msg", "w:Contact Deleted Successfully");
        return redirect(route("contacts.index"));
    }
}
