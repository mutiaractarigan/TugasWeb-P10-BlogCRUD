<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // Aturan validasi dipakai di store() dan update()
    private $rules = [
        'title' => 'required|min:5|max:255',
        'author' => 'required|max:100',
        'content' => 'required|min:20',
    ];

    private $messages = [
        'title.required' => 'Judul wajib diisi.',
        'title.min' => 'Judul minimal 5 karakter.',
        'title.max' => 'Judul maksimal 255 karakter.',
        'author.required' => 'Nama penulis wajib diisi.',
        'author.max' => 'Nama penulis maksimal 100 karakter.',
        'content.required' => 'Isi post wajib diisi.',
        'content.min' => 'Isi post minimal 20 karakter.',
    ];

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Bonus: pencarian berdasarkan judul / penulis
        $search = $request->query('search');

        $posts = Post::when($search, function ($query, $search) {
                $query->where('title', 'like', "%{$search}%")
                      ->orWhere('author', 'like', "%{$search}%");
            })
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('posts.index', compact('posts', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate($this->rules, $this->messages);

        try {
            $post = Post::create($validated);
        } catch (\Throwable $e) {
            return back()->withInput()->with('error', 'Gagal menyimpan post.');
        }

        return redirect()->route('posts.show', $post)
            ->with('success', 'Post berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $validated = $request->validate($this->rules, $this->messages);

        try {
            $post->update($validated);
        } catch (\Throwable $e) {
            return back()->withInput()->with('error', 'Gagal memperbarui post.');
        }

        return redirect()->route('posts.show', $post)
            ->with('success', 'Post berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        try {
            $post->delete();
        } catch (\Throwable $e) {
            return back()->with('error', 'Gagal menghapus post.');
        }

        return redirect()->route('posts.index')
            ->with('success', 'Post berhasil dihapus.');
    }
}
