<?php

namespace App\Http\Controllers;

use App\Models\Artikels;
use App\Models\Category;
use Illuminate\Http\Request;

class pages extends Controller
{
    public function home()
    {
        $data = [
            "title" => "home",
            "trendingcategory" => Artikels::orderBy('click_count', 'DESC')->get(),
            "dataartikel" => Artikels::with('Category')->inRandomOrder()->get(),
            "category" => Category::all()
        ];
        return view("Pages.Home", $data);
    }
    public function artikelpage(Request $request)
    {
        $data = [
            "dataartikel" => Artikels::find($request->id),
            "category" => Category::all()
        ];
        $data['dataartikel']->increment('click_count');
        return view("Pages.Articel", $data);
    }
    public function Trending()
    {
        $data = [
            "trendingcategory" => Artikels::orderBy('click_count', 'DESC')->get(),
            "dataartikel" => Artikels::orderBy('click_count', 'DESC')->get(),
            "category" => Category::all()
        ];
        return view("Pages.Home", $data);
    }
}
