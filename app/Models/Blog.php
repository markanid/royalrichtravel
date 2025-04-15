<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use App\Services\ImageUploadService;


class Blog extends Model
{
    use HasFactory;
    // Method to retrieve all users
    public static function getAllUsers()
    {
        return DB::table('blog')->orderBy('id', 'ASC')->get();
    }

    
    // Method to save a user
    public static function saveUser($request)
    {
        
    // Prepare data for saving
    $data = [
        'date' => (new \DateTime($request->post('date', '')))->format('Y-m-d'),
        'heading' => $request->post('heading', ''),
        'content' => $request->post('content', ''),
       
    ];


        if ($request->hasFile('image')) {
            $filename = uniqid() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('uploads/blog'), $filename);
            $data['image'] = $filename;
        }
    
    return DB::table('blog')->insert($data);

    }

    // Method to retrieve a user by ID
    public static function getUserById($id)
    {
       return DB::table('blog')->where('id', $id)->first(); // returns an stdClass
    }

    // Method to update a user
      public static function updateAbout($request)
    {

        $imageUploadService = app(ImageUploadService::class);
        $uploadDir = public_path('uploads/blog/');
        $updateData = [
                         'date' =>(new \DateTime($request->post('date', '')))->format('Y-m-d'),
                         'heading' => $request->post('heading', ''),
                         'content' => $request->post('content', ''),
                         'image' => $imageUploadService->handleImageUpload($request, 'image', 'image_1_old', $uploadDir),

           
                      ];

 
        return DB::table('blog')->where('id',$request->post('id'))->update($updateData);
    }

  

public static function deleteUser($id)
{
    // Fetch the user data to get the image file name
    $user = DB::table('blog')->where('id', $id)->first();
    if ($user && $user->image) {
        // Define the path to the image file
        $imagePath = public_path('uploads/blog/' . $user->image);

        // Check if the file exists and delete it
        if (File::exists($imagePath)) {
            File::delete($imagePath);
        }
    }
    // Delete the user record from the database
    return DB::table('blog')->where('id', $id)->delete();
}

}
