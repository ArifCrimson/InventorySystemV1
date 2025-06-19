<?php

namespace App\Http\Controllers;

use App\Models\CategoryModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;   



class ProductController extends Controller
{
    public function index(){
        return view('products.index');
    }

    public function create(){
        $user = Auth::user();
        $categories = CategoryModel::all();

        return view('products.create', compact('categories'));
    }
}
