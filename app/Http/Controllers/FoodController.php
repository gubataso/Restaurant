<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Food;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    public function index(){
        $Food = Food::all();
        return view("food.index",compact('Food'));
    }
    
    public function store(Request $request){
        $data = $this->validate($request,[
            "name" => "required",
            "category_id" => "required|exists:App\Models\Category,id"
        ]);
        $category = Category::find($data["category_id"]);
        $category->Foods()->Create($data);
        return redirect()->route("category_show",["id" =>  $category->id]);
    }
    public function delete($id){
        $food = Food::find($id);
        if(is_null($food))
            abort(404);
        else
            $food->delete();
    }
    public function update(Request $request, $id){
        $food = Food::find($id);
        if(is_null($food))
            abort(404);
        else{
            $data = $this->validate($request,[
                "name" => "required",
                "category_id" => 'exists:App\Models\Food,id|nullable'
            ]);
            $food->delete();
        }

    }
    public function create(Request $request){
        $Categories = Category::all();
        $SelectedCategory = $request->get('category') ? $request->get('category') : 0 ;
        return view("food.create",compact("Categories","SelectedCategory"));


    }
    public function show($id){
        $Food = Food::find($id);
        if(is_null($Food))
            abort(404);
        return view("food.index", compact("Food"));
    }
}