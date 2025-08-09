<?php

namespace App\Http\Controllers;

use App\Models\CategoryModel;
use App\Models\ProductModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;   
use RealRashid\SweetAlert\Facades\Alert;



class ProductController extends Controller
{
    public function index(){

        $user = Auth::user();
        $products = ProductModel::with('category')->get();

        return view('products.index', compact('products'));
    }

    public function create(){
        $user = Auth::user();
        $categories = CategoryModel::all();

        return view('products.create', compact('categories'));
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'price' => 'required|numeric|min:0',
            'category' => 'required|exists:categories,id',
            // 'quantity' => 'required|integer|min:0',
            'unit' => 'required|string|max:50',
            // 'cost' => 'required|numeric|min:0',
        ], [
            'name.required' => 'Product name is required.',
            'name.max' => 'Product name cannot exceed 255 characters.',
            'description.max' => 'Description cannot exceed 1000 characters.',
            'price.required' => 'Price is required.',
            'price.numeric' => 'Price must be a number.',
            'price.min' => 'Price must be at least 0.',
            'category.required' => 'Category is required.',
            'category.exists' => 'Selected category does not exist.',
            // 'quantity.required' => 'Quantity is required.',
            // 'quantity.integer' => 'Quantity must be an integer.',
            // 'quantity.min' => 'Quantity must be at least 0.',
            'unit.required' => 'Unit is required.',
            'unit.max' => 'Unit cannot exceed 50 characters.',
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $product = new ProductModel();
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->category_id = $request->input('category');
        // $product->quantity_in_stock = $request->input('quantity');
        $product->unit = $request->input('unit');

        $product->save();

        Alert::success('Success', 'Product added successfully!');

        return redirect()->route('product.index');
    }
}
