<?php

namespace App\Http\Controllers;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    ///lista de usuarios
     public function  list(){
         $data['students']= Student::paginate(3);
         return view('students.list',$data);
     }

    // fin
    //// formulario
    public function  studentform(){
        return view('students.studentsform');
    }
    // guardar
    public function save(Request $request){
        $validator = $this->validate($request,[
            'name'=> 'required|string|max:40',
            'direction'=> 'required|string|max:200',
            'phone'=> 'required|string|max:15'
        ]);
        $studentdata= request()->except('_token');
        Student::insert($studentdata);
        return back()->with('guardado', 'estudiante guardado');
    }
    // eliminar
    public  function delete($id){
         Student::destroy($id);

          return back()->with('eliminado','estudiante eliminado');
    }


    // formulario para editar categoria
    public  function editform($id){
         $student = Student::findOrFail($id);
         return  view('students.editform',compact('student'));
     //   return back()->with('eliminado','categoría eliminada');
    }

    public function edit(Request $request, $id){
        $validator = $this->validate($request,[
            'name'=> 'required|string|max:40',
            'direction'=> 'required|string|max:200',
            'phone'=> 'required|string|max:15'
        ]);
        $studentdata= request()->except('_token', '_method');

        Student::where('id','=',$id)->update($studentdata);
        return back()->with('modificado', 'estudiante modificado');
    }
}
