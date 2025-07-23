<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        $products = Product::with('category')->latest()->paginate(10);
        // $categories = Category::all();
        return view('admin.product.product_list', compact('products', ));
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
    public function create(Request $request)
    {
        $validatedData = Validator::make($request->all(), [
            'title'       => 'required|string|max:255',
            'sku'         => 'nullable|string|max:255',
            'stock'       => 'required|string|max:255',
            'color'       => 'required|string|max:255',
            'size'        => 'required|string|max:255',
            'price'       => 'required|string|max:255',
            'description' => 'required|string',
            'image*'      => 'nullable|image',
        ]);
        if ($validatedData->fails()) {
            return redirect()->back()->withErrors($validatedData)->withInput();
        }
        $data = $validatedData->validated();
        if ($request->hasFile('image')) {
            $image     = $request->file('image');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/products'), $imageName);
            $data['image'] = $imageName;
        }
        Category::create($data);
        return redirect('product_list')->with('success', 'Product created successfully');

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
