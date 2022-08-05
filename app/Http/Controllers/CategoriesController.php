<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Reply;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('dashboard.admin.categories.index', compact('categories'));
    }
    public function create()
    {
        return view('dashboard.admin.categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'cat_name' => 'required|min:3|max:50',
        ]);

        Category::create($request->all());
        toastr()->success('Kategori Başarıyla Kaydedildi', 'Kategori');
        return back();
    }
    public function edit($id)
    {
        $category = Category::find($id);
        return view('dashboard.admin.categories.edit', compact('category'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'cat_name' => 'required|min:3|max:50',
        ]);
        $category = Category::find($id);
        $category->update($request->all());
        toastr()->success('Başarıyla Kaydedildi', 'Kategori');
        return back();
    }
    public function delete($id)
    {
        $category = Category::find($id);
        $category->delete();
        toastr()->success('Başarıyla Silindi', 'Kategori');
        return back();
    }
    public function updateStatus($id)
    {
        $category = Category::find($id);
        if ($category->status == 1) {
            $category->status = 0;
            $category->save();
        } else {
            $category->status = 1;
            $category->save();
        }
        toastr()->success('Statü Güncellendi', 'Kategori');
        return back();
    }
}
