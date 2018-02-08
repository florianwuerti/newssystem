<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function create()
    {
      return view('category.create');
    }

    public function save(Request $request)
    {
      $this->validate($request, [
        'name'     => 'required|max:50',
      ]);

      $category = new Category;

      $category->name = $request->name;
      $category->slug = str_slug($request->name);

      $category->save();

      return redirect()->back();

    }
}
