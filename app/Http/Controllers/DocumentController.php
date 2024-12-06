<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;

class DocumentController extends Controller
{  

    public function create()
    {
    return view('documents.create');
    }


    public function index()
    {
        $documents = Document::where('approved', true)->get();
        return view('documents.index', compact('documents'));
    }

    // Hujjatni ko‘rsatish
    public function show($id)
    {
        $document = Document::findOrFail($id);
        return view('documents.show', compact('document'));
    }

    // Admin paneli
    public function admin()
    {
        
        $documents = Document::where('approved', false)->get();
        return view('admin.index', compact('documents'));
    }

    // Hujjat yuklash
    public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string|max:500',
        'category' => 'required|string|in:rasmiy,shaxsiy,harbiy,diniy',
        'file' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
    ]);

    $filePath = $request->file('file')->store('documents', 'public');

    Document::create([
        'title' => $request->title,
        'description' => $request->description,
        'category' => $request->category,
        'file_path' => $filePath,
        'user_id' => auth()->id(),
        'approved' => false, // Admin tasdiqlaguncha false
    ]);

    return redirect()->route('home')->with('success', 'Hujjat muvaffaqiyatli yuklandi va admin tasdiqlash uchun yuborildi.');
}


    // Hujjatni o‘chirish
    public function destroy($id)
    {
        $document = Document::findOrFail($id);
        $document->delete();

        return back()->with('success', 'Hujjat o‘chirildi.');
    }

    public function comment(Request $request, $id)
   {
    $request->validate([
        'content' => 'required|string',
    ]);

    $document = Document::findOrFail($id);

    $document->comments()->create([
        'content' => $request->content,
        'user_id' => auth()->id(),
    ]);
    return back()->with('success', 'Fikr qoldirildi.');
    }




    public function approve($id)
{
    $document = Document::findOrFail($id);
    $document->approved = true;
    $document->save();

    return back()->with('success', 'Hujjat tasdiqlandi.');
}

public function category($category)
{
    $documents = Document::where('approved', true)
                         ->where('category', $category)
                         ->get();

    return view('documents.category', compact('documents', 'category'));
}


}

