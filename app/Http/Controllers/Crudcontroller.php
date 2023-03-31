<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Crud;
use Session;

class Crudcontroller extends Controller
{
    public function showdata()
    {
        // $showdata = Crud::all();
         $showdata = Crud::paginate(5);
       // $showdata = Crud::simplePaginate(5);
        return view('show_data',compact('showdata'));
    }
    public function adddata()
    {
        return view('add_data');
    }
    public function storedata(Request $request){
        $rules= [
            'name'=>'required|max:15',
            'email'=>'required|email',
        ];
        $cm=[
            'name.required'=>'Enter your name',
            'name.max'=>'Your name can not contain more than 15 characters',
            'email.required'=>'Enter your email',
            'email.email'=>'This is an invalid email',
        ];
        $this->validate($request,$rules,$cm);

        $crud= new Crud();
        $crud->name= $request->name;
        $crud->email= $request->email;
        $crud-> save();
        Session::flash('msg','Data Successfully added');
        return redirect('/');
    }
    public function editdata($id=null)
    {
        $editdata = Crud::find($id);
        return view('edit_data', compact('editdata'));
    }

    public function updatedata(Request $request,$id){
        $rules= [
            'name'=>'required|max:15',
            'email'=>'required|email',
        ];
        $cm=[
            'name.required'=>'Enter your name',
            'name.max'=>'Your name can not contain more than 15 characters',
            'email.required'=>'Enter your email',
            'email.email'=>'This is an invalid email',
        ];
        $this->validate($request,$rules,$cm);

        $crud= Crud::find($id);
        $crud->name= $request->name;
        $crud->email= $request->email;
        $crud-> save();
        Session::flash('msg','Data Successfully updated');
        return redirect('/');
    }
    public function deletedata($id=NULL)
    {
        $deletedata= Crud::find($id);
        $deletedata->delete();
        Session::flash('msg','Data Successfully deleted');
        return redirect('/');
    }
}
