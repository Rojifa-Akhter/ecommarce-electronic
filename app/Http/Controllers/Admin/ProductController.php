<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //for user
    public function products()
    {
        $products   = Product::with('category')->latest()->paginate(12);
        $categories = Category::all();

        return view('user.product.product-page', compact('products', 'categories'));
    }

//for admin
    public function index()
    {
        return view('admin.product.product_list');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function showAddProduct()
    {
        return view('admin.product.add_product');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('{{ viewPath }}.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // {{ model }}::create($request->all());
        return redirect()->route('{{ viewPath }}.index')->with('success', 'Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // $item = {{ model }}::findOrFail($id);
        return view('{{ viewPath }}.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // $item = {{ model }}::findOrFail($id);
        return view('{{ viewPath }}.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
