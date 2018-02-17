<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
      return view('home');
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
