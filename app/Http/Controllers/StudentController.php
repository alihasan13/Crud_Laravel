<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use Session;
use DB;
use PDF;
use Response;

class StudentController extends Controller {

    public function index(Request $request) {
//        echo 'hi';exit;
        
        $users = Student::orderBy('id', 'desc');
        if (!empty($request->search)) {
            $users = $users->where('first_name', 'LIKE', "%" . $request->search . "%");
        }
        if (!empty($request->id)) {
            $users = $users->where('id', $request->id);
        }

        $genderArr = ["1" => "Male", "2" => "Female", "3" => "Others"];
        $hobbyArr = ["1" => "Song", "2" => "Poem", "3" => "Gardening"];
        $statusArr = ['1' => 'Active', '2' => 'Inactive', '3' => 'Under Processing'];
        $countryArr = ['1' => 'Bangladesh', '2' => 'India', '3' => 'Australia', '4' => 'Canada', '5' => 'USA', '6' => 'UK'];
        if ($request->view == 'pdf') {
            $users = $users->get();
            $pdf = PDF::loadview('student.print.viewStudent', compact('users', 'statusArr', 'countryArr', 'genderArr', 'hobbyArr'));
            return $pdf->download($request->id);
        } else {
            $users = $users->paginate(10);
            return view('student.viewStudent', compact('users', 'statusArr', 'countryArr', 'genderArr', 'hobbyArr'));
        }
    }

    public function create() {
        
        return view('student.create');
    }

    public function store(Request $request) {
        //echo '<pre>';print_r($request->all());exit;
        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $target = new Student();
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = str_slug($request->first_name) . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/image');
            $imagePath = $destinationPath . "/" . $name;
            $image->move($destinationPath, $name);
            $target->image = $name;
        }

        $target->first_name = $request->first_name;
        $target->email = $request->email;
        $target->last_name = $request->last_name;
        $target->username = $request->username;
        $target->gender = $request->gender;
        $target->phone = $request->phone;
        $target->hobby = implode(",", $request->hobby);
        $target->address = $request->address;
        $target->password = $request->password;
        $target->country = $request->country;
        $target->status = $request->cur_status;
        $target->save();

        if ($target->save()) {
            return Response::json(array('success' => true, 'data' => __('label.USER_HAS_BEEN_CREATED_SUCCESSFULLY')));
        }
    }

    public function edit(Request $request) {
        $id = $request->id;

        $userInfo = Student::find($id);
        
        $previousHobby = explode(',', $userInfo->hobby);

        $hobbyArr = ["1" => "Song", "2" => "Poem", "3" => "Gardening"];
        $statusArr= ['0'=>__('label.SELECT_STATUS')] + ['1' => 'Active','2'=>'Inactive','3'=>'Under processing' ];
        $countryArr = ['0'=>__('label.SELECT_COUNTRY')] + ['1' => 'Bangladesh','2'=>'India','3'=>'Australia','4'=>'Canada','5'=>'USA','6'=>'UK' ];
        $information = view('student.edit', compact('userInfo', 'hobbyArr', 'previousHobby','countryArr','statusArr'))->render();
        return response()->json(['info' => $information]);
    }

    public function update(Request $request) {
        
        
        $target = Student::find($request->student_id);

        if (!empty($request->hobby)) {
            $request->hobby = implode(",", $request->hobby);
        }
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = str_slug($request->first_name) . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/image');
            $imagePath = $destinationPath . "/" . $name;
            $image->move($destinationPath, $name);
        }

        $target->first_name = $request->first_name;
        $target->email = $request->email;
        $target->last_name = $request->last_name;
        $target->username = $request->username;
        if (!empty($request->password)) {
            $target->password = $request->password;
        }

        $target->gender = $request->gender;
        $target->phone = $request->phone;
        $target->hobby = $request->hobby;
        $target->address = $request->address;
        $target->image = !empty($name) ? $name : $target->image;
        $target->country = $request->country;
        $target->status = $request->cur_status;

        if ($target->save()) {
            return Response::json(array('success' => true, 'data' =>  __('label.USER_HAS_BEEN_UPDATED_SUCCESSFULLY')));
        }
        
       
    }

    public function userProfile(Request $request) {

        $userInfo = Student::find($request->id);
        $previousHobby = explode(',', $userInfo->hobby);
        $hobbyArr = ["1" => "Song", "2" => "Poem", "3" => "Gardening"];

        $previousCountry = explode(',', $userInfo->country);
        $country = ['1' => 'Bangladesh', '2' => 'India', '3' => 'Australia', '4' => 'Canada', '5' => 'USA', '6' => 'UK'];

        $previousGender = explode(',', $userInfo->gender);
        $genderArr = ["1" => "Male", "2" => "Fmale", "3" => "Others"];

        $previousStatus = explode(',', $userInfo->status);
        $statusArr = ['1' => 'Active', '2' => 'Inactive', '3' => 'Under processing'];


        $jsonView = view('student.showProfile', compact('userInfo', 'hobbyArr', 'previousHobby', 'previousCountry', 'country', 'previousGender', 'genderArr', 'previousStatus', 'statusArr'))->render();
        return response()->json(['view' => $jsonView]);
    }

    public function destroy(Request $request, $id) {
        $target = Student::find($id);

        if ($target->delete()) {
            Session::flash('Success', __('label.USER_HAS_BEEN_DELETED_SUCCESSFULLY'));
        }
        
        return redirect('student');
    }

    public function filter(Request $request) {

        $text = $request->text;
        if (empty($text)) {
            return redirect('student');
        }
        $url = 'search=' . $text;
        //        
        //        $users = User::select('*')
        //                ->where ('first_name', 'LIKE', "%{$text}%")
        //                ->simplePaginate(5);
        //       
        //        return view('user.viewUser',['users' => $users]);
        return redirect('student?' . $url);
    }

    public function student() {

        return view('student.student');
    }

    public function createStudent() {
        $countryArr = ['0'=>__('label.SELECT_COUNTRY')] + ['1' => 'Bangladesh','2'=>'India','3'=>'Australia','4'=>'Canada','5'=>'USA','6'=>'UK' ];
        $statusArr= ['0'=>__('label.SELECT_STATUS')] + ['1' => 'Active','2'=>'Inactive','3'=>'Under processing' ];
        return view('student.createStudent',compact('countryArr','statusArr'));
    }

    public function editStudent() {
        return view('student.edit');
    }
     public function search(Request $request){   
         
          $search = $request->search;
      
          $resultArr = Student::where('first_name', 'LIKE', '%'. $search. '%')->get('first_name','id');
          $html = view('student.showName',compact('resultArr'))->render();
          return response()->json(['view' => $html]);
            
    } 

}
