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
    public function index(Request $request)
    {
        $products = Product::with('category')
            ->when($request->name, function ($query) use ($request) {
                $query->where('title', 'like', '%' . $request->name . '%'); // or use 'name' if your column is named that
            })
            ->when($request->created_at, function ($query) use ($request) {
                $query->whereDate('created_at', $request->created_at);
            })
            ->latest()
            ->paginate(10);

        return view('admin.product.product_list', compact('products'));
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
        $product    = Product::findOrFail($id);
        $categories = Category::all();
        return view('admin.product.add_product', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'category_id' => 'required|exists:categories,id',
            'title'       => 'required|string|max:255',
            'sku'         => 'required|string|max:255',
            'stock'       => 'nullable|string|max:255',
            'price'       => 'nullable|numeric',
            'description' => 'required|string',
            'image'       => 'nullable|array',
            'image.*'     => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = $validator->validated();

        // Image update logic
        if ($request->hasFile('image')) {
            // Delete old images first
            $oldImages = $product->getRawOriginal('image');

            // Decode old images if JSON string
            if (is_string($oldImages)) {
                $oldImages = json_decode($oldImages, true);
            }

            if ($oldImages && is_array($oldImages)) {
                foreach ($oldImages as $oldImage) {
                    $oldImagePath = public_path('uploads/products/' . $oldImage);
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath);
                    }
                }
            }

            // Upload new images
            $uploadedImages = [];
            foreach ($request->file('image') as $image) {
                if ($image->isValid()) {
                    $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path('uploads/products'), $imageName);
                    $uploadedImages[] = $imageName;
                }
            }

            $data['image'] = $uploadedImages;
        } else {
            $data['image'] = $product->image;
        }

        $product->update($data);

        return redirect('admin/product-list')->with('success', 'Product updated successfully');
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
            return redirect('admin/product-list')->with('success', 'Product deleted successfully');
        } else {
            return redirect('admin/product-list')->withErrors(['error' => 'Product not found']);
        }
    }
}
