<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    //
    private $numPerPage = 5;
    private function validate(Request $request){
        // sửa đây nữa
        $request->validate([
        "name"=>"required",
        "email"=>"required|email",
        "phone"=>"required|regex:/(0)[0-9]{9}/",
        "student_class"=>"required",
        "mark"=>"required|numeric|min:0|max:10"
        ]);
    }
    public function index(){
        $students = Student::paginate($this->numPerPage);
        return response()->view("students.index", compact("students"));
    }
    public function show($id){
        return response()->view("students.show");
    }
    public function store(Request $request){
        // cái này là function thiết lập controller thêm vào
        $this->validate($request);
        Student::create($request->all());
        // còn đây là phương thức thêm vào trong database hoặc là về sau dùng phương thức khác thì đổi đi
        return redirect()->back()->with("success", value: "Created Successfully");
    }
    public function create(){
        return response()->view("students.create");
    }
    public function edit($id){
        $student = Student::find($id);
        return response()->view("students.edit", compact(var_name: "student"));
    }
    public function update(Request $request, $id){
        $this->validate($request);
        return redirect()->back()->with("success", "Updated Successfully");
    }
    public function destroy($id){
        $studentToDelete = Student::find($id);
        $studentToDelete->delete();
        return redirect()->back()->with("success", "Deleted Successfully");
    }
}
