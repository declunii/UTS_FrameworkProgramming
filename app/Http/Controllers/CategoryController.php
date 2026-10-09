<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::withCount('books')->latest()->paginate(10);
        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'        => ['required', 'string', 'max:100', 'unique:categories,name'],
            'description' => ['nullable', 'string'],
        ]);

        Category::create($data);

        return redirect()->route('categories.index')->with('success', 'Kategori berhasil ditambahkan.');
    }

    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $data = $request->validate([
            'name'        => ['required', 'string', 'max:100', Rule::unique('categories', 'name')->ignore($category->id)],
            'description' => ['nullable', 'string'],
        ]);

        $category->update($data);

        return redirect()->route('categories.index')->with('success', 'Kategori berhasil diperbarui.');
    }

    public function destroy(Category $category)
    {
        // Tangani constraint: kategori yang masih punya buku tidak boleh dihapus
        if ($category->books()->exists()) {
            return redirect()->route('categories.index')
                ->with('error', 'Kategori "' . $category->name . '" tidak dapat dihapus karena masih memiliki buku.');
        }

        try {
            $category->delete();
        } catch (QueryException $e) {
            return redirect()->route('categories.index')
                ->with('error', 'Kategori gagal dihapus karena masih terhubung dengan data lain.');
        }

        return redirect()->route('categories.index')->with('success', 'Kategori berhasil dihapus.');
    }
}
