<?php

namespace App\Http\Controllers;

use App\Models\CategoryModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function index(Request $request){
        $title = "Category";
        $category = CategoryModel::paginate(10);
        $query = CategoryModel::query();

        if($request->has('name') && !empty($request->input('name'))){
            $query->where('name', 'like', '%' . $request->input('name') . '%');
        }

        $categoryresult = $query->orderBy('name', 'desc')->paginate(10)->appends($request->query());

        return view('categories.index', compact('title', 'categoryresult'));
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


    //update category name section!!
    
    public function edit (Request $request, $id){
        $title = 'Edit Category Name';
        $data = CategoryModel::find($id);
        return view('categories.edit', compact('title', 'data'));
    }

    public function update (Request $request, $id){
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
        ], [
            'name.required' => 'New category name needed!',
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $category = CategoryModel::find($id);
        if(!$category){
            return redirect()->back()->with('Error', 'THE CATEGORY DOES NOT EXIST');
        }

        $category->name = $request->input('name');

        $category->save();

        return redirect()->route('category.index')->with('success', 'Category name has been updated!');
    }
}
