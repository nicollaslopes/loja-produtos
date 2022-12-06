<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class AdminProductController extends Controller
{
    public function index() {
        $products = Product::All();
        
        return view('admin.products', compact('products'));
    }

    public function edit() {
        return view('admin.products_edit');
    }

    public function update() {
        return view();
    }

    public function create() {
        return view('admin.products_create');
    }

    public function store(Request $request) {

        $input = $request->validate([
            'name' => 'string|required',
            'price' => 'int|required',
            'stock' => 'int|nullable',
            'cover' => 'file|nullable',
            'description' => 'string|nullable'
        ]);

        $input['slug'] = Str::slug($input['name']);

        if (!empty($input['cover']) && $input['cover']->isValid()) {
            $file = $input['cover'];
            $path = $file->store('public/products');
            $input['cover'] = $path;
        }

        Product::create($input);

        return Redirect::route('admin.products');

    }
}
