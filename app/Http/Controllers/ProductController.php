<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        
        return view('products.index', ['products' => $products]);
        
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'name_ru' => 'nullable',
            'name_sp' => 'nullable',
            'image' => 'nullable|image',
        ]);
    
        // Create a new instance...
        $product = new Product;
        $product->name = $request->name;
        $product->name_ru = $request->name_ru;
        $product->name_sp = $request->name_sp;
    
        // Handle the image upload...
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $filename);
            Image::make($image)->resize(800, 400)->save($location);
    
            $product->image = $filename;
        }
    
        // Save the instance...
        $product->save();
    
        // Redirect the user...
        return redirect()->route('products.index');
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function language($locale)
	{
		switch ($locale) {
			case 'en':
				session()->put('locale', 'en');
				return redirect()->back();
				break;
			case 'ru':
				session()->put('locale', 'ru');
				return redirect()->back();
				break;
			case 'sp':
				session()->put('locale', 'sp');
				return redirect()->back();
				break;
			default:
				return redirect()->back();
		}
	}
}
