<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use App\Services\ImageUploadService;


class About extends Model
{
    use HasFactory;
    protected $fillable = ['welcome', 'glimbse', 'our_journey', 'vision', 'mission', 'our_values', 'image'];

    // Method to retrieve all users
    public static function getAllUsers()
    {
        return DB::table('about')->orderBy('about_id', 'ASC')->get();
    }

    
    // Method to save a user
    public static function saveUser($request)
    {
        

     // Prepare data for saving
    $data = [
        'description' => $request->post('description', ''),
        'project_complete' => $request->post('project_complete', ''),
    ];

        // Handle image upload if available
        // Handle image 1 upload
    if ($request->hasFile('image_1')) {
        $filename = Str::random(5) . '.' . $request->file('image_1')->getClientOriginalExtension();
        $request->file('image_1')->move(public_path('uploads/about'), $filename);
        $data['image_1'] = $filename;
    }

    // Handle image 2 upload
    if ($request->hasFile('image_2')) {
        $filename = uniqid() . '.' . $request->file('image_2')->getClientOriginalExtension();
        $request->file('image_2')->move(public_path('uploads/about'), $filename);
        $data['image_2'] = $filename;
    }

    return DB::table('about')->insert($data);

    }

    // Method to retrieve a user by ID
    public static function getUserById($id)
    {
       return DB::table('about')->where('about_id', $id)->first(); // returns an stdClass
    }

    // Method to update a user
      public static function updateAbout($request)
    {
        $imageUploadService = app(ImageUploadService::class);
        $uploadDir = public_path('uploads/about/');
        $updateData = [
            'description' =>  $request->post('description') ?? '',
            'project_complete'=>$request->post('project_complete') ?? '',
            'image_1' => $imageUploadService->handleImageUpload($request, 'image_1', 'image_1_old', $uploadDir),
            'image_2' => $imageUploadService->handleImageUpload($request, 'image_2', 'image_2_old', $uploadDir),

        ];

         
        return DB::table('about')->where('about_id',$request->post('id'))->update($updateData);
    }


   
    public static function deleteUser($id)
    {
        // Fetch the user data to get the image file name
        $user = DB::table('about')->where('about_id', $id)->first();
        if ($user && $user->image_2) {
            // Define the path to the image file
            $imagePath = public_path('uploads/about/' . $user->image_2);

            // Check if the file exists and delete it
            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }
        }

        if ($user && $user->image_1) {
            // Define the path to the image file
            $imagePath = public_path('uploads/about/' . $user->image_1);

            // Check if the file exists and delete it
            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }
        }
        // Delete the user record from the database
        return DB::table('about')->where('about_id', $id)->delete();
    }

}
