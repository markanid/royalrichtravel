<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use App\Services\ImageUploadService;


class Portfolio extends Model
{
    use HasFactory;
    // Method to retrieve all users
    public static function getAllUsers()
    {
        return DB::table('portfolio')->orderBy('id', 'ASC')->get();
    }

    
    // Method to save a user
    public static function saveUser($request)
    {
        
    // Prepare data for saving
    $data = [
        'name' => $request->post('name', ''),
        'category' => $request->post('category', ''),
        'link' => $request->post('link', ''),
       
    ];

      if ($request->hasFile('image')) {
            $filename = uniqid() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('uploads/portfolio'), $filename);
            $data['image'] = $filename;
        }
    return DB::table('portfolio')->insert($data);

    }

    // Method to retrieve a user by ID
    public static function getUserById($id)
    {
       return DB::table('portfolio')->where('id', $id)->first(); // returns an stdClass
    }

    // Method to update a user
      public static function updateAbout($request)
    {
         $imageUploadService = app(ImageUploadService::class);
        $uploadDir = public_path('uploads/portfolio/');
        $updateData = [
                         'name' => $request->post('name', ''),
                         'category' => $request->post('category', ''),
                         'link' => $request->post('link', ''),
                         'image' => $request->file('image'),
                         'image' => $imageUploadService->handleImageUpload($request, 'image', 'image_1_old', $uploadDir),
           
                      ];

 
        // Update the record in the database
        return DB::table('portfolio')->where('id',$request->post('id'))->update($updateData);
    }



public static function deleteUser($id)
{
    // Fetch the user data to get the image file name
    $user = DB::table('portfolio')->where('id', $id)->first();
    if ($user && $user->image) {
        // Define the path to the image file
        $imagePath = public_path('uploads/portfolio/' . $user->image);

        // Check if the file exists and delete it
        if (File::exists($imagePath)) {
            File::delete($imagePath);
        }
    }
    // Delete the user record from the database
    return DB::table('portfolio')->where('id', $id)->delete();
}

}
