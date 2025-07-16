<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
    public function about()
    {
        return view('admin.settings.about');
    }
    //faq section
    public function faq()
    {
        $faq = Faq::paginate(5);
        return view('admin.settings.faq',compact('faq'));
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
        return redirect('faq')->with('success','Faq Created or Updated Successfully');
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
