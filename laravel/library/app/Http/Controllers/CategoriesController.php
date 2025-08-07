<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;


class CategoriesController extends Controller
{

    public function index()
    {
        $data = [
            "title" => "Categories",
            "datacategoris" => Categories::all(),
            "no" => 1
        ];
        return view('Pages.AdminCategories', $data);
    }
    public function AddCatergories(Request $request)
    {
        $validate = $request->validate([
            "nama_categories" => 'required|string|unique:categories|max:25|min:5'
        ]);
        try {
            Categories::create($validate);
            return redirect()->to(route('indexCategories'))->with("succes", "berhasil menambahkan data!");
        } catch (\Exception  $th) {
            return back()->withErrors(['error' => $th->getMessage()]);
        }
    }
    public function getCategoryById($id)
    {
        $category = Categories::find($id);

        if ($category) {
            return response()->json(['category' => $category]);
        } else {
            return response()->json(['error' => 'Category not found'], 404);
        }
    }

    public function updateCategory(Request $request, $id)
    {
        $validate = $request->validate([
            "nama_categories" => 'required|string|max:25|min:5'
        ]);

        $category = Categories::find($id);
        if ($category) {
            $category->update($validate);
            return redirect()->to(route('indexCategories'))->with("success", "berhasil mengupdate data!");
        } else {
            return back()->withErrors(['error' => 'Category not found']);
        }
    }

    public function deleteCategory($id)
    {
        $category = Categories::find($id);

        if ($category) {
            $category->delete();
            return redirect()->to(route('indexCategories'))->with("success", "berhasil menghapus data!");
        } else {
            return back()->withErrors(['error' => 'Category not found']);
        }
    }
}
