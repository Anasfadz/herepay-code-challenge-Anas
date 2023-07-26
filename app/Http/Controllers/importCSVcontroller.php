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

        $header = array_shift($rows);

        foreach ($rows as $row) {
            $name = $row[0];
            
            if($name != null)
            {
                $class = $row[1];
                $level = $row[2];
                $parent = $row[3];

                $checking = student_contact::where('Parent_Contact',$parent)
                ->where('Name', $name)->where('Level', $level)
                ->where('Class', $class)->exists();

                if($checking)
                {
                    // echo "User with this email already exists.";

                }
                else
                {
                    student_contact::insert([
                    'Name' => $name,
                    'Class' => $class,
                    'Level' => $level,
                    'Parent_Contact' => $parent,
                    'created_at' => now(),
                    'updated_at' => now(),
                    ]);
                }
            }
        }

        return redirect()->back()->with('alert', 'Updated!');
    }
}
