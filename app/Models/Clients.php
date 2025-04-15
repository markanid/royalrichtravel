<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;


class Clients extends Model
{
    use HasFactory;
    protected $fillable = ['client_name', 'client_image'];

    // Method to retrieve all users
    public static function getAllUsers()
    {
        return DB::table('clients')->orderBy('id', 'ASC')->get();
    }

    
    // Method to save a user
    public static function saveUser($request)
    {
        
    // Prepare data for saving
    $data = [
        'client_name' => $request->post('client_name', ''),
    ];

     // Handle image upload
        if ($request->hasFile('client_image')) {
            $filename = uniqid() . '.' . $request->file('client_image')->getClientOriginalExtension();
            $request->file('client_image')->move(public_path('uploads/clients'), $filename);
            $data['client_image'] = $filename;
        }
    return DB::table('clients')->insert($data);

    }

    // Method to retrieve a user by ID
    public static function getUserById($id)
    {
       return DB::table('clients')->where('id', $id)->first(); // returns an stdClass
    }

    // Method to update a user
      public static function updateAbout($request)
    {

        $updateData = [
            'client_name' =>  $request->post('client_name') ?? '',
            'client_image' => $request->hasFile('client_image') ? self::handleImageUpload($request) : $request->image_1_old,
        ];

         
        return DB::table('clients')->where('id',$request->post('id'))->update($updateData);
    }


    public static function deleteUser($id)
    {
        // Fetch the user data to get the image file name
        $user = DB::table('clients')->where('id', $id)->first();
        if ($user && $user->client_image) {
            // Define the path to the image file
            $imagePath = public_path('uploads/clients/' . $user->client_image);

            // Check if the file exists and delete it
            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }
        }
        // Delete the user record from the database
        return DB::table('clients')->where('id', $id)->delete();
    }

 
     // Handle image upload
    private static function handleImageUpload($request)
    {
        $uploadDir = public_path('uploads/clients/');
        // Delete old image if exists
        if ($request->image_1_old) {
            File::delete($uploadDir . $request->image_1_old);
        }

        $filename = uniqid() . '.' . $request->file('client_image')->getClientOriginalExtension();
        $request->file('client_image')->move($uploadDir, $filename);

        return $filename;
    }
}


