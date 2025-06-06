<?php

namespace App\Http\Controllers;

use App\Models\CategoryModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function index(){
        $title = "Category";
        return view('categories.index', compact('title'));
    }

    public function create(){
        $title = 'Create Category';
        return view('categories.create', compact('title'));
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:150',
        ], [
            'name.required'=>'Category name needed!!!!',
            'name.max'=>'Category name maximum is 150 words exceeded!!!'
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = new CategoryModel();
        $data->name = $request->input('name');
        $data->save();

        return redirect()->route('category.index')->with('success', 'Category Added!');
    }
}
