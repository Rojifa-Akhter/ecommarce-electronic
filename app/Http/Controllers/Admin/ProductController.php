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
    public function create()
    {
        $categories = Category::all();
        return view('admin.product.add_product', compact('categories'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category_id' => 'required|exists:categories,id',
            'title'       => 'required|string|max:255',
            'sku'         => 'required|string|max:255',
            'stock'       => 'required|string|max:255',
            'price'       => 'required|numeric',
            'description' => 'required|string',
            'image'       => 'nullable|array',
            'image.*'     => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = $validator->validated();

        $uploadedImages = [];

        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $image) {
                if ($image->isValid()) {
                    // Unique image name
                    $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                    // Move file to public/uploads/products
                    $image->move(public_path('uploads/products'), $imageName);
                    $uploadedImages[] = $imageName;
                }
            }
        }

        if (! empty($uploadedImages)) {
            // Store as JSON encoded array (model casts handle decode)
            $data['image'] = $uploadedImages;
        } else {
            $data['image'] = null; // or [] if you want empty array
        }

        Product::create($data);

        return redirect('product-list')->with('success', 'Product created successfully');
    }

    /**
     * Store a newly created resource in storage.
     */

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::with('category')->findOrFail($id);
        return view('admin.product.show_product', compact('product'));

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
        $product = Product::find($id);
        if ($product) {
            if ($product->getRawOriginal('image') && file_exists(public_path('uploads/products/' . $product->getRawOriginal('image')))) {
                unlink(public_path('uploads/products/' . $product->getRawOriginal('image')));
            }
            $product->delete();
            return redirect('product-list')->with('success', 'Product deleted successfully');
        } else {
            return redirect('product-list')->withErrors(['error' => 'Product not found']);
        }
    }
}
