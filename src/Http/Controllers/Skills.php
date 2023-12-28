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
              //Show list of products

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
            return redirect()->route('home')->with('success','Skill Added');



      }
     //Show
     public function show($product_id)
     {
        return view('prouduts.show',['item'=>Skill::findOrFail($product_id)]);
     }
     //Edit And update
     public function edit($product_id)
     {
        return view('prouduts.edit',['item'=>Skill::findOrFail($product_id)]);
     }

     public function storeUpdate($id,Request $request)
     {
        $rules=[
            "title"=>"required|max:255|min:5",
            "desc"=>"required",
            "image"=>"nullable|image|mimes:jpg,png|max:1000",
            "status"=>"required"
           ];

           //Validation Message
          $messages=[
              "title.required"=>"Products title missing!",
              "title.max"=>"Too long title",
              "title.min"=>"Too short title",
              "desc.required"=>'Description is missing',
              "image.image"=>"Provide valid image file",
              "image.mimes"=>"Provide JPG or PNG image file",
              "image.max"=>"Maximum 1000kb size image can be uploaded!"
          ];

          Validator::make($request->all(),$rules,$messages)->validate();
        $item=Skill::findOrFail($id);
        $imageName=null;
        if($request->hasFile('image'))
        {
            $imageName=time().'.'.$request->image->extension();
            $request->image->storeAs('/public/images/',$imageName);
        }

        $item->image=$imageName??$item->image;
        $item->status=$request->status;
        $item->title=$request->title;
        $item->desc=$request->desc;
        //  /dd($item);
        if($item->isClean())
        {
            return back()->with('alert-info','Nothing updated!');
        }
        try{

             $item->save();
             return redirect(route('product.show',['id'=>$item->id]))->with('alert-success','Product Updated Successfully');
        }catch(Exception $ex)
        {
            return back()->withInput()->with('alert-danger',$ex->getMessage());
            dd($ex->getMessage());
        }


     }
     //Status off on
     public function statusChange($id)
     {
        $item=Skill::findOrFail($id);
        $item->status=$item->status=='1'?'0':'1';
        try{
            $msg=$item->status=='1'?'Activated':'Deactived';
            $item->save();
            return back()->with('alert-success',$item->title.' has been successfully '.$msg.'!');
        }catch(Exception $ex)
        {
            return back()->with('alert-danger',$ex->getMessage())->withInput();
        }
     }
     //Delete Operation

     public function deleteSkill($id)
     {
        try{
            Skill::where('id',$id)->delete();
            return redirect(route('home'))->with('alert-success','Item Successfully deleted!');
        }catch(Exception $ex)
        {
            return back()->with('alert-danger',$ex->getMessage());
        }

     }
}
