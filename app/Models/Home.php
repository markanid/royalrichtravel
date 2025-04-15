<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;


class HomeModel extends Model
{
    use HasFactory;

    // Method to retrieve all users
    public static function get_contact()
    {
       return DB::table('contact')->get()->toArray();
    }

     // Method to retrieve all users
    public static function get_clients()
    {
       return DB::table('clients')->get()->toArray();
    }

     public static function get_testimonial()
    {
       return DB::table('testimonial')->get()->toArray();
    }
    
     public static function get_blog_latest()
    {
       return DB::table('blog')->where('date', '<=', date('Y-m-d'))->limit(3)->get()->toArray();
    }



    public static function get_services()
    {
       return DB::table('services')->get()->toArray();
    }

      public static function get_about()
    {
       return DB::table('about')->get()->toArray();
    }

     public static function get_servicesById($id)
    {
       return DB::table('services')->where('id', $id)->first(); // returns an stdClass
    }


     public static function get_portfolio()
    {
       return DB::table('portfolio')->get()->toArray();
    }


    public static function get_blog()
    {
       return DB::table('blog')->get()->toArray();
    }


     public static function get_blogById($id)
    {
       return DB::table('blog')->where('id', $id)->first(); // returns an stdClass
    }


    
    

}
