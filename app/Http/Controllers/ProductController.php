<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Product;
use App\Category;

class ProductController extends Controller
{
    public function index()
    {
        $product = Product::with(['category'])->orderBy('created_at', 'DESC');

        if ('' != request()->q) {
            $product = $product->where('name', 'LIKE', '%' . request()->q . '%');
        }

        $product = $product->paginate(10);

        return view('products.index', compact('product'));
    }

    public function create()
    {
        $category = Category::orderBy('name', 'DESC')->get();

        return view('products.create', compact('category'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:100',
            'description' => 'required',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|integer',
            'weight' => 'required|integer',
            'image' => 'required|image|mimes:png,jpeg,jpg'
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');

            $filename = time() . Str::slug($request->name) . '.' . $file->getClientOriginalExtension();

            $file->storeAs('public/products', $filename);

            $product = Product::create([
                'name' => $request->name,
                'slug' => $request->name,
                'category_id' => $request->category_id,
                'description' => $request->description,
                'image' => $filename,
                'price' => $request->price,
                'weight' => $request->weight,
                'status' => $request->status
            ]);

            return redirect(route('product.index'))->with(['success' => 'Produk baru ditambahkan']);
            # code...
        }
    }
}
