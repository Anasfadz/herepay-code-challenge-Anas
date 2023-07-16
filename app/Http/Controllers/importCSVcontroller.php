<?php

namespace App\Http\Controllers;

use App\Models\student_contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class importCSVcontroller extends Controller
{
    public function index()
    {
        $data = student_contact::all();

        return view('importCSV', compact('data'));
    }
    public function import(Request $request)
    {
        $file = $request->file('csv_file');

        $csvData = file_get_contents($file);
        $rows = array_map('str_getcsv', explode("\n", $csvData));

        // Assuming the CSV file has a header row, skip the first row
        $header = array_shift($rows);

        foreach ($rows as $row) {
            // Assuming the CSV file columns are in the following order: name, email
            $name = $row[0];
            
            if($name != null)
            {
                $email = $row[1];
                $level = $row[2];
                $parent = $row[3];

                $checking = student_contact::where('Parent_Contact',$parent)->exists();

                if($checking)
                {
                    echo "User with this email already exists.";

                }
                else
                {
                    student_contact::insert([
                    'Name' => $name,
                    'Class' => $email,
                    'Level' => $level,
                    'Parent_Contact' => $parent,
                    'created_at' => now(),
                    'updated_at' => now(),
                    ]);
                }
            }
        }

        return redirect()->back();
    }
}
