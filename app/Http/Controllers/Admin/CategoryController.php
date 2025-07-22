<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $categories = Category::query()
            ->when($request->name, fn($q) => $q->where('name', 'like', "%{$request->name}%"))
            ->when($request->created_at, fn($q) => $q->whereDate('created_at', $request->created_at))
            ->latest()
            ->paginate(10);
        return view('admin.category.category_list', compact('categories'));
    }
    public function showAddCategory()
    {
        return view('admin.category.add_category');

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $validatedData = Validator::make($request->all(), [
            'name'        => 'required|string|max:255',
            'description' => 'required|string|min:10',
            'image'       => 'nullable|image',
        ]);
        if ($validatedData->fails()) {
            return redirect()->back()->withErrors($validatedData)->withInput();
        }
        $data = $validatedData->validated();
        if ($request->hasFile('image')) {
            $image     = $request->file('image');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/categories'), $imageName);
            $data['image'] = $imageName;
        }
        Category::create($data);
        return redirect('categories')->with('success', 'Category created successfully');
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
        $category = Category::findOrFail($id);
        return view('admin.category.add_category', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $validated = validator::make($request->all(), [
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string|min:10',
            'image'       => 'nullable|image',
        ]);

        if ($validated->fails()) {
            return redirect()->back()->withErrors($validated)->withInput();
        }

        $data = $validated->validated();

        if ($request->hasFile('image')) {
            if ($category->getRawOriginal('image') && file_exists(public_path('images/categories/' . $category->getRawOriginal('image')))) {
                unlink(public_path('images/categories/' . $category->getRawOriginal('image')));
            }

            $image     = $request->file('image');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/categories'), $imageName);
            $data['image'] = $imageName;
        }

        $category->update($data);

        return redirect('categories')->with('success', 'Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::find($id);
        if ($category) {
            if ($category->getRawOriginal('image') && file_exists(public_path('images/categories/' . $category->getRawOriginal('image')))) {
                unlink(public_path('images/categories/' . $category->getRawOriginal('image')));
            }
            $category->delete();
            return redirect('categories')->with('success', 'Category deleted successfully');
        } else {
            return redirect('categories')->withErrors(['error' => 'Category not found']);
        }
    }
}
