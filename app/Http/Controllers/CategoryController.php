<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $Categories = Category::all();
        return view("category.index",compact('Categories'));
    }

    public function store(Request $request){
        $data = $this->validate($request, [
            "name" => "required"
        ]);
        Category::create($data);
        return redirect()->route("category");
    }

    public function delete($id){
        $category = Category::find($id);
        if(is_null($category))
            abort(404);
        else
            $category->delete();
            return redirect()->route("category");
            
         
    }
    public function update(Request $request,$id){
        $category = Category::find($id);
        if(is_null($category))
            abort(404);
        else{
            $data = $this->validate($request,[
                "name" => 'required',
                'category_id' => 'exists:App\Models\Category,id|nullable'
            ]);
            $category->update($data);
            return redirect()->route("category")->with("message");
        }
    }
    public function show($id){
        $category = Category::find($id);
        if(is_null($category))
            abort(404);
        return view("category.show", compact("category"));
    }
}
