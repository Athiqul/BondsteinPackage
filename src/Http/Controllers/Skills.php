<?php

namespace Athiq\Bondsteinscrud\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;
use App\Http\Controllers\Controller;
use Athiq\Bondsteinscrud\Models\Skill;
use Exception;
use Illuminate\Validation\Rule;

class Skills extends Controller
{
     //Home page show active and inactive product
      public function index()
      {


               return view('crud::show_items',["items"=>Skill::get()]);
      }
     //Create view
      public function create()
      {
        return view('crud::create_items');
      }
      public function store(Request $request):RedirectResponse
      {
        // dd($request->all());
         //Validation Rules
         $rules=[
          "skills"=>"required|string|max:255|min:3",
          "process"=>['required',Rule::in(['0','1','2'])],
         ];

         //Validation Message
        $messages=[
            "skills.required"=>"Skill Name Is Missing!",
            "skills.max"=>"Too long Skill Name",
            "skills.min"=>"Too short Skill Name",
            "skills.string"=>'Skill Name should be in string type',
            "process.required"=>"Skill Level is required!",
        ];

        Validator::make($request->all(),$rules,$messages)->validate();
        //Save Product


            Skill::create($request->all());
            session()->put('alert-success','Skill Added');
            return redirect()->route('home');



      }
     //Show

     //Edit And update
     public function edit($skill_id)
     {
        return view('crud::edit_items',['item'=>Skill::findOrFail($skill_id)]);
     }

     public function storeUpdate($id,Request $request)
     {
        $rules=[
            "skills"=>"required|string|max:255|min:3",
            "process"=>['required',Rule::in(['0','1','2'])],
           ];

           //Validation Message
          $messages=[
              "skills.required"=>"Skill Name Is Missing!",
              "skills.max"=>"Too long Skill Name",
              "skills.min"=>"Too short Skill Name",
              "skills.string"=>'Skill Name should be in string type',
              "process.required"=>"Skill Level is required!",
          ];


          Validator::make($request->all(),$rules,$messages)->validate();
        $item=Skill::findOrFail($id);


        $item->skills=$request->skills;
        $item->process=$request->process;

        if($item->isClean())
        {
            session()->put('alert-success','Skill Added');
            return back();
        }
        try{

             $item->save();
             session()->put('alert-success','Skill Updated');
             return redirect(route('home',['id'=>$item->id]));
        }catch(Exception $ex)
        {
            return back()->withInput()->with('alert-danger',$ex->getMessage());
           // dd($ex->getMessage());
        }


     }

     //Delete Operation

     public function deleteSkill($id)
     {
        try{
            Skill::where('id',$id)->delete();
            session()->put('alert-success','Item Successfully deleted!');
            return redirect(route('home'));
        }catch(Exception $ex)
        {
            return back()->with('alert-danger',$ex->getMessage());
        }

     }
}
