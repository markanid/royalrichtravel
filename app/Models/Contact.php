<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;


class Contact extends Model
{
    use HasFactory;
    // Method to retrieve all users
    public static function getAllUsers()
    {
        return DB::table('contact')->orderBy('id', 'ASC')->get();
    }

    
    // Method to save a user
    public static function saveUser($request)
    {
        
    // Prepare data for saving
    $data = [
                        'phone' => $request->post('phone', ''), 
                         'email' => $request->post('email', ''), 
                         'address' => $request->post('address', ''),
                         'map' => $request->post('map', ''),
       
    ];
    
    return DB::table('contact')->insert($data);

    }

    // Method to retrieve a user by ID
    public static function getUserById($id)
    {
       return DB::table('contact')->where('id', $id)->first(); // returns an stdClass
    }

    // Method to update a user
      public static function updateAbout($request)
    {

        $updateData = [  
                         'phone' => $request->post('phone', ''), 
                         'email' => $request->post('email', ''), 
                         'address' => $request->post('address', ''),
                         'map' => $request->post('map', ''),
                         
           
                      ];


         
        return DB::table('contact')->where('id',$request->post('id'))->update($updateData);
    }



public static function deleteUser($id)
{
     
    // Delete the user record from the database
    return DB::table('contact')->where('id', $id)->delete();
}

}
