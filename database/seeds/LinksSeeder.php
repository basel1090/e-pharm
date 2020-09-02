<?php

use Illuminate\Database\Seeder;
use App\Models\Link;
class LinksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //Categories Section:
        $link = Link::create(['title'=>'Categories','icon'=>'fa fa-pin','route'=>'#']);
        Link::create(['title'=>'Categories','icon'=>'icon-plus','route'=>'categories.index','parent_id'=>$link->id]);
        Link::create(['title'=>'Create New Category','icon'=>'icon-plus','route'=>'categories.create','parent_id'=>$link->id]);

        //products Section:

        $link = Link::create(['title'=>'Products','icon'=>'fa fa-plus','route'=>'#']);
        Link::create(['title'=>'Products','icon'=>'icon-plus','route'=>'products.index','parent_id'=>$link->id]);
        Link::create(['title'=>'Create New Product','icon'=>'icon-plus','route'=>'products.create','parent_id'=>$link->id]);


        //About Section
        $link = Link::create(['title'=>'Abouts','icon'=>'fa fa-users','route'=>'#']);
        Link::create(['title'=>'Manage Abouts','icon'=>'icon-list','route'=>'about.index','parent_id'=>$link->id]);

        //Blogs Section
        $link = Link::create(['title'=>'Blogs','icon'=>'fa fa-users','route'=>'#']);
        Link::create(['title'=>'Manage Blogs','icon'=>'icon-list','route'=>'blogs.index','parent_id'=>$link->id]);

       //Contact Section
        $link = Link::create(['title'=>'Contact Us','icon'=>'fa fa-users','route'=>'#']);
        Link::create(['title'=>'Manage Contact','icon'=>'icon-list','route'=>'contact.index','parent_id'=>$link->id]);

        //Subscribe Section
        $link = Link::create(['title'=>'Subscribe','icon'=>'fa fa-users','route'=>'#']);
        Link::create(['title'=>'Manage Subscribe','icon'=>'icon-list','route'=>'contactUs.index','parent_id'=>$link->id]);

        //Users
        $link = Link::create(['title'=>'Customers/Admin','icon'=>'fa fa-users','route'=>'#']);
        Link::create(['title'=>'Manage Customers/Admin','icon'=>'icon-list','route'=>'users.index','parent_id'=>$link->id]);
        Link::create(['title'=>'Create New Admin','icon'=>'icon-plus','route'=>'users.create','parent_id'=>$link->id]);
        Link::create(['title'=>'Delete Admin','icon'=>'fa fa-trash','route'=>'users.destroy','parent_id'=>$link->id,'show_in_menu'=>0]);
        Link::create(['title'=>'Edit Admin','icon'=>'fa fa-edit','route'=>'users.edit','parent_id'=>$link->id,'show_in_menu'=>0]);
        Link::create(['title'=>'Admin Links','icon'=>'fa fa-lock','route'=>'permissions','parent_id'=>$link->id,'show_in_menu'=>0]);

    }
}
