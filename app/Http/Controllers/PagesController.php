<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;
use App\User;
use App\Category;

class PagesController extends Controller
{
    public function index()
    {
      $news = News::all();
      $user = User::all();
      $cat = Category::all();

      return view('home', compact('news', 'user', 'cat'));
    }

    public function about()
    {
      return view('pages.about');
    }

    public function projects()
    {
      return view('pages.projects');
    }

    public function blog()
    {
      return view('pages.blog');
    }

    public function contact()
    {
      return view('pages.contact');
    }
}
