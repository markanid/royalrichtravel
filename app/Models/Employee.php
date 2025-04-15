<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use App\Services\ImageUploadService;


class Employee extends Model
{
    use HasFactory;
    protected $table = 'employee';
    protected $fillable = ['employee_name', 'email'];

    // Method to retrieve all users
    public static function getAllUsers()
    {
        return DB::table('employee')->orderBy('id', 'ASC')->get();
    }

    public function export()
{
    $products = employee::all();
    $csvFileName = 'products.csv';
    $headers = [
        'Content-Type' => 'text/csv',
        'Content-Disposition' => 'attachment; filename="' . $csvFileName . '"',
    ];

    $handle = fopen('php://output', 'w');
    fputcsv($handle, ['employee_name', 'role']); // Add more headers as needed
 dd($products);
    foreach ($products as $product) {
        fputcsv($handle, [$product->name, $product->price]); // Add more fields as needed
    }

    fclose($handle);

    return Response::make('', 200, $headers);
}

    
    // Method to save a user
    public static function saveUser($request)
    {
        

     // Prepare data for saving
    $data = [
        'employee_name' => $request->post('employee_name', ''),
        'email' => $request->post('email', ''),
        'mobile' => $request->post('mobile', ''),
        'date_join' => $request->post('date_join', ''),
        'role' => $request->post('role', ''),
        'department' => $request->post('department', ''),
         
    ];

    
    return DB::table('employee')->insert($data);

    }

    // Method to retrieve a user by ID
    public static function getUserById($id)
    {
       return DB::table('employee')->where('id', $id)->first(); // returns an stdClass
    }

    // Method to update a user
      public static function updateAbout($request)
    {
         
        $updateData = [
            'employee_name' => $request->post('employee_name', ''),
        'email' => $request->post('email', ''),
        'mobile' => $request->post('mobile', ''),
        'date_join' => $request->post('date_join', ''),
        'role' => $request->post('role', ''),
        'department' => $request->post('department', ''),

        ];

         
        return DB::table('employee')->where('id',$request->post('id'))->update($updateData);
    }


   
    public static function deleteUser($id)
    {
         
        return DB::table('employee')->where('id', $id)->delete();
    }

}
