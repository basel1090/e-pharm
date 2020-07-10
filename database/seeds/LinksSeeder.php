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
        //Blogs Sesction
        $link = Link::create(['title'=>'Products','icon'=>'fa fa-users','route'=>'#']);
        Link::create(['title'=>'Manage Products','icon'=>'icon-list','route'=>'products.index','parent_id'=>$link->id]);
        Link::create(['title'=>'Create New Product','icon'=>'icon-plus','route'=>'products.create','parent_id'=>$link->id]);
        Link::create(['title'=>'Manage Categories','icon'=>'icon-list','route'=>'categories.index','parent_id'=>$link->id]);
        Link::create(['title'=>'Manage Brands','icon'=>'fa fa-list','route'=>'brands.index','parent_id'=>$link->id]);

        //Rooms        
        $link = Link::create(['title'=>'Orders','icon'=>'fa fa-tv','route'=>'#']);
        Link::create(['title'=>'Manage Orders','icon'=>'icon-list','route'=>'orders.index','parent_id'=>$link->id]);
       
        //Users        
        $link = Link::create(['title'=>'Customers/Admin','icon'=>'fa fa-users','route'=>'#']);
        Link::create(['title'=>'Manage Customers/Admin','icon'=>'icon-list','route'=>'users.index','parent_id'=>$link->id]);
        Link::create(['title'=>'Create New Admin','icon'=>'icon-plus','route'=>'users.create','parent_id'=>$link->id]);
        Link::create(['title'=>'Delete Admin','icon'=>'fa fa-trash','route'=>'users.destroy','parent_id'=>$link->id,'show_in_menu'=>0]);
        Link::create(['title'=>'Edit Admin','icon'=>'fa fa-edit','route'=>'users.edit','parent_id'=>$link->id,'show_in_menu'=>0]);
        Link::create(['title'=>'Admin Links','icon'=>'fa fa-lock','route'=>'permissions','parent_id'=>$link->id,'show_in_menu'=>0]);
    

    }
}
