<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\BlogRequest;
use App\models\blog;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{

    public function index(Request $request)
    {
        $blogs = blog::whereRaw('true')->orderBy('id','desc');
        $q=request()->get("q")??"";
        $published=request()->get("published");
        if($q){
            $blogs->where('title','like',"%{$q}%");
        }
        if($published!=null){
            $blogs->where('published',$published);
        }
        if($request->export){
            return $blogs->where('published','=','1')/*->select("id","title")*/->get()->downloadExcel(
            //"categories.csv",
            //$writerType = \Maatwebsite\Excel\Excel::CSV,
            ///or
                "blogs.xlsx",
                $writerType = null,
                $headings = true
            );
        }
        $blogs = $blogs->paginate(5)->appends(["q"=>$q,"published"=>$published]);
        return view('admin.blog.index')->withBlogs($blogs);
    }

        public function pending($id){
        $blogs=blog::find($id);
        $blogs->update(['published'=>0]);
        session()->flash('msg','s: blog has been pending');
        return redirect()->back();
    }

    public function confirm($id){
        $blogs=blog::find($id);
        $blogs->update(['published'=>1]);
        session()->flash('msg','s: blog has been confirm');
        return redirect()->back();
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $blogs = blog::get();

        return view('admin.blog.create')->with('blogs', $blogs);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogRequest $request)
    {
        $request['active'] = $request['active'] ? 1 : 0;

        $imageName = basename($request->imageFile->store("public"));
        $request['image'] = $imageName;
        //dd( $request['image'] );
        blog::create($request->all());
        session()->flash('msg', "s: Blog create successfully");
        return redirect(route('blogs.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\models\blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\models\blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blogs = blog::find($id);


        if($blogs==null){
            session()->flash("msg", "The Blog was not found");
            return redirect(route("blog.index"));
        }

        return view("admin.blog.edit")->with('blogs',$blogs);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(BlogRequest $request, $id)
    {



        if(!$request->active){
            $request['active']=0;
        }
        if($request->imageFile){
            $imageName = basename($request->imageFile->store("public"));
            $request['image'] = $imageName;
        }
        blog::find($id)->update($request->all());
        session()->flash("msg", "The Blog was updated");
        return redirect(route("blogs.index"));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\models\blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(blog $blog)
    {
        //
    }
}
