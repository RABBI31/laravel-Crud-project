<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Crud;
use Session;

class CrudController extends Controller
{
    public function showData(){
        // $showData = Crud::all();
        $showData = Crud::paginate(3);
        return view('show_data', compact('showData'));
    }
    public function addData(){
        return view('add_data');
    }
    public function editData($id=null){
        $editData = Crud::find($id);
        return view('edit_data',compact('editData'));
    }
    public function storeData(Request $request){
        $rules = [
            'name'=> 'required',
            'email'=> 'required',

        ];
        $cm =[
            'name.required'=>'Enter your name',
            'name.max'=>'Your name contain more than 10 ch',
            'email.required'=>'Enter Your email ',
            'email.email'=>'Email must be a valid email',

        ];
        $this->validate($request, $rules,$cm);

        $crud = new Crud();
        $crud->name = $request->name;
        $crud->email = $request->email;
        $crud->save();
        Session::flash('msg','Data Sucessfully added');
        return redirect('/');
    }
    public function updateData(Request $request,$id){
        $rules = [
            'name'=> 'required',
            'email'=> 'required',

        ];
        $cm =[
            'name.required'=>'Enter your name',
            'name.max'=>'Your name contain more than 10 ch',
            'email.required'=>'Enter Your email ',
            'email.email'=>'Email must be a valid email',

        ];
        $this->validate($request, $rules,$cm);

        $crud = Crud::find($id);
        $crud->name = $request->name;
        $crud->email = $request->email;
        $crud->save();
        Session::flash('msg','Data Sucessfully updated');
        return redirect('/');
    }
    public function deleteData($id=null){
        $deleteData = Crud::find($id);
        $deleteData->delete();
        Session::flash('msg','Data Sucessfully Deleted');
        return redirect('/');

    }
}


