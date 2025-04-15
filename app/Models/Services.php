<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;


class Services extends Model
{
    use HasFactory;
    
    // Method to retrieve all users
    public static function getAllUsers()
    {
        return DB::table('services')->orderBy('id', 'ASC')->get();
    }

    
    // Method to save a user
    public static function saveUser($request)
    {
        
    // Prepare data for saving
    $data = [
        'name' => $request->post('name', ''),
        'description' => $request->post('description', ''),
       
    ];

    // Handle image upload if available
    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();
        $randomNumber = rand(1000, 9999); // Generates a random 4-digit number
        $filename = $randomNumber . '.' . $extension;
        $file->move(public_path('uploads/services'), $filename);
        $data['image'] = $filename;
    }
    return DB::table('services')->insert($data);

    }

    // Method to retrieve a user by ID
    public static function getUserById($id)
    {
       return DB::table('services')->where('id', $id)->first(); // returns an stdClass
    }

    // Method to update a user
      public static function updateAbout($request)
    {

        $updateData = [
                         'name' => $request->post('name', ''),
                         'description' => $request->post('description', ''),
                         'image' => $request->file('image'),
           
                      ];

        // Handle the new image file if it exists

        if ($request->hasFile('image')) {
            // Delete the old file if it exists
            if (isset($updateData['image_1_old']) && file_exists(public_path('uploads/services/'.$request->post('image_1_old')))) {
                unlink(public_path('uploads\\services\\'.$request->post('image_1_old')));
            }
            
            // Save the new file
            $file = $updateData['image'];
            $extension = $file->getClientOriginalExtension();
            $filename = rand(1000, 9999) . '.' . $extension;
            $file->move(public_path('uploads/services'), $filename);
            $updateData['image'] = $filename;
        }else{

            $updateData['image'] = $request->post('image_1_old');
        }

        // Update the record in the database
        return DB::table('services')->where('id',$request->post('id'))->update($updateData);
    }



public static function deleteUser($id)
{
    // Fetch the user data to get the image file name
    $user = DB::table('services')->where('id', $id)->first();
    if ($user && $user->image) {
        // Define the path to the image file
        $imagePath = public_path('uploads/services/' . $user->image);

        // Check if the file exists and delete it
        if (File::exists($imagePath)) {
            File::delete($imagePath);
        }
    }
    // Delete the user record from the database
    return DB::table('services')->where('id', $id)->delete();
}

}
