<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\about;
use App\models\blog;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Email;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {

        return view('FrontEnd.site.index');
    }

    public function Home()
    {

        return view('FrontEnd.site.index');
    }

    public function About()
    {
        $abouts=about::get()->take(1);
        return view('FrontEnd.site.about')->with('abouts',$abouts);
    }
    public function Menu()
    {
        $categories =Category::get();
        return view('FrontEnd.site.menu')->with('categories',$categories);
    }

    public function Blogs()
    {
        $blogs=blog::paginate(3);

        return view('FrontEnd.site.blog')->with('blogs',$blogs);
    }

//    public function Contact()
//    {
//
//        return view('FrontEnd.site.contact');
//    }

    public function subscrip(Request $request)
    {
        Email::create($request->all());
        return redirect(route('Home'));
    }

    public function BookTable()
    {

        return view('FrontEnd.site.booktable');
    }
}
