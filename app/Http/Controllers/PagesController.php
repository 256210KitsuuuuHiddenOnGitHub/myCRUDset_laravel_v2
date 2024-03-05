<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\student_tables;

class PagesController extends Controller
{
    //Data Retrieval on database
    public function retrieve_data(){
        //Return all data available in database
        return student_tables::all();
    }

    //Retrieve Data send to MainViewCR.blade.php - R in C.R.U.D
    public function crud_r(){
        //Declare and return data
        $d = $this->retrieve_data();
        return view('MainViewCR', compact('d'));
    }
    
    //Delete Data View First to MainViewUD.blade.php - R in CRUD
    public function crud_rd_get(){
        //Return all data available in database
        $returnData = $this->retrieve_data();
        return view('MainViewUD', compact('returnData'));
    }

    //Create Data send to MainViewCR - C in C.R.U.D
    public function crud_c_post(Request $request){
        //check for data validation
        $validData = $request->validate([
            'personID' => 'required|numeric',
            'personName' =>'required|string|max:255',
        ]);
        
        // Check if the ID already exists
        $existingStudent = student_tables::find($validData['personID']);

        if ($existingStudent) {
            // If the student already exists, return with an error message
            Session::flash('error','ID already exists. Please choose a different ID.');
            return redirect()->back();
        }

        //Create new Student Record
        $student = new student_tables();
        $student->student_id = $validData['personID'];
        $student->name = $validData['personName'];
        $student->save();

        //Return back
        return redirect()->back();
    }

    //Edit Data send to MainViewUD.blade.php - U on C.R.U.D
    public function crud_re_post(Request $request)
    {
        // Get the input data from the form
        $student_id = $request->input('student_id');
        $new_name = $request->input('new_name');
    
        // Check if student_id is null or empty
        if (!$student_id) {
            // Set an error message if student_id is null or empty
            Session::flash('error', 'Student ID is missing.');
            return redirect()->back();
        }
    
        // Find the student record to update
        $student = student_tables::where('student_id',$student_id)->first();
    
        // Check if the student exists
        if ($student) {
            // Update the student's name
            $student->name = $new_name; // Assuming 'name' is the field you want to update
            $student->save(); // Save the updated record
    
            // Set a success message in the session
            Session::flash('success', 'Student information updated successfully.');
        } else {
            // Set an error message if the student is not found
            Session::flash('error', 'Student not found.');
        }
    
        //Return back
        return redirect()->back();
    }

    // Delete Data View First - POST Request
    public function crud_rd_post(Request $request)
    {
        // Get the selected student ID from the form
        $student_id = $request->input('student_id');
        
        // Check if student_id is null or empty
        if (!$student_id) {
            // Set an error message if student_id is null or empty
            Session::flash('error', 'Data Empty.');
            return redirect()->back();
        }else{
            // Perform the deletion logic here
            $deletedStudent = student_tables::where('student_id', $student_id);
            $deletedStudent->delete();
            Session::flash('success', 'Student deleted successfully.');
            
            //Return back
            return redirect()->back();
        }

    }

    
}
