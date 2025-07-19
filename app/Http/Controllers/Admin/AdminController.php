<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Faq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.dashboard');
    }
    //about section

    public function about()
    {
        $about = About::first();
        if ($about) {
            $about->images = json_decode($about->images, true);
        }
        return view('user.about-page', compact('about'));
    }
    public function createAboutForm()
    {
        $about = About::first();
        return view('admin.settings.about', compact('about'));
    }
    public function createAbout(Request $request)
    {
        $validateData = Validator::make($request->all(), [
            'title'       => 'required|string|min:5',
            'description' => 'required|string|min:15',
            'images.*'    => 'nullable|image',
        ]);
        if ($validateData->fails()) {
            return redirect()->back()->withErrors($validateData)->withInput();
        }
        $about = About::first();

        $uploadImages = [];
        // Upload images if provided
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads/abouts'), $filename);
                $uploadedImages[] = $filename;
            }
        }

        if ($about) {
            // If less than 3 existing images, merge with new ones
            $existingImages = json_decode($about->images, true) ?? [];
            if (! empty($uploadedImages)) {
                $allImages = array_merge($existingImages, $uploadedImages);
                $allImages = array_slice($allImages, 0, 3);
            } else {
                $allImages = $existingImages;
            }
            $about->update([
                'title'       => $request->title,
                'description' => $request->description,
                'images'      => json_encode($allImages),
            ]);

            return redirect('about')->with('success', 'About Update Successfully');
        } else {
            // New About record
            $about = About::create([
                'title'       => $request->title,
                'description' => $request->description,
                'images'      => json_encode(array_slice($uploadedImages, 0, 3)),
            ]);

            return redirect('about')->with('success', 'About Created Successfully');
        }

    }
    //faq section
    public function faq()
    {
        $faq = Faq::paginate(5);
        return view('admin.settings.faq', compact('faq'));
    }

    public function faqForm(Request $request)
    {
        return view('admin.settings.add_faq');
    }
    public function createFaq(Request $request)
    {
        $validateData = Validator::make($request->all(), [
            'question' => 'required|string|min:10',
            'answer'   => 'required|string|min:10',
        ]);
        if ($validateData->fails()) {
            return redirect()->back()->withErrors($validateData)->withInput();
        }
        $faq = Faq::updateOrCreate([
            'question' => $request->question,
            'answer'   => $request->answer,
        ]);
        return redirect('faq')->with('success', 'Faq Created or Updated Successfully');
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
